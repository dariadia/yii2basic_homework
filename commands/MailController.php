<?php

namespace app\commands;

use app\models\Activity;
use yii\console\Controller;

class MailController extends Controller
{
    public $message;
    public $text;

    public function actionSendOut($email = null)
    {
        $activitiesQuery = Activity::find();
        if (!is_null($email)) {
            $activitiesQuery->joinWith('users')->where(['user.email' => $email]);
        }
        foreach ($activitiesQuery->each(100) as $activity) {
            foreach ($activity->users as $user) {
                $mailSend = \Yii::$app->mailer
                    ->compose('activity/notification-html', ['activity' => $activity])
                    ->setFrom('noreply@yii2basig.gb')
                    ->setSubject('Первое письмо')
                    ->setTo($user->email)->setCharset('UTF-8')
                    ->send();
                if ($mailSend === true) {
                    echo "сообщение о {$activity->title} было отправлено $user->email успешно" . PHP_EOL;
                }
            }
        }
    }
}
