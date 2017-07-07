<?php

use yii\db\Migration;
use yii\db\Schema;

class m170707_090948_create_table_assesment extends Migration
{
    public function safeUp()
    {
        $this->createTable('assessment', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_TEXT,
            'version_number' => Schema::TYPE_DOUBLE,
            'language_code' => $this->string(16),
            'assessment_type' => $this->string(16),
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('assessment');
    }

}
