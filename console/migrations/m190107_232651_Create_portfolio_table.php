<?php

use yii\db\Migration;

/**
 * Class m190107_232651_Create_portfolio_table
 */
class m190107_232651_Create_portfolio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
    	Yii::$app->db->createCommand("
            CREATE TABLE IF NOT EXISTS portfolio (
                id int(11) unsigned NOT NULL auto_increment,
                user_id int(11) unsigned NOT NULL,
                stock_id int(11) unsigned NOT NULL,
                shares int(11) unsigned NOT NULL,
                value float(9,2) unsigned NOT NULL,
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
       $this->dropTable('portfolio');
    }
    
}
