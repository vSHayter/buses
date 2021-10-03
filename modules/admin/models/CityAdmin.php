<?php

namespace app\modules\admin\models;

use app\models\Country;

class CityAdmin extends \app\models\City
{
    public function saveCountry($id_country)
    {
        $country = Country::findOne($id_country);
        if($country != null)
        {
            $this->link('country', $country);
            return true;
        }
        return false;
    }
}
