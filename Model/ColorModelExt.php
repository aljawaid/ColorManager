<?php

namespace Kanboard\Plugin\ColorManager\Model;

use Kanboard\Model\ColorModel;

/**
 * ColorModelExt
 *
 * @package  Kanboard\Model
 * @author   Craig Crosby
 */
class ColorModelExt extends ColorModel
{
    
    protected $static_colors = array(
        'white' => array(
            'name' => 'White',
            'background' => '#FFFFFF',
            'border' => '#EEEEEE',
        ),
        'crimson' => array(
            'name' => 'Crimson',
            'background' => '#DC143C',
            'border' => '#800000',
        ),
        'white_on_maroon' => array(
            'name' => 'White on Maroon',
            'background' => '#800000',
            'border' => '#4F0404',
            'font' => '#FFFFFF',
        ),
        'mint_green' => array(
            'name' => 'Mint Green',
            'background' => '#2CF760',
            'border' => '#BDF4CB',
        ),
        'gold' => array(
            'name' => 'Gold',
            'background' => '#F8D210',
            'border' => '#A48900',
        ),
        'dark_gold' => array(
            'name' => 'Dark Gold',
            'background' => '#DBA40E',
            'border' => '#8E6A08',
        ),
        'white_on_dark_teal' => array(
            'name' => 'White on Dark Teal',
            'background' => '#00695C',
            'border' => '#004038',
            'font' => '#FFFFFF',
        ),
        'white_on_purple' => array(
            'name' => 'White on Purple',
            'background' => '#9700FD',
            'border' => '#24003C',
            'font' => '#FFFFFF',
        ),
    );
    
    private function custom_colors()
    {
        $custom_colors = $this->configModel->get('kbcolour_ids','');
        $custom_colors_array = explode(',',$custom_colors);
        $new_colors = [];
        
        if ($this->configModel->get('kbcolour_ids','') != '') {        
                foreach($custom_colors_array as $color_id) {
                    $new_color = array(
                        $color_id => array(
                            'name' => $this->configModel->get('kbcolour_name_'.$color_id,''),
                            'background' => $this->configModel->get('kbcolour_backgroundcolor_'.$color_id,''),
                            'border' => $this->configModel->get('kbcolour_bordercolor_'.$color_id,''),
                        ),
                    );
                    $new_colors = array_merge($new_colors, $new_color);
                }
            return $new_colors;
        }
        
        return $new_colors;
        
    }
    
    public function getAllColors()
    {
        $combine_colors = array_merge($this->default_colors, $this->static_colors, $this->custom_colors());
        return $combine_colors;
    }
    
    public function getCustomColors()
    {
        if ($this->configModel->get('kbcolour_ids','') != '') {
            return $this->custom_colors();
        }
        return array();
    }
    
    public function getStaticColors()
    {
        return $this->static_colors;
    }
    
    public function getStaticList()
    {

        $listing = array();

        foreach ($this->static_colors as $color_id => $color) {
            $listing[$color_id] = t($color['name']);
        }

        return $listing;
        
    }
    
    public function getCssExt()
    {
        $buffer = '';
        
        if ($this->configModel->get('kbcolour_ids','') != '') {
            foreach ($this->custom_colors() as $color => $values) {
                $buffer .= '.task-board.color-'.$color.', .task-summary-container.color-'.$color.', .color-picker-square.color-'.$color.', .task-board-category.color-'.$color.', .table-list-category.color-'.$color.', .task-tag.color-'.$color.' {';
                $buffer .= 'background-color: '.$values['background'].';';
                $buffer .= 'border-color: '.$values['border'];
                $buffer .= '}';
                $buffer .= 'td.color-'.$color.' { background-color: '.$values['background'].'}';
                $buffer .= '.table-list-row.color-'.$color.' {border-left: 5px solid '.$values['border'].'}';
                $buffer .= 'select#form-default_color option[value="'.$color.'"], option[value="'.$color.'"] {';
                $buffer .= 'background-color: '.$values['background'].';';
                $buffer .= 'border-color: '.$values['border'];
                $buffer .= '}';
            }
        }
        foreach ($this->static_colors as $color => $values) {
            $buffer .= '.task-board.color-'.$color.', .task-summary-container.color-'.$color.', .color-picker-square.color-'.$color.', .task-board-category.color-'.$color.', .table-list-category.color-'.$color.', .task-tag.color-'.$color.' {';
            $buffer .= 'background-color: '.$values['background'].';';
            $buffer .= 'border-color: '.$values['border'].';';
            if (isset($values['font'])) {
                $buffer .= 'color: '.$values['font'].'; position: relative;}';
                $buffer .= 'select#form-default_color option[value="'.$color.'"], option[value="'.$color.'"] {';
                $buffer .= 'color: '.$values['font'];
            }
            $buffer .= '}';
            if (isset($values['font'])) {
                $buffer .= '.color-picker-square.color-'.$color.':before { content: "\2609"; text-align: center; display: block; position: absolute; margin-top: -4px; margin-left: 1px;}';
            }
            $buffer .= 'td.color-'.$color.' { background-color: '.$values['background'].'}';
            $buffer .= '.table-list-row.color-'.$color.' {border-left: 5px solid '.$values['border'].'}';
            $buffer .= 'select#form-default_color option[value="'.$color.'"], option[value="'.$color.'"] {';
            $buffer .= 'background-color: '.$values['background'].';';
            $buffer .= 'border-color: '.$values['border'];
            $buffer .= '}';
        }
        foreach ($this->default_colors as $color => $values) {
            $buffer .= 'select#form-default_color option[value="'.$color.'"], option[value="'.$color.'"] {';
            $buffer .= 'background-color: '.$values['background'].';';
            $buffer .= 'border-color: '.$values['border'];
            $buffer .= '}';
        }

        return $buffer;
    }
    
}
