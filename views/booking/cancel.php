<?php

use yii\helpers\Url;

?>
<!-- Feature Area Starts -->
<div class="pricing-box section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="single-box1 text-center mb-4 mb-md-0">
                    <h3>Отмена бронирования</h3>
                    <p>Введи номер бронирования для отмены</p>
                    <form action="<?= \yii\helpers\Url::toRoute(['booking/drop']) ?>">
                        <input type="text" name="code" class="cancel-input" placeholder="Введите код" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите код'" required>
                        <button type="submit" formmethod="post" class="template-btn">Отправить код</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature Area End -->