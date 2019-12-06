<?php

namespace app\models;

use DateTime;
use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property int $started_at
 * @property int $finished_at
 * @property int $author_id
 * @property int $main
 * @property int $cycle
 * @property int $created_at
 * @property int $updated_at
 *
 *
 * @property User $author
 * @property Calendar[] $calendar
 * @property User[] $users - список всех пользователй из календаря
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    public function rules()
    {
        return [
            [['started_at', 'finished_at', 'author_id', 'main', 'cycle', 'created_at', 'updated_at'], 'integer'],
            [['author_id', 'started_at'], 'required'],
            [['title'], 'string', 'max' => 255],
            ['started_at', 'compare', 'compareAttribute' => 'finished_at', 'operator' => '<=', 'enableClientValidation' => false], // не даст добавить активность, но при самом заполнении полей ошибки не покажет
            [['finished_at'], 'default', 'value' => function ($model) {
                return $model->finished_at = $model->started_at;
            }],
            [['main'], 'default', 'value' => 0],
            [['cycle'], 'default', 'value' => 0],
            [['created_at'], 'default', 'value' => function () {
                $date = new DateTime();
                return $date->getTimestamp();
            }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'started_at' => 'Started At',
            'finished_at' => 'Finished At',
            'author_id' => 'author ID',
            'main' => 'Main',
            'cycle' => 'Cycle',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    public function getCalendar()
    {
        return $this->hasMany(Calendar::class, ['activity_id' => 'id']);
    }

    public function getUsers()
    {
        return  $this->hasMany(User::class, ['id' => 'author_id'])
            ->via('calendar');
    }
}
