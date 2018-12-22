<?php

use yii\db\Migration;

/**
 * Handles the creation of table `groups`.
 */
class m181222_173028_create_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('groups', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('groups');
    }
}
