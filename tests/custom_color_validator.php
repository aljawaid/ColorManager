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

if (!$valid || $color !== array('id' => 'royal_accent', 'name' => 'Royal Accent', 'background' => '#A1B2C3', 'border' => '#0A0B0C')) {
    $failures[] = 'A valid custom color was not normalized as expected.';
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
