<?php

use yii\helpers\Url;

?>

<div class="search-area">
    <div class="search-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= Url::to(['trip/search']) ?>" class="d-md-flex justify-content-between">
                        <select name="from" size="5">
                            <?php foreach ($places as $place): ?>
                                <option value="<?=$place->id?>"><?=$place->name?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="to" size="5">
                            <?php foreach ($places as $place): ?>
                                <option value="<?=$place->id?>"><?=$place->name?></option>
                            <?php endforeach; ?>
                        </select>
                        <!--<input type="text" placeholder="Search Keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = ''">-->
                        <button type="submit" formmethod="get" class="template-btn">Поиск рейса</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>