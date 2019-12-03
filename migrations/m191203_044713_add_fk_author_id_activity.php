<?php

use yii\db\Migration;

/**
 * Class m191203_044713_add_fk_author_id_activity
 */
class m191203_044713_add_fk_author_id_activity extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey('fk-author_id-activity', 'activity', 'author_id', 'user', 'id');
    }
    public function safeDown()
    {
        $this->dropForeignKey('fk-author_id-activity', 'activity');
    }
}
