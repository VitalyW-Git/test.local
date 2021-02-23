<?php

namespace app\components\widget;

use app\models\Catalog;
use yii\base\Widget;

class MenuCatalogWidget extends Widget
{

    public function run()
    {
        $catalogs = Catalog::find()
            ->select('name')
            ->all();

        return $this->render('menu-catalog', [
            'catalogs' => $catalogs,
        ]);
    }
}