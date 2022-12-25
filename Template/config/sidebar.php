<li <?= $this->app->checkMenuSelection('ColorManagerController', 'show', 'ColorManager') ?>>
    <?= $this->url->link(t('Colors'), 'ColorManagerController', 'show', ['plugin' => 'ColorManager']) ?>
</li>
