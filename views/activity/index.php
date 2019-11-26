<?php

use app\controllers\SiteController;
?>

<?= SiteController::setVisitedPageTracking(); ?>

<h1>Активность: <?= $model->title; ?></h1>
<h2>Свойства
    <?php if ($model->main) : ?>
        <p>Событие блокирует остальные ></p>
    <?php endif; ?>
    <?php if ($model->cyclic) : ?>
        <p>Событие повторяется ></p>
    <?php endif; ?>


    <?php if ($model->startDay == $model->endDay) : ?>
        <p>Событие на <?= date("d.m.Y", $model->startDay) ?></p>
    <?php else : ?>
        <p>Событие c <?= date("d.m.Y", $model->startDay) ?> по <?= date("d.m.Y", $model->endDay) ?></p>
    <?php endif; ?>

    <h3><?= $model->getAttributeLabel('body') ?></h3>
    <div><?= $model->body ?></div>