<?php
/**
 * @var $places \app\models\Place[]
 * @var $flights \app\models\Flight[]
 */

use yii\helpers\Url; ?>
<br><br>
<!-- Search Area Starts -->
<div class="search-area">
    <div class="search-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#" class="d-md-flex justify-content-between">
                        <select>
                            <?php foreach ($places as $place): ?>
                                <option value="<?=$place->id?>"><?=$place->name?></option>
                            <?php endforeach; ?>
                        </select>
                        <select>
                            <?php foreach ($places as $place): ?>
                                <option value="<?=$place->id?>"><?=$place->name?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="template-btn">Поиск рейсов</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <span>Рейсов найдено: <?= count($flights)?></span>
            </div>
        </div>
    </div>
</div>
<!-- Search Area End -->

<!-- Jobs Area Starts -->
<section class="jobs-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($flights as $flight): ?>
                <div class="single-job mb-4 d-lg-flex justify-content-between">
                    <div class="job-text">
                        <h4><?= $flight->from->name ?> - <?=$flight->to->name ?></h4>
                        <ul class="mt-4">
                            <li class="mb-3"><h5><i class="fa fa-map-marker"></i> Остановки:
                                    <?php foreach ($flight->stops as $stop): ?>
                                        <?= $stop->place->name ?>
                                    <?php endforeach;?>
                                </h5></li>
                            <li class="mb-3"><h5><i class="fa fa-calendar"></i> Период: <?=$flight->period ?> </h5></li>
                            <li><h5><i class="fa fa-clock-o"></i> Отправление-Прибытие: <?= $flight->time_start ?> - <?= $flight->time_end ?> </h5></li>
                        </ul>
                    </div>
                    <div class="job-btn align-self-center">
                        <a href="<?= Url::toRoute(['flight/single', 'id' => $flight->id])?>" class="third-btn job-btn1">Просмотреть</a>
                        <a href="<?= Url::toRoute(['booking/index', 'id'=> $flight->id])?>" class="third-btn">Забронировать</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Jobs Area End -->
