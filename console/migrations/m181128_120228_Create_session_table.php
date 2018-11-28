<?php

use yii\db\Migration;

/**
 * Class m181128_120228_Create_session_table
 */
class m181128_120228_Create_session_table extends Migration
{
    public function up()
    {
        $tableOptions = null;

        // here we will set data type for some popular DBMS, if your DBMS is not listed,
        // you will have to update this code
        if ($this->db->driverName === 'mysql') 
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            $dataType = 'LONGBLOB';
        }
        elseif ($this->db->driverName === 'pgsql') 
        {
            $dataType = 'BYTEA';
        }
        else
        {
            // mssql, oracle, sqlite, cubrid
            $dataType = 'BLOB';
        }

        $this->createTable('{{%session}}', [
            'id' => 'CHAR(64) NOT NULL PRIMARY KEY',
            'expire' => 'INT NOT NULL',
            'data' => ''.$dataType.' NOT NULL',
            'user_id' => 'BIGINT UNSIGNED',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%session}}');
    }

}
