<?php

namespace app\components\widget;

use app\models\CatalogOrder;
use yii\base\Widget;

class AllOrdersWidget extends Widget
{
    /** @var CatalogOrder[]  $catalogOrders */
    public $catalogOrders;

    public function run()
    {
        return $this->render('all-orders', ['catalogOrders' => $this->catalogOrders]);
    }
}