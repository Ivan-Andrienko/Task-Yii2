<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `users`.
 */
class m170228_151831_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING.' NOT NULL',
            'email' => Schema::TYPE_STRING.' NOT NULL',
            'password_hash' => Schema::TYPE_STRING.' NOT NULL',
            'status' => Schema::TYPE_SMALLINT.' NOT NULL',      // 0-удалён, 10-исполнитель, 20-менеджер
            'auth_key' => Schema::TYPE_STRING.'(32) NOT NULL', //ключ для "запомнить меня"
            'created_at' => Schema::TYPE_INTEGER.' NOT NULL',  //время создания user
            'updated_at' => Schema::TYPE_INTEGER.' NOT NULL',  //время изменения user
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
