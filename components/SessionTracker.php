<?php

namespace app\components;

use Yii;
use yii\web\Request;

class SessionTracker extends \yii\base\Component
{
    public $lastVisitedPage;

    public function init()
    {
        $session = Yii::$app->session;
        //$session['lastVisitedPage'] = Yii::$app->request->urlReferrer; //почему-то этой крутой штуки больше нет в документации, хотя все пишут, что год назад работало... тайна

        $this->lastVisitedPage = $session['lastVisitedPage'];
    }
    public function getLastVisitedPage()
    {
        return $this->lastVisitedPage;
    }
}
