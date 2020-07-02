<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Flight */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Flights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="flight-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Set From/To', ['set-from-to', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Set Bus', ['set-bus', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Set Stop', ['set-stop', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_from',
            'id_to',
            'time_start',
            'time_end',
            'period',
            'id_bus',
        ],
    ]) ?>

</div>
