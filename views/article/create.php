<?php

use yii\web\View;
use app\models\Article;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Article */
/* @var $form ActiveForm */

$this->title = "Создание статьи";
?>
<h2><?= $this->title ?></h2>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]); ?>
            </div>
        </div>
    </div>
</div>
