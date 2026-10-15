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

    public function validateCreation(array $values)
    {
        $errors = array();
        $name = isset($values['color_name']) && is_string($values['color_name']) ? trim($values['color_name']) : '';
        $background = isset($values['background_color']) && is_string($values['background_color']) ? $values['background_color'] : '';
        $border = isset($values['border_color']) && is_string($values['border_color']) ? $values['border_color'] : '';

        if (!$this->isValidName($name)) {
            $errors['color_name'] = array(t('Enter a color name of 80 characters or fewer without control characters or angle brackets.'));
        }

        if (!$this->isValidHexColor($background)) {
            $errors['background_color'] = array(t('Enter a six-digit hexadecimal background color.'));
        }

        if (!$this->isValidHexColor($border)) {
            $errors['border_color'] = array(t('Enter a six-digit hexadecimal border color.'));
        }

        $color = array(
            'id' => $this->isValidName($name) ? $this->createColorId($name) : '',
            'name' => $name,
            'background' => strtoupper($background),
            'border' => strtoupper($border),
        );

        return array($errors === array(), $color, $errors);
    }

    public function isValidStoredColor($id, $name, $background, $border)
    {
        return is_string($id)
            && preg_match('/\A[a-z0-9_-]{1,50}\z/D', $id) === 1
            && $this->isValidName($name)
            && $this->isValidHexColor($background)
            && $this->isValidHexColor($border);
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
}
