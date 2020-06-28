<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'carrier') ?>

    <?= $form->field($model, 'capacity') ?>

    <?php // echo $form->field($model, 'id_atp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
