<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atp */

$this->title = 'Update Atp: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Atps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="atp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
