<?php

use yii\db\Migration;

/**
 * Class m191203_091541_calendar_table
 */
class m191203_091541_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calendar}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'activity_id' => $this->integer()->notNull(),
            'created_at' => $this->bigInteger()->notNull(),
            'updated_at' => $this->bigInteger(),
        ]);
        $this->addForeignKey(
            'fk-activity_id-calendar',
            'calendar',
            'activity_id',
            'activity',
            'id'
        );
        $this->addForeignKey(
            'fk-author_id-calendar',
            'calendar',
            'author_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-activity_id-calendar', 'calendar');
        $this->dropForeignKey('fk-author_id-calendar', 'calendar');
        $this->dropTable('{{%calendar}}');
    }
}
