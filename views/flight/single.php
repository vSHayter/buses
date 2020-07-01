<?php
/**
 * @var $flight \app\models\Flight
 */
?>
<!-- Job Single Content Starts -->
<section class="job-single-content section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main-content">
                    <div class="single-content1">
                        <div class="single-job mb-4 d-lg-flex justify-content-between">
                            <div class="job-text">
                                <h4><?= $flight->from->name?> - <?= $flight->to->name?></h4>
                                <ul class="mt-4">
                                    <li class="mb-3"><h5><i class="fa fa-map-marker"></i>Остановки:
                                        <?php foreach ($flight->stops as $stop):?>
                                            <?= $stop->place->name ?>
                                        <?php endforeach;?>
                                        </h5></li>
                                    <li class="mb-3"><h5><i class="fa fa-calendar"></i>Период: <?= $flight->period?></h5></li>
                                    <li><h5><i class="fa fa-clock-o"></i>Отправлени-Прибытие: <?= $flight->time_start?> - <?= $flight->time_end?></h5></li>
                                </ul>
                            </div>
                            <div class="job-btn align-self-center">
                                <a href="<?= \yii\helpers\Url::toRoute(['booking/index', 'id' => $flight->id]) ?>" class="forth-btn">Забронировать</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-content4 py-4">
                        <h4>Путь рейса</h4>
                        <p>Отправление:
                            <?= $flight->from->city->country->name ?>,
                            <?= $flight->from->city->name?> -
                            <?= $flight->from->name?><br>
                            Прибытие:
                            <?= $flight->to->city->country->name ?>,
                            <?= $flight->to->city->name?> -
                            <?= $flight->to->name?>
                        </p>
                        <p>Остановки рейса</p>
                        <?php foreach ($flight->stops as $stop):?>
                        <ul><li class="mb-2"><?= $stop->place->name ?></li></ul>
                        <?php endforeach;?>
                    </div>
                    <div class="single-content3 py-4">
                        <h4>Период отправления рейса</h4>
                        <span class="ml-4"><?= $flight->period ?></span>
                    </div>
                    <div class="single-content4 py-4">
                        <h4>Время рейса</h4>
                        <p>Отправление:</p>
                        <ul><li class="mb-2"><?= $flight->time_start ?></li></ul>
                        <p>Прибытие:</p>
                        <ul><li class="mb-2"><?= $flight->time_end ?></li></ul>
                    </div>
                    <div class="single-content4 py-4">
                        <h4>Информация о перевозчике</h4>
                        <p>АТП:</p>
                        <ul><li class="mb-2"><?= $flight->bus->atp->name ?></li></ul>
                    </div>
                    <div class="single-content4 py-4">
                        <h4>Информация о автобусе</h4>
                        <p>Модель:</p>
                        <ul><li class="mb-2"><?= $flight->bus->model ?></li></ul>
                        <p>Номер автобуса:</p>
                        <ul><li class="mb-2"><?= $flight->bus->number ?></li></ul>
                        <p>Перевозчик:</p>
                        <ul><li class="mb-2"><?= $flight->bus->carrier ?></li></ul>
                        <p>Количество мест:</p>
                        <ul><li class="mb-2"><?= $flight->bus->capacity ?></li></ul>
                    </div>
                </div>
            </div>
            <!--<div class="col-lg-4">
                <div class="sidebar">
                    <div class="single-item mb-4">
                        <h4 class="mb-4">jobs type</h4>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>Full Time</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>Part Time</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between">
                            <span>Internship</span>
                            <span class="text-right">25 job</span>
                        </a>
                    </div>
                    <div class="single-item mb-4">
                        <h4 class="mb-4">job by location</h4>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>New York</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>California</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>Swizerland</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>Canada</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between">
                            <span>Sweden</span>
                            <span class="text-right">25 job</span>
                        </a>
                    </div>
                    <div class="single-item mb-4">
                        <h4 class="mb-4">salary range</h4>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>$20,000-$30,000</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>$25,000-$45,000</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between">
                            <span>$40,000-$70,000</span>
                            <span class="text-right">25 job</span>
                        </a>
                    </div>
                    <div class="single-item">
                        <h4 class="mb-4">filter by salary</h4>
                        <input type="text" id="range" value="" name="range" />
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</section>
<!-- Job Single Content End -->
