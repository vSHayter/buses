<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%flight}}`.
 */
class m200616_150948_create_flight_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%flight}}', [
            'id' => $this->primaryKey(),
            'from' => $this->integer(),
            'to' => $this->integer(),
            'time_start' => $this->time(),
            'time_end' => $this->time(),
            'period' => $this->string(),
            'id_bus' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk_flight_bus',
            'flight',
            'id_bus',
            'bus',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_flight_from',
            'flight',
            'from',
            'place',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_flight_to',
            'flight',
            'to',
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
        $this->dropTable('{{%flight}}');
    }
}
