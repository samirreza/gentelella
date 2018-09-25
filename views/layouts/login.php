<?php

use yii\helpers\Html;
use theme\widgets\FlashMessage;
use theme\assetbundles\IEAssetBundle;
use theme\assetbundles\ThemeAssetBundle;

ThemeAssetBundle::register($this);
IEAssetBundle::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="login">
    <?php $this->beginBody() ?>
        <div class="login_wrapper">
            <div class="flash-message-container">
                <?= FlashMessage::widget() ?>
            </div>
            <div class="animate form login_form">
                <section class="login_content">
                    <div>
                        <h1><?= Yii::$app->name ?></h1>
                        <?= $content ?>
                    </div>
                </section>
            </div>
        </div>
    </body>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
