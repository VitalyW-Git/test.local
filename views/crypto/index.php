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
<!--            добавление формы -->
            <?= CryptoFormWidget::widget([
                'cryptoForm' => $cryptoForm
            ]) ?>
        </div>
    </div>
</div>
<br>
<div class="container" id="js-crypto-data">
<!--    результат выбора полей для конвертации -->
        <?= CryptoConverterWidget::widget([
            'data' => $data,
            'cryptoForm' => $cryptoForm,
        ]) ?>
    </div>



