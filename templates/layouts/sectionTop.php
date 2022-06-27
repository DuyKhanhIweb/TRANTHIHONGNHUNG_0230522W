<section class="template-top pt10 pb10 clearfix d-none-m d-none-tablet" style="background:url('<?=_upload_hinhanh_l.$bg_top["photo_$lang"]?>') center center/cover;">

    <div class="container">

        <div class="row d-flex align-items-center">
            <div class="item col-4">
                <marquee style="font-family:var(--monts-medium),Arial, Helvetica, sans-serif" behavior="" direction="">
                    <?=$row_setting['slogan_'.$lang]?>
                </marquee>          
            </div>
            <div class="item col-4 t-center">
                <a class="template-top__navtop-links" href=""><i class="fas fa-phone-alt"></i> <span>Hotline:</span> <?=$row_setting["hotline"]?></a>
            </div>
            <div class="item col-4 t-center">
                <a class="template-top__navtop-links" href=""><i class="fa-solid fa-location-dot"></i> <span>Địa chỉ:</span> <?=$row_setting["address_vi"]?></a>
            </div>
        </div>

    </div>

</section>