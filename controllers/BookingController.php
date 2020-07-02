<?php

namespace app\controllers;

use app\models\Booking;
use app\models\Flight;
use app\models\Payment;
use app\models\Place;
use app\models\Returns;
use Yii;
use yii\web\Controller;


class BookingController extends Controller
{
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex($id)
    {
        $payments = Payment::find()->all();
        return $this->render('booking', [
            'flight' => $id,
            'payments' => $payments
        ]);
    }

    public function actionBooking($id)
    {
        $date = Yii::$app->request->post('date');

        $queryCaparity = Flight::find()->select(['flight.*', 'buses.bus.capacity'])
            ->joinWith('bus')
            ->where(['flight.id' => $id])
            ->one();
        $queryBooking = Booking::find()->select(['booking.*', 'SUM(amount) as amount'])
            ->where(['id_flight' => $id])
            ->andWhere(['date' => $date])
            ->all();

        $capacity = $queryCaparity->bus->capacity;
        $amount = $queryBooking[0]->amount;
        $amountBooking = Yii::$app->request->post('amount');

        if ($amountBooking < ($capacity - $amount)){

            $code = strval(random_int(1000000000, 9999999999));

            $values = [
                'date' => $date,//Yii::$app->request->post('date'),
                'amount' => $amountBooking,//Yii::$app->request->post('amount'),
                'code' => $code,//strval(random_int(1000000000, 9999999999)),
                'text' => Yii::$app->request->post('message'),

                'name' => Yii::$app->request->post('name'),
                'surname' => Yii::$app->request->post('surname'),
                'patronymic' => Yii::$app->request->post('patronymic'),
                'email' => Yii::$app->request->post('email'),
                'phone' => Yii::$app->request->post('phone'),

                'id_payment' => Yii::$app->request->post('payment'),
                'id_flight' => $id,
                'status' => 0,
            ];

            $booking = new Booking();
            $booking->attributes = $values;
            $booking->save();

            if ($amountBooking > 1)
                $msg = "Билеты забронированы!" . "</br>" . "Код бронирования: " . strval($code);
            else
                $msg = "Билет забронирован!"."</br>"."Код бронирования: " . strval($code);
            $msg2 = "Запомните этот код, он пригодиться для оплаты или отметы бронирования!";
            $error = 0;
        } else {
            if ($amountBooking > 1)
                $msg = "Билеты не забронированы!" . "</br>" . "Свободно мест на этот рейс: " . strval($capacity - $amount);
            else
                $msg = "Билет не забронирован!" . "</br>" . "Cвободных мест на этот рейс нет.";

            $msg2 = "Вы можете вернуться и выбрать другой рейс!";
            $error = 1;
        }

        Yii::$app->session->setFlash('Информация', $msg);

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

            $msg = "Код отправлен!";
            $msg2 = "В ближайше время с вами свяжется администратор!";
            $error = 0;
        }
        else {
            $msg = "Код не найден!";
            $msg2 = "Возможно вы ошиблись, попробуйте ввести код заново!";
            $error = 1;
        }

        return $this->render('../site/message', [
            'message' => $msg,
            'message2' => $msg2,
            'error' => $error
        ]);
    }
}