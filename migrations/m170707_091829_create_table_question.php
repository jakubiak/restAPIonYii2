<?php

use yii\db\Migration;
use yii\db\Schema;

class m170707_091829_create_table_question extends Migration
{
    public function safeUp()
    {
        $this->createTable('question', [
            'id' => $this->primaryKey(),
            'question_text' => Schema::TYPE_TEXT,
            'version_number' => Schema::TYPE_DOUBLE,
            'language_code' => $this->string(16),
            'question_type' => $this->string(16),
            'is_required' => $this->smallInteger(2),
            'selection_type' => $this->smallInteger(2),
            'display_order' => $this->integer(10),
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('question');
    }

}
