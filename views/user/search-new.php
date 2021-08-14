<?php

use app\models\User;
use app\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/** @var ActiveDataProvider $dataProvider */
/** @var UserSearch $userSearch */

//\yii\helpers\VarDumper::dump($userSearch,11,true);
?>
<h1>User</h1>
<br>

<?php $form = ActiveForm::begin([
    'id' => 'search-form',
    'method' => 'get',
    'action' => '/user/search-new'
]) ?>


<!--<input type="submit" id="submit1" class="btn btn-default" value="submit">-->


<div class="check-block">
    <input id="checkOne" type="checkbox" class="form-control check-search"
           name="UserSearch[issetPassport]" <?= $userSearch->issetPassport ? 'checked' : ''; ?>>
    <label for="checkOne">Пользователи с паспортами</label>
</div>

<?php // $form->field($userSearch, 'issetPassport')->checkbox(['class' => 'form-control check-search']) ?>


<div id="slider"></div>
<div id="slider-range" class="js-slider">
    <label for="min"></label>
    <?= $form->field($userSearch, 'userSearchMin')->textInput(['class' => 'min-number form-control', 'id' => 'min']) ?>
    <?= $form->field($userSearch, 'userSearchMax')->textInput(['class' => 'max-number form-control', 'id' => 'max']) ?>
</div>


<?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
<br>
<br>

<div class="container">
    <div class="row">
        <?php
        $users = $dataProvider->models;
        /** @var User $user */
        foreach ($users as $user) { ?>
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user->name ?></h5>
                        <p class="card-text"><?= $user->last_name ?></p>
                        <p class="card-text"><?= $user->age ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]); ?>
</div>