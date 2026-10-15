<?php

namespace Kanboard\Plugin\ColorManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\AccessForbiddenException;
use Kanboard\Core\Controller\PageNotFoundException;

/**
 * Plugin ColorManager
 * Class ColorManagerController
 *
 * Security and behaviour contracts are covered by tests/security_contract.php.
 *
 * @author aljawaid, Craig Crosby
 */

class ColorManagerController extends BaseController
{
    /**
     * Display the Settings Page
     * Use this function to create a page showing your template content.
     * This function must be checked with 'Views - Add Menu Item - Template Hook' in Plugin.php
     * This function must be checked with 'Extra Page - Routes' in Plugin.php
     * Use: $this->helper->layout->config for config settings menu sidebar
     * Use: $this->helper->layout->plugin for plugin menu sidebar
     * @access public
     */

    public function show()
    {
        $this->assertAdmin();

        $defaultColorId = $this->colorModel->getDefaultColor();
        $this->response->html($this->helper->layout->config('colorManager:config/colors', array(
            'title' => t('Settings') . ' &#10562; ' . t('Color Manager'),
            'defaultColors' => $this->colorModel->getDefaultColors(),
            'staticColors' => $this->colorModel->getStaticColors(),
            'textColors' => $this->colorModel->getTextColors(),
            'customColors' => $this->colorModel->getCustomColors(),
            'defaultColor' => $this->colorModel->getColorProperties($defaultColorId),
            'colorCount' => count($this->colorModel->getList()),
        )));
    }

    public function add(array $values = array(), array $errors = array())
    {
        $this->assertAdmin();

        $this->response->html($this->helper->layout->config('colorManager:config/add_custom_color', [
            'errors' => $errors,
            'values'  => $values,
            'title'  => t('Custom Colors') . ' &gt; ' . t('Add Color'),
         ]));
    }

    public function confirm()
    {
        $this->assertAdmin();
        $key = $this->request->getStringParam('key');

        $color = $this->colorModel->getCustomColor($key);
        if ($color === null) {
            throw new PageNotFoundException();
        }

        $this->response->html($this->helper->layout->config('colorManager:config/remove', array(
            'title' => t('Delete Color'),
            'colorId' => $key,
            'color' => $color,
        )));
    }

    public function remove()
    {
        $this->assertAdmin();
        $this->requirePostRequest();
        $this->checkCSRFForm();

        $values = $this->request->getValues();
        $key = isset($values['key']) && is_string($values['key']) ? $values['key'] : '';

        if ($this->colorModel->getCustomColor($key) === null) {
            throw new PageNotFoundException();
        }

        if (!$this->colorModel->removeCustomColor($key)) {
            $this->flash->failure(t('Unable to remove this color'));
            return $this->response->redirect($this->helper->url->to('ColorManagerController', 'show', ['plugin' => 'ColorManager', 'url' => t('color-manager')]));
        }

        $this->flash->success(t('Color removed successfully'));

        $this->response->redirect($this->helper->url->to('ColorManagerController', 'show', ['plugin' => 'ColorManager', 'url' => t('color-manager')]));
    }

    public function save()
    {
        $this->assertAdmin();
        $this->requirePostRequest();
        $this->checkCSRFForm();

        $values = $this->request->getValues();
        $allowedFields = array('color_name', 'background_color', 'border_color', 'use_font_color', 'font_color');

        if (array_diff(array_keys($values), $allowedFields) !== array()) {
            throw new AccessForbiddenException();
        }

        list($valid, $color, $errors) = $this->customColorValidator->validateCreation($values);
        if (!$valid) {
            return $this->add($values, $errors);
        }

        if (!$this->colorModel->saveCustomColor($color['id'], $color['name'], $color['background'], $color['border'], $color['font'])) {
            $this->flash->failure(t('Unable to save this color'));
            return $this->add($values, $errors);
        }

        $this->flash->success(t('Color saved successfully'));
        $this->response->redirect($this->helper->url->to('ColorManagerController', 'show', ['plugin' => 'ColorManager', 'url' => t('color-manager')]));
    }

    private function assertAdmin()
    {
        if (!$this->userSession->isAdmin()) {
            throw new AccessForbiddenException();
        }
    }

    private function requirePostRequest()
    {
        if (!$this->request->isPost()) {
            throw new AccessForbiddenException();
        }
    }
}
