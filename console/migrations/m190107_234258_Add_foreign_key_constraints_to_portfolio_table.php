<?php

use yii\db\Migration;

/**
 * Class m190107_234258_Add_foreign_key_constraints_to_portfolio_table
 */
class m190107_234258_Add_foreign_key_constraints_to_portfolio_table extends Migration
{
    
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        // Add the constraint
        Yii::$app->db->createCommand("
            ALTER TABLE portfolio 
            ADD CONSTRAINT fk_user_id 
            FOREIGN KEY (user_id) REFERENCES user(id)
            ON DELETE CASCADE ON UPDATE CASCADE"
        )->execute();

        // Add the constraint
        Yii::$app->db->createCommand("
            ALTER TABLE portfolio 
            ADD CONSTRAINT fk_stock_id 
            FOREIGN KEY (stock_id) REFERENCES stock(id)
            ON DELETE CASCADE ON UPDATE CASCADE"
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        // Delete the constraint
        Yii::$app->db->createCommand("
            ALTER TABLE portfolio 
            DROP FOREIGN KEY fk_user_id"
        )->execute();

        // Delete the index
        Yii::$app->db->createCommand("
            ALTER TABLE portfolio 
            DROP INDEX fk_user_id"
        )->execute();

        // Delete the constraint
        Yii::$app->db->createCommand("
            ALTER TABLE portfolio 
            DROP FOREIGN KEY fk_stock_id"
        )->execute();

        // Delete the index
        Yii::$app->db->createCommand("
            ALTER TABLE portfolio 
            DROP INDEX fk_stock_id"
        )->execute();
    }
    
}
