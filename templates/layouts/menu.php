<nav class="wrapper-nav__menu scroll-fixed d-none-m d-none-tablet">

    <ul class="nav-menu d-flex align-items-center justify-content-between">

        <li class="<?php if($com=='' || $com=='index') echo ' active';?>">
            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
            <h2>
                <?php }?>
                <a href="" title="Trang chủ" rel="dofollow"><img src="./assets/images/iconhome.png" alt=""></a>
                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
            </h2>
            <?php }?>
        </li>
        
        <li class="<?php if($com=='ve-chung-toi') echo ' active';?>">
            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
            <h2>
                <?php }?>
                <a href="ve-chung-toi" title="Về chúng tôi" rel="dofollow">VỀ CHÚNG TÔI</a>
                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
            </h2>
            <?php }?>
        </li>

        <li class="<?php if($com=='san-pham') echo ' active';?> p-relative">
        
            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
            <h2>
                <?php }?>
                <a href="san-pham" title="Sản phẩm" rel="dofollow">SẢN PHẨM</a>
                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
            </h2>
            <?php }?>

            <?php if(count($list_c1)>0){?>

            <ul class="">

                <?php foreach($list_c1 as $k=>$v){

                    $c2 = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_cat where hienthi=1 and id_list=? order by stt asc,id desc",array($v['id']));
                    
                    ?>       
                <li class="p-relative">

                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                    <h3>

                        <?php }?>

                        <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>" rel="dofollow" title="<?= $v['ten_'.$lang]?>"><?= $v['ten_'.$lang]?></a>

                        <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                    </h3>

                    <?php }?>

                    <?php if(count($c2)>0){?>

                    <ul>

                    <?php

                        foreach($c2 as $key =>$vc2){

                            $c3 = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_item where hienthi=1 and id_cat=? order by stt asc,id desc",array($vc2['id']));

                    ?>
                        <li class="p-relative">

                            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                            <h4>

                                <?php }?>

                                <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>/<?= $vc2['tenkhongdau']?>" rel="dofollow" title="<?= $vc2['ten']?>"><?= $vc2['ten']?></a>

                                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                            </h4>

                            <?php }?>

                            <?php if(count($c3)>0){ ?>

                                <ul>

                                    <?php
                                        foreach($c3 as $key =>$vc3){
                                    ?>
                                        <li>

                                            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                                            <h5>

                                                <?php }?>

                                                <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>/<?= $vc3['tenkhongdau']?>" rel="dofollow" title="<?= $vc3['ten']?>"><?= $vc3['ten']?></a>

                                                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                                            </h5>

                                            <?php }?>

                                        </li>

                                    <?php } ?>

                                </ul>

                            <?php }?>

                            </li>

                        <?php } ?>

                    </ul>

                    <?php } ?>

                </li>

                <?php }?>

            </ul>

            <?php }?>

        </li>

        <li class="<?php if($com=='combo') echo ' active';?>">

            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            <h2>

                <?php }?>

                <a href="combo" title="Combo" rel="dofollow">COMBO</a>

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            </h2>

            <?php }?>

            <?php if(count($dichvu_c1)>0){?>

            <ul class="">

            <?php foreach($dichvu_c1 as $k => $v){

                $c2 = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_cat where hienthi=1 and id_list=? order by stt asc,id desc",array($v['id']));
                
                ?>  

                <li class="p-relative">

                    <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                    <h3>

                        <?php }?>

                        <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>" rel="dofollow" title="<?= $v['ten']?>"><?= $v['ten']?></a>

                        <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                    </h3>

                    <?php }?>

                    <?php if(count($c2)>0){?>
                    <ul>
                    <?php
                        foreach($c2 as $key =>$vc2){
                            $c3 = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_item where hienthi=1 and id_cat=? order by stt asc,id desc",array($vc2['id']));
                    ?>
                        <li class="p-relative">

                            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                            <h4>

                                <?php }?>

                                <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>/<?= $vc2['tenkhongdau']?>" rel="dofollow" title="<?= $vc2['ten']?>"><?= $vc2['ten']?></a>

                                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

                            </h4>

                            <?php }?>

                            <?php if(count($c3)>0){ ?>
                            <ul>
                                <?php
                                    foreach($c3 as $key =>$vc3){
                                ?>
                                    <li>
                                        <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                                        <h5>
                                            <?php }?>
                                            <a href="<?= $v['type']?>/<?= $v['tenkhongdau']?>/<?= $vc3['tenkhongdau']?>" rel="dofollow" title="<?= $vc3['ten']?>"><?= $vc3['ten']?></a>
                                            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>
                                        </h5>
                                        <?php }?>
                                    </li>
                                <?php } ?>
                            </ul>

                            <?php }?>

                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>

                </li>

            <?php }?>

            </ul>
            
            <?php }?>

        </li>

         <li class="<?php if($com=='khuyen-mai') echo ' active';?>">

            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            <h2>

                <?php }?>

                <a href="khuyen-mai" title="Khuyến mãi" rel="dofollow">KHUYẾN MÃI</a>

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            </h2>

            <?php }?>

        </li>

        <li class="<?php if($com=='he-thong-phan-phoi') echo ' active';?>">

            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            <h2>

                <?php }?>

                <a href="he-thong-phan-phoi" title="Tuyển dụng" rel="dofollow">HỆ THỐNG PHÂN PHỐI</a>

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            </h2>

            <?php }?>

        </li>

        <li class="<?php if($com=='tin-tuc') echo ' active';?>">

            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            <h2>

                <?php }?>

                <a href="tin-tuc" title="Tin tức" rel="dofollow">TIN TỨC</a>

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            </h2>

            <?php }?>

        </li>

        <li class="<?php if($com=='goc-chia-se') echo ' active';?> p-relative">

            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            <h2>

                <?php }?>

                <a href="goc-chia-se" title="Góc chia sẻ" rel="dofollow">GÓC CHIA SẺ</a>

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            </h2>

            <?php }?>

        </li>  

        <li class="<?php if($com=='lien-he') echo ' active';?> p-relative">

            <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            <h2>

                <?php }?>

                <a href="lien-he" title="Liên hệ" rel="dofollow">LIÊN HỆ</a>

                <?php if(in_array($template,explode(',',$row_setting['seo']))){?>

            </h2>

            <?php }?>

        </li>  

    </ul>

</nav>
