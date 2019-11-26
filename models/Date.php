<?php

namespace app\models;

class Date extends \yii\base\Model
{
    public $date;
    public $type; // рабочий или выходной
    public $activities;

    public function rules()
    {
        return [
            [['date', 'type'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'date' => 'Дата',
            'type' => 'Рабочий или выходной день?',
            'activities' => 'События на этот день',
        ];
    }

    /* public function getActivitiesForDate(date) {
        $this->activities = .. get activities from Activity
        return $this->activities;
    } */
}
