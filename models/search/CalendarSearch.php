<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calendar;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class CalendarSearch extends Calendar
{
    public $start;
    public $end;

    public function rules()
    {
        return [
            [['id', 'start', 'end'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function afterValidate()
    {
        $this->start = (int) \Yii::$app->formatter->asTimestamp($this->start);
        $this->end = (int) \Yii::$app->formatter->asTimestamp($this->end);
    }

    public function search($params)
    {
        $query = Calendar::find()
            ->joinWith('activities')
            ->andWhere(['calendar.user_id' => \Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andWhere([
            'or',
            ['between', 'activity.finished_at', $this->start, $this->end],
            ['between', 'activity.started_at', $this->start, $this->end],
        ]);

        return $dataProvider;
    }
}
