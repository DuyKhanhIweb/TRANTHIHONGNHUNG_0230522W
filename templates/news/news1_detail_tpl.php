<div class="container">

    <div class="row">
        <div class="item col-12 w-100-m mb30">
            <div class="title-default mt-20 t-center p-relative">

                <h1><span><?=$seo->getSeo('h1')?></span></h1>

            </div>
            <div class="box-description mt20">

             <span><?=htmlspecialchars_decode($seo->getSeo('content'))?></span>

            </div>
        </div>
        <div class="item col-3 w-100-m mb20" style="background:#f4f4f4;border-radius:0.5rem">
            <div class="support-box__left">
                <ul class="support-box__left-list">
                    <?php
                        foreach($tintuc as $key=>$vhtdt){
                    ?>
                        <li class="support-box__left-items"  data-tabs data-id="<?=$vhtdt["id"]?>">
                            <a class="support-box__left__links">
                                <i class="fas fa-caret-right"></i> <?=$vhtdt["ten_".$lang]?>
                            </a> 
                        </li>
                    <?php }?>
                </ul>
            </div>        
        </div>
        <div class="item col-9 w-100-m">

            <div class="content-detail bg-white mt20 mb20 clearfix">

                <div class="other-news-detail font-detail">

                    <div class="detail">

                        <!-- <div class="pucblisher d-flex mt40">

                            <p class="mr30"><i class="fa fa-calendar mr5"></i><?=date('d/m/Y',$row_detail['ngaytao'])?></p>

                            <p class="mr30"><i class="fa fa-user mr5"></i>Administrator</p>

                            <p><i class="fa fa-eye mr5"></i><?=$row_detail['luotxem']?></p>

                        </div> -->


                        <div class="wrapper-toc mt20" id="hotro-view">
                            <div class="pucblisher d-flex mt40">

                                <p class="mr30"><i class="fa fa-calendar mr5"></i><?=date('d/m/Y',$row_detail['ngaytao'])?></p>

                                <p class="mr30"><i class="fa fa-user mr5"></i>Administrator</p>

                                <p><i class="fa fa-eye mr5"></i><?=$row_detail['luotxem']?></p>

                            </div>

                            <div class="content ul-list-detail" >

                                <?=htmlspecialchars_decode($row_detail['noidung_'.$lang])?>

                            </div>

                        </div>

                    </div>

                    <div class="detail mt20">

                        <div class="socialmediaicons">

                            <?php include_once _source.'shareLinks.php'?>

                        </div>

                    </div>

                    <?php if(count($tintuc)>0){?>

                    <div class="mt20">

                        <div class="row10 d-flex flex-wrap mt15">

                            <?php  foreach ($tintuc as $v):?>

                             <div class="item10 col-3 w-50-m mb20">

                                    <div class="box border-box">

                                        <div class="thumb tf-hover o-hidden">

                                            <a href="<?=$v["type"]?>/<?=$v['tenkhongdau']?>" title="<?=$v['ten_'.$lang]?>">

                                                <img class="img-block col-12" src="<?=_thumbs?>/270x220x1/<?=_upload_baiviet_l.$v['photo']?>" alt="<?=$v['ten_'.$lang]?>" <?=$func->errorImg()?>/>

                                            </a>

                                        </div>

                                        <div class="desc-box t-center" data-news>

                                            <h2 class="line-2">

                                                <a href="<?=$v["type"]?>/<?=$v['tenkhongdau']?>" title="<?=$v['ten_'.$lang]?>">

                                                    <?=$v['ten_'.$lang]?>

                                                </a>

                                            </h2>

                                            <?php /*

                                            <div class="desc line-2">

                                                <?=htmlspecialchars_decode($v['mota_'.$lang])?>

                                            </div>

                                            */ ?>

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach?>

                        </div>

                    </div>

                    <?php }?>

                </div>

            </div>

        </div>

    </div>

</div>