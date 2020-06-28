<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $id_city
 *
 * @property Flight[] $flights
 * @property Flight[] $flights0
 * @property City $city
 * @property Stop[] $stops
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_city'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['id_city' => 'id']],
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
            'id_city' => 'Id City',
        ];
    }

    /**
     * Gets query for [[Flights]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flight::className(), ['from' => 'id']);
    }

    /**
     * Gets query for [[Flights0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlights0()
    {
        return $this->hasMany(Flight::className(), ['to' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'id_city']);
    }

    /**
     * Gets query for [[Stops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStops()
    {
        return $this->hasMany(Stop::className(), ['id_place' => 'id']);
    }

    public function saveCity($id_city)
    {
        $city = City::findOne($id_city);
        if($city != null)
        {
            $this->link('city', $city);
            return true;
        }
    }
}
