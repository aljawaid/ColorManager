<?php

namespace Kanboard\Plugin\ColorManager\Model;

use Kanboard\Model\ColorModel;

/**
 * ColorModelExt
 *
 * @package  Kanboard\Model
 * @author   Craig Crosby
 * @author   aljawaid
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
        'white_on_red' => array(
            'name' => 'White on Red',
            'background' => '#F00000',
            'border' => '#F00000',
            'font' => '#FFFFFF',
        ),
        'black_on_red' => array(
            'name' => 'Black on Red',
            'background' => '#F00000',
            'border' => '#000000',
            'font' => '#000000',
        ),
        'red_on_black' => array(
            'name' => 'Red on Black',
            'background' => '#000000',
            'border' => '#000000',
            'font' => '#F00000',
        ),
        'orange_on_black' => array(
            'name' => 'Orange on Black',
            'background' => '#000000',
            'border' => '#000000',
            'font' => '#FFA500',
        ),
        'black_on_orange' => array(
            'name' => 'Black on Orange',
            'background' => '#FFA500',
            'border' => '#000000',
            'font' => '#000000',
        ),
        'khaki' => array(
            'name' => 'Khaki',
            'background' => '#A88C6A',
            'border' => '#755024',
        ),
        'lime_green' => array(
            'name' => 'Lime Green',
            'background' => '#63B83E',
            'border' => '#39771E',
        ),
        'dark_red' => array(
            'name' => 'Dark Red',
            'background' => '#951313',
            'border' => '#DC143C',
        ),
        'white_on_dark_red' => array(
            'name' => 'White on Dark Red',
            'background' => '#951313',
            'border' => '#DC143C',
            'font' => '#FFFFFF',
        ),
        'blue_grey' => array(
            'name' => 'Blue Grey',
            'background' => '#5C7890',
            'border' => '#405364',
        ),
        'white_on_blue_grey' => array(
            'name' => 'White on Blue Grey',
            'background' => '#5C7890',
            'border' => '#405364',
            'font' => '#FFFFFF',
        ),
        'bright_yellow' => array(
            'name' => 'Bright Yellow',
            'background' => '#F7FF00',
            'border' => '#FFE407',
        ),
        'dark_brown' => array(
            'name' => 'Dark Brown',
            'background' => '#65463E',
            'border' => '#332623',
        ),
        'white_on_dark_brown' => array(
            'name' => 'White on Dark Brown',
            'background' => '#65463E',
            'border' => '#332623',
            'font' => '#FFFFFF',
        ),
        'lint' => array(
            'name' => 'Lint',
            'background' => '#BACC81',
            'border' => '#99A869',
        ),
        'dark_pink' => array(
            'name' => 'Dark Pink',
            'background' => '#8C6070',
            'border' => '#F48FB1',
        ),
        'peach' => array(
            'name' => 'Peach',
            'background' => '#FC4F46',
            'border' => '#F22B2B',
        ),
        'white_on_peach' => array(
            'name' => 'White on Peach',
            'background' => '#FC4F46',
            'border' => '#F22B2B',
            'font' => '#FFFFFF',
        ),
        'olive' => array(
            'name' => 'Olive',
            'background' => '#5E7345',
            'border' => '#252D1C',
        ),
        'white_on_olive' => array(
            'name' => 'White on Olive',
            'background' => '#5E7345',
            'border' => '#252D1C',
            'font' => '#FFFFFF',
        ),
        'scarlet' => array(
            'name' => 'Scarlet',
            'background' => '#AE0000',
            'border' => '#6A0303',
        ),
        'white_on_scarlet' => array(
            'name' => 'White on Scarlet',
            'background' => '#AE0000',
            'border' => '#6A0303',
            'font' => '#FFFFFF',
        ),
        'deep_grey' => array(
            'name' => 'Deep Grey',
            'background' => '#868B8E',
            'border' => '#646464',
        ),
        'white_on_deep_grey' => array(
            'name' => 'White on Deep Grey',
            'background' => '#868B8E',
            'border' => '#646464',
            'font' => '#FFFFFF',
        ),
        'white_on_green' => array(
            'name' => 'White on Green',
            'background' => '#06C200',
            'border' => '#015B2A',
            'font' => '#FFFFFF',
        ),
        'beige' => array(
            'name' => 'Beige',
            'background' => '#B59F84',
            'border' => '#A29380',
        ),
        'pale_purple' => array(
            'name' => 'Pale Purple',
            'background' => '#A16AE8',
            'border' => '#6B3AAA',
        ),
        'white_on_black' => array(
            'name' => 'White on Black',
            'background' => '#000000',
            'border' => '#000000',
            'font' => '#FFFFFF',
        ),
        'pale_blue' => array(
            'name' => 'Pale Blue',
            'background' => '#90ADC6',
            'border' => '#646464',
        ),
        'yellow_green' => array(
            'name' => 'Yellow Green',
            'background' => '#C8DF52',
            'border' => '#A5BB32',
        ),
        'deep_green' => array(
            'name' => 'Deep Green',
            'background' => '#0A7029',
            'border' => '#024015',
        ),
        'white_on_deep_green' => array(
            'name' => 'White on Deep Green',
            'background' => '#0A7029',
            'border' => '#024015',
            'font' => '#FFFFFF',
        ),
        'bright_orange' => array(
            'name' => 'Bright Orange',
            'background' => '#FF6D36',
            'border' => '#F05216',
        ),
        'bright_green' => array(
            'name' => 'Bright Green',
            'background' => '#00E11A',
            'border' => '#04B318',
        ),
        'white_on_deep_blue' => array(
            'name' => 'White on Deep Blue',
            'background' => '#0000FF',
            'border' => '#030373',
            'font' => '#FFFFFF',
        ),
        'dirty_yellow' => array(
            'name' => 'Dirty Yellow',
            'background' => '#D1D100',
            'border' => '#6C6C0F',
        ),
        'deep_purple' => array(
            'name' => 'Deep Purple',
            'background' => '#8E44AD',
            'border' => '#610288',
        ),
        'deep_amber' => array(
            'name' => 'Deep Amber',
            'background' => '#F0AD4E',
            'border' => '#BD7309',
        ),
        'dirty_green' => array(
            'name' => 'Dirty Green',
            'background' => '#5CB85C',
            'border' => '#367936',
        ),
        'cream' => array(
            'name' => 'Cream',
            'background' => '#FDE7A6',
            'border' => '#FDD662',
        ),
        'copper' => array(
            'name' => 'Copper',
            'background' => '#B77729',
            'border' => '#38240C',
        ),
        'white_on_copper' => array(
            'name' => 'White on Copper',
            'background' => '#B77729',
            'border' => '#38240C',
            'font' => '#FFFFFF',
        ),
        'bright_white' => array(
            'name' => 'Bright White',
            'background' => '#FFFFFF',
            'border' => '#FFFFFF',
            'font' => '#000000',
        ),
        'grey_on_black' => array(
            'name' => 'Grey on Black',
            'background' => '#000000',
            'border' => '#B5B5B5',
            'font' => '#B5B5B5',
        ),
        'black_on_grey' => array(
            'name' => 'Black on Grey',
            'background' => '#6A6A6A',
            'border' => '#000000',
            'font' => '#000000',
        ),
        'black_on_yellow' => array(
            'name' => 'Black on Yellow',
            'background' => '#F7FF00',
            'border' => '#000000',
            'font' => '#000000',
        ),
        'magenta' => array(
            'name' => 'Magenta',
            'background' => '#FF00FF',
            'border' => '#B904B9',
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
                $buffer .= 'border-color: '.$values['border'].';';
                $buffer .= '}';
                $buffer .= 'td.color-'.$color.' { background-color: '.$values['background'].'; }';
                $buffer .= '.table-list-row.color-'.$color.' { border-left: 5px solid '.$values['border'].'; }';
                $buffer .= 'select#form-default_color option[value="'.$color.'"], option[value="'.$color.'"] {';
                $buffer .= 'background-color: '.$values['background'].';';
                $buffer .= 'border-color: '.$values['border'].';';
                $buffer .= '}';
            }
        }
        foreach ($this->static_colors as $color => $values) {
            $buffer .= '.task-board.color-'.$color.', .task-summary-container.color-'.$color.', .color-picker-square.color-'.$color.', .task-board-category.color-'.$color.', .table-list-category.color-'.$color.', .task-tag.color-'.$color.' {';
            $buffer .= 'background-color: '.$values['background'].';';
            $buffer .= 'border-color: '.$values['border'].';';
            if (isset($values['font'])) {
                $buffer .= 'color: '.$values['font'].'; position: relative; }';
                $buffer .= 'select#form-default_color option[value="'.$color.'"], option[value="'.$color.'"] {';
                $buffer .= 'color: '.$values['font'].';';
            }
            $buffer .= '}';
            if (isset($values['font'])) {
                $buffer .= '.color-picker-square.color-'.$color.':before { content: "\2609"; text-align: center; display: block; position: absolute; margin-top: -4px; margin-left: 1px; }';
                $buffer .= '.task-summary-container.color-'.$color.' .task-summary-columns .task-summary-column { color: '.$values['font'].'; }';
                $buffer .= '.task-summary-container.color-'.$color.' .task-summary-columns .task-summary-column span { color: '.$values['font'].'; }';
            }
            $buffer .= 'td.color-'.$color.' { background-color: '.$values['background'].'; }';
            $buffer .= '.table-list-row.color-'.$color.' { border-left: 5px solid '.$values['border'].'; }';
            $buffer .= 'select#form-default_color option[value="'.$color.'"], option[value="'.$color.'"] {';
            $buffer .= 'background-color: '.$values['background'].';';
            $buffer .= 'border-color: '.$values['border'].';';
            $buffer .= '}';
        }
        foreach ($this->default_colors as $color => $values) {
            $buffer .= 'select#form-default_color option[value="'.$color.'"], option[value="'.$color.'"] {';
            $buffer .= 'background-color: '.$values['background'].';';
            $buffer .= 'border-color: '.$values['border'].';';
            $buffer .= '}';
        }

        return $buffer;
    }
    
}
