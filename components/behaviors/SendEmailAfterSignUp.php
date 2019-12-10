<?php

namespace app\components\behaviors;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Behavior;

class SendEmailAfterSignUp extends Behavior
{
    public $email;
    public $password;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_VALIDATE => 'afterValidate',
        ];
    }

    public function afterValidate($event)
    {
        $message = Yii::$app->mailer->compose();
        $message->setFrom('admin@admin.ru');
        $message->setTo($this->email)
            ->setSubject('Your password')
            ->setTextBody($this->password)
            ->send();
    }
}
