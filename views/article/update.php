<?php

use yii\web\View;
use app\models\Article;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Article */
/* @var $form ActiveForm */

$this->title = "Редактирование статьи";
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
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?= $model->date_formatted ?><br>
                <?= $model->created_at ?><br>
                <?= $model->updated_at ?><br>
            </div>
        </div>
    </div>
</div>
