<?php

use yii\db\Migration;

/**
 * Class m190103_160823_Alter_user_table_id_unsigned
 */
class m190103_160823_Alter_user_table_id_unsigned extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("ALTER TABLE user MODIFY COLUMN id int(11) UNSIGNED NOT NULL AUTO_INCREMENT")->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        Yii::$app->db->createCommand("ALTER TABLE user MODIFY COLUMN id int(11) NOT NULL AUTO_INCREMENT")->execute();
    }

}
