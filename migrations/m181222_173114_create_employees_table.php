<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employees`.
 */
class m181222_173114_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('employees', [
            'id' => $this->primaryKey()->unsigned(),
            'full_name' => $this->string()->notNull(),
            'position_id' => $this->integer()->unsigned()->notNull(),
            'birth_year' => $this->smallInteger()->unsigned(),
            'gender' => $this->boolean(),
        ]);

        $this->createIndex('IDX_e_position_id', 'employees', 'position_id');
        $this->addForeignKey('FK_e_position_id', 'employees', 'position_id',
            'positions', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('employees_to_groups', [
            'id' => $this->primaryKey()->unsigned(),
            'employee_id' => $this->integer()->unsigned()->notNull(),
            'group_id' => $this->integer()->unsigned()->notNull(),
        ]);

        $this->createIndex('IDX_e2g_employee_id', 'employees_to_groups', 'employee_id');
        $this->addForeignKey('FK_e2g_employee_id', 'employees_to_groups', 'employee_id',
            'employees', 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('IDX_e2g_group_id', 'employees_to_groups', 'group_id');
        $this->addForeignKey('FK_e2g_group_id', 'employees_to_groups', 'group_id',
            'groups', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('employees_to_groups');
        $this->dropTable('employees');
    }
}
