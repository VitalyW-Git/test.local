<?php

use app\models\Player;
use app\models\Team;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\data\Pagination;

/** @var Team[] $teams */
/** @var array $players */
/** @var Player $player */
/** @var Pagination $pages */
?>
<?php Pjax::begin(['enablePushState' => true])?>

<h1>Pjax текст</h1>

<h1>Команды/игроки</h1>
<div class="container">
    <div class="row">
        <?php foreach ($players as $player) : ?>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Игрок:</p>
                            <ul>
                                <li>имя: <?= $player->name ?></li>
                                <li>возраст: <?= $player->age ?></li>
                                <li>рейтинг: <?= $player->rating ?> </li>
                                <a class="btn btn-success mt-10" href="<?= Url::to(['team/index', 'id' => $player->id])?>">ссылка</a>
                            </ul>
                        </div>
                    </div>
                </div>
        <?php endforeach;?>
    </div>
</div>

<?= LinkPager::widget([
    'pagination' => $pages,
]); ?>

<?php Pjax::end()?>
