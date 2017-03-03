<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `catalogue`.
 */
class m170301_174623_create_list_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalogue', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING.' NOT NULL',
            'description' => Schema::TYPE_TEXT.' NOT NULL',
            'done' => Schema::TYPE_BOOLEAN.' DEFAULT 0',
            'created_at' => Schema::TYPE_INTEGER.' NOT NULL',  //время создания задания
            'updated_at' => Schema::TYPE_INTEGER.' NOT NULL',  //время изменения задания
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalogue');
    }
}
