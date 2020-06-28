<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bus-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bus', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'model',
            'number',
            'carrier',
            'capacity',
            //'id_atp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
