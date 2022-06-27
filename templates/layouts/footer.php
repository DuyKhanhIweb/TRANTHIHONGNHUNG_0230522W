<footer class="footer pb20 fadeInRight wow" data-wow-offset="50" data-wow-duration="3" data-wow-delay="0.2s" style="background:url('<?=_upload_hinhanh_l.$bg_footer["photo_".$lang]?>') center center/cover">

    <div class="box-footer">

        <div class="container">

            <div class="row d-flex flex-wrap">

                <div class="item col-3 w-100-m">

                    <div class="box-mg">

                        <div class="box-footer__logo-footer mt20">

                            <a href="" class="p-relative">

                                <img src="<?=_upload_hinhanh_l.$logo_footer["photo"]?>" alt="Logo công ty footer">

                                <div class="star-box">

                                    <img src="./assets/images/saolaplanh.png" class="saolaplanh star-animate" alt="Sao lấp lánh">

                                </div>

                            </a>

                        </div>

                        <div class="desc-footer mt25">

                            <?=htmlspecialchars_decode($company_ft["mota"])?>

                        </div>

                    </div>

                </div>

                <div class="item col-3 w-100-m">

                    <div class="box-mg">

                        <div class="title-footer mt20">

                            <span>THÔNG TIN CÔNG TY</span>

                        </div>

                        <div class="desc-footer mt30">

                            <?=htmlspecialchars_decode($footer["mota"])?>

                        </div>

                    </div>

                </div>

                <div class="item col-3 w-100-m">

                    <div class="box-mg">

                        <div class="title-footer mt20">

                            <span>BẢN ĐỒ</span>

                        </div>

                        <div class="desc-footer desc-footer--iframe mt30">

                            <?= htmlspecialchars_decode($row_setting["iframe_map"]) ?>

                        </div>

                    </div>

                </div>

                <div class="item col-3 w-100-m">

                    <div class="box-mg">

                        <div class="title-footer mt20">

                            <span>FANPAGE</span>

                        </div>

                        <div class="desc-footer mt30">

                            <div class="fb-page" data-href="<?=$row_setting['facebook']?>" data-width="500"

                                data-height="200" data-small-header="false" data-adapt-container-width="true"

                                data-hide-cover="false" data-show-facepile="true" data-show-posts="true">

                                <div class="fb-xfbml-parse-ignore">

                                    <blockquote cite="<?=$row_setting['facebook']?>"><a

                                            href="<?=$row_setting['facebook']?>"><?=$row_setting['name_'.$lang]?></a>

                                    </blockquote>

                                </div>

                            </div>

                        </div>
                        
                        <div class="mt20 mb20">

                            <?=$func->getSocial($socical)?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</footer>

<div class="hotline-right hidden-xs show js-active cs-pointer d-none-m" data-target="#support-content">
    <i class="fab fa-whatsapp fab-hothotline1"></i>
    <p style="font-family:var(--monts-light),Arial, Helvetica, sans-serif;">Hotline</p>
    <div class="support-content" id="support-content">
        <ul class="hotline-group">
            <?php foreach($hotline as $key => $value){?>
                <li>
                    <p><?= $value['ten']?></p>
                    <p class="line"><a href="tel:<?=str_replace('.','',str_replace(' ','',$value['phone']))?>"><?= $value['phone']?></a></p>
                </li>
            <?php }?>
        </ul>
    </div>
</div>

<div class="menu-bottom d-none">
    <ul class="clearfix">
        <li>
            <a href="" title="HomePage">
                <i class="fa-thin fa-house"></i>
                <span class="sub">Trang chủ</span>
            </a>
        </li>
        <li>
            <a href="tel:<?= $row_setting['hotline']?>" title="clickToCall">
                <i class="fa-light fa-circle-phone-flip"></i>
                <span class="sub">Hotline</span>
            </a>
        </li>
        
        <li>
            <a href="" title="Trang chủ">
                <img class="scaleimg" width="70" height="70" src="<?=_upload_hinhanh_l.$logo_mobile["photo"]?>"
                    alt="Trang chủ" onerror="this.src='images/no-image.jpg'" />
            </a>
        </li>

        <li>
            <a href="carts?src=gio-hang" data-target="#options" id="tool-1" title="Tiện ích" class="js-mobi-tool p-relative"> 
                <img src="assets/images/giohang.png" alt="" style="width:16px;">
                <span class="sub">Giỏ hàng</span>
                <span class="wrapper-cart__menu-img-qty wrapper-cart__menu-img-qty--mobile view-cart"><?=$cart->getTotalQuality()?></span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" data-target="#menuSide" id="tool-2" class="js-mobi-tool">
                <span class="bars-menu mobi-tool-act"></span>
                <span class="sub">Menu</span>
            </a>
        </li>
    </ul>
</div>