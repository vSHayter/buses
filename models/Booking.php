<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $amount
 * @property string|null $code
 * @property string|null $text
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $id_payment
 * @property int|null $id_trip
 * @property int|null $status
 *
 * @property Trip $trip
 * @property Payment $payment
 * @property Returns[] $returns
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['amount', 'id_payment', 'id_trip', 'status'], 'integer'],
            [['text'], 'string'],
            [['code', 'name', 'surname', 'patronymic', 'email', 'phone'], 'string', 'max' => 255],
            [['id_trip'], 'exist', 'skipOnError' => true, 'targetClass' => Trip::class, 'targetAttribute' => ['id_trip' => 'id']],
            [['id_payment'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::class, 'targetAttribute' => ['id_payment' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'amount' => 'Amount',
            'code' => 'Code',
            'text' => 'Text',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'email' => 'Email',
            'phone' => 'Phone',
            'id_payment' => 'Id Payment',
            'id_trip' => 'Id Trip',
            'status' => 'Status',
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
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::class, ['id' => 'id_payment']);
    }

    /**
     * Gets query for [[Returns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturns()
    {
        return $this->hasMany(Returns::class, ['id_booking' => 'id']);
    }
}
