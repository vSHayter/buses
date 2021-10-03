<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atp".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Bus[] $buses
 */
class Atp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Buses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuses()
    {
        return $this->hasMany(Bus::class, ['id_atp' => 'id']);
    }
}
