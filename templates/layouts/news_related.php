<?php foreach($tintuc as $key =>$v){ ?>

<div class='col l-6 m-6 c-12 w-100-m mb20 mb-m-10 mb-t-10'>
    <div class="box-post">
        <div class="row d-flex d-block-m">
            <div class='col l-4 m-6 c-12'>
                <a class='post-img' href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" title="<?=$v["ten_$lang"]?>">
                    <span><i class="fa fa-file-text"></i></span>
                    <img loading="lazy" src='<?=_thumbs?>/400x280x1/<?=_upload_baiviet_l.$v["photo"]?>'
                        alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?> /></a>
            </div>
            <div class='col l-8 m-6 c-12'>
                <h2 class='post-name line-2'><a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>"
                        title="<?=$v["ten_$lang"]?>"><?=$v["ten_$lang"]?></a></h2>
                <p class="post-date clearfix">
                    <span class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i>
                        <?=date("d/m/Y", $v['ngaytao'])?></span>
                    <span class="pull-right"><?=_luotxem?>: <?=$v['luotxem']?></span>
                </p>
                <div class='post-desc j-text mt10 line-3'>
                    <?=htmlspecialchars_decode($v["mota_$lang"])?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }?>