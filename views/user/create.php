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
            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'last_name') ?>
            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
    </div>
    <h5><b>Основное изображение</h5>
    <?php if ($model->image) { ?>
        <div class="col-sm-3">
            <?=
            Html::img('/img/'. $model->image, [
                'height' => '100px'
            ]);
            ?>
        </div>
    <?php } else {
        echo 'Изображение отсутствует!';
    }?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?php if ($model->image) {
        ?>
        <div class="row">
            <div class="col-sm-6">
                <?=
                Html::tag('p', 'Загруженные файлы:', [
                    'class' => 'mb-2'
                ]).
                Html::tag('p', Html::a($model->image, ['download-detail-file', 'id' => $model->id]), ['class' => 'mb-2']);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?= (!$model->image || !file_exists(Yii::getAlias('@contents') . '/'. $model->image)) ? '' :
                    Html::a(
                        'Удалить изображение',
                        ['delete-detail-picture-file', 'id' => $model->id],
                        [
                            'class' => 'btn btn-warning',
                            'data-confirm' => 'Удалить изображение?',
                            'data-method' => 'post',
                        ]
                    );
                ?>
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>

<?php ActiveForm::end(); ?>