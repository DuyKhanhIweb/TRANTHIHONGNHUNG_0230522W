<section class="section-realty mt20 mb20">
    <div class="container">
        <div class="row">
            <div class="item col-12">
                <div class="title-default t-center mb20 p-relative">
                    <h1>
                        <span> <?=$seo->getSeo('h1')?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row10 d-flex flex-wrap mt30">
            <?php if(count($tintuc)>0){?>
            <?php foreach($tintuc as $k=>$v){ ?>
            <div class="item10 col-3 w-100-m mb20">
                <div class="box border-box">
                    <div class="thumb tf-hover o-hidden">
                        <a href="<?=$v["type"]?>/<?=$v['tenkhongdau']?>" title="<?=$v['ten_'.$lang]?>">
                            <img class="img-block col-12" src="<?=_thumbs?>/270x220x1/<?=_upload_baiviet_l.$v['photo']?>" alt="<?=$v['ten_'.$lang]?>" <?=$func->errorImg()?>/>
                        </a>
                    </div>
                    <div class="desc-box pb10 t-center" data-news>
                        <h2 class="line-2">
                            <a href="<?=$v["type"]?>/<?=$v['tenkhongdau']?>" title="<?=$v['ten_'.$lang]?>">
                                <?=$v['ten_'.$lang]?>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class="item col-12">
                <?=$paging?>
            </div>
            <?php }else{?>
            <div class="item col-12 t-center">
                Nội dung đang cập nhật....
            </div>
            <?php }?>
        </div>
        <div class="row">
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
    </div>
</section>