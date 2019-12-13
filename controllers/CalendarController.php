<?php

namespace app\controllers;

use Yii;
use app\models\Activity;
use app\models\search\CalendarSearch;
use app\models\Calendar;
use edofre\fullcalendar\models\Event;
use yii2mod\rbac\filters\AccessControl;
use yii\helpers\Url;
use yii\filters\VerbFilter;


class CalendarController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view', 'update', 'events'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionEvents($id, $start, $end)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $calendars = (new CalendarSearch())->search(['start' => $start, 'end' => $end]);

        $result = [];

        foreach ($calendars->models as $calendar) {
            $activity = $calendar->activity;
            $result[] = new Event([
                'id' => $activity->id,
                'title' => $activity->title,
                'start' => Yii::$app->formatter->asDateTime($activity->started_at, 'php:c'),
                'end' => Yii::$app->formatter->asDateTime($activity->finished_at, 'php:c'),
                'editable' => false,
                'startEditable' => false,
                'durationEditable' => false,
                'color' => 'blue',
                'url' => Url::to(['view', 'id' => $activity->id])
            ]);
        }
        return $result;
    }
}
