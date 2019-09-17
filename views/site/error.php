<?php

use yii\helpers\Html;

$this->title = nl2br(Html::encode($message));

?>

<div class="site-error">
    <br><br>
    <div class="alert alert-danger text-center">
        <?= nl2br(Html::encode($message)) ?>
    </div>
</div>
