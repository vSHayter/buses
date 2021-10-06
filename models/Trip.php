<?php

namespace app\models;

/**
 * This is the model class for table "trip".
 *
 * @property int $id
 * @property int|null $id_from
 * @property int|null $id_to
 * @property string|null $time_start
 * @property string|null $time_end
 * @property string|null $period
 * @property int|null $id_bus
 *
 * @property Booking[] $bookings
 * @property Bus $bus
 * @property Place $from
 * @property Place $to
 * @property Stop[] $stops
 */
class Trip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_from', 'id_to', 'id_bus'], 'integer'],
            [['time_start', 'time_end'], 'safe'],
            [['period'], 'string', 'max' => 255],
            [['id_bus'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::class, 'targetAttribute' => ['id_bus' => 'id']],
            [['id_from'], 'exist', 'skipOnError' => true, 'targetClass' => Place::class, 'targetAttribute' => ['id_from' => 'id']],
            [['id_to'], 'exist', 'skipOnError' => true, 'targetClass' => Place::class, 'targetAttribute' => ['id_to' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_from' => 'Id From',
            'id_to' => 'Id To',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
            'period' => 'Period',
            'id_bus' => 'Id Bus',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::class, ['id_trip' => 'id']);
    }

    /**
     * Gets query for [[Bus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(Bus::class, ['id' => 'id_bus']);
    }

    /**
     * Gets query for [[From]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrom()
    {
        return $this->hasOne(Place::class, ['id' => 'id_from']);
    }

    /**
     * Gets query for [[To]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTo()
    {
        return $this->hasOne(Place::class, ['id' => 'id_to']);
    }

    /**
     * Gets query for [[Stops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStops()
    {
        return $this->hasMany(Stop::class, ['id_trip' => 'id']);
    }

}
