<?php
/**
 * @var $places \app\models\Place[]
 * @var $trips \app\models\Trip[]
 */

use yii\helpers\Url; ?>

<!-- Banner Area Starts -->
<section class="banner-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 px-0">
                <div class="banner-bg"></div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="banner-text">
                    <h1>Автовокзалы 2.0</h1>
                    <p class="py-3">Работаем каждый день, даже в выходные и праздники!</p>
                    <a href="#" class="secondary-btn">Начать сейчас<span class="flaticon-next"></span></a>
                </div>
            </div>
        </div>
    </div>
</section><br>
<!-- Banner Area End -->

<!-- Search Area Starts -->
<?= $this->render('search', ['places' => $places]); ?>
<!-- Search Area End -->

<!-- Trip Area Starts -->
<section class="jobs-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jobs-title">
                    <br><h2>Рейсы</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="home-tab">
                        <?php foreach ($trips as $trip): ?>
                        <div class="single-job mb-4 d-lg-flex justify-content-between">
                            <div class="job-text">
                                <h4><?= $trip->from->name?> - <?=$trip->to->name?></h4>
                                <ul class="mt-4">
                                    <li class="mb-3"><h5><i class="fa fa-map-marker"></i>Остановки:
                                            <?php foreach ($trip->stops as $stop): ?>
                                            <?= $stop->place->name ?>
                                            <?php endforeach; ?>
                                        </h5></li>
                                    <li class="mb-3"><h5><i class="fa fa-calendar"></i>Период: <?= $trip->period ?></h5></li>
                                    <li><h5><i class="fa fa-clock-o"></i> Отправление-Прибытие: <?= $trip->time_start ?> - <?= $trip->time_end ?></h5></li>
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
        </div>
        <div class="more-job-btn mt-5 text-center">
            <a href="<?= Url::to(['trip/all'])?>" class="template-btn">Больше рейсов</a>
        </div>
    </div>
</section>
<!-- Trip Area End -->

<!-- Download Area Starts -->
<section class="download-area section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="download-text">
                    <h2>Скачайте приложение на мобильный телефон уже сегодня</h2>
                    <p class="py-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <div class="download-button d-sm-flex flex-row justify-content-start">
                        <div class="download-btn mb-3 mb-sm-0 flex-row d-flex">
                            <i class="fa fa-apple" aria-hidden="true"></i>
                            <a href="#">
                                <p>
                                    <span>Доступно</span> <br>
                                    в App Store
                                </p>
                            </a>
                        </div>
                        <div class="download-btn dark flex-row d-flex">
                            <i class="fa fa-android" aria-hidden="true"></i>
                            <a href="#">
                                <p>
                                    <span>Доступно</span> <br>
                                    в Play Store
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pr-0">
                <div class="download-img"></div>
            </div>
        </div>
    </div>
</section>
<!-- Download Area End -->
