<?php

// Custom color validation is covered by tests/custom_color_validator.php.
$colorValues = array_merge(
    array('background_color' => '#FF7800', 'border_color' => '#000000', 'font_color' => '#000000'),
    $values
);
?>
<div class="page-header">
    <h2 class=""><?= $title ?></h2>
</div>
<form id="add-color-form" method="post" action="<?= $this->url->href('ColorManagerController', 'save', ['plugin' => 'colorManager']) ?>" autocomplete="off">
    
    <?= $this->form->label(t('Color Name'), 'color_name') ?>
    <?= $this->form->text('color_name', $values, $errors, ['required']) ?>
    
    <?= $this->form->label(t('Background Color'), 'background_color') ?>
    <?= $this->form->input('color', 'background_color', $colorValues, $errors, array('required')) ?>
    <?= $this->form->label(t('Border Color'), 'border_color') ?>
    <?= $this->form->input('color', 'border_color', $colorValues, $errors, array('required')) ?>

    <p class="alert alert-info">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        <?= t("Enable this option to override Kanboard's inherited text color. Custom text colors must remain readable and require a contrast ratio of at least 4.5:1 against the background color.") ?>
    </p>
    <?= $this->form->checkbox(
        'use_font_color',
        t('Use a custom text color'),
        '1',
        isset($colorValues['use_font_color']) && $colorValues['use_font_color'] === '1'
    ) ?>
    <?= $this->form->label(t('Text Color'), 'font_color') ?>
    <?= $this->form->input('color', 'font_color', $colorValues, $errors) ?>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save Color') ?></button>
    </div>

    <?= $this->form->csrf() ?>
</form>
