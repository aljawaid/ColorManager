<?php $defaultColours = $this->task->colorModel->getDefaultColors(); ?>
<?php $defaultBackground = $this->task->colorModel->getBackgroundColor($this->task->colorModel->getDefaultColor()); ?>
<?php $defaultBorder = $this->task->colorModel->getBorderColor($this->task->colorModel->getDefaultColor()); ?>

<div class="kbc-page-header">
    <h2 class="">
        <svg width="22" height="22" fill="currentColor" class="bi bi-palette-fill" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
        </svg>
        <?= t('Available Colours') ?> <span class="total-count"><?= count($this->task->colorModel->getList()) ?></span>
    </h2>

    <div class="colour-section">
        <ul class="">
            <li class="">
                <strong><?= t('Default Task Colour') ?>:</strong>
                <span class="default-box-colour" style="background-color: <?= $defaultBackground ?>; border-color: <?= $defaultBorder ?>;">
                    <?= ucfirst($this->task->colorModel->getDefaultColor()); ?>
                </span>
            </li>
            <div class="note">
                <?= t('Change the default colour in') ?> <?= $this->url->link(t('Project Settings'), 'ConfigController', 'project', array(), false, 'note-link', t('Go to Project Settings')) ?>
            </div>
            <li class="">
                <strong><?= t('Total Default Colours') ?>:</strong> <?= count($defaultColours); ?>
            </li>
        </ul>
    </div>

    <div class="colour-boxes">
        <?php foreach ($defaultColours as $color_id => $color): ?>
            <div class="colour-wrapper" style="background-color: <?= $color['background'] ?>; border-color: <?= $color['border'] ?>;">
                <div class="colour-name"><?= $color['name'] ?></div>
                <div class="colour-background">
                    <span><?= t('Background Colour') ?></span>
                    <code>
                        <?php if (strpos($color['background'], '#') !== false): ?>
                            <?= strtoupper($color['background']) ?>
                        <?php else: ?>
                            <?= $color['background'] ?>
                        <?php endif ?>
                    </code>
                </div>
                <div class="colour-border">
                    <span><?= t('Border Colour') ?></span>
                    <code>
                        <?php if (strpos($color['border'], '#') !== false): ?>
                            <?= strtoupper($color['border']) ?>
                        <?php else: ?>
                            <?= $color['border'] ?>
                        <?php endif ?>
                    </code>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="">
        <h3>Custom Colours</h3>
        <strong><?= t('Total Custom Colours') ?>:</strong> <?= $customColours; ?>
    </div>
</div>
