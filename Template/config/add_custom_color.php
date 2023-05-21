<div class="page-header">
    <h2 class=""><?= $title ?></h2>
</div>
<form id="add-color-form" method="post" action="<?= $this->url->href('ColorManagerController', 'save', ['plugin' => 'colorManager']) ?>" autocomplete="off">
    
    <?= $this->form->label(t('Color Name'), 'color_name') ?>
    <?= $this->form->text('color_name', $values, $errors, ['required']) ?>
    
    <label for="background_color"><?= t('Background Color') ?></label>
    <input type="color" id="background_color" name="background_color" value="#FF7800">
    <label for="border_color"><?= t('Border Color') ?></label>
    <input type="color" id="border_color" name="border_color" value="#000000">
    
    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save Color') ?></button>
    </div>

    <?= $this->form->csrf() ?>
</form>
