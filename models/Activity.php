<?php

namespace app\models;

class Activity extends \yii\base\Model
{
    public $title;
    public $startDay;
    public $endDay;
    public $idAuthor;
    public $body;
    public $cyclic;
    public $main;

    public function rules()
    {
        return [
            [['title', 'startDay', 'idAuthor'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата завершения',
            'idAuthor' => 'ID автора',
            'body' => 'Описание события',
            'cyclic' => 'Событие может повторяться',
            'main' => 'Это основное событие, блокирующее',
        ];
    }
}
