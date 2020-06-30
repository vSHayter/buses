<?php

namespace app\controllers;

use app\models\Booking;
use app\models\Flight;
use app\models\Guest;
use app\models\Payment;
use app\models\Place;
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
        $places = Place::find()->all();
        $flights = Flight::find()->limit(3)->all();

        $values = [
            'date' => Yii::$app->request->post('date'),
            'amount' => Yii::$app->request->post('amount'),
            'code' => strval(random_int(1000000000, 9999999999)),
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

        return $this->render('../site/index', [
            'places' => $places,
            'flights' => $flights
            ]);
    }
}