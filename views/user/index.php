<?php

use app\models\User;
use yii\data\Pagination;
use \yii\widgets\LinkPager;
use \yii\web\View;

/** @var User[] $users */
/** @var Pagination $pages */
/** @var View $this */

?>

<h1>View for user/index</h1>

<div class="container">
    <div class="row">
        <?php foreach ($users as $user) :?>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul>
                            <li>
                                имя <?= $user->name?>
                            </li>
                            <li>
                                фамилия <?= $user->last_name?>
                            </li>
                        </ul>
                        <hr>
                        <?= $this->render('_user_passport', ['user' => $user]) ?>
<!--                        --><?php //if ($user->passport): ?>
<!--                            <ul>-->
<!--                                <li>-->
<!--                                    passport number --><?//= $user->passport->number?>
<!--                                </li>-->
<!--                                <li>-->
<!--                                    passport code --><?php //echo $user->passport->code?>
<!--                                </li>-->
<!--                                <li>-->
<!--                                    passport code --><?php //echo $user->passport->address?>
<!--                                </li>-->
<!--                            </ul>-->
<!--                        --><?php //endif; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php

echo LinkPager::widget([
    'pagination' => $pages,
]);
?>