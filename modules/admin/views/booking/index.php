<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            //['class' => 'yii\grid\ActionColumn'],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {approve}',
                'buttons' => [
                    'approve' => function($url, $model, $key) {
                        return Html::a('Approve', $url, ['class' => 'btn btn-success btn-xs', 'data-pjax' => 0]);
                    }]
            ]
        ],
    ]); ?>


</div>
