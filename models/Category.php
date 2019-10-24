<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Category
 * @package app\models
 *
 * @property integer $id
 * @property string $name
 */
class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }
}