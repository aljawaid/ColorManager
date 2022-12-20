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

    <div class="colour-boxes">
        <?php foreach ($defaultColours as $color_id => $color): ?>
            <div class="colour-wrapper" style="background-color: <?= $color['background'] ?>; border-color: <?= $color['border'] ?>;">
                <div class="colour-name"><?= $color['name'] ?></div>
                <div class="colour-background"><?= $color['background'] ?></div>
                <div class="colour-border"><?= t('Border') ?>: <?= strtoupper($color['border']) ?></div>
            </div>
        <?php endforeach ?>
    </div>
</div>
