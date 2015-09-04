<?php

use yii\db\Schema;
use yii\db\Migration;

class m150813_192723_create_eventlog_tables extends Migration
{
    public function up()
    {
        $this->createTable('{{%eventlog_item}}', [
            'id'                =>  'BINARY(16) NOT NULL PRIMARY KEY',

            'type'              =>  Schema::TYPE_INTEGER . ' default 1 NOT NULL',
            'name'              =>  Schema::TYPE_STRING . ' NOT NULL',
            'data'              =>  Schema::TYPE_TEXT ,
            'account_id'        =>  'BINARY(16) NULL',

            'read_at'           =>  Schema::TYPE_INTEGER . ' NULL',
            'created_at'        =>  Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%eventlog_item}}');
    }

}
