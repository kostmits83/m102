<?php

use yii\db\Migration;

/**
 * Class m190103_161239_Create_favorite_comparison_stock_users
 */
class m190103_161239_Create_favorite_comparison_stock_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            CREATE TABLE IF NOT EXISTS user_stock_favors (
                id int(11) unsigned NOT NULL auto_increment,
                user_id int(11) unsigned NOT NULL,
                stock_id int(11) unsigned NOT NULL,
                type_id tinyint(3) unsigned NOT NULL,
                created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at timestamp NULL DEFAULT NULL,
                PRIMARY KEY(id),
                FOREIGN KEY(user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY(stock_id) REFERENCES stock(id) ON DELETE CASCADE ON UPDATE CASCADE
            ) CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('user_stock_favors');
    }
}
