<div class="page-header">
    <h2><?= t('Available Colours') ?></h2>
</div>

<div class="">
    <h4>default colour: <span><?= $this->task->colorModel->getDefaultColor(); ?></span></h4>
</div>

<?php $defaultColours = $this->task->colorModel->getDefaultColors(); ?>

<table>
    <thead>
        <tr>
            <th>Colour</th>
            <th>CSS Background</th>
            <th>CSS Border</th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($defaultColours as $color_id => $color): ?>
        <tr>
            <td><?= $color['name'] ?></td>
            <td><?= $color['background'] ?></td>
            <td><?= $color['border'] ?></td>
        </tr>
<?php endforeach ?>
    </tbody>
</table>

