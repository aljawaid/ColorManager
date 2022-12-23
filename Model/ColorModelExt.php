<?php

namespace Kanboard\Plugin\KBColours\Model;

use Kanboard\Model\ColorModel;

/**
 * Color model ext
 *
 * @package  Kanboard\Model
 * @author   Craig Crosby
 */
class ColorModelExt extends ColorModel
{
    
    protected $custom_colors = array(
        'white' => array(
            'name' => 'White',
            'background' => '#FFFFFF',
            'border' => '#EEEEEE',
        ),
        'maroon' => array(
            'name' => 'Maroon',
            'background' => '#D03D56',
            'border' => '#800000',
        ),
        'gold' => array(
            'name' => 'Gold',
            'background' => '#F8D210',
            'border' => '#A48900',
        ),
        'mint_green' => array(
            'name' => 'Mint Green',
            'background' => '#2CF760',
            'border' => '#BDF4CB',
        ),
    );
    
    public function getAllColors()
    {
        $combine_colors = array_merge($this->default_colors, $this->custom_colors);
        return $combine_colors;
    }
    
    public function getCustomColors()
    {
        return $this->custom_colors;
    }
    
    public function getCssExt()
    {
        $buffer = '';
        
        foreach ($this->custom_colors as $color => $values) {
            $buffer .= '.task-board.color-'.$color.', .task-summary-container.color-'.$color.', .color-picker-square.color-'.$color.', .task-board-category.color-'.$color.', .table-list-category.color-'.$color.', .task-tag.color-'.$color.' {';
            $buffer .= 'background-color: '.$values['background'].';';
            $buffer .= 'border-color: '.$values['border'].';';
            if ($values['font']) {
                $buffer .= 'color: '.$values['font'];
            }
            $buffer .= '}';
            $buffer .= 'td.color-'.$color.' { background-color: '.$values['background'].'}';
            $buffer .= '.table-list-row.color-'.$color.' {border-left: 5px solid '.$values['border'].'}';
        }

        return $buffer;
    }
}
