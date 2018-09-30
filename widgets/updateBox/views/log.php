<div class="x_panel">
    <div class="x_title">
        <h2>بروزرسانی های اخیر</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="dashboard-widget-content">
            <ul class="list-unstyled timeline widget">
                <li>
                    <div class="block">
                        <div class="block_content">
                            <h2 class="title">
                                <a>  نسخه :  <?=$lastUpdate->version?></a>
                            </h2>
                            <div class="byline">
                                <span>  تاریخ بروزرسانی :  <?=Yii::$app->formatter->asDate($lastUpdate->date);?>  </span>
                            </div>
                            <p class="excerpt"><?=$lastUpdate->description?></p>
                            <a href="<?=$linkUrl?>" target="_blank" style="float: left;">نمایش بیشتر</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>