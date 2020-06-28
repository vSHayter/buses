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
 * @property Flight[] $flights
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
            [['id_atp'], 'exist', 'skipOnError' => true, 'targetClass' => Atp::className(), 'targetAttribute' => ['id_atp' => 'id']],
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
        return $this->hasOne(Atp::className(), ['id' => 'id_atp']);
    }

    /**
     * Gets query for [[Flights]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flight::className(), ['id_bus' => 'id']);
    }

    public function saveAtp($id_atp)
    {
        $atp = Atp::findOne($id_atp);
        if ($atp != null)
        {
            $this->link('atp', $atp);
            return true;
        }
    }
}
