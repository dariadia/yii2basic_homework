<?php

use yii\helpers\Html;

$this->title = 'События на сегодня';
?>

<h1><?= Html::encode($this->title) ?></h1>
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

    <?= Html::a('Вернуться в календарь', ['calendar/view', 'userId' => $user->id], ['class' => 'calendar-link']) ?>

    <button class="btn btn-lg"><?= Html::a('Редактировать событие', ['calendar/#', 'userId' => $user->id], ['class' => 'calendar-link']) ?><button>