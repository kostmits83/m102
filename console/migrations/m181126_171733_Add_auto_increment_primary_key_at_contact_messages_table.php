<?php

use yii\db\Migration;

/**
 * Class m181126_171733_Add_auto_increment_primary_key_at_contact_messages_table
 */
class m181126_171733_Add_auto_increment_primary_key_at_contact_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE contact_message MODIFY id bigint(20) AUTO_INCREMENT"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m181126_171733_Add_auto_increment_primary_key_at_contact_messages_table cannot be reverted.\n";
        return false;
    }
    
}
