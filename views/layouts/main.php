<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

\app\assets\ComportAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Preloader Starts -->
<div class="preloader">
    <div class="spinner"></div>
</div>
<!-- Preloader End -->

<!-- Header Area Starts -->
<header class="header-area main-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="logo-area">
                    <a href="<?= Url::toRoute(['site/index'])?>"><img src="/comport/assets/images/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="custom-navbar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="main-menu">
                    <ul>
                        <li class="active"><a href="<?= Url::toRoute(['site/index'])?>">Главная</a></li>
                        <li><a href="<?= Url::toRoute(['site/about'])?>">О нас</a></li>
                        <li><a href="<?= Url::toRoute(['site/contact'])?>">Свяжитесь с нами</a></li>
                        <li class="menu-btn">
                            <?php if(Yii::$app->user->isGuest):?>
                                <a href="<?= Url::toRoute(['auth/login']) ?>" class="login">Войти</a>
                                <a href="<?= Url::toRoute(['auth/signup']) ?>" class="template-btn">Зарегистрироваться</a>
                            <?php else: ?>
                                <li><a href="<?= Url::toRoute(['booking/cancel'])?>">Отмена бронирования</a></li>
                                <a href="<?= Url::toRoute(['auth/logout']) ?>" class="template-btn"><?= Yii::$app->user->identity->username ?></a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->

<?= $content ?>

<!-- Footer Area Starts -->
<footer class="footer-area section-padding">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-3">
                    <div class="single-widget-home mb-5 mb-lg-0">
                        <h3 class="mb-4">top products</h3>
                        <ul>
                            <li class="mb-2"><a href="#">managed website</a></li>
                            <li class="mb-2"><a href="#">managed reputation</a></li>
                            <li class="mb-2"><a href="#">power tools</a></li>
                            <li><a href="#">marketing service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="single-widget-home mb-5 mb-lg-0">
                        <h3 class="mb-4">newsletter</h3>
                        <p class="mb-4">You can trust us. we only send promo offers, not a single.</p>
                        <form action="#">
                            <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" required>
                            <button type="submit" class="template-btn">subscribe now</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 offset-xl-1 col-lg-3">
                    <div class="single-widge-home">
                        <h3 class="mb-4">instagram feed</h3>
                        <div class="feed">
                            <img src="/web/comport/assets/images/feed1.jpg" alt="feed">
                            <img src="/web/comport/assets/images/feed2.jpg" alt="feed">
                            <img src="/web/comport/assets/images/feed3.jpg" alt="feed">
                            <img src="/web/comport/assets/images/feed4.jpg" alt="feed">
                            <img src="/web/comport/assets/images/feed5.jpg" alt="feed">
                            <img src="/web/comport/assets/images/feed6.jpg" alt="feed">
                            <img src="/web/comport/assets/images/feed7.jpg" alt="feed">
                            <img src="/web/comport/assets/images/feed8.jpg" alt="feed">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                            <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
