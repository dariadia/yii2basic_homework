<?php

namespace app\modules\admin\controllers;

class SuperController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLorem()
    {
        return $this->render('lorem');
    }

    public function actionSuperAction()
    {
        return $this->render('super-action');
    }
}
