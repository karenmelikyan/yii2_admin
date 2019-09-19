<?php

use yii\db\Migration;

/**
 * Class m190919_151945_add_status_to_news
 */
class m190919_151945_add_status_to_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%news}}', 'status', $this->tinyInteger()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('{{%news}}', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190919_151945_add_status_to_news cannot be reverted.\n";

        return false;
    }
    */
}
