<?php

use yii\db\Migration;

/**
 * Class m181231_001632_Alter_table_stock_drop_record_hash
 */
class m181231_001632_Alter_table_stock_drop_record_hash extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        // Delete the column
        Yii::$app->db->createCommand("
            ALTER TABLE stock DROP COLUMN record_hash"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE stock ADD COLUMN record_hash varchar(40) NOT NULL AFTER logo_url"
        )->execute();
    }
    
}
