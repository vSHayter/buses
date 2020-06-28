<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atp */

$this->title = 'Create Atp';
$this->params['breadcrumbs'][] = ['label' => 'Atps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
