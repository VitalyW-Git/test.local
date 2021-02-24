<?php

use app\components\widget\AllOrdersWidget;
use app\components\widget\MenuCatalogWidget;
use app\models\Catalog;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/** @var  Catalog[] $catalogsId*/
?>
<?php Pjax::begin()?>
    <div class="row">
        <div class="col-md-2">
            <?= MenuCatalogWidget::widget() ?>
        </div>
        <div class="col-md-8">
            <?= $catalogsId-> ?>

            <?php foreach ($catalogsId as $catalog) : ?>
                <?= $catalog->name ?> <br>
            <?php endforeach; ?>
        </div>
    </div>
<?php Pjax::end()?>