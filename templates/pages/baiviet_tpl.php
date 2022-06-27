<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6"></script>

<div class="container">

    <div class="row">

        <div class="item col-12">

            <div class="content bg-white mt20">

                <div class="other-news">

                    <div class="ul-list-detail font-detail">

                        <div class="title-default p-relative mb-10 t-center">

                            <h1>

                               <span><?=$seo->getSeo('h1')?></span>

                            </h1>

                        </div>

                        <div class="detail mt30">

                            <?=htmlspecialchars_decode($row_detail['noidung_'.$lang])?>

                        </div>

                        <div class="box-comment__detail mt20">

                            <div class="wrapper-toc">
                                
                                <div class="fb-comments"data-href="<?= $func->getCurrentPageURL() ?>"data-width="100%" data-numposts="5"></div>

                            </div>

                        </div>

                    </div>
                    
                    <div class="detail mt20">

                        <?php include_once _source.'shareLinks.php'?>
                        
                    </div>

                </div>

            </div>

        </div>

    </div>
    
</div>