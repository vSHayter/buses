<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guest}}`.
 */
class m200616_061836_create_guest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%guest}}', [
            'id' => $this->primaryKey(),

        ], "engine=InnoDB");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%guest}}');
    }
}
