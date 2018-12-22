<?php

use yii\db\Migration;

/**
 * Class m181222_184942_Add_account_activation_token_to_user_table
 */
class m181222_184942_Add_account_activation_token_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        // Add the column
        Yii::$app->db->createCommand("
            ALTER TABLE user ADD COLUMN account_activation_token varchar(255) AFTER status"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE user DROP COLUMN account_activation_token"
        )->execute();
    }
    
}
