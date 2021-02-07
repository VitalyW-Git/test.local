<?php

use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\View;

/** @var ActiveDataProvider $dataProvider */
/** @var View $this */


?>

<table class="table table-bordered thead-dark">
    <thead>
    <tr>
        <th scope="col">Имя</th>
        <th scope="col">last_name</th>
        <th scope="col">Email</th>
        <th scope="col">salary</th>
        <th scope="col">age</th>
    </tr>
    </thead>

    <?php $users = $dataProvider->models;
    /** @var User $user */
    foreach ($users as $user) { ?>
        <tbody>
        <tr>
            <td><?= $user->name ?></td>
            <td><?= $user->last_name ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->salary ?></td>
            <td><?= $user->age ?></td>
        </tr>
        </tbody>
    <?php } ?>
</table>