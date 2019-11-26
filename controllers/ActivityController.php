<?php

namespace app\controllers;

use app\models\Activity;

class ActivityController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Activity();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        return "Создание активности";
    }
}
