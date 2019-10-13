<?php

use yii\db\Migration;

/**
 * Class m191013_170604_reneme_news_to_article
 */
class m191013_170604_reneme_news_to_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('news', 'article');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191013_170604_reneme_news_to_article cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191013_170604_reneme_news_to_article cannot be reverted.\n";

        return false;
    }
    */
}
