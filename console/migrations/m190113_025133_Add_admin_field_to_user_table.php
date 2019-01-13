<?php

use yii\db\Migration;

/**
 * Class m190113_025133_Add_admin_field_to_user_table
 */
class m190113_025133_Add_admin_field_to_user_table extends Migration
{
    
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE user 
            ADD COLUMN is_admin tinyint(3) unsigned DEFAULT 0 NOT NULL AFTER status"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE user 
            DROP COLUMN is_admin"
        )->execute();
    }
    
}
