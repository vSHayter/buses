<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%place}}`.
 */
class m200616_150420_create_place_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%place}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'id_city' => $this->integer()
        ], 'engine=InnoDB');

        $this->addForeignKey(
            'fm_place_city',
            'place',
            'id_city',
            'city',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fm_place_city', 'place');
        $this->dropTable('{{%place}}');
    }
}
