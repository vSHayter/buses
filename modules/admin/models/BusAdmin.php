<?php

namespace app\modules\admin\models;

use app\models\Atp;

class BusAdmin extends \app\models\Bus
{

    public function saveAtp($id_atp)
    {
        $atp = Atp::findOne($id_atp);
        if ($atp != null)
        {
            $this->link('atp', $atp);
            return true;
        }
        return false;
    }
}
