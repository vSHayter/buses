<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stop}}`.
 */
class m200616_155412_create_stop_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stop}}', [
            'id' => $this->primaryKey(),
            'id_trip' => $this->integer(),
            'id_place' => $this->integer()
        ], 'engine=InnoDB');

        $this->addForeignKey(
            'fk_stop_trip',
            'stop',
            'id_trip',
            'trip',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_stop_place',
            'stop',
            'id_place',
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
        $this->dropForeignKey('fk_stop_trip','stop');
        $this->dropForeignKey('fk_stop_place','stop');
        $this->dropTable('{{%stop}}');
    }
}
