            [['authorUsername'], 'string'],
            [['started_at', 'finished_at'], 'date', 'format' => 'php:d.m.Y'],
        if (!empty($this->started_at)) {
            $this->filterByDate('started_at', $query);
        }
        if (!empty($this->finished_at)) {
            $this->filterByDate('finished_at', $query);
        }
        if (!empty($this->authorUsername)) {
            $query->joinWith('author as author');
            $query->andWhere(['like', 'author.username', $this->authorUsername]);
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'main' => $this->main,
            'cycle' => $this->cycle,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }

    private function filterByDate($attr, $query)
    {
        $dayStart = (int) \Yii::$app->formatter->asTimestamp($this->$attr . ' 00:00:00');
        $dayStop = (int) \Yii::$app->formatter->asTimestamp($this->$attr . ' 23:59:59');
        $query->andFilterWhere([
            'between',
            self::tableName() . ".$attr",
            $dayStart,
            $dayStop,
        ]);
    }
