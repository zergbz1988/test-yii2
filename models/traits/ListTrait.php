<?php

namespace app\models\traits;

use yii\helpers\ArrayHelper;

/**
 * Trait ListTrait
 * @package app\models\traits
 */
trait ListTrait
{
    public static function getList(): array
    {
        $items = self::find()->asArray()->all();
        $items = ArrayHelper::index($items, 'id');

        return array_map(function ($item) {
            return $item['name'];
        }, $items);
    }
}
