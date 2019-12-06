<?php

use yii\db\Migration;

/**
 * Class m191203_044511_activity_table
 */
class m191203_044511_activity_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%activity}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'started_at' => $this->bigInteger(),
            'finished_at' => $this->bigInteger(),
            'author_id' => $this->integer(),
            'main' => $this->boolean(),
            'cycle' => $this->boolean(),
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger(),
        ]);
        $this->createIndex('idx-author_id-activity-table', 'activity', 'author_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-author_id-activity-table', 'activity');
        $this->dropTable('{{%activity}}');
    }
}
