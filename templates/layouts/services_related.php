<div class="owl-carousel owl-theme owl-carousel-loop in-home col"

            data-height="575" data-dot="1" data-nav='0'

            data-loop='0' data-play='1' data-lg-items='3' data-md-items='3' data-sm-items='2' data-xs-items="2"

            <?php if($deviceType=="computer"){echo "data-margin='20'";}else{echo "data-margin='8'";}?> >

    <?php foreach($tintuc as $key => $v){ ?>

    <div class="pt10 pb10">

        <div class="wrap-services__box mb20">

            <div class="wrap-services__box-img">

                <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" title="<?=$v["ten_$lang"]?>" class="d-block hover-left">

                    <img src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?> >

                </a>

            </div>

            <div class="wrap-services__box-detail">

                <h3 class="wrap-services__box-detail-titles line-1 line-2-m">

                    <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" class="wrap-services__box-detail-links"><?=$v["ten_$lang"]?></a>

                </h3>

            </div>

        </div>

    </div>

    <?php }?>

</div>