<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "flight".
 *
 * @property int $id
 * @property int|null $from
 * @property int|null $to
 * @property string|null $time_start
 * @property string|null $time_end
 * @property string|null $period
 * @property int|null $id_bus
 *
 * @property Booking[] $bookings
 * @property Bus $bus
 * @property Place $from0
 * @property Place $to0
 * @property Stop[] $stops
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from', 'to', 'id_bus'], 'integer'],
            [['time_start', 'time_end'], 'safe'],
            [['period'], 'string', 'max' => 255],
            [['id_bus'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['id_bus' => 'id']],
            [['from'], 'exist', 'skipOnError' => true, 'targetClass' => Place::className(), 'targetAttribute' => ['from' => 'id']],
            [['to'], 'exist', 'skipOnError' => true, 'targetClass' => Place::className(), 'targetAttribute' => ['to' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
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
        return $this->hasMany(Booking::className(), ['id_flight' => 'id']);
    }

    /**
     * Gets query for [[Bus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(Bus::className(), ['id' => 'id_bus']);
    }

    /**
     * Gets query for [[From0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrom()
    {
        return $this->hasOne(Place::className(), ['id' => 'from']);
    }

    /**
     * Gets query for [[To0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTo()
    {
        return $this->hasOne(Place::className(), ['id' => 'to']);
    }

    /**
     * Gets query for [[Stops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStops()
    {
        return $this->hasMany(Stop::className(), ['id_flight' => 'id']);
    }

    public function saveFromTo($id_from, $id_to)
    {
        $from = Place::findOne($id_from);
        $to = Place::findOne($id_to);
        if ($from && $to != null) {
            $this->link('from', $from);
            $this->link('to', $to);
            return true;
        }
    }

    public function saveBus($id_bus)
    {
        $bus = Bus::findOne($id_bus);
        if ($bus != null){
            $this->link('bus', $bus);
            return true;
        }
    }

    //STOP
    public function getStop()
    {
        return $this->hasMany(Place::class, ['id' => 'id_place'])
            ->viaTable('stop', ['id_flight' => 'id']);
    }

    public function getSelectedStops()
    {
        $selectedStops = $this->getStop()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedStops, 'id');
    }

    public function saveStops($stops)
    {
        if(is_array($stops))
        {
            $this->clearCurrentStops();

            foreach ($stops as $id_stop)
            {
                $stop = Place::findOne($id_stop);
                $this->link('stop', $stop);
            }
        }
        return true;
    }

    public function clearCurrentStops()
    {
        Stop::deleteAll(['id_flight'=>$this->id]);
    }
}
