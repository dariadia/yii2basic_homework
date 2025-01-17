<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'started_at')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter event time'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]); ?> -->

    <?= $form->field($model, 'started_at')->textInput() ?>
    <?= $form->field($model, 'finished_at')->textInput() ?>

    <?= $form->field($model, 'author_id')->textInput() ?>

    <?= $form->field($model, 'main')->textInput() ?>

    <?= $form->field($model, 'cycle')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>