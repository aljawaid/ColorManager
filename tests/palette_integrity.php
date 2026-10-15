<?php

/**
 * Palette and SVG integrity tests.
 *
 * Related files: Model/ColorModelExt.php, Assets/css/color-manager.css and
 * Template/config/colors.php.
 */

namespace Kanboard\Model {
    class ColorModel
    {
    }
}

namespace {
    require dirname(__DIR__) . '/Model/ColorModelExt.php';

    $pluginRoot = dirname(__DIR__);
    $reflection = new ReflectionClass(Kanboard\Plugin\ColorManager\Model\ColorModelExt::class);
    $model = $reflection->newInstanceWithoutConstructor();
    $palettes = array();
    $failures = array();

    foreach (array('static_colors', 'text_colors') as $propertyName) {
        $property = $reflection->getProperty($propertyName);
        $palettes[$propertyName] = $property->getValue($model);
    }

    if (count($palettes['static_colors']) !== 40 || count($palettes['text_colors']) !== 30) {
        $failures[] = 'The extended or text color palette count changed.';
    }

    $paletteHash = hash('sha256', json_encode($palettes, JSON_UNESCAPED_SLASHES));
    if ($paletteHash !== '1966cfeb6c90fcf7c85743414db104415838544045b70aff5fac76769cfeacaa') {
        $failures[] = 'A preserved palette identifier, name or color value changed.';
    }

    $hashSvg = function ($svg) {
        return hash('sha256', str_replace("\r\n", "\n", $svg));
    };

    $css = file_get_contents($pluginRoot . '/Assets/css/color-manager.css');
    preg_match_all('/data:image\/svg\+xml,[^\"]+/', $css, $cssSvgMatches);
    $cssSvgHashes = array_map($hashSvg, $cssSvgMatches[0]);
    $expectedCssSvgHashes = array(
        '6696d232da3da5a2852f5c4dc383e534291e3d82f15c221b9f4bb28be6612147',
        '726aa787d8ebd55e71a0a9ebd56233e6db9243f6b20cee0b19d0b76477adda01',
        'ed95bf87dc76ba26bf9ba97613e490ccae88336c2241a9c25b41d21fce243328',
        '85f3b5ff09a2c89472cef277644abfaf2dba9d6ad183e8f6f8f30052fbcfa508',
        '52608d6236601a77a68aa51cf73ccd96b7a8d443cf0e88738a56de94afaeac53',
    );

    $template = file_get_contents($pluginRoot . '/Template/config/colors.php');
    preg_match_all('/<svg\b.*?<\/svg>/s', $template, $templateSvgMatches);
    $templateSvgHashes = array_map($hashSvg, $templateSvgMatches[0]);
    $expectedTemplateSvgHashes = array(
        '2bed2667a3be87b65b02f39f101302ec2936f56fdb3e7cee5fe6571b85809f7e',
        '550e65124ec132578bf2f601dc31b6ac2e71382d1400c94e0ba3e7d588e4200d',
    );

    if ($cssSvgHashes !== $expectedCssSvgHashes || $templateSvgHashes !== $expectedTemplateSvgHashes) {
        $failures[] = 'A used SVG icon changed or was removed.';
    }

    if ($failures !== array()) {
        fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
        exit(1);
    }

    echo 'Palette and SVG integrity tests passed.' . PHP_EOL;
}
