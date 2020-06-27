<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%atp}}`.
 */
class m200616_150506_create_atp_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%atp}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ], 'engine=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%atp}}');
    }
}
