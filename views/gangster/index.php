<?php

use app\assets\GangsterAsset;
use app\components\widget\UpdateGangsterDataWidget;
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
use yii\widgets\Pjax;

/** @var Gangster[] $gangsters */
/** @var Pagination $pages */
/** @var GangsterSearch $gangsterSearch */
/** @var ActiveDataProvider $dataProvider */
/** @var View $this */

GangsterAsset::register($this) ?>

<?php Pjax::begin(); ?>

<div class="container">
    <h3>Поиск</h3>
    <?php $form = ActiveForm::begin([
        'action' => ['/gangster/index'], // страница поиска
        'method' => 'GET',
    ]); ?>
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
                ]
            ) ?>
        </div>
    </div>

    <div class="btn-group" role="group" aria-label="">
        <button type="submit" class="btn btn-danger">Применить фильтры</button>
    </div>

    <div class="btn-group" role="group" aria-label="">
        <a class="btn btn-success" data-pjax="0" href="<?= Url::to(['/gangster']) ?>">Сбросить фильтры</a>
    </div>
    <?php ActiveForm::end(); ?>
    <br>
</div>

<div class="container">
    <div class="row">
        <?php
        $gangsters = $dataProvider->models;
        /** @var Gangster $gangster */
        foreach ($gangsters as $gangster) : ?>

            <div class="col-sm-6" id="js-gangster-id-<?= $gangster->id?>">
                <?= UpdateGangsterDataWidget::widget(['gangster' => $gangster])?>
            </div>

        <? endforeach; ?>
    </div>
</div>

<div class="container">
    <?php
    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]);
    ?>
</div>
<?php Pjax::end() ?>