<?php

namespace app\controllers;

use app\models\Flight;
use app\models\Place;
use Yii;
use yii\web\Controller;


class FlightController extends Controller
{
    public function actionSearch()
    {
        $from = Yii::$app->request->get('from');
        $to = Yii::$app->request->get('to');
        $places = Place::find()->all();

        $flight = Flight::find()
            ->where(['id_from' => $from])
            ->andWhere(['id_to' => $to])
            ->all();

        return $this->render('all', [
            'flights' => $flight,
            'places' => $places
        ]);
    }

    public function actionAll()
    {
        $flights = Flight::find()->all();
        $places = Place::find()->all();

        return $this->render('all', [
            'flights' => $flights,
            'places' => $places
        ]);
    }

    public function  actionSingle($id)
    {
        $flight = Flight::findOne($id);

        return $this->render('single', [
            'flight' => $flight
        ]);
    }
}