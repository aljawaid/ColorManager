<?php $defaultColours = $this->task->colorModel->getDefaultColors(); ?>

<div class="kbc-page-header">
    <h2><?= t('Available Colours') ?></h2>

    <div class="colour-section">
        <ul class="">
            <li class="">
                <strong><?= t('Default Colour') ?>:</strong> <span><?= $this->task->colorModel->getDefaultColor(); ?></span>
            </li>
            <li class="">
                <strong><?= t('Total Colours') ?>:</strong> <?= count($defaultColours) ?>
            </li>
        </ul>
    </div>

    <?php foreach ($defaultColours as $color_id => $color): ?>
        <div class="colour-wrapper">
            <div class="colour-name"><?= $color['name'] ?></div>
            <div class="colour-background"><?= $color['background'] ?></div>
            <div class="colour-border"><?= t('Border') ?>: <?= strtoupper($color['border']) ?></div>
        </div>
    <?php endforeach ?>


<table id="" class="colour-table">
    <thead>
        <tr class="">
            <th class="">Colour</th>
            <th class="">CSS Background</th>
            <th class="">CSS Border</th>
            <th class="">Example</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($defaultColours as $color_id => $color): ?>
        <tr class="">
            <td class=""><?= $color['name'] ?></td>
            <td class=""><?= $color['background'] ?></td>
            <td class=""><?= $color['border'] ?></td>
            <td class="">
                <span class="colour-example"><?= $color['name'] ?></span>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

</div>
