<?php

/**
 * Confirm removal of a custom color without using a state-changing GET request.
 *
 * Related controller: Controller/ColorManagerController.php.
 * Related test: tests/security_contract.php.
 */

?>
<div class="page-header">
    <h2><?= $this->text->e($title) ?></h2>
</div>
<form method="post" action="<?= $this->url->href('ColorManagerController', 'remove', array('plugin' => 'ColorManager')) ?>">
    <p class="alert alert-info">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        <?= t('Tasks and settings already using this color will keep its identifier but lose its custom styling.') ?>
    </p>
    <p><?= $this->text->e(t('Do you really want to remove this color: "%s"?', $color['name'])) ?></p>
    <?= $this->form->hidden('key', array('key' => $colorId)) ?>
    <?= $this->form->csrf() ?>
    <div class="form-actions">
        <button type="submit" class="btn btn-red"><?= t('Remove') ?></button>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'ColorManagerController', 'show', array('plugin' => 'ColorManager')) ?>
    </div>
</form>
