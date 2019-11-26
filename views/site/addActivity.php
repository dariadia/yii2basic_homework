<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'enableClientValidation' => false,
    'method' => 'post',
    'action' => \yii\helpers\Url::to(['site/submit'])
]);
echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'startDay')->widget(\yii\jui\DatePicker::class, [
    'language' => 'ru',
    'dateFormat' => 'dd-MM-yyyy',
]);
echo $form->field($model, 'fromendDay_date')->widget(\yii\jui\DatePicker::class, [
    'language' => 'ru',
    'dateFormat' => 'dd-MM-yyyy',
]);
echo $form->field($model, 'idAuthor')->textInput();
echo $form->field($model, 'body')->textarea();
echo $form->field($model, 'cyclic')->checkbox();
echo $form->field($model, 'main')->checkbox();
echo Html::submitButton(
    'Отправить',
    ['class' => 'btn btn-success']
);
ActiveForm::end();
