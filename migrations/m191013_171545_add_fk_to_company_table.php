<?php

use yii\db\Migration;

/**
 * Class m191013_171545_add_fk_to_company_table
 */
class m191013_171545_add_fk_to_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%article}}', 'news_company', $this->integer());

        $this->addForeignKey(
            'fk_news_company',
            'article',
            'news_company',
            'company',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191013_171545_add_fk_to_company_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191013_171545_add_fk_to_company_table cannot be reverted.\n";

        return false;
    }
    */
}
