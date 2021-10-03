<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Booking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date',
            'amount',
            //'code',
            //'text:ntext',
            'name',
            'surname',
            'patronymic',
            //'email:email',
            'phone',
            //'id_payment',
            'id_trip',
            'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {drop}',
                'buttons' => [
                    'drop' => function($url, $model, $key) {
                        return Html::a('Drop', $url, ['class' => 'btn btn-success btn-xs', 'data-pjax' => 0]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='cancel-view?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'drop') {
                        $url ='drop?id='.$model->id;
                        return $url;
                    }
                },
            ]
        ],
    ]); ?>


</div>
