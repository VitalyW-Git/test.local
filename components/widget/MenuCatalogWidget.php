<?php

namespace app\components\widget;

use app\models\Catalog;
use yii\base\Widget;

class MenuCatalogWidget extends Widget
{
    /** @var Catalog $catalogs */
    public $catalogs;

        public function run()
    {
        return $this->render('menu-catalog', ['catalogs' => $this->catalogs]);
    }

}