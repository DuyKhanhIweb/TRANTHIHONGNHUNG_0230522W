<nav class="sidebar-nav">

    <div class="sidebar-header">

        <div class="box" style="padding: 15px 0px 0px 0px;">

            <div class="logo-admin" style="text-align: center">

                <a href="index.php" title="logo"> <img src="images/logo.png" alt="" width="170"

                        <?=($config['logo']==true) ? 'class="none"':''?> /> </a>

            </div>

            <div class="line-admin">

                <span><i class="fas fa-globe"></i></span>

            </div>

        </div>

    </div>

    <ul class="metismenu" id="menu1">

        <li>

            <a class="home" href="index.php" title="Trang chủ">

                <i class="nav-icon text-sm fal fa-home"></i>Trang Chủ</a>

        </li>

        <li class="<?=($com=='baiviet' && ($_GET['type']=='san-pham')) ? "active" :""?>">

            <a class="has-arrow" href="#"

                aria-expanded=" <?=($com=='baiviet' && ($_GET['type']=='san-pham')) ? "true" :"false"?>">

                <span>

                    <i class="nav-icon text-sm fal fa-boxes"></i>Quản lý sản phẩm

                </span>

            </a>

            <ul aria-expanded="<?=($com=='baiviet' && ($_GET['type']=='san-pham')) ? "true" :"false"?>"

                class="collapse <?=($com=='baiviet' && ($_GET['type']=='san-pham')) ? "in" :""?>"

                <?=($com=='baiviet' && ($_GET['type']=='san-pham')) ? "" :"style='height: 0px;'"?>>

                <li class="<?=($com=='baiviet' && $act=='man_list' && 'san-pham'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man_list&tbl=list&type=san-pham&page=1">Danh mục cấp 1</a>

                </li>

                <li class="<?=($com=='baiviet' && $act=='man_cat' && 'san-pham'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man_cat&tbl=cat&type=san-pham&page=1">Danh mục cấp 2</a>

                </li>

                <li class="<?=($com=='baiviet' && $act=='man' && 'san-pham'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=san-pham&page=1">Danh sách sản phẩm</a>

                </li>

            </ul>

        
        </li>

        <li class="<?=($com=='baiviet' && ($_GET['type']=='khuyen-mai')) ? "active" :""?>">

            <a class="has-arrow" href="#"

                aria-expanded=" <?=($com=='baiviet' && ($_GET['type']=='khuyen-mai')) ? "true" :"false"?>">

                <span>

                    <i class="nav-icon text-sm fal fa-boxes"></i>Sản phẩm khuyến mãi

                </span>

            </a>

            <ul aria-expanded="<?=($com=='baiviet' && ($_GET['type']=='khuyen-mai')) ? "true" :"false"?>"

                class="collapse <?=($com=='baiviet' && ($_GET['type']=='khuyen-mai')) ? "in" :""?>"

                <?=($com=='baiviet' && ($_GET['type']=='khuyen-mai')) ? "" :"style='height: 0px;'"?>>

                <li class="<?=($com=='baiviet' && $act=='man' && 'khuyen-mai'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=khuyen-mai&page=1">Danh sách</a>

                </li>

            </ul>

        
        </li>

        <li class="<?=($com=='baiviet' && ($_GET['type']=='combo')) ? "active" :""?>">

            <a class="has-arrow" href="#"

                aria-expanded=" <?=($com=='baiviet' && ($_GET['type']=='combo')) ? "true" :"false"?>">

                <span>

                    <i class="nav-icon text-sm fal fa-boxes"></i>Quản lý combo

                </span>

            </a>

            <ul aria-expanded="<?=($com=='baiviet' && ($_GET['type']=='combo')) ? "true" :"false"?>"

                class="collapse <?=($com=='baiviet' && ($_GET['type']=='combo')) ? "in" :""?>"

                <?=($com=='baiviet' && ($_GET['type']=='combo')) ? "" :"style='height: 0px;'"?>>

                <li class="<?=($com=='baiviet' && $act=='man' && 'combo'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=combo&page=1">Danh sách combo</a>

                </li>

            </ul>

        
        </li>

        <li class="<?=($com=='order' || ($com=='baiviet' && 'cau-hoi'==$_GET['type'] ) || ($com=='baiviet' && 'htgh'==$_GET['type'] ) || ($com=='baiviet' && 'pttt'==$_GET['type'] )) ? "active" :""?>">

            <a class="has-arrow" href="#"

                aria-expanded="<?=($com=='order' || ($com=='baiviet' && 'cau-hoi'==$_GET['type'] ) || ($com=='baiviet' && 'htgh'==$_GET['type'] ) || ($com=='baiviet' && 'pttt'==$_GET['type'] )) ? "true" :"false"?>">

                <span>

                    <i class="nav-icon text-sm fal fa-boxes"></i>Quản lý đặt hàng

                </span>

            </a>

            <ul aria-expanded="<?=($com=='order' || ($com=='baiviet' && 'cau-hoi'==$_GET['type'] ) ||  ($com=='baiviet' && 'htgh'==$_GET['type'] ) || ($com=='baiviet' && 'pttt'==$_GET['type'] )) ? "true" :"false"?>"

                class="collapse <?=($com=='order' || ($com=='baiviet' && 'cau-hoi'==$_GET['type'] ) ||  ($com=='baiviet' && 'htgh'==$_GET['type'] ) || ($com=='baiviet' && 'pttt'==$_GET['type'] )) ? "in" :""?>"

                <?=($com=='order' || ($com=='baiviet' && 'cau-hoi'==$_GET['type'] ) ||  ($com=='baiviet' && 'htgh'==$_GET['type'] ) || ($com=='baiviet' && 'pttt'==$_GET['type'] )) ? "" :"style='height: 0px;'"?>>

                <li class="<?=($com=='baiviet' && $act=='man' && 'htgh'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=htgh&page=1">Hình thức giao hàng</a>

                </li>

                <li class="<?=($com=='baiviet' && $act=='man' && 'pttt'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=pttt&page=1">Phương thức thanh toán</a>

                </li>

                <li class="<?=($com=='order' && $act=='man') ? "this" :""?>">

                    <a href="index.php?com=order&act=man&page=1">Danh sách đơn hàng</a>

                </li>

            </ul>

        </li>

       <li

            class="<?=($com=='baiviet' && ('che-do-bao-hanh'==$_GET['type'] || 'cam-ket'==$_GET['type'] || 'goc-chia-se'==$_GET['type'] || 'danh-gia-khach-hang'==$_GET['type'] || 'he-thong-phan-phoi'==$_GET['type'] || 'tuyen-dung'==$_GET['type'] ||  'tin-tuc'==$_GET['type'] || 'bo-suu-tap-qua-tang'==$_GET['type'] ||'cau-hoi-thuong-gap'==$_GET['type']  || 'cong-trinh'==$_GET['type']  || 'he-thong-cua-hang'==$_GET['type'] || 'album-anh'==$_GET['type']  || 'y-kien'==$_GET['type'] || 'chinh-sach'==$_GET['type'] || 'chinh-sach'==$_GET['type'])) ? "active" :""?>">

            <a class="has-arrow" href="#"

                aria-expanded="<?=($com=='baiviet' && ('che-do-bao-hanh'==$_GET['type'] || 'cam-ket'==$_GET['type'] ||  'goc-chia-se'==$_GET['type'] || 'danh-gia-khach-hang'==$_GET['type'] || 'he-thong-phan-phoi'==$_GET['type'] || 'tuyen-dung'==$_GET['type'] || 'tin-tuc'==$_GET['type'] || 'bo-suu-tap-qua-tang'==$_GET['type']  || 'cau-hoi-thuong-gap'==$_GET['type'] || 'cong-trinh'==$_GET['type'] || 'he-thong-cua-hang'==$_GET['type'] || 'album-anh'==$_GET['type']  || 'ptgh'==$_GET['type'] || 'chinh-sach'==$_GET['type'])) ? "true" :"false"?>">

                <span>

                    <i class="nav-icon text-sm fal fa-boxes"></i>Quản lý bài viết chung

                </span>

            </a>

            <ul aria-expanded="<?=($com=='baiviet' && ('che-do-bao-hanh'==$_GET['type'] || 'cam-ket'==$_GET['type'] || 'tuyen-dung'==$_GET['type'] || 'danh-gia-khach-hang'==$_GET['type'] || 'he-thong-phan-phoi'==$_GET['type'] || 'tin-tuc'==$_GET['type'] || 'bo-suu-tap-qua-tang'==$_GET['type'] || 'goc-chia-se'==$_GET['type']  || 'cau-hoi-thuong-gap'==$_GET['type'] || 'cong-trinh'==$_GET['type'] || 'album-anh'==$_GET['type']  || 'he-thong-cua-hang'==$_GET['type'] || 'y-kien'==$_GET['type'] || 'chinh-sach'==$_GET['type'] || 'chinh-sach'==$_GET['type'])) ? "true" :"false"?>"

                class="collapse <?=($com=='baiviet' && ('che-do-bao-hanh'==$_GET['type'] || 'cam-ket'==$_GET['type'] || 'tuyen-dung'==$_GET['type'] || 'danh-gia-khach-hang'==$_GET['type'] || 'he-thong-phan-phoi'==$_GET['type'] || 'tin-tuc'==$_GET['type'] || 'bo-suu-tap-qua-tang'==$_GET['type'] || 'goc-chia-se'==$_GET['type']  || 'cau-hoi-thuong-gap'==$_GET['type'] || 'cong-trinh'==$_GET['type'] || 'album-anh'==$_GET['type']  || 'he-thong-cua-hang'==$_GET['type'] || 'y-kien'==$_GET['type'] || 'chinh-sach'==$_GET['type'] || 'chinh-sach'==$_GET['type'])) ? "in" :""?>"

                <?=($com=='baiviet' && ('che-do-bao-hanh'==$_GET['type'] || 'cong-trinh'==$_GET['type'] || 'tuyen-dung'==$_GET['type'] || 'danh-gia-khach-hang'==$_GET['type'] || 'he-thong-phan-phoi'==$_GET['type'] || 'tin-tuc'==$_GET['type'] || 'bo-suu-tap-qua-tang'==$_GET['type'] ||  'cam-ket'==$_GET['type'] || 'goc-chia-se'==$_GET['type']  || 'cau-hoi-thuong-gap'==$_GET['type'] || 'y-kien'==$_GET['type'] || 'album-anh'==$_GET['type']  || 'he-thong-cua-hang'==$_GET['type'] || 'chinh-sach'==$_GET['type'] || 'chinh-sach'==$_GET['type'])) ? "" :"style='height: 0px;'"?>>


                <li class="<?=($com=='baiviet' && $act=='man' && 'tin-tuc'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=tin-tuc&page=1">Tin tức</a>

                </li>
                
                <li class="<?=($com=='baiviet' && $act=='man' && 'he-thong-phan-phoi'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=he-thong-phan-phoi&page=1">Hệ thống phân phối</a>

                </li>

            </ul>

        </li>

        <li <?=($com=='info' && ($_GET['type']=='gioi-thieu' || $_GET['type']=='dieu-khoan' || $_GET['type']=='cua-hang-gan-ban') ) ? ' class="active"' : '' ?>>

            <a class="has-arrow" href="#"

                aria-expanded="<?=($com=='info' && ($_GET['type']=='gioi-thieu' || $_GET['type']=='dieu-khoan' || $_GET['type']=='cua-hang-gan-ban') ) ? 'true' : 'false' ?>">

                <i class="nav-icon text-sm fal fa-pager"></i>Trang tĩnh

            </a>

            <ul aria-expanded="<?=($com=='info' && ($_GET['type']=='gioi-thieu' || $_GET['type']=='khuyen-mai' || $_GET['type']=='cua-hang-gan-ban') ) ? 'true' : 'false' ?>"

                class="collapse <?=($com=='info' && ($_GET['type']=='gioi-thieu' || $_GET['type']=='khuyen-mai' || $_GET['type']=='cua-hang-gan-ban') ) ? 'in' : '' ?>"

                <?=($com=='info' && ($_GET['type']=='gioi-thieu' || $_GET['type']=='khuyen-mai' || $_GET['type']=='cua-hang-gan-ban') ) ? '' : 'style="height: 0px;"' ?>>

                <li <?=($com=='info' && $_GET['type']=='gioi-thieu') ? ' class="this"' : '' ?>><a

                        href="index.php?com=info&act=capnhat&type=gioi-thieu" title="">Giới thiệu</a></li>

            </ul>

        </li>

        <li <?=($com=='photo' || $com=='video') ? ' class="active"' : '' ?>>

            <a class="has-arrow" href="#"

                aria-expanded="<?=($com=='photo' || $com=='video') ? 'true' : 'false' ?>">

                <i class="nav-icon text-sm fal fa-images"></i>Slider - Đối tác - MXH

            </a>

            <ul aria-expanded="<?=($com=='photo' || $com=='video') ? 'true' : 'false' ?>"

                class="collapse <?=($com=='photo' || $com=='video') ? 'in' : '' ?>"

                <?=($com=='photo' || $com=='video') ? '' : 'style="height: 0px;"' ?>>

                <li <?=($com=='photo' && $_GET['type']=='slider') ? ' class="this"' : '' ?>><a

                        href="index.php?com=photo&act=man&type=slider&page=1" title="">Danh sách Slider</a>

                </li>

                <li <?=($com=='photo' && $_GET['type']=='tai-sao') ? ' class="this"' : '' ?>><a

                        href="index.php?com=photo&act=man&type=tai-sao&page=1" title="">Tại sao chọn chúng tôi</a>

                </li>      

                <li <?=($com=='photo' && $_GET['type']=='thuong-hieu-doi-tac') ? ' class="this"' : '' ?>><a

                        href="index.php?com=photo&act=man&type=thuong-hieu-doi-tac&page=1" title="">Thương hiệu đối tác</a>

                </li>

                <li <?=($com=='photo' && $_GET['type']=='mangxahoi') ? ' class="this"' : '' ?>><a

                        href="index.php?com=photo&act=man&type=mangxahoi&page=1" title="">Danh sách mạng xã hội</a>

                </li>      

            </ul>

        </li>

        <?php if(count($GLOBAL['bannerqc'])>0){?>

        <li <?=($com=='bannerqc') ? ' class="active"' : '' ?>>

            <a class="has-arrow" href="#" aria-expanded="<?=($com=='bannerqc') ? 'true' : 'false' ?>">

                <i class="nav-icon text-sm fal fa-pager"></i>Hình ảnh

            </a>

            <ul aria-expanded="<?=($com=='bannerqc') ? 'true' : 'false' ?>"

                class="collapse <?=($com=='bannerqc') ? 'in' : '' ?>"

                <?=($com=='bannerqc') ? '' : 'style="height: 0px;"' ?>>

                <?php foreach ($GLOBAL['bannerqc'] as $key =>$value){?>

                <li <?php if(isset($kiemtra)){if($func->checkPermissions('bannerqc','capnhat',$key)) echo 'class="none"'; }?>

                    <?php if($_GET['type']==$key) echo ' class="this"' ?>><a

                        href="index.php?com=bannerqc&act=capnhat&type=<?=$key?>" title=""><?=$value['title_main']?></a>

                </li>

                <?php }?>

            </ul>

        </li>

        <?php }?>

        <li class="<?=(($com=='contact' || $com=='booking' || $com=='newsletter') && $act=='man') ? "active" :""?>">

            <a class="has-arrow" href="#" aria-expanded="<?=(($com=='contact' || $com=='booking' || $com=='newsletter') && $act=='man') ? "true" :"false"?>">

                <i class="nav-icon text-sm fal fa-id-card"></i>Liên hệ

            </a>

            <ul aria-expanded="<?=(($com=='contact' || $com=='booking' || $com=='newsletter') && $act=='man') ? "true" :"false"?>"

                class="collapse <?=(($com=='contact' || $com=='booking' || $com=='newsletter') && $act=='man') ? "in" :""?>">

                <li <?php if($com=='contact' && $act=='man') echo ' class="this"' ?>><a

                        href="index.php?com=contact&act=man&type=contact" title="">Danh sách liên hệ</a></li>
                        

            </ul>

        </li>



         <li class="<?=($com=='redirect' || ($com=='seopage'&& $act=='capnhat')) ? "active" :""?>">

            <a class="has-arrow" href="#" aria-expanded="<?=($com=='redirect' || ($com=='seopage'&& $act=='capnhat')) ? "true" :"false"?>">

                <i class="nav-icon text-sm fal fa-share-alt"></i>Quản lý seo

            </a>

            <ul aria-expanded="<?=($com=='redirect' || ($com=='seopage'&& $act=='capnhat')) ? "true" :"false"?>"

                class="collapse <?=($com=='redirect' || ($com=='seopage'&& $act=='capnhat')) ? "in" :""?>">



                <?php foreach($setting['seopage']['page'] as $k => $v){?>



                    <li <?php if( ($com=='seopage' && $act=='capnhat') && $type==$k) echo ' class="this"' ?>><a

                        href="index.html?com=seopage&act=capnhat&type=<?=$k?>" title=""><?=$v?></a></li>

                <?php }?>

                <li <?=($com=='redirect') ? ' class="this"' : '' ?>><a href="index.html?com=redirect&act=man" title="">

                        Redirect url

                    </a>

                </li>

            </ul>

        </li>



        <li <?=($com=='setting' || $com=='company') ? 'class="active"' : '' ?>>

            <a class="has-arrow" href="#" aria-expanded="<?=($com=='setting' || $com=='company') ? 'true' : 'false' ?>">

                <i class="nav-icon text-sm fal fa-cogs"></i>Cài đặt cấu hình

            </a>

            <ul aria-expanded="<?=($com=='setting' || $com=='company') ? 'true' : 'false' ?>" class="collapse <?=($com=='setting' || $com=='company') ? 'in' : '' ?>" <?=($com=='setting' || $com=='company') ? '' : 'style="height: 0px;"' ?> >

                <?php foreach ($GLOBAL['company'] as $key =>$value){?>

                <li <?php if(isset($kiemtra)){if($func->checkPermissions('company','capnhat',$key)) echo 'class="none"'; }?>

                    <?=($com=='company' && $_GET['type']==$key) ? ' class="this"' : '' ?>><a

                        href="index.php?com=company&act=capnhat&type=<?=$key?>" title=""><?=$value['title_main']?></a>

                </li>

                <?php }?>
                <?php foreach($GLOBAL['map'] as $key => $value){?>
                    <li <?=($com=='map' && $key == $_GET['type']) ? ' class="this"' : '' ?>>
                        <a href="index.html?com=map&act=man&type=<?=$key?>" title="">

                            <?= $value['title']?>

                        </a>

                    </li>
                <?php }?>

                <li <?=($com=='setting') ? ' class="this"' : '' ?>><a href="index.php?com=setting&act=capnhat" title="">

                        <?=_cauhinhchung?>

                    </a>

                </li>

            </ul>

        </li>

        <?php if($GLOBAL_USER==true){?>

        <?php if($func->checkUserAdmin()){?>

        <li <?=($com=='user') ? 'class="active"' : '' ?>>

            <a class="has-arrow" href="#" aria-expanded="fa<?=($com=='user') ? 'true' : 'false' ?>">

                <i class="nav-icon text-sm fal fa-users-cog"></i>Tài khoản admin

            </a>

            <ul aria-expanded="<?=($com=='user') ? 'true' : 'false' ?>" class="collapse <?=($com=='user') ? 'in' : '' ?>" <?=($com=='user') ? '' : 'style="height: 0px;"' ?> >

                <?php if($GLOBAL_USER==true){?>

                <li <?php if($_GET['com']=='user' && $_GET['act']=='man') echo ' class="this"' ?>><a

                        href="index.php?com=user&act=man&type=user&page=1"><?=_account?></a></li>

                <?php }?>

            </ul>

        </li>

        <?php }?>

        <?php }?>

        <?php if($GLOBAL_LANG==true){?>

        <li <?=($_GET['com']=='ngonngu') ? 'class="active"' : '' ?>>

            <a class="has-arrow" href="#" aria-expanded="<?=($_GET['com']=='ngonngu') ? 'true' : 'false' ?>">

            <i class="nav-icon text-sm fal fa-language"></i> Hỗ trợ ngôn ngữ

            </a>

            <ul aria-expanded="<?=($_GET['com']=='ngonngu') ? 'true' : 'false' ?>" class="collapse <?=($_GET['com']=='ngonngu') ? 'in' : '' ?>" <?=($_GET['com']=='ngonngu') ? '' : 'style="height: 0px;"' ?>>

                <li <?php if($_GET['com']=='ngonngu' && $_GET['act']=='man_lang') echo ' class="this"' ?>><a

                        href="index.php?com=ngonngu&act=man_lang"><?=_ngonngu?></a></li>

            </ul>

        </li>

        <?php }?>

    </ul>

</nav>