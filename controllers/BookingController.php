<?php

namespace app\controllers;

use app\models\Booking;
use app\models\Trip;
use app\models\Payment;
use app\models\Place;
use app\models\Returns;
use Yii;
use yii\web\Controller;


class BookingController extends Controller
{

    public function actionIndex($id)
    {
        $payments = Payment::find()->all();

        return $this->render('booking', [
            'trip' => $id,
            'payments' => $payments
        ]);
    }

    public function actionBooking($id)
    {
        $trip = Trip::find()->where(['id' => $id])->one();
        $queryBooking = Booking::find()->select(['SUM(amount) as amount'])
            ->where(['id_trip' => $id])
            ->andWhere(['date' => Yii::$app->request->post()['Booking']['date']])
            ->all();

        if (Yii::$app->request->post()['Booking']['amount'] < ($trip->bus->capacity - $queryBooking[0]->amount)) {

            $values = [
                'code' => strval(random_int(1000000000, 9999999999)),
                'id_trip' => $id,
                'status' => 0,
            ];

            $booking = new Booking(Yii::$app->request->post('Booking'));
            $booking->attributes = $values;
            $booking->save();

            $msg = 'Бронирование прошло успешно!' . '</br>' . 'Код бронирования: ' . $values['code'];
            $msg2 = 'Запомните этот код, он пригодиться для оплаты или отметы бронирования!';
            $error = 0;
        } else {
            $msg = 'Бронирование не прошло!' . '</br>' . 'Недостаточно свободных мест. Свободных мест на этот рейс: ' . strval($trip->bus->capacity - $queryBooking[0]->amount);
            $msg2 = 'Вы можете вернуться и выбрать другой рейс!';
            $error = 1;
        }

        //Yii::$app->session->setFlash('Информация', $msg);

        return $this->render('../site/message', [
            'message' => $msg,
            'message2' => $msg2,
            'error' => $error
        ]);
    }

    public function actionCancel()
    {
        return $this->render('cancel');
    }

    public function actionDrop()
    {
        $code = Yii::$app->request->post('code');

        $query = Booking::find()
            ->where(['code' => $code])
            ->andWhere(['<','status', 5])
            ->one();

        if ($query) {
            $values = [
                'id_user' => Yii::$app->user->identity->getId(),
                'id_booking' => $query->id,
                'ticket' => $code
            ];

            $return = new Returns();
            $return->attributes = $values;
            $return->save();

            $query->status = 5;
            $query->save();

            $msg = 'Код отправлен!';
            $msg2 = 'В ближайше время с вами свяжется администратор!';
            $error = 0;
        }
        else {
            $msg = 'Код не найден!';
            $msg2 = 'Возможно вы ошиблись, попробуйте ввести код заново!';
            $error = 1;
        }

        return $this->render('../site/message', [
            'message' => $msg,
            'message2' => $msg2,
            'error' => $error
        ]);
    }
}