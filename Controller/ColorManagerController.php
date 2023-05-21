<?php

namespace Kanboard\Plugin\ColorManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Plugin\Directory;

/**
 * Plugin ColorManager
 * Class ColorManagerController
 *
 * @author aljawaid, Craig Crosby
 */

class ColorManagerController extends \Kanboard\Controller\ConfigController
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
        $this->response->html($this->helper->layout->config('colorManager:config/colors', array(
            'title' => t('Settings') . ' &#10562; ' . t('Color Manager'),
        )));
    }

    public function add()
    {
        $errors = [];
        $values = [];

        $this->response->html($this->helper->layout->config('colorManager:config/add_custom_color', [
            'errors' => $errors,
            'values'  => $values,
            'title'  => t('Custom Colors') . ' &gt; ' . t('Add Color'),
         ]));
    }

    public function remove()
    {
        $key = $this->request->getStringParam('key');
        $errors = [];
        $values = [];

        $custom_colors = $this->configModel->get('kbcolour_ids', '');
        if ($custom_colors == '') {
                    $custom_colors_array = array();
        } else {
                    $custom_colors_array = explode(',', $custom_colors);
        }
        if (($k = array_search($key, $custom_colors_array)) !== false) {
            unset($custom_colors_array[$k]);
        }
        if (is_array($custom_colors_array)) {
            $custom_colors_string = implode(',', $custom_colors_array);
        } else {
            $custom_colors_string = $color_id;
        }
        $this->configModel->save(['kbcolour_ids' => $custom_colors_string]);

        $this->configModel->remove('kbcolour_name_' . $key);
        $this->configModel->remove('kbcolour_backgroundcolor_' . $key);
        $this->configModel->remove('kbcolour_bordercolor_' . $key);

        $this->response->redirect($this->helper->url->to('ColorManagerController', 'show', ['plugin' => 'ColorManager', 'url' => t('color-manager')]));
    }

    public function save()
    {
        $errors = [];
        $values = [];

        if ($this->request->isPost()) {
            $values = $this->request->getValues();
            if (isset($values['color_name'])) {
                $color_id = str_replace(' ', '_', strtolower($values['color_name']));
                $custom_colors = $this->configModel->get('kbcolour_ids', '');
                if ($custom_colors == '') {
                    $custom_colors_array = array();
                } else {
                    $custom_colors_array = explode(',', $custom_colors);
                }
                array_push($custom_colors_array, $color_id);
                $custom_colors_array = array_unique($custom_colors_array);
                if (is_array($custom_colors_array)) {
                    $custom_colors_string = implode(',', $custom_colors_array);
                } else {
                    $custom_colors_string = $color_id;
                }
                $this->configModel->save(['kbcolour_ids' => $custom_colors_string]);
                $this->configModel->save(['kbcolour_name_' . $color_id => $values['color_name']]);
                $this->configModel->save(['kbcolour_backgroundcolor_' . $color_id => $values['background_color']]);
                $this->configModel->save(['kbcolour_bordercolor_' . $color_id => $values['border_color']]);
            }
        }

        $this->response->redirect($this->helper->url->to('ColorManagerController', 'show', ['plugin' => 'ColorManager', 'url' => t('color-manager')]));
    }
}
