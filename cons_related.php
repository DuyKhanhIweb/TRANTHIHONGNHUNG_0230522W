<div class="row">
    <?php foreach($tintuc as $key=>$val): ?>

    <div class="col l-2-4 m-6 c-6 mb20 mb-m-8 mb-t-16 d-flex flex-column">

        <div class="wrap-project__box d-flex flex-column">

            <div class="wrap-project__box-img">

                <a href="<?=$val["type"]?>/<?=$alias_l.$val["tenkhongdau"]?>" class="hover-left d-block" title="<?=$val["ten_$lang"]?>">

                    <img src="<?=_upload_baiviet_l.$val["photo"]?>" alt="<?=$val["ten_$lang"]?>" <?=$func->errorImg()?>>

                </a>

            </div>

            <div class="wrap-project__box-content d-flex flex-column">

                <h3 class="wrap-project__box-content-titles line-2">

                    <a href="<?=$val["type"]?>/<?=$alias_l.$val["tenkhongdau"]?>" class="wrap-project__box-content-links"><?=$val["ten_$lang"]?></a>

                </h3>

            </div>

        </div>

    </div>

    <?php endforeach ?>
</div>