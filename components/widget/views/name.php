<?php

use app\components\widget\ObjectNameWidget;
use app\models\User;
use yii\web\View;

/** @var View $this */
/** @var array $objectsName */
/** @var User $obj */
?>


<div class="site-index">
    <div class="body-content">
        <div class="row">

            <!--    рендерим название класса из виджета ObjectNameWidget-->
            <?php foreach ($objectsName as $item) : ?>
                <div class="col-lg-4">
                    <p><?= $item->getName() ?><br>
                        <?= ObjectNameWidget::widget([
                            'object' => $item
                        ]) ?></p>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
