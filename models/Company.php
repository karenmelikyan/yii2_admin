<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 */
class Company extends \yii\db\ActiveRecord
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
            'name' => 'Название компании',
        ];
    }

    public static function tableName()
    {
        return 'company';
    }
}
