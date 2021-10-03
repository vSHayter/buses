<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property int $id
 * @property string|null $model
 * @property string|null $number
 * @property string|null $carrier
 * @property int|null $capacity
 * @property int|null $id_atp
 *
 * @property Atp $atp
 * @property Trip[] $trip
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['capacity', 'id_atp'], 'integer'],
            [['model', 'number', 'carrier'], 'string', 'max' => 255],
            [['id_atp'], 'exist', 'skipOnError' => true, 'targetClass' => Atp::class, 'targetAttribute' => ['id_atp' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'number' => 'Number',
            'carrier' => 'Carrier',
            'capacity' => 'Capacity',
            'id_atp' => 'Id Atp',
        ];
    }

    /**
     * Gets query for [[Atp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtp()
    {
        return $this->hasOne(Atp::class, ['id' => 'id_atp']);
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::class, ['id_bus' => 'id']);
    }

}
