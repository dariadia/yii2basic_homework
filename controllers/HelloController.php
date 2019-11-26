<?php

namespace app\controllers;

class HelloController extends \yii\web\Controller
{
    public function actionWorld()
    {
        return $this->render('world');
    }
}
