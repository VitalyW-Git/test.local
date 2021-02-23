<?php

use app\models\User;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model User */
?>
<?php
$this->title = 'Create';
?>

    <h1><?= Html::encode($this->title) ?></h1>

<!--<div class="alert alert-info">-->
<!--    --><?php //if (Yii::$app->session->hasFlash('success')) { ?>
<!--        --><?//= Yii::$app->session->getFlash('success')?>
<!--    --><?// } ?>
<!--</div>-->
<!---->
<!--<div class="alert alert-danger">-->
<!--    --><?php //if (Yii::$app->session->hasFlash('error')) { ?>
<!--        --><?//= Yii::$app->session->getFlash('error')?>
<!--    --><?// } ?>
<!--</div>-->

<!-- alert сообщение об ошибке и на успешную отправку -->
<?= Alert::widget() ?>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'last_name') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'age') ?>
            <?= $form->field($model, 'salary') ?>
            <?= $form->field($model, 'phone') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>

<?php ActiveForm::end(); ?>