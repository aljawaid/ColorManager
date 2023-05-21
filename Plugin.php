<?php

namespace Kanboard\Plugin\ColorManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Plugin\ColorManager\Model\ColorModelExt;

class Plugin extends Base
{
    public function initialize()
    {
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
            $new_colors = [];
            $custom_colors = $this->configModel->get('kbcolour_ids', '');
            $custom_colors_array = explode(',', $custom_colors);

            if ($custom_colors != '') {
                foreach ($custom_colors_array as $val) {
                    $new_color = array(
                        $val => array(
                            'name' => $this->configModel->get('kbcolour_name_' . $val, ''),
                        ),
                    );
                    $new_colors = array_merge($new_colors, $new_color);
                }

                $new_list = array();
                foreach ($new_colors as $color_id => $color) {
                    $new_list[$color_id] = t($color['name']);
                }
            }

            $staticColors = $this->colorModelExt->getStaticList();

            $textColors = $this->colorModelExt->getTextColorList();

            $listing = array_merge($listing, $staticColors, $textColors, isset($new_list) ? $new_list : array());

            array_multisort($listing, SORT_ASC, SORT_NATURAL | SORT_FLAG_CASE);

            return $listing;
        });
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getClasses()
    {
        return [
            'Plugin\ColorManager\Model' => [
                'ColorModelExt',
            ],
        ];
    }

    public function getPluginName()
    {
        // Plugin Name MUST be identical to namespace for Plugin Directory to detect updated versions
        // Do not translate the plugin name here
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
        return '3.7.0';
    }

    public function getCompatibleVersion()
    {
        // Examples:
        // >=1.0.37
        // <1.0.37
        // <=1.0.37
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/ColorManager';
    }
}
