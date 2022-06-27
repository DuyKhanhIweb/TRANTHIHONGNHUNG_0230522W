<?php $link_search = $com.'/'.$act.'?' ?>

<section class="products-page">

    <div class="grid wide">

        <div class="row mt20">

            <div class="col l-12 m-12 c-12" style="margin-bottom:0 !important;">

                <div class="title-default t-center mb30 p-relative">

                    <h1>

                        <span> <?=$seo->getSeo('h1')?></span>

                    </h1>

                </div>

            </div>

        </div>

       

        <div class='row mt30'>

            <div class="col l-12 m-12 c-12">



                <div class="box-product-detail">



                    <div class="row">



                        <div class="col l-12 m-12 c-12" style="margin-top:0!important;">



                            <div class="box-inPage">



                                <div class="tab-content">



                                    <div class="tab-panel">

                                            <?php
                                            if(count($tintuc)>0){
                                                foreach($tintuc as $key=>$val){
                                                    $photo = $db->rawQuery("select id,photo from #_baiviet_photo where type=? and id_baiviet=? order by id asc limit 0,2",array($val["type"],$val["id"]));
                                                ?>
                                            <div class="row mb20 row-project" id="grid-view">
                                                <div class="col l-12 m-12 c-12 t-center mb20">
                                                    <div class="title-project-default d-flex justify-content-between align-items-center">
                                                        <h3>
                                                            <a href="<?=$val["type"]?>/<?=$alias_l.$val["tenkhongdau"]?>"><?=$val["ten_$lang"]?></a>
                                                        </h3>
                                                        <a class="button-viewall" href="<?=$val["type"]?>/<?=$alias_l.$val["tenkhongdau"]?>">
                                                            Xem chi tiết <span><i class="fas fa-chevron-right"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col l-12 m-12 c-12">
                                                    <div class="row">
                                                        <div class="col l-8 m-12 c-12 mb20">
                                                            <div class="wrap-project__boxleft">
                                                                <div class="wrap-project__boxleft-img hover-fade">
                                                                    <a href="<?=$val["type"]?>/<?=$val["tenkhongdau"]?>">
                                                                        <img src="<?=_upload_baiviet_l.$val["photo"]?>" alt="<?=$val["ten_$lang"]?>">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col l-4 m-4 c-12">     
                                                            <div class="row">
                                                                <?php foreach($photo as $keypt =>$valpt){?>
                                                                    <div class="col l-12 m-12 c-6 mb20">
                                                                        <div class="wrap-project__boxright hover-fade">
                                                                            <div class="wrap-project__boxright-img">
                                                                                <a href="<?=$val["type"]?>/<?=$val["tenkhongdau"]?>">
                                                                                    <img src="<?=_upload_baiviet_l.$valpt["photo"]?>" alt="Hình ảnh con <?=$keypt?>">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php }?>
                                                            </div>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        <?php }}else{ echo '<p class="t-center">Nội dung đang được cập nhật...</p>';}?>


                                    </div>



                                </div>

                                

                                <?php if(!$func->isAjax()){?>



                                <div class="item col-12">



                                    <div id="pagingPage"><?=$paging?></div>



                                </div>



                                <?php }?>



                                <?php if($com!='tags-san-pham'){ ?>



                                <input type="hidden" name="keywords" id="keyword" value="<?=$_GET["keywords"]?>" />



                                <input type="hidden" name="href" value="<?=base64_encode($https_config.$link_search)?>">







                                <?php }else{ ?>



                                <input type="hidden" name="keywords" id="keyword" value="<?=$_GET["keywords"]?>" />



                                <input type="hidden" name="href" value="<?=base64_encode($https_config.$link_search)?>">







                                <?php } ?>



                            </div>



                        </div>



                    </div>



                </div>



            </div>

        </div>

        <div class="row">
            
            <div class="item col-12">

                <div class="box-description mt20">
                    <span><?=htmlspecialchars_decode($seo->getSeo('subject'))?></span>
                </div>
                <div class="wrapper-toc mt20">
                    <div class="content ul-list-detail">
                        <?=htmlspecialchars_decode($seo->getSeo('content'))?>
                    </div>
                </div>

            </div>
            
        </div>

    </div>

</section>