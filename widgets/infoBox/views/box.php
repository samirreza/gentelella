<?php
use yii\bootstrap\Html;
?>

<div class="tile-stats">
    <div class="icon">
        <i class="fa fa-<?= $icon ?>"></i>
    </div>
    <?php if($showCount !== false): ?>
    	<div class="count"><?= Yii::$app->formatter->asFarsiNumber($count) ?></div>
    	<h4><?= $title ?></h4>
	<?php elseif($titleUrl !== false): ?>
		<?= Html::beginTag('a', ['href' => $titleUrl]) ?>
	    <div class="title"><?= $title ?></div>
	    <?= Html::endTag('a') ?>
	<?php endif; ?>
</div>
