<?php

use yii\db\Migration;

/**
 * Handles the creation of table `positions`.
 */
class m181222_173113_create_positions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('positions', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('positions');
    }
}
