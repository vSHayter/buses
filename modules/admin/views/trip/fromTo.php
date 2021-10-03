<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fromTo-form">

    <?php $form = ActiveForm::begin(); ?>
    From:
    <?= Html::dropDownList('from', $selectedFrom, $fromTo, ['class'=>'form-control'])?>
    To:
    <?= Html::dropDownList('to', $selectedTo, $fromTo, ['class'=>'form-control'])?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>