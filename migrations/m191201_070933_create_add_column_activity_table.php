<?php

use yii\db\Migration;

/**
 * Class m191201_070933_create
 */
class m191201_070933_create_add_column_activity_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%activity}}', 'title', $this->string());
        $this->addColumn('{{%activity}}', 'started_at', $this->bigInteger());
        $this->addColumn('{{%activity}}', 'finished_at', $this->bigInteger());
        $this->addColumn('{{%activity}}', 'user_id', $this->integer());
        $this->addColumn('{{%activity}}', 'main', $this->boolean());
        $this->addColumn('{{%activity}}', 'cycle', $this->boolean());
        $this->addColumn('{{%activity}}', 'created_at', $this->bigInteger());
        $this->addColumn('{{%activity}}', 'updated_at', $this->bigInteger());
    }
    public function safeDown()
    {
        $this->dropColumn('{{%activity}}', 'title');
        $this->dropColumn('{{%activity}}', 'started_at');
        $this->dropColumn('{{%activity}}', 'finished_at');
        $this->dropColumn('{{%activity}}', 'user_id');
        $this->dropColumn('{{%activity}}', 'main');
        $this->dropColumn('{{%activity}}', 'cycle');
        $this->dropColumn('{{%activity}}', 'created_at');
        $this->dropColumn('{{%activity}}', 'updated_at');
    }
}
