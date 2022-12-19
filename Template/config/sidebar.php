<li <?= $this->app->checkMenuSelection('KBColoursController', 'show', 'KBColours') ?>>
    <?= $this->url->link('KBColours', 'KBColoursController', 'show', ['plugin' => 'MatomoConnector']) ?>
</li>
