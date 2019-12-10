<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Календарь';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<?= edofre\fullcalendar\Fullcalendar::widget([
    'events'        => $dataProvider
]);
?>