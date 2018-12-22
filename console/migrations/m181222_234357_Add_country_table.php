<?php

use yii\db\Migration;

/**
 * Class m181222_234357_Add_country_table
 */
class m181222_234357_Add_country_table extends Migration
{
    
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            CREATE TABLE IF NOT EXISTS country (
                id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
                abbr varchar(5) NOT NULL,
                name varchar(255) NOT NULL,
                long_name varchar(255) DEFAULT NULL,
                phone_code varchar(5) DEFAULT NULL,
                is_active tinyint(3) unsigned NOT NULL DEFAULT '0',
                PRIMARY KEY(id)
            ) CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('country');
    }
    
}
