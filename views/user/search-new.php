<?php

use app\models\User;
use app\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/** @var ActiveDataProvider $dataProvider */
/** @var UserSearch $userSearch */

?>
<h1>User</h1>
<br>

<input type="submit" id="submit1" class="btn btn-default" value="submit">

<div class="check-block">
    <input id="checkOne" type="checkbox" class="form-control check-search" name="UserSearch[issetPassport]"  <?=  $userSearch->issetPassport ? 'checked' : '';?>>
    <label for="checkOne">Пользоаптели с паспортами</label>
</div>

<div id="slider"></div>
<div id="slider-range">
    <label for="min"></label>
    <input type="text" id="min" class="min-number form-control" name="UserSearch[userSearchMin]" value="">
    <label for="max"></label>
    <input type="text" id="max" class="max-number form-control" name="UserSearch[userSearchMax]" value="">
</div>

<br>
<br>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $userSearch,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'], // нумирация массива
        'id',
        'age',
        'name',
        'last_name',
        'email',
        'salary',
        [
            'attribute' => 'code',
            'label' => 'Code',
            'format' => 'raw',
            'value' => function ($data) {
                /** @var User $data */
                return $data->passport->code ?? '
                    <span style="color: #e5295e; font-weight: bold">Non code</span>
';
            }
        ],
        [
            'attribute' => 'number',
            'label' => 'Number',
            'format' => 'raw',
            'value' => function ($data) {
                /** @var User $data */
                return $data->passport->number ?? '
                    <span style="color: #e5295e; font-weight: bold">Non number</span>
';
            }
        ],
    ],
]) ?>
