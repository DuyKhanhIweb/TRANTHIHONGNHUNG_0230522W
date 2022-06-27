<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6"></script>

<div class="grid wide">

    <div class="row">

    <?php 
        
        $col = 'col l-12 m-12 c-12';

        if($row_detail['mucluc']==1){
            
            $col = 'col l-70 m-12 c-12';
            
        ?>

        <?php include_once _layouts.'toc.php'; ?>

        <?php }?>

        <div class="<?=$col?>">

            <div class="content-detail mt20 mb20 clearfix">

                <div class="other-news-detail font-detail">

                    <div class="detail">

                        <div class="title-default t-center mt-20 p-relative">

                            <h1><span><?=$seo->getSeo('h1')?></span></h1>

                        </div>

                        <div class="pucblisher d-flex mt40">

                            <p class="mr30"><i class="fa fa-calendar mr5"></i><?=date('d/m/Y',$row_detail['ngaytao'])?></p>

                            <p class="mr30"><i class="fa fa-user mr5"></i>Administrator</p>

                            <p><i class="fa fa-eye mr5"></i><?=$row_detail['luotxem']?></p>

                        </div>

                        <div class="box-description mt20 original">

                            <span><?=htmlspecialchars_decode($seo->getSeo('content'))?></span>

                        </div>

                        <div class="wrapper-content__news-detail mt20">

                            <div class="content ul-list-detail original">

                                <?=htmlspecialchars_decode($row_detail['noidung_'.$lang])?>

                            </div>

                        </div>

                    </div>

                    <div class="detail mt20">

                        <div class="wrap-aside__socical">

                            <span class="wrap-title__socialdetail">Chia sẻ:</span>

                            <div class="socialmediaicons">

                                <?php include_once _source.'shareLinks.php'?>

                            </div>

                        </div>

                    </div>

                    <div class="box-comment__detail mt20">

                        <div class="wrapper-toc">
                            
                            <div class="fb-comments"data-href="<?= $func->getCurrentPageURL() ?>"data-width="100%" data-numposts="5"></div>

                        </div>

                    </div>

                    <?php if(count($tintuc)>0){ ?>

                    <div class="wrap-list__related mt20">

                        <span class="wrap-list__related-title mb10"><i class="fa-light fa-list-check"></i> Bài viết khác:</span>

                        <ul class="wrap-list__related-nav">

                            <?php foreach($tintuc as $key => $value){ ?>

                            <li class="wrap-list__related-item">

                                <a href="<?=$value["type"]?>/<?=$value["tenkhongdau"]?>" class="wrap-list__related-links"><i class="fa-light fa-angles-right"></i> <?=$value["ten_$lang"]?></a>

                            </li>

                            <?php }?>

                        </ul>

                    </div>

                    <?php }?>

                </div>

            </div>

        </div>

    </div>

</div>

