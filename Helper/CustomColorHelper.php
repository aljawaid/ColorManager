<?php

namespace Kanboard\Plugin\ColorManager\Helper;

use Kanboard\Core\Base;

/**
 * Asset Helper
 *
 * @package Kanboard Plugin ColorManager
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
        return '<style>' . $this->colorModel->getCssExt() . '</style>';
    }
}
