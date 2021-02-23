<?php

use app\models\Catalog;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var Catalog[] $catalogs*/

?>

<div class="list-group">
    <?= Html::a('На главную', ['/'], ['class' => 'list-group-item active']) ?>
<?php foreach ($catalogs as $catalog) : ?>
    <a href="<?= Yii::$app->urlManager->createUrl(['/catalog/order-all', 'catalogId' => $catalog->id])?>" class="list-group-item">
        <?= $catalog->name?>
    </a>
<? endforeach; ?>

</div>
