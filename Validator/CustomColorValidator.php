<?php

namespace Kanboard\Plugin\ColorManager\Validator;

/**
 * Validate and normalize custom color input before it reaches HTML or CSS.
 *
 * Related test: tests/custom_color_validator.php.
 *
 * @package Kanboard\Plugin\ColorManager\Validator
 * @author  aljawaid, Craig Crosby
 */
class CustomColorValidator
{
    public const MAX_NAME_LENGTH = 80;
    public const MAX_ID_LENGTH = 50;
    public const MINIMUM_CONTRAST_RATIO = 4.5;

    public function validateCreation(array $values)
    {
        $errors = array();
        $name = isset($values['color_name']) && is_string($values['color_name']) ? trim($values['color_name']) : '';
        $background = isset($values['background_color']) && is_string($values['background_color']) ? $values['background_color'] : '';
        $border = isset($values['border_color']) && is_string($values['border_color']) ? $values['border_color'] : '';
        $useFontColor = isset($values['use_font_color']) && $values['use_font_color'] === '1';
        $font = isset($values['font_color']) && is_string($values['font_color']) ? $values['font_color'] : '';

        if (!$this->isValidName($name)) {
            $errors['color_name'] = array(t('Enter a color name of 80 characters or fewer without control characters or angle brackets.'));
        }

        if (!$this->isValidHexColor($background)) {
            $errors['background_color'] = array(t('Enter a six-digit hexadecimal background color.'));
        }

        if (!$this->isValidHexColor($border)) {
            $errors['border_color'] = array(t('Enter a six-digit hexadecimal border color.'));
        }

        if ($useFontColor && !$this->isValidHexColor($font)) {
            $errors['font_color'] = array(t('Enter a six-digit hexadecimal text color.'));
        } elseif (
            $useFontColor
            && $this->isValidHexColor($font)
            && $this->isValidHexColor($background)
            && $this->calculateContrastRatio($font, $background) < self::MINIMUM_CONTRAST_RATIO
        ) {
            $errors['font_color'] = array(t('Custom text colors must have a contrast ratio of at least 4.5:1 against the background color.'));
        }

        $color = array(
            'id' => $this->isValidName($name) ? $this->createColorId($name) : '',
            'name' => $name,
            'background' => strtoupper($background),
            'border' => strtoupper($border),
            'font' => $useFontColor && $this->isValidHexColor($font)
                ? strtoupper($font)
                : ($this->isValidHexColor($background) ? $this->getAccessibleTextColor($background) : null),
        );

        return array($errors === array(), $color, $errors);
    }

    public function isValidStoredColor($id, $name, $background, $border, $font = null)
    {
        return is_string($id)
            && preg_match('/\A[a-z0-9_-]{1,50}\z/D', $id) === 1
            && $this->isValidName($name)
            && $this->isValidHexColor($background)
            && $this->isValidHexColor($border)
            && (
                $font === null
                || $font === ''
                || (
                    $this->isValidHexColor($font)
                    && $this->calculateContrastRatio($font, $background) >= self::MINIMUM_CONTRAST_RATIO
                )
            );
    }

    public function calculateContrastRatio($foreground, $background)
    {
        if (!$this->isValidHexColor($foreground) || !$this->isValidHexColor($background)) {
            return 0.0;
        }

        $foregroundLuminance = $this->calculateRelativeLuminance($foreground);
        $backgroundLuminance = $this->calculateRelativeLuminance($background);
        $lighter = max($foregroundLuminance, $backgroundLuminance);
        $darker = min($foregroundLuminance, $backgroundLuminance);

        return ($lighter + 0.05) / ($darker + 0.05);
    }

    public function getAccessibleTextColor($background)
    {
        if (!$this->isValidHexColor($background)) {
            return null;
        }

        return $this->calculateContrastRatio('#000000', $background)
            >= $this->calculateContrastRatio('#FFFFFF', $background)
                ? '#000000'
                : '#FFFFFF';
    }

    public function createColorId($name)
    {
        $asciiName = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);
        if ($asciiName === false) {
            $asciiName = '';
        }

        $id = strtolower($asciiName);
        $id = preg_replace('/[^a-z0-9]+/', '_', $id);
        $id = trim($id, '_');

        if ($id === '') {
            $id = 'custom_' . substr(hash('sha256', $name), 0, 16);
        }

        return substr($id, 0, self::MAX_ID_LENGTH);
    }

    private function isValidName($name)
    {
        return is_string($name)
            && $name !== ''
            && mb_check_encoding($name, 'UTF-8')
            && mb_strlen($name, 'UTF-8') <= self::MAX_NAME_LENGTH
            && preg_match('/[\x00-\x1F\x7F<>]/u', $name) !== 1;
    }

    private function isValidHexColor($color)
    {
        return is_string($color) && preg_match('/\A#[0-9A-Fa-f]{6}\z/D', $color) === 1;
    }

    private function calculateRelativeLuminance($color)
    {
        $channels = array(
            hexdec(substr($color, 1, 2)) / 255,
            hexdec(substr($color, 3, 2)) / 255,
            hexdec(substr($color, 5, 2)) / 255,
        );

        foreach ($channels as &$channel) {
            $channel = $channel <= 0.04045
                ? $channel / 12.92
                : (($channel + 0.055) / 1.055) ** 2.4;
        }
        unset($channel);

        return (0.2126 * $channels[0]) + (0.7152 * $channels[1]) + (0.0722 * $channels[2]);
    }
}
