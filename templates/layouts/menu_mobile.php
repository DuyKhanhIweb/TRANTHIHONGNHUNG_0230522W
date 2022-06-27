<div class="box-modal-menu d-none d-block-m d-block-tablet" id="menuSide">

    <div class="mb-3">

        <ul class="list social_list">

            <li>

                <div class="js-droptab" data-tab="tienich">

                    <span>Tiện ích</span>

                    <div class="ic-arrow"><span></span></div>

                </div>

                <div data-tab-box="tienich">

                    <ul class="list lienhe_list">

                        <li>
                            <a href="http://zalo.me/<?=str_replace('.','',str_replace(' ','',$row_setting['sozalo']))?>"
                                rel="nofollow" target="_blank">
                                <i class="tienich tool-zalo"></i>

                            </a>
                        </li>

                        <li>
                            <a href="https://m.me/<?=$row_setting['linkmessage']?>" rel="nofollow" target="_blank">
                                <i class="tienich  tool-messenger"></i>
                            </a>
                        </li>

                        <li>
                            <a href="tel:<?=str_replace('.','',str_replace(' ','',$row_setting['hotline']))?>" rel="nofollow">
                                <i class="tienich  tool-phone"></i>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" rel="nofollow" class="js-map">
                                <i class="tienich tool-map js-map"></i>
                            </a>
                        </li>

                    </ul>

                </div>

            </li>

        </ul>

    </div>

    <div class="p-relative">

        <ul class="list menu_list">

            <li>

                <a href="" title="<?= _home?>">

                    <span><?= _home?></span>

                </a>

            </li>

            <li>

                <div class="d-flex align-items-center">

                    <a href="gioi-thieu" title="Giới thiệu">

                        <span>Giới thiệu</span>

                    </a>
                    
                </div>

            </li>

            <li>

                <div class="d-flex p-relative">

                    <a itemprop="url" href="san-pham">Sản phẩm</a>

                    <a href="javascript:" class="toggle-btn ic-arrow">

                        <span></span>

                    </a>

                </div>

                <ul class="inner ul-list-none" style="display: none;">

                    <?php foreach($list_c1 as $key => $value){
                        $c2= $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_cat where hienthi=1 and id_list=? order by stt asc,id desc",array($value['id']));?>
                    
                    <li>

                        <div class="d-flex p-relative">

                            <a href="<?= $value['type']?>/<?= $value['tenkhongdau']?>"
                                title="<?= $value['ten_'.$lang]?>"><?= $value['ten_'.$lang]?></a>

                            <?php if($c2){?>
                            <a href="javascript:" class="toggle-btn ic-arrow">
                                <span></span>
                            </a>
                            <?php }?>

                        </div>
                        <ul class="inner ul-list-none" style="display: none;">

                            <?php foreach($c2 as $key => $vc2){
                                $c3 = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_item where hienthi=1 and id_list=? and id_cat=? order by stt asc,id desc",array($value['id'],$vc2['id']));?>
                            <li>

                                <div class="d-flex p-relative">

                                    <a href="<?= $value['type']?>/<?= $value['tenkhongdau']?>/<?= $vc2['tenkhongdau']?>"
                                        title="<?= $vc2['ten']?>"><?= $vc2['ten']?></a>
                                    <?php if($c3){?>
                                    <a href="javascript:" class="toggle-btn ic-arrow">
                                        <span></span>
                                    </a>

                                    <?php }?>
                                </div>

                                <ul class="inner ul-list-none" style="display: none;">

                                    <?php foreach($c3 as $key => $vc3){ ?>

                                    <li>

                                        <div class="d-flex p-relative">

                                            <a href="<?= $value['type']?>/<?=$value['tenkhongdau']?>/<?= $vc3['tenkhongdau']?>"
                                                title="<?= $vc3['ten']?>"><?= $vc3['ten']?></a>

                                        </div>
                                        
                                    </li>

                                    <?php }?>

                                </ul>
                                
                            </li>

                            <?php }?>

                        </ul>

                    </li>

                    <?php }?>

                </ul>

            </li>

            <li>

                <div class="d-flex p-relative">

                    <a itemprop="url" href="san-pham">Dịch vụ</a>

                    <a href="javascript:" class="toggle-btn ic-arrow">

                        <span></span>

                    </a>

                </div>

                <ul class="inner ul-list-none" style="display: none;">

                    <?php foreach($dichvu_c1 as $key => $value){

                        $c2= $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_cat where hienthi=1 and id_list=? order by stt asc,id desc",array($value['id']));?>
                    
                    <li>

                        <div class="d-flex p-relative">

                            <a href="<?= $value['type']?>/<?= $value['tenkhongdau']?>"
                                title="<?= $value['ten']?>"><?= $value['ten']?></a>

                            <?php if($c2){?>
                            <a href="javascript:" class="toggle-btn ic-arrow">
                                <span></span>
                            </a>
                            <?php }?>

                        </div>
                        <ul class="inner ul-list-none" style="display: none;">

                            <?php foreach($c2 as $key => $vc2){
                                $c3 = $db->rawQuery("select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_baiviet_item where hienthi=1 and id_list=? and id_cat=? order by stt asc,id desc",array($value['id'],$vc2['id']));?>
                            <li>

                                <div class="d-flex p-relative">

                                    <a href="<?= $value['type']?>/<?= $value['tenkhongdau']?>/<?= $vc2['tenkhongdau']?>"
                                        title="<?= $vc2['ten']?>"><?= $vc2['ten']?></a>
                                    <?php if($c3){?>
                                    <a href="javascript:" class="toggle-btn ic-arrow">
                                        <span></span>
                                    </a>

                                    <?php }?>
                                </div>

                                <ul class="inner ul-list-none" style="display: none;">

                                    <?php foreach($c3 as $key => $vc3){ ?>

                                    <li>

                                        <div class="d-flex p-relative">

                                            <a href="<?= $value['type']?>/<?=$value['tenkhongdau']?>/<?= $vc3['tenkhongdau']?>"
                                                title="<?= $vc3['ten']?>"><?= $vc3['ten']?></a>

                                        </div>
                                        
                                    </li>

                                    <?php }?>

                                </ul>
                                
                            </li>

                            <?php }?>

                        </ul>

                    </li>

                    <?php }?>

                </ul>

            </li>

            <li>

                <div class="d-flex align-items-center">

                    <a href="tuyen-dung" title="Tuyển dụng">

                        <span>Tuyển dụng</span>

                    </a>

                </div>

            </li>

            <li>

                <div class="d-flex align-items-center">

                    <a href="goc-chia-se" title="Góc chia sẻ">

                        <span>Góc chia sẻ</span>

                    </a>

                </div>

            </li>

            <li>

                <div class="d-flex align-items-center">

                    <a href="lien-he" title="Liên hệ">

                        <span>Liên hệ</span>

                    </a>

                </div>

            </li>

        </ul>

    </div>

</div>