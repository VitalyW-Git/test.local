<?php


use app\models\Passport;
use app\models\User;
use yii\debug\models\timeline\DataProvider;
use yii\helpers\Url;
use yii\web\View;

/** @var User $users */
/** @var DataProvider $dataProvider */
/** @var View $this */


?>

<table class="table table-bordered thead-dark">
    <thead>
    <tr>
        <th scope="col">Имя</th>
        <th scope="col">Email</th>
        <th scope="col">Зарплата</th>
        <th scope="col">Code</th>
        <th scope="col">Number</th>
        <th scope="col">Вывод пользователя</th>
        <th scope="col">Заказ</th>
    </tr>
    </thead>
    <?php $users = $dataProvider->models;
    /** @var User $user */
    foreach ($users as $user) : ?>
    <tbody>
    <tr class="data-user-delete<?= $user->id ?>">
        <td><?= $user->name ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->salary ?></td>
        <?php
        /** @var Passport $passport */
        $passport = $user->passport;
        if ($passport) : ?>
            <td><?= $passport->code ?></td>
            <td><?= $passport->number ?></td>
        <? endif; ?>
        <td>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <a class="btn btn-primary btn-block" data-pjax="0"
                       href="<?= Url::toRoute(['user/view', 'id' => $user->id]) ?>">Пользователь</a>
                </div>
            </div>
        </td>
        <td>
            <div class="form-group row">
                <div class="col-lg-offset-1 col-lg-11">
                    <a class="btn btn-primary btn-sm active btn-block" data-user-delete-id="<?= $user->id ?>" data-pjax="0"
                       href="<?= Url::toRoute(['user/delete', 'id' => $user->id]) ?>">Ajax Delete order</a>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-offset-1 col-lg-11">
                    <a class="btn btn-success btn-sm active btn-block" data-user-id="<?= $user->id ?>" data-pjax="0"
                       href="<?= Url::toRoute(['user/order-ajax', 'id' => $user->id]) ?>">Ajax Add order</a>
                </div>
            </div>
        </td>
        <?php endforeach; ?>
    </tr>
    </tbody>
</table>



