<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var array $usersMenu */

?>

<div class="col-cm-3">
    <h3>Age menu widget</h3>
    <ul class="inline">

        <?php foreach ($usersMenu as $itemMenu) : ?>
            <li>
                <?= Html::a(
                    $itemMenu['age'] . ' (' . $itemMenu['cnt'] . ')',
//                    'http://test.local/user/search?UserSearch%5Bname%5D=&UserSearch%5Blast_name%5D=&UserSearch%5Bemail%5D=&UserSearch%5Bsalary%5D=&UserSearch[age]=' . $itemMenu['age'] . '&UserSearch%5Bcode%5D=&UserSearch%5Bnumber%5D=&UserSearch%5Babc%5D=',
//                    'search?=&UserSearch%5Bage%5D=' . $itemMenu['age'],
//                    ['user/search', 'UserSearch[age]' => $itemMenu['age']],
//                    ['user/age', 'age' => $itemMenu['age'], 'other' => 1], // второй параметр age передаём из контроллера, 'other' => 1 - второй параметр передавать второй параметр
//                    ['user/age', 'age' => $itemMenu['age'], 'name' => $itemMenu['name']],
                    ['user/age', 'age' => $itemMenu['age']],
                    ['class' => 'btn btn-primary']
                ) ?>
<!--                <a class="btn btn-primary"-->
<!--                   data-pjax="0"-->
<!--                   href="--><?//= Url::toRoute(['user/age', 'age' => $itemMenu['age']]) ?><!--">-->
<!--                    Пользователь-->
<!--                </a>-->
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<!--['user/view', 'id' => $user->id]-->