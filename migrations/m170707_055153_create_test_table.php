<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `test`.
 */
class m170707_055153_create_test_table extends Migration
{
    public function up()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128).' DEFAULT NULL  COLLATE `utf8_unicode_ci`',
            'description' => Schema::TYPE_TEXT. ' DEFAULT NULL COLLATE `utf8_unicode_ci`',
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        $this->dropTable('test');
    }
}
