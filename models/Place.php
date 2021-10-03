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
 * @property Trip[] $trip
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
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
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
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function Trips()
    {
        return $this->hasMany(Trip::class, ['from' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id_city']);
    }

    /**
     * Gets query for [[Stops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStops()
    {
        return $this->hasMany(Stop::class, ['id_place' => 'id']);
    }

}
