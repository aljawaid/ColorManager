<?php $defaultColours = $this->task->colorModel->getDefaultColors(); ?>

<div class="page-header">
    <h2><?= t('Available Colours') ?></h2>
</div>

<div class="default-colour">
    <ul>
        <li>
            default colour: <span><?= $this->task->colorModel->getDefaultColor(); ?></span>
        </li>
        <li>
            <?= count($defaultColours) ?>
        </li>
    </ul>
</div>


<div class=""></div>





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

