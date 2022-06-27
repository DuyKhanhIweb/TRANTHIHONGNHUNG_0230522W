<div class="container">
    <div class="row">
        <div class="item col-12">
            <div class="content-detail bg-white mt20 mb20 clearfix">
                <div class="other-news-detail font-detail">
                    <div class="detail">
                        <div class="title-default mt-20 t-center p-relative">
                            <h1><span><?=$seo->getSeo('h1')?></span></h1>
                        </div>
                        <div class="pucblisher d-flex mt40">
                            <p class="mr30"><i class="fa fa-calendar mr5"></i><?=date('d/m/Y',$row_detail['ngaytao'])?></p>
                            <p class="mr30"><i class="fa fa-user mr5"></i>Administrator</p>
                            <p><i class="fa fa-eye mr5"></i><?=$row_detail['luotxem']?></p>
                        </div>
                        <div class="box-description mt20">
                            <span><?=htmlspecialchars_decode($seo->getSeo('content'))?></span>
                        </div>
                        <div class="wrapper-toc mt20">
                            <div class="content ul-list-detail">
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
                    <div class="mt-20">
                        <div class="title-info border-page p-relative">
                            <div><a href="<?=$row_detail['type']?>" title="Bài viết liên quan"><i class="fa fa-tasks"
                                        aria-hidden="true"></i>&nbsp;Bài viết liên quan</a></div>
                        </div>
                        <div class="mt-15">
                            <?php  foreach ($tintuc as $val):?>
                            <a class="news-order-detail" href="<?=$val['type']?>/<?=$val['tenkhongdau']?>"
                                title="<?=$val['ten_'.$lang]?>">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?=$val['ten_'.$lang]?>
                            </a>
                            <?php endforeach?>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
