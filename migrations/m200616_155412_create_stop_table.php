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
            'id_flight' => $this->integer(),
            'id_place' => $this->integer()
        ], 'engine=InnoDB');

        $this->addForeignKey(
            'fk_stop_flight',
            'stop',
            'id_flight',
            'flight',
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
        $this->dropTable('{{%stop}}');
    }
}
