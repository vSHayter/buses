<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stop".
 *
 * @property int $id
 * @property int|null $id_flight
 * @property int|null $id_place
 *
 * @property Flight $flight
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
            [['id_flight', 'id_place'], 'integer'],
            [['id_flight'], 'exist', 'skipOnError' => true, 'targetClass' => Flight::className(), 'targetAttribute' => ['id_flight' => 'id']],
            [['id_place'], 'exist', 'skipOnError' => true, 'targetClass' => Place::className(), 'targetAttribute' => ['id_place' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_flight' => 'Id Flight',
            'id_place' => 'Id Place',
        ];
    }

    /**
     * Gets query for [[Flight]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlight()
    {
        return $this->hasOne(Flight::className(), ['id' => 'id_flight']);
    }

    /**
     * Gets query for [[Place]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'id_place']);
    }
}
