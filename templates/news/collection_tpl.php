<section class="wrapper-collection">

    <div class="grid wide">
    
        <div class="row">

            <div class="col l-12 m-12 c-12 mb30">

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
        <?php if(count($tintuc)>0){ ?>

        <div class="row align-items-center">

        <?php foreach($tintuc as $key => $value){ ?>

            <div class="col l-12 m-12 c-12 mb30">

                <div class="wrapper-collection__asdie">

                    <div class="row align-items-center">

                        <div class="col l-5 m-6 c-12">

                            <div class="wp-shares__boxleft">

                                <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" class="d-block hover-left" rel="dofollow" title="<?=$value["ten_$lang"]?>">
                                    
                                    <img src="<?=_upload_baiviet_l.$value["photo"]?>" alt="<?=$value["ten_$lang"]?>" <?=$func->errorImg()?>>

                                </a>

                            </div>

                        </div>

                        <div class="col l-7 m-6 c-12">

                            <div class="wp-shares__boxright">

                                <h2 class="wp-shares__boxright-title line-2">

                                    <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" title="<?=$value["ten_$lang"]?>" rel="dofollow"><?=$value["ten_$lang"]?></a>

                                </h2>

                                <div class="wp-shares__boxright-des line-3 mb20"><?=htmlspecialchars_decode($value["mota_$lang"])?></div>

                                <div class="wp-shares__boxright-btn">

                                    <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" title="Xem thêm" rel="dofollow">Xem thêm</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        <?php }?>

        </div>

        <div class="row">

            <?php if(!$func->isAjax()){?>

            <div class="col l-12 m-12 c-12 mb20">

                <div id="pagingPage"><?=$paging?></div>

            </div>

            <?php }?>

        </div>

        <?php }else{ ?>

        <div class="row">

            <div class="col l-12 m-12 c-12">

                <p>Nội dung đang được cập nhật...</p>

            </div>

        </div>

        <?php }?>

        <div class="row">

            <div class="col l-12 m-12 c-12">

                <?php if($seo->getSeo('subject') !=''){ ?>

                <div class="box-description mt20">
                    <span><?=htmlspecialchars_decode($seo->getSeo('subject'))?></span>
                </div>

                <?php }?>


                <?php if($seo->getSeo('content') !=''){ ?>

                <div class="wrapper-toc mt20 mb20">

                    <div class="content ul-list-detail">
                        <?=htmlspecialchars_decode($seo->getSeo('content'))?>
                    </div>

                </div>

                <?php }?>

            </div>

        </div>

    </div>

</section>

