<?php

use yii\db\Migration;

/**
 * Class m190103_115131_Create_favorites_table
 */
class m190103_115131_Create_favorites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            CREATE TABLE IF NOT EXISTS stock_favorite (
                id int(11) unsigned NOT NULL auto_increment,
                user_id unsigned NOT NULL,
                stock_id unsigned NOT NULL,
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
        $this->dropTable('stock_favorite');
    }
    
}
