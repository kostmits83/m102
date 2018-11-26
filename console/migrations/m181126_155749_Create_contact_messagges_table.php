<?php

use yii\db\Migration;

/**
 * Class m181126_155749_Create_contact_messagges_table
 */
class m181126_155749_Create_contact_messagges_table extends Migration
{
    const TABLE_NAME = 'contact_message';
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        // Let's keep it simple using plain SQL instead of Yii Migration methods
        Yii::$app->db->createCommand("
            CREATE TABLE IF NOT EXISTS " . self::TABLE_NAME . " (
                id bigint(20) unsigned NOT NULL,
                name varchar(100) NOT NULL,
                email varchar(255) NOT NULL,
                message text NOT NULL,
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
        $this->dropTable(self::TABLE_NAME);
    }
    
}
