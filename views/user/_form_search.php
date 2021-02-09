<?php

use app\components\widget\AgeMenuWidget;
use app\models\UserSearch;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/** @var UserSearch $userSearch */
/** @var View $this */
?>

    <h3>Поиск</h3>

<?php $form = ActiveForm::begin([
    'action' => ['search'],
    'method' => 'GET',
]); ?>

    <div class="row">
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'name')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'last_name')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'email')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'salary')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'age')->textInput() ?></div>
    </div>

    <br>
    <h4>Фильтр по паспортам</h4>
    <div class="row">
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'code')->textInput() ?></div>
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'number')->textInput() ?></div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-2"> <?= $form->field($userSearch, 'abc')->textInput() ?></div>
    </div>

    <div>
        <div class="col-sm-6 col-md-6">
            <button type="submit" class="btn btn-success">Применить фильтры</button>
            <a class="btn btn-warning" data-pjax="0" href="<?= Url::to(['/user/search']) ?>">Сбросить фильтры</a>
        </div>
    </div>


<?= AgeMenuWidget::widget()?>

<?php ActiveForm::end(); ?>