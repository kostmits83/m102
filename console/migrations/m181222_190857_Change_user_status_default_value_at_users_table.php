<?php

use yii\db\Migration;

/**
 * Class m181222_190857_Change_user_status_default_value_at_users_table
 */
class m181222_190857_Change_user_status_default_value_at_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        // Add the column
        Yii::$app->db->createCommand("
            ALTER TABLE user MODIFY COLUMN status smallint(6) UNSIGNED NOT NULL DEFAULT '1'"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE user MODIFY COLUMN status smallint(6) NOT NULL DEFAULT '10'"
        )->execute();
    }
}
