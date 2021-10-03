<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trip}}`.
 */
class m200616_150948_create_trip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trip}}', [
            'id' => $this->primaryKey(),
            'id_from' => $this->integer(),
            'id_to' => $this->integer(),
            'time_start' => $this->time(),
            'time_end' => $this->time(),
            'period' => $this->string(),
            'id_bus' => $this->integer()
        ], 'engine=InnoDB');

        $this->addForeignKey(
            'fk_trip_bus',
            'trip',
            'id_bus',
            'bus',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_trip_from',
            'trip',
            'id_from',
            'place',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_trip_to',
            'trip',
            'id_to',
            'place',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_trip_bus', 'trip');
        $this->dropForeignKey('fk_trip_from', 'trip');
        $this->dropForeignKey('fk_trip_to', 'trip');
        $this->dropTable('{{%trip}}');
    }
}
