<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200616_150425_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'patronymic' => $this->string()->defaultValue(null),
            'email' => $this->string(),
            'password_hash' => $this->string(),
            'phone' => $this->string(),
            'status' => $this->integer()->defaultValue(0)
        ], 'engine=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
