<?php

use yii\db\Migration;

/**
 * Class m191201_162051_add_index_activity_table
 */
class m191201_162051_add_index_activity_table extends Migration
{
    public function safeUp()
    {
        $this->createIndex('idx-user_id-activity-table', 'activity', 'user_id');
    }
    public function safeDown()
    {
        $this->dropIndex('idx-user_id-activity-table', 'activity');
    }
}
