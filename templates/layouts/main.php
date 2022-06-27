<?php 

    $bg_huongdan = $func->OneDataPhoto(null,'bg-huongdansudung','limit 0,1',"object");                            // Background hướng dẫn

    $bg_danhgia = $func->OneDataPhoto(null,'bg-danhgia','limit 0,1',"object");                                    // Background hướng dẫn

    $listHot = $func->AllDataList("id,mota_vi,icon,banner,",'san-pham',' and noibat=1',null,"array");             //Danh mục cấp 1 nổi bật

    $newshot = $func->AllData('id,ngaytao,','tin-tuc',' and noibat=1','limit 0,3','array');                        // Lấy toàn bộ tin tức

    $sharehot = $func->AllData('id,ngaytao,','goc-chia-se',' and noibat=1','limit 0,3','array');                   // Lấy toàn bộ hướng dẫn sử dụng

    $feedbacks = $func->AllData('id,ngaytao,mota_vi as mota,rating,','danh-gia-khach-hang',null,' ','array');     // Lấy toàn ý kiến khách hàng

    $allPartners = $func->AllDataPhoto("ten_$lang as ten,link,",'thuong-hieu-doi-tac',null,'object');              // Lấy danh sách đối tác

    $allWhys = $func->AllDataPhoto("ten_$lang as ten,mota_$lang as mota,",'tai-sao',null,'object');              // Lấy danh tại sao

    $promotion = $func->AllData('id,giacu,','khuyen-mai',' and noibat=1',' ','array');                               //Lấy toàn bộ sản phẩm khuyến mãi

?>

<!-- <section class="distribution-system">

     <div class="grid wide">

        <div class="row">

            <div class="col l-4 m-4 c-12">

                <div class="distribution-system__boxleft">

                    <div class="distribution-system__boxleft-header">

                    </div>

                    <div class="distribution-system__boxleft-body">
                        
                    </div>

                </div>

            </div>

            <div class="col l-8 m-8 c-12">

                <div class="distribution-system__boxright" id="loadMapSystem">

                </div>

            </div>

        </div>

     </div>

</section> -->

<?php if(count($promotion)>0){ ?>

<section class="sc-promotion">

    <div class="grid wide">

        <div class="row">

            <div class="col l-12 m-12 c-12 mb30">

                <div class="title-default__index t-center">

                    <span class="title-default__index-icon"><img src="./assets/images/icontieude.png" alt="Icon tiêu đề"></span>

                    <a href="khuyen-mai" title="Khuyến mãi" rel="dofollow" class="title-default__index-name mt20">

                        <span>KHUYẾN MÃI</span>

                    </a>
                    
                </div>

            </div>

            <div class="owl-carousel owl-theme owl-carousel-loop in-home col" data-height="640" data-dot="1" data-nav="0"
                    data-loop="0" data-play="1" data-lg-items="4" data-md-items="3" data-sm-items="3" data-xs-items="2"
                    data-margin='30' data-deplay="3000">

                <?php foreach($promotion as $key => $value){ ?>

                <div class="pt20 pb20">

                    <div class="wrap-productshot__boxbc d-flex flex-column p-relative">
                                                
                        <div class="wrap-productshot__boxbc-outline"></div>
            
                        <div class="wrap-productshot__boxbc-img wrap-productshot__boxbc-img--index p-relative">
            
                            <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" title="<?=$value["ten"]?>" rel="dofollow" class="d-block hover-left">
            
                                <img loading=lazy src="<?=_upload_baiviet_l.$value["photo"]?>" alt="<?=$value["ten"]?>" <?=$func->errorImg()?>>
            
                                <?php if($photos){ ?>
            
                                    <div class="sup-img">
            
                                        <img loading="lazy" src="<?=_upload_baiviet_l.$photos["photo"]?>" alt="<?=$value["ten"]?>" <?=$func->errorImg()?>>
            
                                    </div>
            
                                <?php }?>
            
                                <?php if($func->percentPrice($value["giacu"],$value["giaban"])>0){ ?>
            
                                    <span class="label-sale__products">Giảm <?=$func->percentPrice($value["giacu"],$value["giaban"])?></span>
            
                                <?php }?>
            
                            </a>

                            <a class="fa-transition fa-transition-addcart fa-transition--modifier fa-transition--changewidth js-addcart" data-id="<?=$value["id"]?>" data-qty="1">
                                <i class="fa-light fa-cart-shopping"></i><span>Thêm vào giỏ</span>
                            </a>
        
                        </div>
            
                        <div class="wrap-productshot__boxbc-content d-flex flex-column">
            
                            <h3 class="line-2 wrap-productshot__boxbc-content-titles">
            
                                <a href="<?=$value["type"]?>/<?=$alias_l.$value["tenkhongdau"]?>" title="<?=$value["ten_$lang"]?>" rel="dofollow"><?=$value["ten"]?></a>
            
                            </h3>
            
                            <div class="wrap-productshot__boxbc-content-asideprice d-flex flex-wrap">
            
                                <span class="wrap-productshot__boxbc-content-price col-6 t-left  mt10"><?=($value["giaban"]!=0) ? $func->changeMoney($value["giaban"],$lang):'Liên hệ';?></span>

                                <?php if($value["giaban"]!=0){ ?>
            
                                <del class="wrap-productshot__boxbc-content-priceold col-6  t-right  mt10"><?=($value["giacu"]!=0) ? $func->changeMoney($value["giacu"],$lang):'';?></del>
            
                                <?php }?>
            
                            </div>
            
                        </div>
                        
                    </div>

                </div>

                <?php }?>

            </div>  

        </div>

    </div>

</section>

<?php }?>

<?php if(count($allWhys)>0){ ?>

<section class="sc-whys">

    <div class="grid wide">

        <div class="row">

            <div class="col l-12 m-12 c-12 mb30">

                <div class="title-default__index t-center">

                    <span class="title-default__index-icon"><img src="./assets/images/icontieude.png" alt="Icon tiêu đề"></span>

                    <a href="javascript:void(0)" title="Tại sao chọn Long Phụng Food" class="title-default__index-name mt20">

                        <span>TẠI SAO CHỌN LONG PHỤNG FOOD</span>

                    </a>
                    
                </div>

            </div>

            <?php foreach($allWhys as $key => $vts){ ?>

            <div class="col l-3 m-4 c-6 mb20 mb-m-8 mb-t-16">

                <div class="sc-whys__box">

                    <div class="sc-whys__box-img mb20">

                        <span class="inline-block">

                            <img src="<?=_upload_hinhanh_l.$vts->photo?>" alt="<?=$vts->ten?>" class="hover-left" <?=$func->errorImg()?>>

                        </span>

                    </div>

                    <div class="sc-whys__box-detail">

                        <div class="sc-whys__box-detail-title line-2 mb15">

                            <span><?=$vts->ten?></span>

                        </div>

                        <div class="sc-whys__box-detail-title-des line-4"><?= htmlspecialchars_decode($vts->mota)?></div>

                    </div>

                </div>

            </div>

            <?php }?>

        </div>

    </div>

</section>

<?php }?>

<section class="wrapper-products">

    <div class="grid wide">

        <div class="row">

             <div class="col l-12 m-12 c-12 mb30">

                <div class="title-default__index t-center">

                    <span class="title-default__index-icon"><img src="./assets/images/icontieude.png" alt="Icon tiêu đề"></span>

                    <a href="san-pham" title="Sản phẩm của long phụng food" rel="dofollow" class="title-default__index-name mt20">

                        <span>SẢN PHẨM CỦA LONG PHỤNG FOOD</span>

                    </a>
                    
                </div>

            </div>

        </div>

        <div class="row mb20">

            <div class="col l-2 m-3 c-3"></div>

            <div class="col l-8 m-12 c-12">

                <div class="">

                    <ul class="wrapper-products__list">

                        <?php foreach($listHot as $key => $vlh){ ?>

                        <li class="wrapper-products__item">

                            <a href="javascript:void(0)" data-list="<?=$vlh["id"]?>" data-cat="0" data-type="san-pham" data-target="#view-products" class="wrapper-products__links js-cat"><?=$vlh["ten"]?></a>

                        </li>

                        <?php }?>

                    </ul>

                </div>

            </div>

            <div class="col l-1 m-12 c-12">

                <div class="d-flex wrapper-aside__button">

                    <span class="wrapper-products__prev" data-catology-prev><i class="fa-light fa-angle-left"></i></span>

                    <span class="wrapper-products__next" data-catology-next><i class="fa-light fa-angle-right"></i></span>

                </div>

            </div>

        </div>

        <div id="view-products">

            <script>

                $(() => {

                    _FRAMEWORK.pagingData(1, <?= $row_setting['page_in']?>, "ajax_paging.php",
                        0, 0, 'san-pham', '#view-products<?=$key?>');


                });

            </script>

        </div>

    </div>

</section>

<section class="wrapper-combo">

    <div class="grid wide">

        <div class="row">

            <div class="wrapper-combo__box">

                <div class="wrapper-combo__box-img p-relative">

                    <a href="" title="" class="hover-left d-block">

                        <img src="" alt="">

                        <span class="wrapper-combo__box-sale"></span>

                    </a>

                    <a class="fa-transition fa-transition-addcart fa-transition--modifier fa-transition--changewidth js-addcart" data-id="<?=$value["id"]?>" data-qty="1">
                        
                        <i class="fa-light fa-cart-shopping"></i><span>Thêm vào giỏ</span>

                    </a>

                </div>

                <div class="wrapper-combo__box-detail">
                    
                    <h3 class="wrapper-combo__box-detail-title line-2">

                        <a href=""></a>
                        
                    </h3>

                    <div class="wrapper-combo__box-detail-price d-flex flex-wrap">

                        <span class="wrapper-combo__box-detail-price-new t-left col-6"></span>

                        <del class="wrapper-combo__box-detail-price-old col-6 t-right"></del>

                    </div>

                </div>

                <div class="wrapper-combo__box-bottom">
                    
                    <div class="wrapper-combo__box-bottom-des"></div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php if(count($sharehot)>0){ ?>

<section class="sc-usermanual" style="background:url('<?=_upload_hinhanh_l.$bg_huongdan->photo?>') no-repeat center center/cover;">

    <div class="grid wide">

        <div class="row">

            <div class="col l-12 m-12 c-12 mb50">

                <div class="wrapper-title-default">

                    <a href="goc-chia-se" title="Hướng dẫn sử dụng" rel="dofollow">

                        <span>HƯỚNG DẪN SỬ DỤNG</span>

                    </a>

                </div>

            </div>

            <?php foreach($sharehot as $key => $value){ ?>

            <div class="col l-4 m-4 c-12 mb30">

                <div class="sc-usermanual__box">

                    <div class="sc-usermanual__box-img sc-usermanual__box-img--guide">

                        <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" title="<?=$value["ten"]?>" class="d-block hover-left" rel="dofollow">

                            <img src="<?=_upload_baiviet_l.$value["photo"]?>" alt="<?=$value["ten"]?>" <?=$func->errorImg()?>>

                        </a>

                    </div>

                    <div class="sc-usermanual__box-detail">

                        <h3 class="sc-usermanual__box-detail-title line-2">

                            <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" title="<?=$value["ten"]?>" rel="dofollow"><?=$value["ten"]?></a>

                        </h3>

                        <div class="sc-usermanual__box-detail-des line-2"><?= htmlspecialchars_decode($value["mota"])?></div>

                    </div>

                </div>

            </div>

            <?php }?>

        </div>

    </div>

</section>

<?php }?>

<?php if(count($newshot)>0){ ?>

<section class="sc-usermanual">

    <div class="grid wide">

        <div class="row">

            <div class="col l-12 m-12 c-12 mb50">

                <div class="wrapper-title-default">

                    <a href="goc-chia-se" title="Hướng dẫn sử dụng" rel="dofollow">

                        <span>HƯỚNG DẪN SỬ DỤNG</span>

                    </a>

                </div>

            </div>

            <?php foreach($newshot as $key => $value){ ?>

            <div class="col l-4 m-4 c-12 mb30">

                <div class="sc-usermanual__box sc-usermanual__box--news">

                    <div class="sc-usermanual__box-img">

                        <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" title="<?=$value["ten"]?>" class="d-block hover-left" rel="dofollow">

                            <img src="<?=_upload_baiviet_l.$value["photo"]?>" alt="<?=$value["ten"]?>" <?=$func->errorImg()?>>

                            <div class="sc-usermanual__box-img-time">

                                <span class="sc-usermanual__box-img-time-date"><?=date('d',$value["ngaytao"])?></span>

                                <span class="sc-usermanual__box-img-time-month"><?=date('m',$value["ngaytao"])?></span>

                            </div>

                        </a>

                    </div>

                    <div class="sc-usermanual__box-detail">

                        <h3 class="sc-usermanual__box-detail-title line-2">

                            <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" title="<?=$value["ten"]?>" rel="dofollow"><?=$value["ten"]?></a>

                        </h3>

                        <div class="sc-usermanual__box-detail-des line-2"><?= htmlspecialchars_decode($value["mota"])?></div>

                    </div>

                </div>

            </div>

            <?php }?>

        </div>

    </div>

</section>

<?php }?>

<?php if(count($feedbacks)>0){ ?>

<section class="wrapper-feedback" style="background:url('<?=_upload_hinhanh_l.$bg_danhgia->photo?>') no-repeat center center/cover;">

    <div class="grid wide">

        <div class="row">

            <div class="col l-12 m-12 c-12 mb50">

                <div class="wrapper-title-default">

                    <a href="javascript:void(0)" title="Đánh giá khách hàng">

                        <span>ĐÁNH GIÁ KHÁCH HÀNG</span>

                    </a>

                </div>

            </div>

            <div class="owl-carousel owl-theme owl-carousel-loop quick-slide"

                data-height="575" data-dot="1" data-nav='0'

                data-loop='0' data-play='1' data-lg-items='2' data-md-items='2' data-sm-items='2' data-xs-items="1"

                <?php if($deviceType=="computer"){ ?> data-margin='30' <?php }else{ ?> data-margin='8' <?php }?>>

        <?php foreach($feedbacks as $key => $vfb){ ?>

                <div class="pt10 pb10">

                    <div class="wrapper-feedback__box mb20">

                        <div class="wrapper-feedback__box-left">

                            <div class="wrapper-feedback__box-left-img mb20">

                                <span class="hover-left">

                                    <img src="<?=_upload_baiviet_l.$vfb["photo"]?>" alt="<?=$vfb["ten"]?>" <?=$func->errorImg()?>>

                                </span>

                            </div>

                            <span class="wrapper-feedback__box-left-name"><?=$vfb["ten"]?></span>

                        </div>

                        <div class="wrapper-feedback__box-right">

                            <div class="wrapper-feedback__box-right-star mb30">

                                <?= $func->getRatingComment($vfb["rating"]); ?>
                                
                            </div>

                            <div class="wrapper-feedback__box-right-des"><?=htmlspecialchars_decode($vfb["mota"])?></div>

                        </div>

                    </div>

                </div>

        <?php }?>

            </div>

        </div>

      

    </div>

</section>

<?php }?>

<?php if(count($allPartners)>0){ ?>

<section class="wrap-partners fadeInLeft wow" data-wow-offset="50" data-wow-duration="3" data-wow-delay="0.2s" style="background:url('<?=_upload_hinhanh_l.$bg_doitac->photo?>') no-repeat center center/cover;">

    <div class="grid wide">

        <div class="row mb20">

            <div class="col l-12 m-12 c-12 mb30">

                <h2 class="wrapper-title-default">

                    <a href="javascript:void(0)" title="Thương hiệu đối tác">

                        <span>THƯƠNG HIỆU ĐỐI TÁC</span>

                    </a>

                </h2>

            </div>

        </div>

        <div class="row">

            <div class="owl-carousel owl-theme owl-carousel-loop quick-slide col"

                data-height="575" data-dot="1" data-nav='0'

                data-loop='0' data-play='1' data-lg-items='6' data-md-items='3' data-sm-items='3' data-xs-items="2" data-deplay="4000"

                <?php if($deviceType=="computer"){echo "data-margin='20'";}else{echo "data-margin='8'";}  ?>>

            <?php foreach($allPartners as $valPn): ?>

                <div class="pt20 pb20">

                    <div class="wrap-partners__img mb20">

                        <a href="<?=$valPn->link?>" class="d-block hover-left" target="_blank" rel="nofollow">

                            <img src="<?=_upload_hinhanh_l.$valPn->photo?>" alt="<?=$valPn->ten?>">

                        </a>

                    </div>

                </div>

            <?php endforeach ?>

            </div>

        </div>

    </div>

</section>

<?php }?>








