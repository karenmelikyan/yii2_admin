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
    public function rules()
    {
        return [
            [['name'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название категории',
        ];
    }

    public static function tableName()
    {
        return 'category';
    }
}