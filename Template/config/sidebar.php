<li <?= $this->app->checkMenuSelection('KBColoursController', 'show', 'KBColours') ?>>
    <?= $this->url->link(t('Colors'), 'KBColoursController', 'show', ['plugin' => 'KBColours']) ?>
</li>
