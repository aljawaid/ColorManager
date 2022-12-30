<?php $defaultColours = $this->task->colorModel->getDefaultColors(); ?>
<?php $preinstalledColors = $this->task->colorModelExt->getStaticColors(); ?>
<?php $customColors = $this->task->colorModelExt->getCustomColors(); ?>
<?php $defaultBackground = $this->task->colorModelExt->getAllColors()[$this->task->colorModel->getDefaultColor()]['background']; ?>
<?php $defaultBorder = $this->task->colorModelExt->getAllColors()[$this->task->colorModel->getDefaultColor()]['border']; ?>
<?php $customColours = is_null(count($this->task->colorModelExt->getCustomColors())) ? 0 : count($this->task->colorModelExt->getCustomColors()); ?>

<div class="color-manager-page-header">
    <h2 class="">
        <img class="color-manager-section-icon" src="/plugins/ColorManager/Assets/colour-palette.svg" alt="<?= t('Default Color Palette') ?>">
        <!--<svg width="22" height="22" fill="currentColor" class="bi bi-palette-fill" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
        </svg>-->
        <?= t('Available Colors') ?> <span class="colour-total-count"><?= count($this->task->colorModel->getList()) ?></span>
    </h2>
    <hr>
    <div class="color-manager-section">
        <h3 class="">
            <?= t('Default Color Palette') ?> <span class="colour-total-count-section"><?= count($defaultColours); ?></span>
        </h3>
        <p class="cm-section-desc">
            <?= t('These colors are part of the core. Pastel styles make these colors universal across all features of the application.') ?>
        </p>
    </div>
    <div class="colour-section">
        <ul class="">
            <li class="">
                <strong><?= t('Task Color') ?>:</strong>
                <span class="default-box-colour" style="background-color: <?= $defaultBackground ?>; border-color: <?= $defaultBorder ?>;">
                    <?= ucfirst($this->task->colorModel->getDefaultColor()); ?>
                </span>
            </li>
            <li class="color-manager-note">
                <?= t('Change the default task color in') ?> <?= $this->url->link(t('Project Settings'), 'ConfigController', 'project', array(), false, 'note-link', t('Go to Project Settings')) ?>
            </li>
        </ul>
    </div>

    <div class="colour-boxes">
        <?php asort($defaultColours) ?>
        <?php foreach ($defaultColours as $color_id => $color): ?>
            <div class="colour-wrapper" style="background-color: <?= $color['background'] ?>; border-color: <?= $color['border'] ?>;" title="<?= $color['name'] ?>">
                <div class="colour-name"><?= $color['name'] ?></div>
                <div class="colour-background">
                    <span class=""><?= t('Background Color') ?></span>
                    <code class="">
                        <?php if (strpos($color['background'], '#') !== false): ?>
                            <?= strtoupper($color['background']) ?>
                        <?php else: ?>
                            <?= $color['background'] ?>
                        <?php endif ?>
                    </code>
                </div>
                <div class="colour-border">
                    <span class=""><?= t('Border Color') ?></span>
                    <code class="">
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
    <hr>

    <div class="color-manager-section">
        <h3 class="">
            <?= t('Extra Color Palette') ?> <span class="colour-total-count-section"><?= count($this->task->colorModelExt->getStaticColors()); ?></span>
        </h3>
        <p class="cm-section-desc">
            <?= t('This palette shows a collection of colors different to those in the default palette. Selected colors also use alternative colors for text. These colors are particularly suitable for tags and categories.') ?>
        </p>
        <p class="cm-section-desc-info-panel">
            <i class="fa fa-info-circle"></i> <?= t('Colors are named based on their common color name. If text colors are used, then the names are preceded by their text color.') ?>
        </p>
    </div>

    <div class="colour-boxes">
        <?php ksort($preinstalledColors) ?>
        <?php foreach ($preinstalledColors as $color_id => $color): ?>
            <div class="colour-wrapper" style="<?php if (isset($color['font'])): ?>color: <?= $color['font'] ?>;<?php endif ?> background-color: <?= $color['background'] ?>; border-color: <?= $color['border'] ?>;" title="<?= $color['name'] ?>">
                <div class="colour-name"><?= $color['name'] ?></div>
                <div class="colour-background">
                    <span class=""><?= t('Background Color') ?></span>
                    <code class="">
                        <?php if (strpos($color['background'], '#') !== false): ?>
                            <?= strtoupper($color['background']) ?>
                        <?php else: ?>
                            <?= $color['background'] ?>
                        <?php endif ?>
                    </code>
                </div>
                <div class="colour-border">
                    <span class=""><?= t('Border Color') ?></span>
                    <code class="">
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
    <hr>

    <div class="color-manager-section relative">
        <button id="AddColor" class="add-colour-btn">
            <a href="<?= $this->url->href('ColorManagerController', 'add', ['plugin' => 'colorManager'], false, '', false) ?>" class="js-modal-small" title="<?=t('Add to this palette') ?>">
                <svg width="20px" height="20px" viewBox="0 0 117 117" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000">
                    <g id="" stroke-width="0"/>
                    <g id="">
                        <g fill="none" fill-rule="evenodd" id="" stroke="none" stroke-width="1">
                            <g fill-rule="nonzero" id="add">
                                <path d="M58.5,0.5 C26.5,0.5 0.4,26.5 0.4,58.5 C0.4,90.5 26.4,116.5 58.5,116.5 C90.5,116.5 116.5,90.5 116.5,58.5 C116.5,26.5 90.5,0.5 58.5,0.5 Z M58.5,108.4 C31,108.4 8.6,86 8.6,58.5 C8.6,31 31,8.6 58.5,8.6 C86,8.6 108.4,31 108.4,58.5 C108.4,86 86,108.4 58.5,108.4 Z" fill="#4A4A4A" id=""/>
                                <path d="M85.2,53.9 L62.6,53.9 L62.6,31.2 C62.6,28.9 60.8,27.1 58.5,27.1 C56.2,27.1 54.4,28.9 54.4,31.2 L54.4,53.8 L31.8,53.8 C29.5,53.8 27.7,55.6 27.7,57.9 C27.7,60.2 29.5,62 31.8,62 L54.4,62 L54.4,84.6 C54.4,86.9 56.2,88.7 58.5,88.7 C60.8,88.7 62.6,86.9 62.6,84.6 L62.6,62 L85.2,62 C87.5,62 89.3,60.2 89.3,57.9 C89.3,55.6 87.5,53.9 85.2,53.9 Z" fill="#2EA02E" id=""/>
                            </g>
                        </g>
                    </g>
                </svg>
                <?= t('Add Color') ?>
            </a>
        </button>
        <h3 class="">
            <?= t('Custom Color Palette') ?><span class="colour-total-count-section"><?= $customColours; ?></span>
        </h3>
        <p class="cm-section-desc">
            <?= t('This palette shows all user created colors. These colors are unique to your application.') ?>
        </p>
        <p class="cm-section-desc-info-panel">
            <i class="fa fa-info-circle"></i> <?= t('Color names matching colors in other palettes will override those colors. Duplicate color names will not be created.') ?>
        </p>
    </div>
    

    <div class="colour-boxes">
        <?php asort($customColors) ?>
        <?php if ($customColors != ''): ?>
            <?php foreach ($customColors as $color_id => $color): ?>
                <div class="colour-wrapper" style="background-color: <?= $color['background'] ?>; border-color: <?= $color['border'] ?>;" title="<?= $color['name'] ?>">
                    <div class="colour-name"><?= $color['name'] ?>
                    <span class="delete-icon-wrapper" style="border-color: <?= $color['border'] ?>;">
                        <?= $this->url->icon('trash', '', 'ColorManagerController', 'remove', ['plugin' => 'colorManager', 'key' => $color_id], false, 'delete-icon', t('Delete Color')) ?>
                        </span>
                    </div>
                    <div class="colour-background">
                        <span class=""><?= t('Background Color') ?></span>
                        <code class="">
                            <?php if (strpos($color['background'], '#') !== false): ?>
                                <?= strtoupper($color['background']) ?>
                            <?php else: ?>
                                <?= $color['background'] ?>
                            <?php endif ?>
                        </code>
                    </div>
                    <div class="colour-border">
                        <span class=""><?= t('Border Color') ?></span>
                        <code class="">
                            <?php if (strpos($color['border'], '#') !== false): ?>
                                <?= strtoupper($color['border']) ?>
                            <?php else: ?>
                                <?= $color['border'] ?>
                            <?php endif ?>
                        </code>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>

</div>
