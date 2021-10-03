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
            'text' => $this->text(),

            'name' => $this->string(),
            'surname' => $this->string(),
            'patronymic' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),

            'id_payment' => $this->integer(),
            'id_trip' => $this->integer(),
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
            'fk_booking_trip',
            'booking',
            'id_trip',
            'trip',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_booking_payment','booking');
        $this->dropForeignKey('fk_booking_trip','booking');
        $this->dropTable('{{%booking}}');
    }
}
