<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Article
 * @package app\models
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property integer $category_id
 *
 * @property Category $category
 * @property Company $company
 */
class Article extends ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public $statusList = [
        self::STATUS_DRAFT => 'Draft',
        self::STATUS_PUBLISHED => 'Published',
    ];

    public function getStatusText()
    {
        return $this->statusList[$this->status];
    }

    public static function tableName()
    {
        return 'article';
    }

    public function rules()
    {
        return [
            ['title', 'string', 'length' => [10, 255]],
            [['title', 'status', 'category_id'], 'required'],
            ['status', 'in', 'range' => array_keys($this->statusList)],
            ['category_id', 'exist', 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            ['news_company', 'default', 'value' => null],
            [['content', 'status', 'category_id', 'news_company'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Содержание',
            'status' => 'Статус',
            'category_id' => 'Категория',
            'news_company' => 'Компания',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'news_company']);
    }

}