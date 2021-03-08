<?php

use app\models\Article;

//use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Article */
/* @var $form ActiveForm */

?>

<div class="article-index">

    <?php $form = ActiveForm::begin([
//        'options' => ['enctype' => 'multipart/form-data'],
//        'fieldConfig' => [
//            'errorOptions' => ['class' => 'error mt-2 text-danger'],
//        ],
    ]); ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'content') ?>
        <?= $form->field($model, 'date_formatted')->widget(DatePicker::class, [
            'language' => 'ru',
            'dateFormat' => 'dd.MM.yyyy',
        ]) ?>
    <div class="row block-add-image">
        <div class="col-md-2">
            <?= $form->field($model, 'detailPicture')->fileInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'previewPicture')->fileInput() ?>
        </div>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
