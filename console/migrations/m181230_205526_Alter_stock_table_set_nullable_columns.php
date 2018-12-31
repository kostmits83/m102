<?php

use yii\db\Migration;

/**
 * Class m181230_205526_Alter_stock_table_set_nullable_columns
 */
class m181230_205526_Alter_stock_table_set_nullable_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE stock 
                MODIFY COLUMN date date NULL,
                MODIFY COLUMN isEnabled boolean NULL,
                MODIFY COLUMN type varchar(255) NULL,
                MODIFY COLUMN iexId varchar(255) NULL,
                MODIFY COLUMN exchange varchar(255) NULL,
                MODIFY COLUMN industry varchar(255) NULL,
                MODIFY COLUMN website varchar(255) NULL,
                MODIFY COLUMN description text NULL,
                MODIFY COLUMN CEO varchar(255) NULL,
                MODIFY COLUMN sector varchar(255) NULL,
                MODIFY COLUMN tags JSON NULL,
                MODIFY COLUMN logo_url varchar(255) NULL,
                MODIFY COLUMN record_hash varchar(255) NULL
        ")->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m181230_205526_Alter_stock_table_set_nullable_columns cannot be reverted.\n";
        return true;
    }
    
}
