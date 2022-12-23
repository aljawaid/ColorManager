<div class="page-header">
    <h2><?= $title ?></h2>
</div>
<form id="add-color-form" method="post" action="<?= $this->url->href('KBColoursController', 'save', ['plugin' => 'kBColours']) ?>" autocomplete="off">
    
    <?= $this->form->label(t('Color Name'), 'color_name') ?>
    <?= $this->form->text('color_name', $values, $errors, ['required']) ?>
    
    <label for="background_color">Background Color:</label>
    <input type="color" id="background_color" name="background_color" value="#0000ff">
    <label for="border_color">Border Color:</label>
    <input type="color" id="border_color" name="border_color" value="#0000ff">
    
    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>

    <?= $this->form->csrf() ?>
</form>