<?php

namespace app\controllers;

use app\models\Place;
use yii\web\Controller;

class PlaceController extends Controller
{

    public function actionSearch()
    {

        if (isset($_POST['search'])) {

            $name = $_POST['search'];
            $id = $_POST['id'];
            $query = Place::find()
                ->where(['like', 'name', $name . '%', false])
                ->limit(10)
                ->all();

            foreach ($query as $place): ?>
                <li class="list-group-item" onclick='fillPlaceName("<?= $place['name']; ?>", "<?= $id; ?>"); fillPlaceId("<?= $place['id']; ?>", "<?= $id; ?>");'>
                    <a>
                        <?= $place->name ?>
                    </a>
                </li>
            <?php endforeach;
        }
    }
}
