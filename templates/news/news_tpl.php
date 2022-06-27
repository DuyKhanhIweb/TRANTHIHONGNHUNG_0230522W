

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

        <div class="row mt30">

            <div class="col l-12 m-12 c-12">

                <div class="row d-flex flex-wrap">

                <?php if(count($tintuc)>0){?>

                    <?php foreach($tintuc as $k => $v){

                        $seoDB = $seo->getSeoDB($v['id'],'baiviet','man',$v["type"]);

                        $alias_call = $func->getAlias($v['id_list'],'baiviet_list',$v['type']);

                        $alias_l = $func->checkListAlias($alias_call);
   
                        ?>

                    <div class="col l-4 m-4 c-12 mb20">

                        <div class="sc-usermanual__box sc-usermanual__box--news">

                            <div class="sc-usermanual__box-img">

                                <a href="<?=$v["type"]?>/<?=$alias_l.$v["tenkhongdau"]?>" title="<?=$v["ten_$lang"]?>" class="d-block hover-left" rel="dofollow">

                                    <img src="<?=_upload_baiviet_l.$v["photo"]?>" alt="<?=$v["ten_$lang"]?>" <?=$func->errorImg()?>>

                                    <div class="sc-usermanual__box-img-time">

                                        <span class="sc-usermanual__box-img-time-date"><?=date('d',$v["ngaytao"])?></span>

                                        <span class="sc-usermanual__box-img-time-month"><?=date('m',$v["ngaytao"])?></span>

                                    </div>

                                </a>

                            </div>

                            <div class="sc-usermanual__box-detail">

                                <h2 class="sc-usermanual__box-detail-title line-2">

                                    <a href="<?=$v["type"]?>/<?=$alias_l.$v["tenkhongdau"]?>" title="<?=$v["ten_$lang"]?>" rel="dofollow"><?=$v["ten_$lang"]?></a>

                                </h2>

                                <div class="sc-usermanual__box-detail-des line-2"><?= htmlspecialchars_decode($v["mota_$lang"])?></div>

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

            <div class="item col-12">

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