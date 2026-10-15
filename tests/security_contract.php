<?php

/**
 * ColorManager authorization, request and output safety contract.
 *
 * Related files: Controller/ColorManagerController.php, Plugin.php,
 * Model/ColorModelExt.php and Template/config/colors.php.
 */

$pluginRoot = dirname(__DIR__);
$controller = file_get_contents($pluginRoot . '/Controller/ColorManagerController.php');
$plugin = file_get_contents($pluginRoot . '/Plugin.php');
$model = file_get_contents($pluginRoot . '/Model/ColorModelExt.php');
$template = file_get_contents($pluginRoot . '/Template/config/colors.php');
$removeTemplate = file_get_contents($pluginRoot . '/Template/config/remove.php');
$failures = array();

foreach (
    array(
        'extends BaseController',
        'userSession->isAdmin()',
        'requirePostRequest()',
        'checkCSRFForm()',
        "array('color_name', 'background_color', 'border_color')",
    ) as $boundary
) {
    if (strpos($controller, $boundary) === false) {
        $failures[] = 'The controller boundary is missing: ' . $boundary;
    }
}

if (strpos($controller, 'ConfigController') !== false) {
    $failures[] = 'The plugin controller must not inherit administrator actions from ConfigController.';
}

if (strpos($plugin, "applicationAccessMap->add('ColorManagerController', '*', Role::APP_ADMIN)") === false) {
    $failures[] = 'All ColorManager controller actions must require the administrator role.';
}

foreach (array('isValidStoredColor', 'loadCustomColors()', 'getColorProperties($colorId)') as $modelBoundary) {
    if (strpos($model, $modelBoundary) === false) {
        $failures[] = 'The model safety boundary is missing: ' . $modelBoundary;
    }
}

if (strpos($template, "'remove'") !== false || strpos($template, "'confirm'") === false) {
    $failures[] = 'Custom color deletion must use a confirmation view, not a state-changing GET link.';
}

foreach (array("form->csrf()", "form->hidden('key'") as $removalBoundary) {
    if (strpos($removeTemplate, $removalBoundary) === false) {
        $failures[] = 'The removal form is missing: ' . $removalBoundary;
    }
}

if (strpos($template, 't(ucfirst(') !== false || strpos($template, "t(\$defaultColor['name'])") === false) {
    $failures[] = 'The default color label must use its display name without exposing identifier underscores.';
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'Security and issue regression contract passed.' . PHP_EOL;
