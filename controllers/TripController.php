<?php

namespace app\controllers;

use app\models\Trip;
use app\models\Place;
use Yii;
use yii\web\Controller;


class TripController extends Controller
{
    public function actionSearch()
    {
        $from = Yii::$app->request->get('from');
        $to = Yii::$app->request->get('to');
        $places = Place::find()->all();

        $trip = Trip::find()
            ->where(['id_from' => $from])
            ->andWhere(['id_to' => $to])
            ->all();

        return $this->render('all', [
            'trips' => $trip,
            'places' => $places
        ]);
    }

    public function actionAll()
    {
        $trip = Trip::find()->all();
        $places = Place::find()->all();

        return $this->render('all', [
            'trips' => $trip,
            'places' => $places
        ]);
    }

    public function  actionSingle($id)
    {
        $trip = Trip::findOne($id);

        return $this->render('single', [
            'trip' => $trip
        ]);
    }
}