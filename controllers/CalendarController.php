<?php

namespace app\controllers;

use Yii;
use app\models\Activity;
use app\models\search\ActivitySearch;


class CalendarController extends \yii\web\Controller
{
    // public function actionIndex()
    // {
    //     $activities = Activity::find()->all();
    //     foreach ($activities as $activity) {
    //         $activity = new Activity();
    //         $activity->id = $activity->id;
    //         $activity->title =  $activity->title;
    //         $activity->started_at = $activity->started_at;
    //         $activity->finished_at = $activity->finished_at;
    //         $activity->author_id = $activity->author_id;
    //         $activity->main =  $activity->main;
    //         $activity->cycle =  $activity->cycle;
    //         $activities[] = $activity;
    //     }

    //     return $this->render('index', [
    //         'events' => $activities,
    //     ]);
    // }
    public function actionIndex()
    {
        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
