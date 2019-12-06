use yii\widgets\ActiveForm;
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'started_at')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event date and time'],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'dd.mm.yyyy H:m:s',
        ]
    ]); ?>

    <?= $form->field($model, 'finished_at')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event date and time'],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'dd.mm.yyyy H:m:s',
        ]
    ]); ?>
    <?= $form->field($model, 'main')->checkbox() ?>

    <?= $form->field($model, 'cycle')->checkbox() ?>
