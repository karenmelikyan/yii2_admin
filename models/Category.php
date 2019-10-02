<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Category
 * @package app\models
 */
class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }
}