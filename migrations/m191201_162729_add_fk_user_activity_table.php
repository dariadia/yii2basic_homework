<?php

use yii\db\Migration;

/**
 * Class m191201_071329_create
 */
class m191201_162729_add_fk_user_activity_table extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-user-activity',
            'user',
            'created_activity',
            'activity',
            'user_id',
            'CASCADE'
        );
    }
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user-activity',
            'user'
        );
    }
}
