<?php

use yii\db\Migration;

/**
 * Class m181223_150709_Add_country_id_to_users_table
 */
class m181223_150709_Add_country_id_to_users_table extends Migration
{
    
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        // Add the column
        Yii::$app->db->createCommand("
            ALTER TABLE user ADD COLUMN country_id smallint(5) UNSIGNED AFTER id"
        )->execute();

        // Add the constraint
        Yii::$app->db->createCommand("
            ALTER TABLE user 
            ADD CONSTRAINT fk_country_id 
            FOREIGN KEY (country_id) REFERENCES country(id) 
            ON DELETE SET NULL ON UPDATE CASCADE"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        // Delete the constraint
        Yii::$app->db->createCommand("
            ALTER TABLE user 
            DROP FOREIGN KEY fk_country_id"
        )->execute();

        // Delete the index
        Yii::$app->db->createCommand("
            ALTER TABLE user 
            DROP INDEX fk_country_id"
        )->execute();

        // Delete the column
        Yii::$app->db->createCommand("
            ALTER TABLE user DROP COLUMN country_id"
        )->execute();
    }
    
}
