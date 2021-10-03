<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%return}}`.
 */
class m200616_151126_create_returns_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%returns}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_booking' => $this->integer(),
            'ticket' => $this->string()
        ], 'engine=InnoDB');

        $this->addForeignKey(
            'fk_returns_user',
            'returns',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_returns_booking',
            'returns',
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
        $this->dropForeignKey('fk_returns_user','returns');
        $this->dropForeignKey('fk_returns_booking','returns');
        $this->dropTable('{{%returns}}');
    }
}
