<?php

use app\models\CatalogOrder;

/* @var $this yii\web\View */
/** @var  CatalogOrder[] $catalogOrders*/
?>

<h1>catalog/index</h1>
<?php   debug($catalogOrders);?>
<div class="container">
    <div class="row">
        <?php
        /** @var CatalogOrder $catalogOrder */
        foreach ($catalogOrders as $catalogOrder) : ?>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><?= $catalogOrder->id ?></h4></div>
                    <div class="panel-body">
                        <?php  // debug($catalogOrder->catalogOrderItems);?>
                        <?php foreach ($catalogOrder->catalogOrderItems as $item) : ?>
                            <h4><?= $item->catalog->name ?></h4>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

