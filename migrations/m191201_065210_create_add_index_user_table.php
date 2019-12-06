<?php

use yii\db\Migration;

/**
 * Class m191201_065210_create
 */
class m191201_065210_create_add_index_user_table extends Migration
{
    public function safeUp()
    {
        $this->createIndex('idx-created_activity-user-table', 'user', 'created_activity');
    }
    public function safeDown()
    {
        $this->dropIndex('idx-created_activity-user-table', 'user');
    }
}
