<?php

namespace app\modules\admin\models;

use app\models\Bus;
use app\models\Place;
use app\models\Stop;
use app\models\Trip;
use yii\helpers\ArrayHelper;

class TripAdmin extends Trip
{
    public function saveFromTo($id_from, $id_to)
    {
        $from = Place::findOne($id_from);
        $to = Place::findOne($id_to);
        if ($from && $to != null) {
            $this->link('from', $from);
            $this->link('to', $to);
            return true;
        }
        return false;
    }

    public function saveBus($id_bus)
    {
        $bus = Bus::findOne($id_bus);
        if ($bus != null){
            $this->link('bus', $bus);
            return true;
        }
        return false;
    }

    //STOP
    public function getStop()
    {
        return $this->hasMany(Place::class, ['id' => 'id_place'])
            ->viaTable('stop', ['id_trip' => 'id']);
    }

    public function getSelectedStops()
    {
        $selectedStops = $this->getStop()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedStops, 'id');
    }

    public function saveStops($stops)
    {

        if(is_array($stops))
        {
            $this->clearCurrentStops();

            foreach ($stops as $id_stop)
            {
                $stop = Place::findOne($id_stop);
                $this->link('stop', $stop);
            }
        }

        return true;
    }

    public function clearCurrentStops()
    {
        Stop::deleteAll(['id_trip'=>$this->id]);
    }
}
