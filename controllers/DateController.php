<?php

namespace app\controllers;

use app\models\Date;

class DateController extends \yii\web\Controller
{
    public function actionDate()
    {
        $model = new Date();

        return $this->render('date', [
            'model' => $model,
        ]);
    }
}
