<?php

use yii\db\Migration;

/**
 * Class m191105_044351_verification
 */
class m191105_044351_verification extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%verification}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'mail' => $this->text()->notNull(),
            'password' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%verification}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191105_044351_verification cannot be reverted.\n";

        return false;
    }
    */
}
