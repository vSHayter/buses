<!-- Pricing Box Starts -->
<div class="pricing-box section-padding3">
    <div class="container">
        <?php use yii\helpers\Url;

        if($error): ?>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="single-box2 text-center">
                    <h3><?= $message ?></h3>
                    <p><?= $message2 ?></p>
                    <a href="<?= Url::to(['site/index']) ?>" class="template-btn">Главная</a>
                    <a href="<?= Yii::$app->request->referrer ?>" class="template-btn">Вернуться</a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="single-box1 text-center mb-4 mb-md-0">
                    <h3><?= $message ?></h3>
                    <p><?= $message2 ?></p>
                    <a href="<?= Url::to(['site/index']) ?>" class="template-btn">Главная</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- Pricing Box End -->