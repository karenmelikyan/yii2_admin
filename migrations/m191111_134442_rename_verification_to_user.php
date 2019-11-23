<?php

use yii\db\Migration;

/**
 * Class m191111_134442_rename_verification_to_user
 */
class m191111_134442_rename_verification_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('verification', 'user');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191111_134442_rename_verification_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191111_134442_rename_verification_to_user cannot be reverted.\n";

        return false;
    }
    */
}
