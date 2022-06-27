<?php
    if($CONTACT==true){
        $sql = "SELECT COUNT(*) as numb FROM #_contact where view=0 ";
        $row_lienhe = $db->rawQueryOne($sql);
    }
    if($ORDER==true){
        $sql = "SELECT COUNT(*) as numb FROM #_order where view=0 ";
        $row_giohang = $db->rawQueryOne($sql);
    }
    if($NEWSLETTER==true){
        $sql = "SELECT COUNT(*) as numb FROM #_newsletter ";
        $row_dangky = $db->rawQueryOne($sql);
    }
    if($BOOKING==true){

        $sqltv = "SELECT COUNT(*) as numb FROM #_booking where type=?";
        $row_bookingtv = $db->rawQueryOne($sqltv,array('client'));

        $sqlcall = "SELECT COUNT(*) as numb FROM #_booking where type=?";
        $row_bookingcall = $db->rawQueryOne($sqlcall,array('goi-lai'));
    }
    
    $tong_count = $row_lienhe['numb']+$row_giohang['numb']+$row_dangky['numb']+$row_bookingcall["numb"]+$row_bookingtv["numb"];

?>
<div class="wrapper">
    <div class="box-flex">
        <div class="welcome menu-bar"><span><i class="fa fa-bars" aria-hidden="true"></i> <?=_menu?></span></div>
        <div class="welcome" style="display:flex;align-items:center;">
            <div>
                <span>
                    <span class="icon-user"><i class="fa fa-user" aria-hidden="true"></i></span>
                    Xin chào, <?=$_SESSION['login']['username']?> !
                </span>
            </div>
        </div>
        <div class="userNav">
            <ul>
                <li>
                    <a href="index.html?com=cache&act=delete" title="Xóa cache">
                        <span><i class="nav-icon text-sm far fa-trash-alt"></i>Xóa cache</span>
                    </a>
                </li>
                <li><a href="../sitemap.xml" title="">
                        <span>
                            <i class="nav-icon text-sm far fa-sitemap"></i><?=_capnhatsitemap?>
                        </span>
                    </a>
                </li>
                <li><a href="http://<?=$config_url?>" class="tipS" original-title="Vào website" target="_blank"><img
                            src="./images/icons/topnav/mainWebsite.png" alt="" /><span><?=_vaowebsite?></span></a></li>
                <li><a href="index.html?com=user&act=edit&id=<?=$_SESSION['login']['id']?>&type=user" class="tipS"
                        original-title="Thông tin tài khoản" title=""><span><i
                                class="nav-icon text-sm far fa-user"></i>Thông tin tài khoản</span></a></li>
                <?php if($_SESSION['login']['role']==3){ ?>
                <li class="ddnew" style="position:relative">
                    <a class="count-hover" title="">
                        <span>
                            <i class="nav-icon text-sm far fa-bell"></i>
                        </span>
                        <span class="numberTop">
                            <?=$tong_count?></span>
                    </a>
                    <div class="popover-notifications" style="top: 35px;right: 0px;transform-origin: 60px top;">
                        <div>
                            <?php if($CONTACT==true){?>
                            <div>
                                <a href="index.html?com=contact&act=man&type=contact" title=""
                                    ><span>Liên hệ</span> <span>(<?=($row_lienhe['numb']==0) ? 0 : $row_lienhe['numb']?>)</span> 
                                    </a>
                            </div>
                            <?php }?>
                            <?php if($ORDER==true){?>
                            <div>
                                <a href="index.php?com=order&act=man" title=""
                                    ><span>Đặt hàng</span> <span>(<?=($row_giohang['numb']==0) ? 0 : $row_giohang['numb']?>)</span> 
                                    </a>
                            </div>
                            <?php }?>
                            <?php if($NEWSLETTER==true){?>
                            <div>
                                <a href="index.html?com=newsletter&act=man&type=newsletter" title=""
                                    ><span>Báo giá</span> <span>(<?=($row_dangky['num']==0) ? 0 : $row_dangky['num']?>)</span> 
                                    </a>
                            </div>
                            <?php }?>
                            <?php if($BOOKING==true){?>
                            <div>
                                <a href="index.html?com=booking&act=man&type=client" title="" ><span>Tư vấn</span> <span>(<?=($row_bookingtv['numb']==0) ? 0 : $row_bookingtv['numb']?>)</span> 
                                    </a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </li>
                <?php } ?>
                <li><a href="index.html?com=user&act=logout" title=""><img src="images/icons/topnav/logout.png"
                            alt="" /><span><?=_logout?></span></a></li>
            </ul>
        </div>
    </div>
</div>