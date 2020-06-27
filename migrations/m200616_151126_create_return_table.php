<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%return}}`.
 */
class m200616_151126_create_return_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%return}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_booking' => $this->integer(),
            'ticket' => $this->string()
        ], 'engine=InnoDB');

        $this->addForeignKey(
            'fk_return_user',
            'return',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_return_booking',
            'return',
            'id_booking',
            'booking',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%return}}');
    }
}
