<?php

/**
 * Kanboard 1.2.54 integration tests for ColorManager.
 *
 * Related files: Plugin.php, Controller/ColorManagerController.php and
 * Model/ColorModelExt.php.
 */

$kanboardRoot = getenv('KANBOARD_ROOT');
if ($kanboardRoot === false || !is_file($kanboardRoot . '/app/common.php')) {
    fwrite(STDERR, 'Set KANBOARD_ROOT to a Kanboard 1.2.54 checkout.' . PHP_EOL);
    exit(1);
}

define('PLUGINS_DIR', $kanboardRoot . '/plugins');
define('DB_FILENAME', $kanboardRoot . '/data/color-manager-integration.sqlite');

require $kanboardRoot . '/app/common.php';

$failures = array();
$plugins = $container['pluginLoader']->getPlugins();

if (!isset($plugins['ColorManager'])) {
    $failures[] = 'ColorManager did not load.';
}

if (get_class($container['colorModel']) !== Kanboard\Plugin\ColorManager\Model\ColorModelExt::class) {
    $failures[] = 'The core color resolver was not replaced with ColorModelExt.';
}

// Replacing an already resolved Pimple service must remain safe regardless of plugin initialization order.
$plugins['ColorManager']->onStartup();
if (get_class($container['colorModel']) !== Kanboard\Plugin\ColorManager\Model\ColorModelExt::class) {
    $failures[] = 'The frozen core color resolver could not be safely replaced with ColorModelExt.';
}

$authorization = $container['applicationAuthorization'];
if (!$authorization->isAllowed('ColorManagerController', 'show', Kanboard\Core\Security\Role::APP_ADMIN)) {
    $failures[] = 'Administrators cannot access ColorManager settings.';
}

if ($authorization->isAllowed('ColorManagerController', 'show', Kanboard\Core\Security\Role::APP_USER)) {
    $failures[] = 'Ordinary application users can access ColorManager settings.';
}

foreach (array('api', 'webhook', 'downloadDb', 'saveUploadedDb') as $inheritedAction) {
    if (method_exists(Kanboard\Plugin\ColorManager\Controller\ColorManagerController::class, $inheritedAction)) {
        $failures[] = 'An inherited administrator action remains reachable: ' . $inheritedAction;
    }
}

$colorModel = $container['colorModel'];
$configModel = $container['configModel'];
$colorModel->saveCustomColor('gantt_accent', 'Gantt Accent', '#123456', '#654321');
$configModel->save(array('default_color' => 'gantt_accent'));
$container['memoryCache']->flush();
$properties = $colorModel->getColorProperties('gantt_accent');

if ($properties['background'] !== '#123456' || $colorModel->getColorProperties('unknown')['background'] !== '#123456') {
    $failures[] = 'Custom colors are not resolved for Gantt or as a configured default.';
}

$configModel->save(array(
    'kbcolour_ids' => 'gantt_accent,hostile',
    'kbcolour_name_hostile' => '</style><script>alert(1)</script>',
    'kbcolour_backgroundcolor_hostile' => '#123456',
    'kbcolour_bordercolor_hostile' => '#654321',
));
$container['memoryCache']->flush();

$colorModel->saveCustomColor('safe_edit', 'Safe Edit', '#112233', '#445566');
$container['memoryCache']->flush();
if (strpos($configModel->get('kbcolour_ids'), 'hostile') === false) {
    $failures[] = 'Saving a safe color silently removed a quarantined legacy registry id.';
}

$colorModel->removeCustomColor('safe_edit');
$container['memoryCache']->flush();
if (strpos($configModel->get('kbcolour_ids'), 'hostile') === false) {
    $failures[] = 'Removing a safe color silently removed a quarantined legacy registry id.';
}

if (isset($colorModel->getCustomColors()['hostile']) || strpos($colorModel->getCssExt(), '</style>') !== false) {
    $failures[] = 'Unsafe legacy custom color data reached a renderable sink.';
}

$configModel->save(array('default_color' => 'deep_orange'));
$container['memoryCache']->flush();
if ($colorModel->getColorProperties('deep_orange')['name'] !== 'Deep Orange') {
    $failures[] = 'Compound color names do not resolve to their display labels.';
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'Kanboard integration tests passed.' . PHP_EOL;
