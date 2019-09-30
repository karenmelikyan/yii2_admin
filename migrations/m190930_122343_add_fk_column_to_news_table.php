<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%news}}`.
 */
class m190930_122343_add_fk_column_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // add column to news table
        $this->addColumn('{{%news}}', 'news_category', $this->integer());

        // add foreign key for table `news` with reference on `category`
        $this->addForeignKey(
            'fk_news_category',
            'news',
            'news_category',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
