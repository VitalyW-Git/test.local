<?php

use app\models\CatalogOrder;
use yii\web\View;

/** @var View $this*/
/** @var CatalogOrder[] $catalogOrders*/
?>
<?php
/** @var CatalogOrder $catalogOrder */
foreach ($catalogOrders as $catalogOrder) : ?>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><?= $catalogOrder->user_name ?></h4></div>
            <div class="panel-body">
                <?php foreach ($catalogOrder->catalogOrderItems as $catalog) : ?>
                    <?= $catalog->catalog->name?> <br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

