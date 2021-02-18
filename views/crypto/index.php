<?php

use app\components\widget\CryptoConverterWidget;
use app\components\widget\CryptoFormWidget;
use app\models\CryptoForm;

/* @var $cryptoForm CryptoForm */
/** @var $data array */
?>

<div class="container">
    <div class="col-sm-7">
        <div class="card text-center">
            <div class="card-header">
                <h1>Crypto / Form</h1>
            </div>
            <?= CryptoFormWidget::widget([
                'cryptoForm' => $cryptoForm
            ]) ?>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="col-sm-3" id="js-crypto-data">
        <?= CryptoConverterWidget::widget([
            'data' => $data,
            'cryptoForm' => $cryptoForm,
        ]) ?>
    </div>
</div>


