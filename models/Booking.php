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
 * @property int|null $id_payment
 * @property int|null $id_user
 * @property int|null $id_flight
 * @property int|null $status
 *
 * @property Flight $flight
 * @property Payment $payment
 * @property User $user
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
            [['amount', 'id_payment', 'id_user', 'id_flight', 'status'], 'integer'],
            [['code'], 'string', 'max' => 255],
            [['id_flight'], 'exist', 'skipOnError' => true, 'targetClass' => Flight::className(), 'targetAttribute' => ['id_flight' => 'id']],
            [['id_payment'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::className(), 'targetAttribute' => ['id_payment' => 'id']],
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
            'date' => 'Date',
            'amount' => 'Amount',
            'code' => 'Code',
            'id_payment' => 'Id Payment',
            'id_user' => 'Id User',
            'id_flight' => 'Id Flight',
            'status' => 'Status',
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
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['id' => 'id_payment']);
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

    /**
     * Gets query for [[Returns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturns()
    {
        return $this->hasMany(Returns::className(), ['id_booking' => 'id']);
    }
}
