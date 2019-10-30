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
 * @property integer status
 *
 * @property Category $category
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
            [['title', 'status'], 'required'],
            ['status', 'in', 'range' => array_keys($this->statusList)],
            ['news_category', 'exist', 'targetClass' => Category::class, 'targetAttribute' => ['news_category' => 'id']],
            [['content', 'status', 'news_category', 'news_company'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Титр',
            'status' => 'Статус',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'news_category']);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'news_company']);
    }

}