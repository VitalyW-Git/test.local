<?php

use app\models\People;
use app\models\Car;
use yii\data\Pagination;
use \yii\widgets\LinkPager;

/** @var People[] $people */
/** @var Pagination $pages*/
?>

<?php foreach ($people as $owner) : ?>

    <ul>
        <li>
            Имя <?= $owner->name ?>
        </li>
        <?php
        /** @var Car[] $cars */
        $cars = $owner->cars ?>
        <?php foreach ($cars as $car) : ?>
            <p><?= $car->name ?></p>
        <?php endforeach; ?>

    </ul>

<?php endforeach; ?>


<?php

echo LinkPager::widget([
    'pagination' => $pages,
]);
?>