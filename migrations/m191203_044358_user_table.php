<?php

use yii\db\Migration;

/**
 * Class m191203_044358_user_table
 */
class m191203_044358_user_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(\app\models\User::STATUS_ACTIVE),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->createIndex('idx-id-user-table', 'user', 'id');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-id-user-table', 'user');
        $this->dropTable('{{%user}}');
    }
}
