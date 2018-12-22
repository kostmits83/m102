<?php

use yii\db\Migration;

/**
 * Class m181222_224143_Add_profile_fields_to_user_table
 */
class m181222_224143_Add_profile_fields_to_user_table extends Migration
{    
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE user 
            ADD COLUMN firstname varchar(40) AFTER account_activation_token,
            ADD COLUMN lastname varchar(40) AFTER firstname,
            ADD COLUMN birthdate date AFTER lastname,
            ADD COLUMN last_login datetime AFTER birthdate"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE user 
            DROP COLUMN firstname, 
            DROP COLUMN lastname, 
            DROP COLUMN birthdate, 
            DROP COLUMN last_login"
        )->execute();
    }
    
}
