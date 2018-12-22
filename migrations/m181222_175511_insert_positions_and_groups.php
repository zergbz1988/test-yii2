<?php

use yii\db\Migration;

/**
 * Class m181222_175511_insert_positions_and_groups
 */
class m181222_175511_insert_positions_and_groups extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('positions', ['name'], [['Менеджер по продажам'], ['Системный аналитик'], ['Кассир-продавец']]);
        $this->batchInsert('groups', ['name'], [['Персонал торгового зала'], ['Группа аналитики'], ['Отдел продаж']]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181222_175511_insert_positions_and_groups cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181222_175511_insert_positions_and_groups cannot be reverted.\n";

        return false;
    }
    */
}
