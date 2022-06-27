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

                                                    $photos = $db->rawQuery("select id,photo from #_baiviet_photo where type=? and id_baiviet=? order by stt asc, id desc",array($v["type"],$v["id"]));

                                                    
                                                ?>

                                               <div class="col l-4 m-6 c-6 mb20 mb-m-8 mb-t-16 d-flex flex-column">

                                                    <div class="wrapper-active-img__box-small">

                                                        <div class="wrapper-active-img__box-small-img">

                                                            <a href="<?=_upload_baiviet_l.$v["photo"]?>" data-fancybox="images-tpl<?=$key?>" class="d-block hover-left">

                                                                <img src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?>>

                                                            </a>

                                                            <div class="hidden">

                                                            <?php foreach($photos as $keypt => $vpt){ ?>

                                                                <a href="<?=_upload_baiviet_l.$vpt["photo"]?>" data-fancybox="images-tpl<?=$key?>">

                                                                    <img src="<?=_upload_baiviet_l.$vpt["photo"]?>" alt="">

                                                                </a>

                                                            <?php }?>

                                                            </div>

                                                            <script>
                                                                $(function(){

                                                                    $('[data-fancybox="images-tpl<?=$key?>"]').fancybox({

                                                                        thumbs : {
                                                                        autoStart : true
                                                                        },
                                                                        buttons : [
                                                                        'zoom',
                                                                        'close'
                                                                        ]

                                                                     });

                                                                });
                                                                
                                                            </script>

                                                            <div class="wrapper-active-img__box-small-img-overflow d-none-m">

                                                                <div class="wrapper-active-img__box-small-img-overflow-des">
                                                                    
                                                                    <h3 class="wrapper-active-img__box-small-img-overflow-des-title line-2">

                                                                        <a href="<?=_upload_baiviet_l.$v["photo"]?>" data-fancybox="images-tpl<?=$key?>" title="<?=$v["ten_$lang"]?>"><?=$v["ten_$lang"]?></a>

                                                                    </h3>           
                                                            
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

					                        <?php }?>
                                        </div>

                                        <?php }else echo '<p class="notice mg-0 t-center cl-white">Nội dung đang cập nhật</p>';  ?>

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

        <div class="row">
            
            <div class="col l-12 m-12 c-12">

                <div class="box-description mt20">

                    <span><?=htmlspecialchars_decode($seo->getSeo('subject'))?></span>

                </div>

               
                <div class="wrapper-toc mt20">

                    <div class="content ul-list-detail">

                        <?=htmlspecialchars_decode($seo->getSeo('content'))?>

                    </div>

                </div>

            </div>
            
        </div>

    </div>

</section>