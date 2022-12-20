<li <?= $this->app->checkMenuSelection('KBColoursController', 'show', 'KBColours') ?>>
    <?= $this->url->link(t('Default Colours'), 'KBColoursController', 'show', ['plugin' => 'KBColours']) ?>
</li>
