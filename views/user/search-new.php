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
<div class="check-block">
    <input id="checkOne" type="checkbox" class="form-control check-search" name="UserSearch[issetPassport]"  <?=  $userSearch->issetPassport ? 'checked' : '';?>>
    <label for="checkOne">Пользоаптели с паспортами</label>
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
//        [
//            'label' => 'Passport',
//            'format' => 'raw',
//            'value' => function ($data) {
//                /** @var User $data */
//                return $data->passport->code;
//            }
//        ],
//        [
//            'label' => 'Number',
//            'format' => 'raw',
//            'value' => function ($data) {
//                /** @var User $data */
//                return $data->passport->number;
//            }
//        ],
    ],
]) ?>
