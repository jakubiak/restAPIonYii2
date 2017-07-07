<?php

use yii\db\Migration;
use yii\db\Schema;

class m170707_091846_create_table_answear extends Migration
{
    public function safeUp()
    {
        $this->createTable('answer', [
            'id' => $this->primaryKey(),
            'question_id' => Schema::TYPE_INTEGER,
            'answer_text' => Schema::TYPE_TEXT,
            'answer_image' => Schema::TYPE_TEXT,
            'is_default' => $this->smallInteger(),
            'answer_score' => $this->double(),
            'version_number' => Schema::TYPE_DOUBLE,
            'display_order' => $this->integer(10),
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('answer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170707_091846_create_table_answear cannot be reverted.\n";

        return false;
    }
    */
}
