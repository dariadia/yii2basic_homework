<?php

namespace app\components;

class Comp extends \yii\base\Component
{
    public $message;
    public function init()
    {
        $this->message = 'Standard value';
        parent::init();
    }
    public function show($message)
    {
        return $this->message = $message . ' + lorem';
    }
}
