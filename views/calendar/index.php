<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\CalendarAsset;

CalendarAsset::register($this);

$this->title = 'Календарь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= edofre\fullcalendar\Fullcalendar::widget([
        'events'        => \yii\helpers\Url::to(['calendar/events', 'id' => uniqid()]),
    ]);
    ?>
</div>