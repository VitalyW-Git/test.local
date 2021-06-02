<?php

use app\models\Article;

//use kartik\date\DatePicker;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\DatePicker;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this View */
/* @var $model Article */
/* @var $form ActiveForm */

?>

<div class="article-index">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
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
<!--        <div class="">-->
<!--            --><?//= $form->field($model, 'detailPicture')->widget(FileInput::class, [
//                'options' => [
////                  'accept' => 'image'
//                    'multiple' => true
//                ],
//                'pluginOptions'=>[
//                    'deleteUrl' => Url::toRoute(['realty/delete-image']),
//                    'allowedFileExtensions'=>['jpg','gif','png'],
//                    'showUpload' => false,
//                    'overwriteInitial'=>false,
//                    ],
//             ]); ?>
<!--        </div>-->
        <div class="">
            <?= $form->field($model, 'detail_picture')->fileInput() ?>
        </div>

    </div>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>

<hr>
<?php

$files= FileHelper::findFiles('img/detail/');
$arr = [];
if (isset($files[0])) {
    foreach ($files as $index => $file) {
        $nameFile = substr($file, strrpos($file, '/') + 1);
//        echo Html::a($nameFile, Url::base().'/img/detail'.$nameFile);
        $arr[] = 'http://test.local/img/detail/' . $nameFile; // render do ficheiro no browser
    }
} else {
    echo "Изображения отсутствуют!";
}
debug($arr);

echo FileInput::widget([
    'name' => 'attachment_49[]',
    'options'=>[
        'multiple'=>true
    ],
    'pluginOptions' => [
        'deleteUrl' => Url::toRoute(['realty/delete-image']),
        'initialPreview' => $arr,
        'initialPreviewAsData'=>true,
        'initialCaption'=>"The Moon and the Earth",
        'initialPreviewConfig' => [
            ['caption' => 'Moon.jpg', 'size' => '873727'],
            ['caption' => 'Earth.jpg', 'size' => '1287883'],
        ],
        'overwriteInitial'=>false,
        'maxFileSize'=>1000
    ]
]);
?>