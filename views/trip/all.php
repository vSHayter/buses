<?php
/**
 * @var $places \app\models\Place[]
 * @var $trips \app\models\Trip[]
 */

use yii\helpers\Url; ?>
<br><br>
<!-- Search Area Starts -->
<?= $this->render('../site/search', ['places' => $places]); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <span>Рейсов найдено: <?= count($trips)?></span>
        </div>
    </div>
</div>

<!-- Search Area End -->

<!-- Jobs Area Starts -->
<section class="jobs-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($trips as $trip): ?>
                <div class="single-job mb-4 d-lg-flex justify-content-between">
                    <div class="job-text">
                        <h4><?= $trip->from->name ?> - <?=$trip->to->name ?></h4>
                        <ul class="mt-4">
                            <li class="mb-3"><h5><i class="fa fa-map-marker"></i> Остановки:
                                    <?php foreach ($trip->stops as $stop): ?>
                                        <?= $stop->place->name ?>
                                    <?php endforeach;?>
                                </h5></li>
                            <li class="mb-3"><h5><i class="fa fa-calendar"></i> Период: <?=$trip->period ?> </h5></li>
                            <li><h5><i class="fa fa-clock-o"></i> Отправление-Прибытие: <?= $trip->time_start ?> - <?= $trip->time_end ?> </h5></li>
                        </ul>
                    </div>
                    <div class="job-btn align-self-center">
                        <a href="<?= Url::toRoute(['trip/single', 'id' => $trip->id])?>" class="third-btn job-btn1">Просмотреть</a>
                        <a href="<?= Url::toRoute(['booking/index', 'id'=> $trip->id])?>" class="third-btn">Забронировать</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Jobs Area End -->
