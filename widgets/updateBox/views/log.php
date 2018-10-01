<div class="x_panel">
    <div class="x_title">
        <h2>آخرین بروزرسانی ها</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="dashboard-widget-content">
            <ul class="list-unstyled timeline widget">
                <?php foreach ($lastUpdate as $update) : ?>
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                    <a> نسخه : <?= $update->version ?></a>
                                </h2>
                                <div class="byline">
                                    <span><?= Yii::$app->formatter->asDate($update->date); ?>  </span>
                                </div>
                                <p class="excerpt"><?= $update->description ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                <?php if ($showLink) : ?>
                    <a href="<?= $linkUrl ?>" target="_blank" style="float: left;">تاریخچه تغییرات</a>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>
