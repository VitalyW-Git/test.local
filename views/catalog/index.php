<?php

use app\components\widget\AllOrdersWidget;
use app\components\widget\MenuCatalogWidget;
use app\models\CatalogOrder;

/* @var $this yii\web\View */
/** @var  CatalogOrder[] $catalogOrders*/
?>
<div class="row">
    <div class="col-md-2">
        <?= MenuCatalogWidget::widget() ?>
    </div>
    <div class="col-md-8">
        <?= AllOrdersWidget::widget(['catalogOrders' => $catalogOrders])?>
    </div>
</div>

<!---->
<!--    <h1>catalog/index</h1>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            --><?php
//            /** @var CatalogOrder $catalogOrder */
//            foreach ($catalogOrders as $catalogOrder) : ?>
<!--                <div class="col-sm-6">-->
<!--                    <div class="panel panel-default">-->
<!--                        <div class="panel-heading"><h4>--><?//= $catalogOrder->id ?><!--</h4></div>-->
<!--                        <div class="panel-body">-->
<!--                            --><?php // // debug($catalogOrder->catalogOrderItems);?>
<!--                            --><?php //foreach ($catalogOrder->catalogOrderItems as $item) : ?>
<!--                                <h4>--><?//= $item->catalog->name ?><!--</h4>-->
<!--                            --><?php //endforeach; ?>
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endforeach;?>
<!--        </div>-->
    </div>

