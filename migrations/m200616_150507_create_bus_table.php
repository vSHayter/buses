<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bus}}`.
 */
class m200616_150507_create_bus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bus}}', [
            'id' => $this->primaryKey(),
            'model' => $this->string(),
            'number' => $this->string(),
            'carrier' => $this->string(), //перевозчик
            'capacity' => $this->integer(), //вместимость
            'id_atp' => $this->integer()
        ], 'engine=InnoDB');

        $this->addForeignKey(
            'fk_bus_atp',
            'bus',
            'id_atp',
            'atp',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_bus_atp', 'bus');
        $this->dropTable('{{%bus}}');
    }
}
