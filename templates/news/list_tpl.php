<section class="section-realty mt20 mb20 animated fadeInDown">
    <div class="container">
        <div class="row">
            <div class="item col-12">
                <div class="title-default t-center mb20 p-relative">
                    <h1>
                        <span> <?=$seo->getSeo('h1')?></span>
                    </h1>
                </div>
            </div>
            <div class="item col-12">
                 <div class="box-description mt20">
                    <span><?=htmlspecialchars_decode($seo->getSeo('subject'))?></span>
                </div>
            </div>
            <?php if(!empty($seo->getSeo('content'))){?>
            <div class="item col-12">
                <div class="wrapper-toc mt20">
                    <div class="content ul-list-detail">
                         <?=htmlspecialchars_decode($seo->getSeo('content'))?>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="row10 mt30">
            <?php if(count($row_catalogy)>0){?>
                <div class="d-flex flex-wrap box-row" data-paging-load>
                    <?php foreach($row_catalogy as $k=>$val){ ?>
                    <div class="item10 col-3 w-100-m mb30 animated fadeIn">
                        <a href="<?=$val["tenkhongdau"]?>" title="<?=$val["ten_$lang"]?>">
                            <div class="card pd5 bordered-card">
                                <div class="thumb tf-hover o-hidden">
                                    <img class="card-img-top img-block col-12" src="<?=_upload_baiviet_l.$val['photo']?>" alt="<?=$val["ten_$lang"]?>"/>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title bg-page t-center">
                                        <?=$val["ten_$lang"]?>
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php }?>
                </div>
             <div class="item col-12 t-center">
                <a class="more-paging " data-p="1" data-type="<?=$type?>" data-item="<?=$deviceType!='phone' ? 8 : 4 ?>" data-view="<?=$table?>"><span>Xem thêm&nbsp;<i class="fa fa-angle-double-right ml10" aria-hidden="true"></i></span></a>
            </div>
            <?php }else{?>
            <div class="item col-12 t-center">
                Nội dung đang cập nhật....
            </div>
            <?php }?>
        </div>
    </div>
</section>