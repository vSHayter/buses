<?php

namespace app\modules\admin\controllers;

use app\models\Bus;
use app\models\Place;
use Yii;
use app\models\Flight;
use app\models\FlightSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FlightController implements the CRUD actions for Flight model.
 */
class FlightController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Flight models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FlightSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flight model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Flight model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Flight();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Flight model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Flight model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Flight model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Flight the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flight::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetFromTo($id)
    {
        $flight = $this->findModel($id);
        $selectedFrom = $flight->from;
        $selectedTo = $flight->to;
        $fromTo = ArrayHelper::map(Place::find()->all(), 'id', 'name');

        if (Yii::$app->request->isPost) {
            $from = Yii::$app->request->post('from');
            $to = Yii::$app->request->post('to');
            if ($flight->saveFromTo($from, $to))
                return $this->redirect(['view', 'id' => $flight->id]);
        }

        return $this->render('fromTo', [
            'flight' => $flight,
            'selectedFrom' => $selectedFrom,
            'selectedTo' => $selectedTo,
            'fromTo' => $fromTo
        ]);
    }

    public function actionSetBus($id)
    {
        $flight = $this->findModel($id);
        $selectedBus = $flight->id_bus;
        $bus = ArrayHelper::map(Bus::find()->all(), 'id', 'model');

        if (Yii::$app->request->isPost) {
            $bus = Yii::$app->request->post('bus');
            if ($flight->saveBus($bus))
                return $this->redirect(['view', 'id' => $flight->id]);
        }

        return $this->render('bus', [
            'flight' => $flight,
            'selectedBus' => $selectedBus,
            'bus' => $bus
        ]);
    }

    public function actionSetStop($id)
    {
        $flight = $this->findModel($id);
        $selectedStop = $flight->selectedStops;
        $place = ArrayHelper::map(Place::find()->all(), 'id', 'name');

        if (Yii::$app->request->isPost) {
            $place = Yii::$app->request->post('place');
            //var_dump($flight->saveStops($place));die;
            if ($flight->saveStops($place))
                return $this->redirect(['view', 'id' => $flight->id]);
        }

        return $this->render('stop', [
            'flight' => $flight,
            'selectedStop' => $selectedStop,
            'place' => $place
        ]);
    }
}
