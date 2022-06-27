<script type="text/javascript">

$(document).ready(function() {

    $('.update_stt').keyup(function(event) {

        var id = $(this).attr('rel');

        var table = 'booking';

        var value = $(this).val();

        $.ajax({

            type: "POST",

            url: "ajax/update_stt.php",

            data: {

                id: id,

                table: table,

                value: value

            },

            success: function(result) {}

        });

    });



    $('.box-search button').click(function(event) {

        var keyword = $(this).parent().find('input').val();

        window.location.href = "index.html?com=booking&act=man&type=<?=$_GET['type']?>&keyword=" +

            keyword;

    });



    $("#xoahet").click(function() {

        var listid=$("input[name='chon']:checked").map(function() {

            return this.value

        }).get().join(",");



        if(listid.length>0){

            $.confirm({

                title: 'Xác nhận!',

                content: 'Bạn có chắc chắn muốn xóa mục này!',

                buttons: {

                    success: {

                        text: 'Đồng ý!',

                        btnClass: 'btn-blue',

                        action: function(){

                           redirect("index.html?com=booking&act=delete&type=<?=$_GET['type']?>&page=<?=$_GET['page']?>&listid=" + listid);

                        }

                    },

                    cancel: {   

                        text: 'Hủy ngay!',

                        btnClass: 'btn-red'

                    }

                }

            });

        }

    });

   

});

</script>



<div class="control_frm">

    <div class="bc">

        <ul id="breadcrumbs" class="breadcrumbs">

            <li><a

                    href="index.html?com=booking&act=man<?php if($_GET['type']!='') echo'&type='. $_GET['type'];?>"><span>Quản

                        lý <?=$GLOBAL[$com][$type]['title']?></span></a></li>

            <?php if($_GET['keyword']!=''){ ?>

            <li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>

            <?php }  else { ?>

            <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>

            <?php } ?>

        </ul>

        <div class="clear"></div>

    </div>

</div>





<form name="f" id="f" method="post">

    <div class="oneOne">

        <div class="box-admin" style="display:flex; align-items:center;">

            <div class="box-action">

                <a class="btn btn-sm bg-gradient-danger text-white" id="xoahet">

                    <i class="far fa-trash-alt mr-2"></i>Xóa tất cả

                </a>

            </div>

            <div class="box-search">

                <input type="text" value="" placeholder="Nhập từ khóa tìm kiếm ">

                <button type="button" style="border-radius:0" class="btn btn-navbar text-white" value=""><i

                        class="fas fa-search"></i></button>

            </div>

        </div>

    </div>

    <div class="oneOne">

        <div class="widget mtop0">



            <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">

                <thead>

                    <tr>

                        <td>



                            <label class="stardust-checkbox">

                                <input class="stardust-checkbox__input" id="checkAll" type="checkbox" value=""

                                    style="display:none">

                                <div class="stardust-checkbox__box"></div>

                            </label>

                        </td>

                        <td width="15%" class="tb_data_small" style="text-align: left !important;">Tên</td>

                        <?php if($GLOBAL[$com][$type]['phuhuynh']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Tên phụ huynh</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['time']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Ngày học</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['course']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Khóa học</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['city']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Tỉnh thành phố</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['phone']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Điện thoại</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['id_product']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Tên sản phẩm</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['email']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Email</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['diachi']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Địa chỉ</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['dichvu']==true){?>

                        <td width="20%" class="tb_data_small" style="text-align: left !important;">Dịch vụ</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['noidung']==true){?>

                        <td width="29%" class="tb_data_small" style="text-align: left !important;">Nội dung</td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['file']==true){?>

                        <td width="29%" class="tb_data_small" style="text-align: left !important;">

                            Download file

                        </td>

                        <?php }?>

                        <!-- <td width="8%" style="text-align: center !important;">Ẩn/Hiện</td> -->

                        <td width="8%" style="text-align: center;">Thao tác</td>

                    </tr>

                </thead>



                <tbody>

                    <?php for($i=0, $count=count($items); $i<$count; $i++){?>

                    <tr>

                        <td style="width:3%">

                            <label class="stardust-checkbox checker">

                                <input class="stardust-checkbox__input" name="chon" id="check<?=$i?>" type="checkbox"

                                    value="<?=$items[$i]['id']?>" style="display:none">

                                <div class="stardust-checkbox__box"></div>

                            </label>

                        </td>



                        <td class="title_name_data">

                            <a href="index.html?com=booking&act=edit&id=<?=$items[$i]['id']?>&type=<?=($_GET['type']!='') ? $_GET['type'] : ''?>"

                                class="tipS SC_bold"><?=$items[$i]['ten_vi']?></a>

                        </td>

                        <?php if($GLOBAL[$com][$type]['phuhuynh']==true){?>

                        <td class="title_name_data">

                            <?=$items[$i]['tenphuhuynh']?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['time']==true){?>

                        <td class="title_name_data">

                            <?=$items[$i]['ngayhoc']?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['course']==true){?>

                        <td class="title_name_data">

                            <?=$func->getFieldOne('ten_'.$lang,'baiviet',$items[$i]['id_khoahoc'])?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['city']==true){?>

                        <td class="title_name_data">

                            <?=$func->getFieldOne('ten','place_city',$items[$i]['id_coso'])?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['phone']==true){?>

                        <td class="title_name_data">

                            <?=$items[$i]['dienthoai']?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['id_product']==true){
                                $tensanpham = $db->rawQueryOne("select ten_$lang as ten from #_baiviet where type=? and id=? limit 0,1",array('san-pham',$items[$i]["id_product"]));

                            ?>

                            <td class="title_name_data">

                                <?=$tensanpham["ten"]?>

                            </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['email']==true){?>

                        <td class="title_name_data">

                            <?=$items[$i]['email']?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['diachi']==true){?>

                        <td class="title_name_data">

                            <?=$items[$i]['diachi']?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['dichvu']==true){?>

                        <td class="title_name_data">

                             <?= $func->getFieldOne('ten_' . $lang, 'baiviet_list', $items[$i]['id_dichvu']) ?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['noidung']==true){?>

                        <td class="title_name_data">

                            <?=htmlspecialchars_decode($items[$i]['noidung'])?>

                        </td>

                        <?php }?>

                        <?php if($GLOBAL[$com][$type]['file']==true){?>

                        <td class="title_name_data">

                            <?php if($items[$i]['tailieu']!=''){?>

                            <a href="<?=_upload_tailieu.$items[$i]['tailieu']?>">

                                <?=$items[$i]['tailieu']?>

                            </a>

                            <?php }else{ echo 'Empty!';}?>

                        </td>

                        <?php }?>

                        <td class="actBtns">
                            <?php
                                if($_GET["type"]!='danh-gia'){
                            ?>

                                <a class="text-primary"

                                    href="index.html?com=booking&act=edit&id=<?=$items[$i]['id']?><?php if($_GET['type']!='') echo'&type='. $_GET['type'];?>"

                                    title="" class="smallButton tipS" original-title="Sửa "><i class="fas fa-edit"></i></a>
                            <?php }?>

                            <a class="text-danger" data-product="<?=$items[$i]['id']?>" data-com="<?=$_GET['com']?>" data-act="delete" data-tbl="<?=$_GET['tbl']?>" data-type="<?=$_GET['type']?>" data-page="<?=$_GET['page']?>" href="javascript:" data-js-delete title="" class="smallButton tipS" original-title="Xóa "><i class="fas fa-trash-alt"></i></a>

                        </td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</form>

<div class="paging"><?=$paging?></div>