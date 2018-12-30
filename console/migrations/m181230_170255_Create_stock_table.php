<?php

use yii\db\Migration;

/**
 * Class m181230_170255_Create_stock_table
 */
class m181230_170255_Create_stock_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            CREATE TABLE IF NOT EXISTS stock (
                id int(11) unsigned NOT NULL auto_increment,
                symbol varchar(255) NOT NULL UNIQUE,
                name varchar(255) NOT NULL,
                date date NOT NULL,
                isEnabled boolean NOT NULL,
                type varchar(255) NOT NULL,
                iexId varchar(255) NOT NULL,
                exchange varchar(255) NOT NULL,
                industry varchar(255) NOT NULL,
                website varchar(255) NOT NULL,
                description text NOT NULL,
                CEO varchar(255) NOT NULL,
                issueType varchar(255) NOT NULL,
                sector varchar(255) NOT NULL,
                tags JSON,
                logo_url varchar(255),
                record_hash varchar(40) NOT NULL,
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
        $this->dropTable('stock');
    }
    
}
