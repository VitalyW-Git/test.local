<?php

use app\assets\CheckBoxAsset;
use app\models\CryptoForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $cryptoForm app\models\CryptoForm */
/** @var $data array */

CheckBoxAsset::register($this)

?>

<!--<div class="col-sm-5">-->
<!--<form >-->
<!--    <div class="form-group row ">-->
<!--        <label for="inputEmail3" class="col-sm-2 col-form-label">Altcoin</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="email" class="form-control" id="inputEmail3">-->
<!--        </div>-->
<!--    </div>-->
<!--    <fieldset class="form-group">-->
<!--        <div class="row">-->
<!--            <legend class="col-form-label col-sm-2 pt-0">Валюта</legend>-->
<!--            <div class="col-sm-10">-->
<!--                <div class="form-check">-->
<!--                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>-->
<!--                    <label class="form-check-label" for="gridRadios1">-->
<!--                        First radio-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-check">-->
<!--                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">-->
<!--                    <label class="form-check-label" for="gridRadios2">-->
<!--                        Second radio-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-check disabled">-->
<!--                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>-->
<!--                    <label class="form-check-label" for="gridRadios3">-->
<!--                        Third disabled radio-->
<!--                    </label>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </fieldset>-->
<!--    <div class="form-group row">-->
<!--        <div class="col-sm-10">-->
<!--            <button type="submit" class="btn btn-primary">Sign in</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</form>-->
<!--</div>-->







<div class="container">
    <div class="col-sm-5">
        <div class="card text-center">
            <div class="card-header">
                <h1>Crypto / index</h1>
            </div>
            <?php $form = ActiveForm::begin([
                'action' => '/crypto/index',
                'method' => 'GET'
            ]) ?>
            <div class="row" id="wrap-check-box">
                <div class="col-sm-4">
                    <?= $form->field($cryptoForm, 'altcoin')->dropDownList(CryptoForm::getAltcoinList()) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($cryptoForm, 'currencys')->checkboxList(CryptoForm::getCarensisList()) ?>
                </div>
            </div>
            <div class="col-sm-4">
                <?= Html::submitButton('Запросить', ['class' => 'btn btn-success button-valut', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php var_dump($cryptoForm);  ?>
<br>
<div class="container">
    <div class="col-sm-3">
    <ul class="list-group">
        <li class="list-group-item active"><?= $cryptoForm['altcoin'] ?></li>


        <?php

        foreach ($data as $item => $f) { ?>

            <li class="list-group-item list-group-item-success">
                <?= $item ?>: <?php
                //            $s = preg_replace("#(\d{1})(\d{3})(\d{3})#","$1 $2 $3",$nam);
                $s = number_format($f, '2', ',', ' ');;
                echo $s
                ?>
            </li>

        <? } ?>
    </ul>

</div>
</div>


