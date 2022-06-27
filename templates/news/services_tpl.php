<section class="section-news mt20 mb20 mt-m-10 mb-m-10 mb-m-10 mb-t-10">

    <div class="grid wide">

        <div class="row">

            <div class="col l-12 m-12 c-12">

                <div class="title-default t-center mb20 mb-m-10 mb-t-10 p-relative">

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

                <div class="row">

                <?php if(count($tintuc)>0){?>

                    <?php foreach($tintuc as $k => $v){ ?>

                    <div class="col l-4 m-4 c-6 mb20 mb-m-8 mb-t-16">

                        <div class="wrap-services__box">

                            <div class="wrap-services__box-img">

                                <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" title="<?=$v["ten_$lang"]?>" class="d-block hover-left">

                                    <img src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?> >

                                </a>

                            </div>
                        
                            <div class="wrap-services__box-detail">

                                <h2 class="wrap-services__box-detail-titles line-1 line-2-m">

                                    <a href="<?=$v["type"]?>/<?=$v["tenkhongdau"]?>" class="wrap-services__box-detail-links"><?=$v["ten_$lang"]?></a>

                                </h2>

                            </div>

                        </div>

                    </div>

                    <?php }?>

                <?php }else{?>
                <div class="item col-12 t-center">
                    Nội dung đang cập nhật....
                </div>
                <?php }?>

                </div>

            </div>

             <?php if(!$func->isAjax()){?>



            <div class="col l-12 m-12 c-12 mb20">



                <div id="pagingPage"><?=$paging?></div>



            </div>



            <?php }?>

        </div>

        <div class="row">

            <div class="col l-12 m-12 c-12">

                <div class="box-description mt20">

                    <span><?=htmlspecialchars_decode($seo->getSeo('subject'))?></span>

                </div>  

                <div class="wrapper-toc mt20 mb20">

                    <div class="content ul-list-detail">

                        <?=htmlspecialchars_decode($seo->getSeo('content'))?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>