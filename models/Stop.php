<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stop".
 *
 * @property int $id
 * @property int|null $id_trip
 * @property int|null $id_place
 *
 * @property Trip $trip
 * @property Place $place
 */
class Stop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_trip', 'id_place'], 'integer'],
            [['id_trip'], 'exist', 'skipOnError' => true, 'targetClass' => Trip::class, 'targetAttribute' => ['id_trip' => 'id']],
            [['id_place'], 'exist', 'skipOnError' => true, 'targetClass' => Place::class, 'targetAttribute' => ['id_place' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_trip' => 'Id Trip',
            'id_place' => 'Id Place',
        ];
    }

    /**
     * Gets query for [[Trip]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrip()
    {
        return $this->hasOne(Trip::class, ['id' => 'id_trip']);
    }

    /**
     * Gets query for [[Place]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::class, ['id' => 'id_place']);
    }
}
