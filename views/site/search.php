<?php

use yii\helpers\Url;

?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<div class="search-area">
    <div class="search-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= Url::to(['trip/search']) ?>" class="d-md-flex justify-content-between">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <input type="text" id="placeName1" name="placeFrom" placeholder="Место отправления" onfocus="this.placeholder = ''" onblur="this.placeholder = ''">
                        <input type="text" id="placeName2" name="placeTo" placeholder="Место прибытия" onfocus="this.placeholder = ''" onblur="this.placeholder = ''">
                        <div class="list-place" id="display">
                            <ul class="list-group">
                        </div>
                        <input type="hidden" id="from" name="from">
                        <input type="hidden" id="to" name="to">
                        <button type="submit" formmethod="get" class="template-btn">Поиск рейса</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>