<li <?= $this->app->checkMenuSelection('ColorManagerController', 'show', 'ColorManager') ?>>
    <?= $this->url->link(t('Color Manager'), 'ColorManagerController', 'show', ['plugin' => 'ColorManager', 'url' => t('color-manager')]) ?>
</li>
