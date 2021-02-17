<?php

use app\assets\CheckBoxAsset;
use app\models\CryptoForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var CryptoForm $cryptoForm  */

CheckBoxAsset::register($this)
?>

<?php
$form = ActiveForm::begin([
    'action' => '/crypto/index',
    'method' => 'GET'
]) ?>
    <div class="row" id="wrap-check-box">
        <div class="col-sm-5">
            <?= $form->field($cryptoForm, 'altcoin')->dropDownList(CryptoForm::getAltcoinList()) ?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($cryptoForm, 'currencys')->checkboxList(CryptoForm::getCarensisList()) ?>
        </div>
        <div class="col-sm-5">
            <?= Html::submitButton('Запросить', ['class' => 'btn btn-success button-valut', 'name' => 'contact-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>