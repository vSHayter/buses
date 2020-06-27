<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m200616_150552_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()
            /*'id_booking' => $this->integer(),
            'id_user' => $this->integer(),
            'status' => $this->integer()*/
        ], 'engine=InnoDB');

/*        $this->addForeignKey(
            'fk_payment_booking',
            'payment',
            'id_booking',
            'booking',
            'id',
            'DELETE'
        );

        $this->addForeignKey(
            'fk_payment_user',
            'payment',
            'id_user',
            'user',
            'id',
            'DELETE'
        );*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment}}');
    }
}
