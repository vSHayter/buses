<?php

namespace app\modules\admin\models;

use app\models\City;
use app\models\Place;

class PlaceAdmin extends Place
{
    public function saveCity($id_city)
    {
        $city = City::findOne($id_city);
        if($city != null)
        {
            $this->link('city', $city);
            return true;
        }
        return false;
    }
}
