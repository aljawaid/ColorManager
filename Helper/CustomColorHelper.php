<?php

namespace Kanboard\Plugin\KBColours\Helper;

use Kanboard\Core\Base;
use Kanboard\Plugin\KBColours\Helper\ColorModelExt;

/**
 * Asset Helper
 *
 * @package Kanboard Plugin KBColours
 * @author  Craig Crosby
 */
class CustomColorHelper extends Base
{
/**
     * Get CSS for task colors
     *
     * @access public
     * @return string
     */
    public function colorCssExt()
    {
        return '<style>'.$this->colorModelExt->getCssExt().'</style>';
    }
}