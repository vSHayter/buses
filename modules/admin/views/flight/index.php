<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FlightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Flights';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Flight', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_from',
            'id_to',
            'time_start',
            'time_end',
            'period',
            //'id_bus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
