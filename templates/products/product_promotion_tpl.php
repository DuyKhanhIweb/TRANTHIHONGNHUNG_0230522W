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
                                                    
                                                    $alias_l= $func->getAlias($v['id_list'],'baiviet_list',$v['type']).'/';
                                                    $photos = $db->rawQueryOne("select id,photo from #_baiviet_photo where type=? and id_baiviet=? order by stt asc, id desc",array($v["type"],$v["id"]));
                                                ?>

                                                 <div class="col l-3 m-4 c-6 mb30 mb-m-8 mb-t-16">

                                                    <div class="wrap-productshot__boxbc d-flex flex-column p-relative">
                                                                                                
                                                        <div class="wrap-productshot__boxbc-bgfake"></div>

                                                        <div class="wrap-productshot__boxbc-img p-relative">

                                                            <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" class="d-block hover-left">

                                                                <img loading=lazy src="resize1/278x278/2/<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?>>

                                                                <?php if($photos){ ?>

                                                                    <div class="sup-img">

                                                                        <img loading="lazy" src="resize1/278x278/2/<?=_upload_baiviet_l.$photos["photo"]?>" alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?>>

                                                                    </div>

                                                                <?php }?>

                                                                <?php if($func->percentPrice($v["giacu"],$v["giaban"])>0){ ?>

                                                                    <span class="label-sale__products">-<?=$func->percentPrice($v["giacu"],$v["giaban"])?></span>

                                                                <?php }?>

                                                            </a>

                                                        </div>

                                                        <div class="wrap-productshot__boxbc-content d-flex flex-column mb10">

                                                            <h2 class="line-2 wrap-productshot__boxbc-content-titles">

                                                                <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>"><?=$v["ten_$lang"]?></a>

                                                            </h2>

                                                            <div class="wrap-productshot__boxbc-content-asideprice d-flex flex-wrap mt10">

                                                                <span class="wrap-productshot__boxbc-content-price col-6 w-100-m t-left t-center-m"><?=($v["giaban"]!=0) ? $func->changeMoney($v["giaban"],$lang):'Liên hệ';?></span>

                                                                <?php if($v["giaban"]!=0){ ?>

                                                                <del class="wrap-productshot__boxbc-content-priceold col-6 w-100-m t-right t-center-m"><?=($v["giacu"]!=0) ? $func->changeMoney($v["giacu"],$lang):'';?></del>

                                                                <?php }?>

                                                            </div>

                                                            <div class="wrap-productshot__boxbc-content-overflow mt10">

                                                                <div class="wrap-productshot__boxbc-content-overflow-des line-3">

                                                                    <div><?= htmlspecialchars_decode($v["mota_$lang"])?></div>

                                                                </div>

                                                                <div class="wrap-productshot__boxbc-content-overflow-cart t-center mt10">

                                                                    <button class="wrap-productshot__boxbc-content-overflow-cart-btn js-addcart" data-id="<?=$v["id"]?>" data-qty="1"><span>THÊM VÀO GIỎ</span></button>

                                                                </div>

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