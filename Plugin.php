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

        // Extra Page - Routes
        //  - Example: $this->route->addRoute('/my/custom/route', 'myController', 'show', 'PluginNameExampleStudlyCaps');
        //  - Must have the corresponding action in the matching controller
        $this->route->addRoute('/settings/colours', 'ColorManagerController', 'show', 'ColorManager');

        $this->helper->register('customColorHelper', '\Kanboard\Plugin\ColorManager\Helper\CustomColorHelper');
        $this->template->hook->attach('template:layout:bottom', 'colorManager:layout/css_ext');
        
        $this->hook->on('model:color:get-list', function (&$listing) {
            $new_colors = [];
            $custom_colors = $this->configModel->get('kbcolour_ids','');
            $custom_colors_array = explode(',',$custom_colors);
            
            if ($custom_colors != '') {
                foreach($custom_colors_array as $val) {
                    $new_color = array(
                        $val => array(
                            'name' => $this->configModel->get('kbcolour_name_'.$val,''),
                        ),
                    );
                    $new_colors = array_merge($new_colors, $new_color);
                }

                $new_list = array();
                foreach ($new_colors as $color_id => $color) {
                    $new_list[$color_id] = t($color['name']);
                }
            }

            $preinstalledColors = $this->colorModelExt->getStaticList();
                
            $listing = array_merge($listing, $preinstalledColors, isset($new_list) ? $new_list : array());
            
            array_multisort($listing, SORT_ASC, SORT_NATURAL | SORT_FLAG_CASE);

            return $listing;
        });
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
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
        return t('This plugin shows the actual colour values (background and matching border) for all the default Kanboard colours in the application settings.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '1.1.0';
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
