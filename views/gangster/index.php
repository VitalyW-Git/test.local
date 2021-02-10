<?php

use app\controllers\GangsterController;
use app\models\Gangster;
use app\models\Gun;
use app\models\GangsterSearch;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\web\View;

/** @var Gangster[] $gangsters */
/** @var Pagination $pages */
/** @var GangsterSearch $gangsterSearch */
/** @var ActiveDataProvider $dataProvider */
/** @var View $this */
?>
<h3>Поиск</h3>
<?php $form = ActiveForm::begin([
    'action' => ['/gangster/index'], // страница поиска
    'method' => 'GET',
]); ?>
<?php $type = [0 => 'Мёртвый', 1 => 'Живой']; ?>
<div class="row">
    <div class="col-sm-6 col-md-2">
        <?= $form->field($gangsterSearch, 'age')->textInput() ?>
    </div>
    <div class="col-sm-6 col-md-2">
        <?= $form->field($gangsterSearch, 'status')->dropDownList(
            GangsterController::getlistStatus(),
            [
                'prompt' => 'Status all',
                'options' => [
                    0 => ['selected' => true]
                ]
            ],
        ) ?>
<!--                --><?//= $form->field($gangsterSearch, 'status')->dropDownList([0 => 'died', 1 => 'alive']) ?>
    </div>
</div>

<div class="btn-group" role="group" aria-label="...">
    <button type="submit" class="btn btn-danger">Применить фильтры</button>
</div>
<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-success" data-pjax="0" href="<?= Url::to(['/gangster']) ?>">Сбросить фильтры</a>
</div>
<?php ActiveForm::end(); ?>

<!--div class="row">
    <?php
$gangsters = $dataProvider->models;
/** @var Gangster $gangster */
foreach ($gangsters as $gangster) : ?>

        <h3><?= $gangster->name ?></h3>
        <h3><?= $gangster->age ?></h3>
        <h3><?= $gangster->id ?></h3>

        <?php
    /** @var Gun $gun */
    $gun = $gangster->gun; ?>
        <h4><?= $gun->gun ?></h4>


        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <a class="btn btn-primary" data-pjax="0"
                   href="<?= Url::toRoute(['gangster/view', 'id' => $gangster->id]) ?>">Gun gangster</a>
            </div>
        </div>

    <? endforeach; ?>
</div-->


<?php
$gangsters = $dataProvider->models;
/** @var Gangster $gangster */
foreach ($gangsters as $gangster) : ?>
    <div class="panel panel-default">
        <div class="panel-heading">

            <h3 class="panel-title"><?= $gangster->name ?></h3>
        </div>
        <div class="panel-body">
            <p>Возраст: <?= $gangster->age ?></p>
            <p>Статус: <?= $gangster->status ?></p>
            <?php
            /** @var Gun $gun */
            $gun = $gangster->gun; ?>
            <p>Оружие: <?= $gun->gun ?></p>
        </div>
        <a class="btn btn-primary" data-pjax="0"
           href="<?= Url::toRoute(['gangster/view', 'id' => $gangster->id]) ?>">Подробнее</a>
    </div>
<? endforeach; ?>

<div class="container">
    <?php
    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]);
    ?>
</div>