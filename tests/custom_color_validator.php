<?php

/**
 * Custom color validation tests.
 *
 * Related file: Validator/CustomColorValidator.php.
 */

function t($message)
{
    return $message;
}

require dirname(__DIR__) . '/Validator/CustomColorValidator.php';

$validator = new Kanboard\Plugin\ColorManager\Validator\CustomColorValidator();
$failures = array();

list($valid, $color) = $validator->validateCreation(array(
    'color_name' => 'Royal Accent',
    'background_color' => '#a1b2c3',
    'border_color' => '#0A0B0C',
));

if (!$valid || $color !== array('id' => 'royal_accent', 'name' => 'Royal Accent', 'background' => '#A1B2C3', 'border' => '#0A0B0C', 'font' => '#000000')) {
    $failures[] = 'A valid custom color was not normalized as expected.';
}

list($automaticFontValid, $automaticFontColor) = $validator->validateCreation(array(
    'color_name' => 'Automatic Contrast',
    'background_color' => '#102030',
    'border_color' => '#304050',
));

if (!$automaticFontValid || $automaticFontColor['font'] !== '#FFFFFF') {
    $failures[] = 'A custom color without an override did not receive accessible automatic text.';
}

list($fontValid, $fontColor) = $validator->validateCreation(array(
    'color_name' => 'High Contrast',
    'background_color' => '#000000',
    'border_color' => '#FFFFFF',
    'use_font_color' => '1',
    'font_color' => '#ffffff',
));

if (!$fontValid || $fontColor['font'] !== '#FFFFFF') {
    $failures[] = 'A valid optional custom text color was not normalized.';
}

if (abs($validator->calculateContrastRatio('#FFFFFF', '#000000') - 21.0) > 0.001) {
    $failures[] = 'The text contrast calculation is not using WCAG relative luminance.';
}

list($unicodeValid, $unicodeColor) = $validator->validateCreation(array(
    'color_name' => '紫',
    'background_color' => '#123456',
    'border_color' => '#654321',
));

if (!$unicodeValid || strpos($unicodeColor['id'], 'custom_') !== 0) {
    $failures[] = 'Unicode-only names must receive a deterministic safe identifier.';
}

$invalidCases = array(
    array('color_name' => '</style><script>alert(1)</script>', 'background_color' => '#123456', 'border_color' => '#654321'),
    array('color_name' => "Line\nBreak", 'background_color' => '#123456', 'border_color' => '#654321'),
    array('color_name' => 'Unsafe CSS', 'background_color' => '#123456;}', 'border_color' => '#654321'),
    array('color_name' => 'Array input', 'background_color' => array('#123456'), 'border_color' => '#654321'),
    array('color_name' => 'Invalid text', 'background_color' => '#000000', 'border_color' => '#654321', 'use_font_color' => '1', 'font_color' => '#FFFF'),
    array('color_name' => 'Low contrast', 'background_color' => '#777777', 'border_color' => '#654321', 'use_font_color' => '1', 'font_color' => '#777777'),
);

foreach ($invalidCases as $case) {
    list($caseValid) = $validator->validateCreation($case);
    if ($caseValid) {
        $failures[] = 'An unsafe custom color input was accepted.';
    }
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'Custom color validation tests passed.' . PHP_EOL;
