<?php

namespace app\components\widget;

use app\models\CatalogOrder;
use yii\base\Widget;

class AllOrdersWidget extends Widget
{
    public function run()
    {
        $catalogOrders = CatalogOrder::find()
            ->all();

        return $this->render('all-orders', [
            'catalogOrders' => $catalogOrders
        ]);
    }
}