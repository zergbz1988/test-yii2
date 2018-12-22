<?php

namespace app\models;

use app\models\traits\ListTrait;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property string $name
 *
 * @property Employee[] $employees
 */
class Group extends ActiveRecord
{
    use ListTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::class, ['id' => 'group_id'])
            ->viaTable('employees_to_groups', ['employee_id' => 'id']);
    }
}
