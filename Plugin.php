<?php

namespace Kanboard\Plugin\ColorManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;
use Kanboard\Core\Translator;

/**
 * Register ColorManager services, hooks, routes and administrator access.
 *
 * Related tests: tests/security_contract.php and tests/kanboard_integration.php.
 */
class Plugin extends Base
{
    public function initialize()
    {
        // Keep all global color configuration routes administrator-only; see tests/security_contract.php.
        $this->applicationAccessMap->add('ColorManagerController', '*', Role::APP_ADMIN);

        $this->replaceCoreColorModel();

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/ColorManager/Assets/css/color-manager.css'));

        // Views - Add Menu Item - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:sidebar', 'colorManager:config/sidebar');
        $this->template->hook->attach('template:layout:bottom', 'colorManager:layout/css_ext');

        // Extra Page - Routes
        //  - Example: $this->route->addRoute('/my/custom/route', 'MyController', 'show', 'PluginNameExampleStudlyCaps');
        //  - Must have the corresponding action in the matching controller
        $this->route->addRoute('/settings/color-manager', 'ColorManagerController', 'show', 'ColorManager');

        $this->helper->register('customColorHelper', '\Kanboard\Plugin\ColorManager\Helper\CustomColorHelper');

        $this->hook->on('model:color:get-list', function (&$listing) {
            $staticColors = $this->colorModelExt->getStaticList();
            $textColors = $this->colorModelExt->getTextColorList();
            $customColors = $this->colorModelExt->getCustomList();

            $listing = array_merge($listing, $staticColors, $textColors, $customColors);

            array_multisort($listing, SORT_ASC, SORT_NATURAL | SORT_FLAG_CASE);

            return $listing;
        });
    }

    public function onStartup()
    {
        // Reapply after all plugins initialize so a previously frozen core service cannot make resolution order-dependent.
        $this->replaceCoreColorModel();
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getClasses()
    {
        return [
            'Plugin\ColorManager\Model' => [
                'ColorModelExt',
            ],
            'Plugin\ColorManager\Validator' => [
                'CustomColorValidator',
            ],
        ];
    }

    public function getPluginName()
    {
        // Plugin Name MUST be identical to namespace for Plugin Directory to detect updated versions - do not translate the plugin name here
        return 'ColorManager';
    }

    public function getPluginDescription()
    {
        return t('A new way to utilise colors to their full potential in Kanboard.  Choose from 3 color palettes or create your own. Across all palettes, choose from over 85 colors to match your workflow across the interface.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '3.8.1';
    }

    public function getCompatibleVersion()
    {
        // See tests/kanboard_integration.php for the supported core contract.
        return '>=1.2.54';
    }

    private function replaceCoreColorModel()
    {
        // Pimple allows an existing frozen service to be safely redefined only after it has been removed.
        unset($this->container['colorModel']);
        $this->container['colorModel'] = function ($container) {
            return $container['colorModelExt'];
        };
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/ColorManager';
    }
}
