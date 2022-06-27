

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