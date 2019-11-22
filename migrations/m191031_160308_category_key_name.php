<?php

use yii\db\Migration;

/**
 * Class m191031_160308_category_key_name
 */
class m191031_160308_category_key_name extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%article}}', 'news_category', 'category_id');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('{{%article}}', 'category_id', 'news_category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191031_160308_category_key_name cannot be reverted.\n";

        return false;
    }
    */
}
