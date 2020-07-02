<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Flight */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_from')->textInput() ?>

    <?= $form->field($model, 'id_to')->textInput() ?>

    <?= $form->field($model, 'time_start')->textInput() ?>

    <?= $form->field($model, 'time_end')->textInput() ?>

    <?= $form->field($model, 'period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_bus')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
