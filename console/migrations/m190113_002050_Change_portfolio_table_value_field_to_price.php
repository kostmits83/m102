<?php

use yii\db\Migration;

/**
 * Class m190113_002050_Change_portfolio_table_value_field_to_price
 */
class m190113_002050_Change_portfolio_table_value_field_to_price extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE portfolio CHANGE `value` `price` float(9,2) unsigned NOT NULL"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        Yii::$app->db->createCommand("
            ALTER TABLE portfolio CHANGE `price` `value` float(9,2) unsigned NOT NULL"
        )->execute();
    }
    
}
