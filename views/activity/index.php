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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            [
                'attribute' => 'started_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'started_at',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ],
                ]),
                'value' => function (\app\models\Activity $model) {
                    return Yii::$app->formatter->asDateTime($model->started_at);
                }
            ],
            [
                'attribute' => 'finished_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'finished_at',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ],
                ]),
                'value' => function (\app\models\Activity $model) {
                    return Yii::$app->formatter->asDateTime($model->finished_at);
                }
            ],
            [
                'attribute' => 'authorUsername',
                'format' => 'raw',
                'value' => function (\app\models\Activity $model) {
                    return Html::a($model->author->username, ['/user/view', 'id' => $model->author->id]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php if ($model->startDay == $model->endDay) : ?>
        <p>Событие на <?= date("d.m.Y", $model->startDay) ?></p>
    <?php else : ?>
        <p>Событие c <?= date("d.m.Y", $model->startDay) ?> по <?= date("d.m.Y", $model->endDay) ?></p>
    <?php endif; ?>

    <h3><?= $model->getAttributeLabel('body') ?></h3>
    <div><?= $model->body ?></div>