<?php

use yii\db\Schema;
use yii\db\Migration;

class m151226_111407_init extends Migration
{
    public function up()
    {
        $this->createTable('{{%html}}', [
            'id' => Schema::TYPE_PK,
            'key' => Schema::TYPE_STRING . ' NOT NULL',
            'value' => Schema::TYPE_TEXT,
        ]);
        $this->createTable('{{%less}}', [
            'id' => Schema::TYPE_PK,
            'key' => Schema::TYPE_STRING . ' NOT NULL',
            'value' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        echo "m151226_111407_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
