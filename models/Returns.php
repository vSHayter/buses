<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "returns".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_booking
 * @property string|null $ticket
 *
 * @property Booking $booking
 * @property User $user
 */
class Returns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'returns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_booking'], 'integer'],
            [['ticket'], 'string', 'max' => 255],
            [['id_booking'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['id_booking' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_booking' => 'Id Booking',
            'ticket' => 'Ticket',
        ];
    }

    /**
     * Gets query for [[Booking]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooking()
    {
        return $this->hasOne(Booking::className(), ['id' => 'id_booking']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
