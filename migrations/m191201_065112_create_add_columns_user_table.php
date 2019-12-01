<?php

use yii\db\Migration;

/**
 * Class m191201_065112_create
 */
class m191201_065112_create_add_columns_user_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'username', $this->string());
        $this->addColumn('{{%user}}', 'password', $this->string());
        $this->addColumn('{{%user}}', 'authKey', $this->string());
        $this->addColumn('{{%user}}', 'accessToken', $this->string());
        $this->addColumn('{{%user}}', 'created_activity', $this->integer());
    }
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'username');
        $this->dropColumn('{{%user}}', 'password');
        $this->dropColumn('{{%user}}', 'authKey');
        $this->dropColumn('{{%user}}', 'accessToken');
        $this->dropColumn('{{%user}}', 'created_activity');
    }
}
