<?php

use yii\db\Migration;

/**
 * Class m181218_181817_Remove_username_from_user_table
 */
class m181218_181817_Remove_username_from_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        // Delete the index
        Yii::$app->db->createCommand("
            ALTER TABLE user DROP INDEX username"
        )->execute();

        // Delete the column
        Yii::$app->db->createCommand("
            ALTER TABLE user DROP COLUMN username"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        // Add the column
        Yii::$app->db->createCommand("
            ALTER TABLE user ADD COLUMN username varchar(255) UNIQUE AFTER id"
        )->execute();

        // Create the index
        /*Yii::$app->db->createCommand("
            ALTER TABLE user ADD INDEX username (username)"
        )->execute();*/
    }
    
}
