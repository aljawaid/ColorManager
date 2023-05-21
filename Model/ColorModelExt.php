<?php

namespace Kanboard\Plugin\ColorManager\Model;

use Kanboard\Model\ColorModel;

/**
 * ColorModelExt
 *
 * @package  Kanboard\Model
 * @author   Craig Crosby, aljawaid
 */
class ColorModelExt extends ColorModel
{
    protected $static_colors = array(
        'aqua' => array(
            'name' => 'Aqua',
            'background' => '#1FE1E7',
            'border' => '#1FE1E7',
        ),
        'beige' => array(
            'name' => 'Beige',
            'background' => '#B59F84',
            'border' => '#A29380',
        ),
        'blood_red' => array(
            'name' => 'Blood Red',
            'background' => '#700000',
            'border' => '#700000',
            'font' => '#000000',
        ),
        'blue_grey' => array(
            'name' => 'Blue Grey',
            'background' => '#5C7890',
            'border' => '#405364',
        ),
        'bright_green' => array(
            'name' => 'Bright Green',
            'background' => '#00E11A',
            'border' => '#04B318',
        ),
        'bright_red' => array(
            'name' => 'Bright Red',
            'background' => '#F00000',
            'border' => '#000000',
            'font' => '#000000',
        ),
        'bright_white' => array(
            'name' => 'Bright White',
            'background' => '#FFFFFF',
            'border' => '#FFFFFF',
            'font' => '#000000',
        ),
        'bright_yellow' => array(
            'name' => 'Bright Yellow',
            'background' => '#F7FF00',
            'border' => '#FFE407',
        ),
        'classic_silver' => array(
            'name' => 'Classic Silver',
            'background' => '#B1B8BA',
            'border' => '#B1B8BA',
        ),
        'copper' => array(
            'name' => 'Copper',
            'background' => '#B77729',
            'border' => '#38240C',
        ),
        'cream' => array(
            'name' => 'Cream',
            'background' => '#FDE7A6',
            'border' => '#FDD662',
        ),
        'crimson' => array(
            'name' => 'Crimson',
            'background' => '#DC143C',
            'border' => '#800000',
        ),
        'dark_brown' => array(
            'name' => 'Dark Brown',
            'background' => '#65463E',
            'border' => '#332623',
        ),
        'dark_gold' => array(
            'name' => 'Dark Gold',
            'background' => '#DBA40E',
            'border' => '#8E6A08',
        ),
        'dark_red' => array(
            'name' => 'Dark Red',
            'background' => '#951313',
            'border' => '#DC143C',
        ),
        'dark_pink' => array(
            'name' => 'Dark Pink',
            'background' => '#8C6070',
            'border' => '#F48FB1',
        ),
        'deep_amber' => array(
            'name' => 'Deep Amber',
            'background' => '#F0AD4E',
            'border' => '#BD7309',
        ),
        'deep_green' => array(
            'name' => 'Deep Green',
            'background' => '#0A7029',
            'border' => '#024015',
        ),
        'deep_grey' => array(
            'name' => 'Deep Grey',
            'background' => '#868B8E',
            'border' => '#646464',
        ),
        'deep_purple' => array(
            'name' => 'Deep Purple',
            'background' => '#8E44AD',
            'border' => '#610288',
        ),
        'dim_grey' => array(
            'name' => 'Dim Grey',
            'background' => '#6A6A6A',
            'border' => '#000000',
            'font' => '#000000',
        ),
        'dirty_green' => array(
            'name' => 'Dirty Green',
            'background' => '#5CB85C',
            'border' => '#367936',
        ),
        'dirty_yellow' => array(
            'name' => 'Dirty Yellow',
            'background' => '#D1D100',
            'border' => '#6C6C0F',
        ),
        'gold' => array(
            'name' => 'Gold',
            'background' => '#F8D210',
            'border' => '#A48900',
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
        'lint' => array(
            'name' => 'Lint',
            'background' => '#BACC81',
            'border' => '#99A869',
        ),
        'magenta' => array(
            'name' => 'Magenta',
            'background' => '#FF00FF',
            'border' => '#B904B9',
        ),
        'mint_green' => array(
            'name' => 'Mint Green',
            'background' => '#2CF760',
            'border' => '#BDF4CB',
        ),
        'olive' => array(
            'name' => 'Olive',
            'background' => '#5E7345',
            'border' => '#252D1C',
        ),
        'pale_blue' => array(
            'name' => 'Pale Blue',
            'background' => '#90ADC6',
            'border' => '#646464',
        ),
        'pale_orange' => array(
            'name' => 'Pale Orange',
            'background' => '#FFA500',
            'border' => '#000000',
            'font' => '#000000',
        ),
        'pale_purple' => array(
            'name' => 'Pale Purple',
            'background' => '#A16AE8',
            'border' => '#6B3AAA',
        ),
        'peach' => array(
            'name' => 'Peach',
            'background' => '#FC4F46',
            'border' => '#F22B2B',
        ),
        'pumpkin_orange' => array(
            'name' => 'Pumpkin Orange',
            'background' => '#FF6D36',
            'border' => '#F05216',
        ),
        'red_orange' => array(
            'name' => 'Red Orange',
            'background' => '#FF3F00',
            'border' => '#FF3F00',
        ),
        'royal_blue' => array(
            'name' => 'Royal Blue',
            'background' => '#1953BE',
            'border' => '#1953BE',
            'font' => '#000000',
        ),
        'scarlet' => array(
            'name' => 'Scarlet',
            'background' => '#AE0000',
            'border' => '#6A0303',
        ),
        'white' => array(
            'name' => 'White',
            'background' => '#FFFFFF',
            'border' => '#EEEEEE',
        ),
        'yellow_green' => array(
            'name' => 'Yellow Green',
            'background' => '#C8DF52',
            'border' => '#A5BB32',
        ),
    );


    protected $text_colors = array(
        'blood_red_on_pale_orange' => array(
            'name' => 'Blood Red on Pale Orange',
            'background' => '#FFA500',
            'border' => '#000000',
            'font' => '#700000',
        ),
        'dark_brown_on_cream' => array(
            'name' => 'Dark Brown on Cream',
            'background' => '#FDE7A6',
            'border' => '#FDD662',
            'font' => '#846101',
        ),
        'dark_green_on_lime_green' => array(
            'name' => 'Dark Green on Lime Green',
            'background' => '#63B83E',
            'border' => '#39771E',
            'font' => '#013311',
        ),
        'deep_blue_on_aqua' => array(
            'name' => 'Deep Blue on Aqua',
            'background' => '#1FE1E7',
            'border' => '#1FE1E7',
            'font' => '#0000FF',
        ),
        'grey_on_black' => array(
            'name' => 'Grey on Black',
            'background' => '#000000',
            'border' => '#B5B5B5',
            'font' => '#B5B5B5',
        ),
        'maroon_on_classic_silver' => array(
            'name' => 'Maroon on Classic Silver',
            'background' => '#B1B8BA',
            'border' => '#B1B8BA',
            'font' => '#800000',
        ),
        'orange_on_black' => array(
            'name' => 'Orange on Black',
            'background' => '#000000',
            'border' => '#000000',
            'font' => '#FFA500',
        ),
        'red_on_black' => array(
            'name' => 'Red on Black',
            'background' => '#000000',
            'border' => '#000000',
            'font' => '#F00000',
        ),
        'white_on_black' => array(
            'name' => 'White on Black',
            'background' => '#000000',
            'border' => '#000000',
            'font' => '#FFFFFF',
        ),
        'white_on_blood_red' => array(
            'name' => 'White on Blood Red',
            'background' => '#700000',
            'border' => '#700000',
            'font' => '#FFFFFF',
        ),
        'white_on_blue_grey' => array(
            'name' => 'White on Blue Grey',
            'background' => '#5C7890',
            'border' => '#405364',
            'font' => '#FFFFFF',
        ),
        'white_on_bright_red' => array(
            'name' => 'White on Bright Red',
            'background' => '#F00000',
            'border' => '#F00000',
            'font' => '#FFFFFF',
        ),
        'white_on_copper' => array(
            'name' => 'White on Copper',
            'background' => '#B77729',
            'border' => '#38240C',
            'font' => '#FFFFFF',
        ),
        'white_on_dark_brown' => array(
            'name' => 'White on Dark Brown',
            'background' => '#65463E',
            'border' => '#332623',
            'font' => '#FFFFFF',
        ),
        'white_on_dark_red' => array(
            'name' => 'White on Dark Red',
            'background' => '#951313',
            'border' => '#DC143C',
            'font' => '#FFFFFF',
        ),
        'white_on_dark_teal' => array(
            'name' => 'White on Dark Teal',
            'background' => '#00695C',
            'border' => '#004038',
            'font' => '#FFFFFF',
        ),
        'white_on_deep_blue' => array(
            'name' => 'White on Deep Blue',
            'background' => '#0000FF',
            'border' => '#030373',
            'font' => '#FFFFFF',
        ),
        'white_on_deep_green' => array(
            'name' => 'White on Deep Green',
            'background' => '#0A7029',
            'border' => '#024015',
            'font' => '#FFFFFF',
        ),
        'white_on_deep_grey' => array(
            'name' => 'White on Deep Grey',
            'background' => '#868B8E',
            'border' => '#646464',
            'font' => '#FFFFFF',
        ),
        'white_on_deep_purple' => array(
            'name' => 'White on Deep Purple',
            'background' => '#8E44AD',
            'border' => '#610288',
            'font' => '#FFFFFF',
        ),
        'white_on_dim_grey' => array(
            'name' => 'White on Dim Grey',
            'background' => '#6A6A6A',
            'border' => '#000000',
            'font' => '#FFFFFF',
        ),
        'white_on_green' => array(
            'name' => 'White on Green',
            'background' => '#06C200',
            'border' => '#015B2A',
            'font' => '#FFFFFF',
        ),
        'white_on_lime_green' => array(
            'name' => 'White on Lime Green',
            'background' => '#63B83E',
            'border' => '#39771E',
            'font' => '#FFFFFF',
        ),
        'white_on_maroon' => array(
            'name' => 'White on Maroon',
            'background' => '#800000',
            'border' => '#4F0404',
            'font' => '#FFFFFF',
        ),
        'white_on_olive' => array(
            'name' => 'White on Olive',
            'background' => '#5E7345',
            'border' => '#252D1C',
            'font' => '#FFFFFF',
        ),
        'white_on_peach' => array(
            'name' => 'White on Peach',
            'background' => '#FC4F46',
            'border' => '#F22B2B',
            'font' => '#FFFFFF',
        ),
        'white_on_purple' => array(
            'name' => 'White on Purple',
            'background' => '#9700FD',
            'border' => '#24003C',
            'font' => '#FFFFFF',
        ),
        'white_on_red_orange' => array(
            'name' => 'White on Red Orange',
            'background' => '#FF3F00',
            'border' => '#FF3F00',
            'font' => '#FFFFFF',
        ),
        'white_on_royal_blue' => array(
            'name' => 'White on Royal Blue',
            'background' => '#1953BE',
            'border' => '#1953BE',
            'font' => '#FFFFFF',
        ),
        'white_on_scarlet' => array(
            'name' => 'White on Scarlet',
            'background' => '#AE0000',
            'border' => '#6A0303',
            'font' => '#FFFFFF',
        ),
    );

    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    private function custom_colors()
    {
        // phpcs:enable
        $custom_colors = $this->configModel->get('kbcolour_ids', '');
        $custom_colors_array = explode(',', $custom_colors);
        $new_colors = [];

        if ($this->configModel->get('kbcolour_ids', '') != '') {
            foreach ($custom_colors_array as $color_id) {
                $new_color = array(
                    $color_id => array(
                        'name' => $this->configModel->get('kbcolour_name_' . $color_id, ''),
                        'background' => $this->configModel->get('kbcolour_backgroundcolor_' . $color_id, ''),
                        'border' => $this->configModel->get('kbcolour_bordercolor_' . $color_id, ''),
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
        $combine_colors = array_merge($this->default_colors, $this->static_colors, $this->text_colors, $this->custom_colors());
        return $combine_colors;
    }

    public function getCustomColors()
    {
        if ($this->configModel->get('kbcolour_ids', '') != '') {
            return $this->custom_colors();
        }

        return array();
    }

    public function getStaticColors()
    {
        return $this->static_colors;
    }

    public function getTextColors()
    {
        return $this->text_colors;
    }

    public function getStaticList()
    {
        $listing = array();

        foreach ($this->static_colors as $color_id => $color) {
            $listing[$color_id] = t($color['name']);
        }

        return $listing;
    }

    public function getTextColorList()
    {
        $listing = array();

        foreach ($this->text_colors as $color_id => $color) {
            $listing[$color_id] = t($color['name']);
        }

        return $listing;
    }

    public function getCssExt()
    {
        $buffer = '';

        if ($this->configModel->get('kbcolour_ids', '') != '') {
            foreach ($this->custom_colors() as $color => $values) {
                $buffer .= '.task-board.color-' . $color . ', .task-summary-container.color-' . $color . ', .color-picker-square.color-' . $color . ', .task-board-category.color-' . $color . ', .table-list-category.color-' . $color . ', .task-tag.color-' . $color . ', .action-color-' . $color . ' {';
                $buffer .= 'background-color: ' . $values['background'] . ';';
                $buffer .= 'border-color: ' . $values['border'] . ';';
                $buffer .= '}';
                $buffer .= 'td.color-' . $color . ' { background-color: ' . $values['background'] . '; }';
                $buffer .= '.table-list-row.color-' . $color . ' { border-left: 5px solid ' . $values['border'] . '; }';
                $buffer .= 'select#form-default_color option[value="' . $color . '"], option[value="' . $color . '"] {';
                $buffer .= 'background-color: ' . $values['background'] . ';';
                $buffer .= 'border-color: ' . $values['border'] . ';';
                $buffer .= '}';
            }
        }
        foreach ($this->text_colors as $color => $values) {
            $buffer .= '.task-board.color-' . $color . ', .task-summary-container.color-' . $color . ', .color-picker-square.color-' . $color . ', .task-board-category.color-' . $color . ', .table-list-category.color-' . $color . ', .task-tag.color-' . $color . ', .action-color-' . $color . ' {';
            $buffer .= 'background-color: ' . $values['background'] . ';';
            $buffer .= 'border-color: ' . $values['border'] . ';';
            if (isset($values['font'])) {
                $buffer .= 'color: ' . $values['font'] . '; position: relative; }';
                $buffer .= 'select#form-default_color option[value="' . $color . '"], option[value="' . $color . '"] {';
                $buffer .= 'color: ' . $values['font'] . ';';
            }
            $buffer .= '}';
            if (isset($values['font'])) {
                $buffer .= '.color-picker-square.color-' . $color . ':before { content: "\2609"; text-align: center; display: block; position: absolute; margin-top: -4px; margin-left: 1px; }';
                $buffer .= '.task-summary-container.color-' . $color . ' .task-summary-columns .task-summary-column { color: ' . $values['font'] . '; }';
                $buffer .= '.task-summary-container.color-' . $color . ' .task-summary-columns .task-summary-column span, .action-color-' . $color . ' { color: ' . $values['font'] . '; }';
            }
            $buffer .= 'td.color-' . $color . ' { background-color: ' . $values['background'] . '; }';
            $buffer .= '.table-list-row.color-' . $color . ' { border-left: 5px solid ' . $values['border'] . '; }';
            $buffer .= 'select#form-default_color option[value="' . $color . '"], option[value="' . $color . '"] {';
            $buffer .= 'background-color: ' . $values['background'] . ';';
            $buffer .= 'border-color: ' . $values['border'] . ';';
            $buffer .= '}';
        }
        foreach ($this->static_colors as $color => $values) {
            $buffer .= '.task-board.color-' . $color . ', .task-summary-container.color-' . $color . ', .color-picker-square.color-' . $color . ', .task-board-category.color-' . $color . ', .table-list-category.color-' . $color . ', .task-tag.color-' . $color . ', .action-color-' . $color . ' {';
            $buffer .= 'background-color: ' . $values['background'] . ';';
            $buffer .= 'border-color: ' . $values['border'] . ';';
            if (isset($values['font'])) {
                $buffer .= 'color: ' . $values['font'] . '; position: relative; }';
                $buffer .= 'select#form-default_color option[value="' . $color . '"], option[value="' . $color . '"] {';
                $buffer .= 'color: ' . $values['font'] . ';';
            }
            $buffer .= '}';
            if (isset($values['font'])) {
                $buffer .= '.color-picker-square.color-' . $color . ':before { content: "\2609"; text-align: center; display: block; position: absolute; margin-top: -4px; margin-left: 1px; }';
                $buffer .= '.task-summary-container.color-' . $color . ' .task-summary-columns .task-summary-column { color: ' . $values['font'] . '; }';
                $buffer .= '.task-summary-container.color-' . $color . ' .task-summary-columns .task-summary-column span, .action-color-' . $color . ' { color: ' . $values['font'] . '; }';
            }
            $buffer .= 'td.color-' . $color . ' { background-color: ' . $values['background'] . '; }';
            $buffer .= '.table-list-row.color-' . $color . ' { border-left: 5px solid ' . $values['border'] . '; }';
            $buffer .= 'select#form-default_color option[value="' . $color . '"], option[value="' . $color . '"] {';
            $buffer .= 'background-color: ' . $values['background'] . ';';
            $buffer .= 'border-color: ' . $values['border'] . ';';
            $buffer .= '}';
        }
        foreach ($this->default_colors as $color => $values) {
            $buffer .= 'select#form-default_color option[value="' . $color . '"], option[value="' . $color . '"], .action-color-' . $color . ' {';
            $buffer .= 'background-color: ' . $values['background'] . ';';
            $buffer .= 'border-color: ' . $values['border'] . ';';
            $buffer .= '}';
        }

        return $buffer;
    }
}
