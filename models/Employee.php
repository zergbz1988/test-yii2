<?php

namespace app\models;

use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $full_name
 * @property int $position_id
 * @property int $birth_year
 * @property int $gender
 *
 * @property Position $position
 * @property Group[] $groups
 * @property string $groupsForView
 * @property string $positionName
 */
class Employee extends ActiveRecord
{
    public $editableGroups;

    public static $genders = [
        0 => 'мужской',
        1 => 'женский'
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::class,
                'relations' => [
                    [
                        'editableAttribute' => 'editableGroups', // Editable attribute name
                        'table' => 'employees_to_groups', // Name of the junction table
                        'ownAttribute' => 'employee_id', // Name of the column in junction table that represents current model
                        'relatedModel' => Group::class, // Related model class
                        'relatedAttribute' => 'group_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'position_id'], 'required'],
            [['position_id', 'birth_year', 'gender'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::class, 'targetAttribute' => ['position_id' => 'id']],
            [['editableGroups'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'ФИО',
            'position_id' => 'Должность',
            'positionName' => 'Должность',
            'groupsForView' => 'Все группы',
            'editableGroups' => 'Группы',
            'birth_year' => 'Год рождения',
            'gender' => 'Пол',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::class, ['id' => 'group_id'])
            ->viaTable('employees_to_groups', ['employee_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getGroupsForView(): string
    {
        $groups = $this->getGroups()->select('name')->column();
        if (!empty($groups)) {
            $groups = mb_strtolower(implode(', ', $groups));
            return mb_strtoupper(mb_substr($groups, 0, 1)) . mb_substr($groups, 1);
        }
        return '';
    }

    /**
     * @return string
     */
    public function getPositionName(): string
    {
        $position = $this->position;
        if (!is_null($position)) {
            return $position->name;
        }
        return '';
    }
}
