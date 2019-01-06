<?php

use yii\db\Migration;

/**
 * Class m190106_155517_Create_ip_access_table
 */
class m190106_155517_Create_ip_access_table extends Migration
{
    
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            CREATE TABLE IF NOT EXISTS ip_access (
                id int(11) unsigned NOT NULL auto_increment,
                ip varchar(255) UNIQUE NOT NULL,
                created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at timestamp NULL DEFAULT NULL,
                PRIMARY KEY(id)
            ) CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('ip_access');
    }
    
}
