<?php

// Custom color validation is covered by tests/custom_color_validator.php.
$colorValues = array_merge(array('background_color' => '#FF7800', 'border_color' => '#000000'), $values);
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
    
    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save Color') ?></button>
    </div>

    <?= $this->form->csrf() ?>
</form>
