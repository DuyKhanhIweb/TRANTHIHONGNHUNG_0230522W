<?php $link_search = $com.'/'.$act.'?' ?>

<section class="products-page">

    <div class="grid wide">

        <div class="row mt20 mt-m-10 mt-t-10">

            <div class="col l-12 m-12 c-12" style="margin-bottom:0 !important;">

                <div class="title-default t-center mb30 mb-m-10 mb-t-10 p-relative">

                    <h1>

                        <span>
                            <?php if($seo->getSeo('h1') != ""){?>
                                <?=$seo->getSeo('h1')?>
                            <?php }else{ echo $title_seo;}?>
                        </span>

                    </h1>

                </div>

            </div>

        </div>

        <div class="row mt20">
            
            <div class="col l-12 m-12 c-12">

                <?php if($seo->getSeo('subject')!=''){ ?>

                <div class="box-description mt20">

                    <span><?=htmlspecialchars_decode($seo->getSeo('subject'))?></span>

                </div>

               <?php }?>

               <?php if($seo->getSeo('content')!=''){ ?>

                <div class="wrapper-toc mt20">

                    <div class="content ul-list-detail">

                        <?=htmlspecialchars_decode($seo->getSeo('content'))?>

                    </div>

                </div>

                <?php }?>

            </div>
            
        </div>

        <div class='row mt30'>

            <div class="col l-12 m-12 c-12">

                <div class="box-product-detail">

                    <div class="row">

                        <div class="col l-12 m-12 c-12" style="margin-top:0!important;">

                            <div class="box-inPage">

                                <div class="tab-content">

                                   <div class="tab-panel">       

                                        <?php if(count($tintuc)>0){?>

                                        <div class="row" id="grid-view">

                                            <?php
                                                foreach($tintuc as $key => $v){

                                                    $photos = $db->rawQueryOne("select id,photo from #_baiviet_photo where type=? and id_baiviet=? order by stt asc, id desc",array($v["type"],$v["id"]));
                                                ?>

                                                <div class="col l-3 m-4 c-6 mb20 mb-m-8 mb-t-16 d-flex flex-column">

                                                    <div class="wrap-productshot__boxbc d-flex flex-column p-relative">
                                                                                            
                                                        <div class="wrap-productshot__boxbc-outline"></div>

                                                        <div class="wrap-productshot__boxbc-img p-relative">

                                                            <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" title="<?=$v["ten_$lang"]?>" rel="dofollow" class="d-block hover-left">

                                                                <img loading=lazy src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?>>

                                                                <?php if($photos){ ?>

                                                                    <div class="sup-img">

                                                                        <img loading="lazy" src="<?=_upload_baiviet_l.$photos["photo"]?>" alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?>>

                                                                    </div>

                                                                <?php }?>

                                                                <?php if($func->percentPrice($v["giacu"],$v["giaban"])>0){ ?>

                                                                    <span class="label-sale__products">-<?=$func->percentPrice($v["giacu"],$v["giaban"])?></span>

                                                                <?php }?>

                                                            </a>

                                                            <a class="fa-transition fa-transition-view fa-transition--modifier" rel="dofollow" href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" title="<?=$v["ten_$lang"]?>">
                                                                <i class="fa-light fa-eye"></i>
                                                            </a>

                                                            <a class="fa-transition fa-transition-addcart fa-transition--modifier fa-transition--changewidth js-addcart" data-id="<?=$v["id"]?>" data-qty="1">
                                                                <i class="fa-light fa-cart-shopping"></i><span></span>
                                                            </a>

                                                        </div>

                                                        <div class="wrap-productshot__boxbc-content d-flex flex-column">

                                                            <h3 class="line-2 wrap-productshot__boxbc-content-titles">

                                                                <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" title="<?=$v["ten_$lang"]?>" rel="dofollow"><?=$v["ten_$lang"]?></a>

                                                            </h3>

                                                            <div class="wrap-productshot__boxbc-content-asideprice d-flex flex-wrap">

                                                                <?php if($v["giaban"]!=0){ ?>

                                                                <del class="wrap-productshot__boxbc-content-priceold col-6 t-left  mt10"><?=($v["giacu"]!=0) ? $func->changeMoney($v["giacu"],$lang):'';?></del>

                                                                <?php }?>

                                                                <span class="wrap-productshot__boxbc-content-price col-6 t-right  mt10"><?=($v["giaban"]!=0) ? $func->changeMoney($v["giaban"],$lang):'Liên hệ';?></span>

                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                </div>

					                        <?php }?>

                                        </div>

                                        <?php }else echo '<p class="notice mg-0 t-center">Nội dung đang cập nhật</p>';  ?>

                                    </div>

                                </div>

                                

                                <?php if(!$func->isAjax()){?>



                                <div class="col l-12 m-12 c-12 mb20">



                                    <div id="pagingPage"><?=$paging?></div>



                                </div>



                                <?php }?>



                                <?php if($com!='tags-san-pham'){ ?>



                                <input type="hidden" name="keywords" id="keyword" value="<?=$_GET["keywords"]?>" />



                                <input type="hidden" name="href" value="<?=base64_encode($https_config.$link_search)?>">



                                <?php }else{ ?>



                                <input type="hidden" name="keywords" id="keyword" value="<?=$_GET["keywords"]?>" />



                                <input type="hidden" name="href" value="<?=base64_encode($https_config.$link_search)?>">


                                <?php } ?>



                            </div>



                        </div>



                    </div>



                </div>



            </div>

        </div>

    </div>

</section>