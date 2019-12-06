    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'authorUsername',
                'format' => 'raw',
                'value' => function (\app\models\Activity $model) {
                    return Html::a($model->author->username, ['/user/view', 'id' => $model->author->id]);
                }
            ],
            [
                'label' => 'Started at',
                'value' => \Yii::$app->formatter->asDateTime($model->started_at),
            ],
            [
                'label' => 'Finished at',
                'value' => \Yii::$app->formatter->asDateTime($model->finished_at),
            ],
            [
                'attribute' => 'main',
                'label' => 'Блокирующее',
                'value' => function (\app\models\Activity $model) {
                    return $model->main ? "Да" : "Нет";
                },
            ],
            [
                'attribute' => 'cycle',
                'label' => 'Повторяется',
                'value' => function (\app\models\Activity $model) {
                    return $model->cycle ? "Да" : "Нет";
                },
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
