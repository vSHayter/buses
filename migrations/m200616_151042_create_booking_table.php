<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%booking}}`.
 */
class m200616_151042_create_booking_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%booking}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'amount' => $this->integer(),
            'code' => $this->string(),
            'id_payment' => $this->integer(),
            'id_user' => $this->integer(),
            'id_flight' => $this->integer(),
            'status' => $this->integer()
        ], 'engine=InnoDB');

        $this->addForeignKey(
            'fk_booking_payment',
            'booking',
            'id_payment',
            'payment',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_booking_user',
            'booking',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_booking_flight',
            'booking',
            'id_flight',
            'flight',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%booking}}');
    }
}
