<?php

use app\assets\CheckBoxAsset;
use app\models\CryptoForm;

/* @var $cryptoForm CryptoForm */
/** @var $data array */

CheckBoxAsset::register($this)
?>

<div class="col-sm-3">
    <ul class="list-group">
        <li class="list-group-item active"><?= $cryptoForm['altcoin'] ?></li>
        <?php
        foreach ($data as $name => $summa) { ?>
            <li class="list-group-item list-group-item-success">
                <?= $name ?>: <?php
                $number = number_format($summa, '2', ',', ' ');
                echo $number
                ?>
            </li>
        <?php } ?>
    </ul>
</div>
<br>
<p id="output"></p>