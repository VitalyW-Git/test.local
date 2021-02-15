<?php
use app\assets\UserSearchAsset;
use app\models\User;
use yii\base\View;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var User $user */
/** @var View $this */

//UserSearchAsset::register($this)

?>

<table class="table table-bordered thead-dark">
    <thead>
    <tr>
        <th scope="col">Пользователь</th>
        <th scope="col">Паспорт</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($user->passport): ?>
        <tr>
            <td>Имя: <?= $user->name ?></td>
            <td>Серия: <?= $user->passport->code ?></td>
        </tr>
        <tr>
            <td>Фамилия: <?= $user->last_name ?></td>
            <td>Номер: <?= $user->passport->number ?></td>
        </tr>
        <tr>
            <td>Возраст: <?= $user->age ?></td>
            <td>Город: <?= $user->passport->city ?></td>
        </tr>
        <tr>
            <td>E-mail: <?= $user->email ?></td>
            <td>Адрес: <?= $user->last_name ?></td>
        </tr>
        <tr>
            <td>Зарплата: <?= $user->salary ?></td>
            <td> -</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<div class="container">
    <div class="col-sm-6 col-md-6">
        <?= Html::submitButton('Принять заказ', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        <a class="btn btn-warning" data-pjax="0" href="<?= Url::to(['/user/search']) ?>">Назад</a>
    </div>
</div>