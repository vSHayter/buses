<?php

namespace app\modules\admin\controllers;

use app\models\Bus;
use app\models\Place;
use Yii;
use app\modules\admin\models\TripAdmin;
use app\models\TripSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TripController implements the CRUD actions for Trip model.
 */
class TripController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Trip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TripSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trip model.
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
     * Creates a new Trip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TripAdmin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trip model.
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
     * Deletes an existing Trip model.
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
     * Finds the Trip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TripAdmin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TripAdmin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetFromTo($id)
    {
        $trip = $this->findModel($id);
        $selectedFrom = $trip->from;
        $selectedTo = $trip->to;
        $fromTo = ArrayHelper::map(Place::find()->all(), 'id', 'name');

        if (Yii::$app->request->isPost) {
            $from = Yii::$app->request->post('from');
            $to = Yii::$app->request->post('to');
            if ($trip->saveFromTo($from, $to))
                return $this->redirect(['view', 'id' => $trip->id]);
        }

        return $this->render('fromTo', [
            'trip' => $trip,
            'selectedFrom' => $selectedFrom,
            'selectedTo' => $selectedTo,
            'fromTo' => $fromTo
        ]);
    }

    public function actionSetBus($id)
    {
        $trip = $this->findModel($id);
        $selectedBus = $trip->id_bus;
        $bus = ArrayHelper::map(Bus::find()->all(), 'id', 'model');

        if (Yii::$app->request->isPost) {
            $bus = Yii::$app->request->post('bus');
            if ($trip->saveBus($bus))
                return $this->redirect(['view', 'id' => $trip->id]);
        }

        return $this->render('bus', [
            'trip' => $trip,
            'selectedBus' => $selectedBus,
            'bus' => $bus
        ]);
    }

    public function actionSetStop($id)
    {
        $trip = $this->findModel($id);
        $selectedStop = $trip->selectedStops;
        $place = ArrayHelper::map(Place::find()->all(), 'id', 'name');

        if (Yii::$app->request->isPost) {
            $place = Yii::$app->request->post('place');
            if ($trip->saveStops($place))
                return $this->redirect(['view', 'id' => $trip->id]);
        }

        return $this->render('stop', [
            'trip' => $trip,
            'selectedStop' => $selectedStop,
            'place' => $place
        ]);
    }
}
