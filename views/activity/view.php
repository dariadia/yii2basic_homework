<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

var_dump($model->getUsers()->createCommand()->getRawSql());
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'started_at',
            'finished_at',
            [
                'label' => 'Started at',
                'value' => \Yii::$app->formatter->asDate($model->started_at),
            ],
            [
                'label' => 'Finished at',
                'value' => \Yii::$app->formatter->asDate($model->finished_at),
            ],
            'main',
            'cycle',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
