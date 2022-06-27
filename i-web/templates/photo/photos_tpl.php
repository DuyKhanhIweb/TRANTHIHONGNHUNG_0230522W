<div class="control_frm">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li><a
                    href="index.html?com=photo&act=man<?php if($_GET['type']!='') echo'&type='. $_GET['type'];?>"><span><?=$GLOBAL[$com][$type]['title']?></span></a>
            </li>
            <li class="current"><a href="#" onclick="return false;"><?=_tatca?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('.update_stt').keyup(function(event) {
        var id = $(this).attr('rel');
        var table = 'photo';
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
        window.location.href =
            "index.html?com=photo&act=man&type=<?=$_GET['type']?>&page=<?=$_GET['page']?>&keyword=" +
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
                           redirect("index.html?com=photo&act=delete&type=<?=$_GET['type']?>&page=<?=$_GET['page']?>&listid=" + listid);
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

<form name="f" id="f" method="post">
    <div class="oneOne">
        <div class="box-admin" style="display:flex; align-items:center;">
            <div class="box-action">
                <a class="btn btn-sm bg-gradient-primary text-white" href="index.html?com=photo&act=add<?php if($_GET['type']!='') echo'&type='. $_GET['type'];?>">
                    <i class="fas fa-plus mr-2"></i>Thêm mới
                </a>
                <a class="btn btn-sm bg-gradient-danger text-white" id="xoahet">
                    <i class="far fa-trash-alt mr-2"></i>Xóa tất cả
                </a>
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
                        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;"><?=_stt?></a></td>
                        <td width="150"><?=_hinhanh?></td>
                        <td class="sortCol">
                            <div><?=_tenhinh?><span></span></div>
                        </td>
                        <td class="tb_data_small"><?=_anhien?></td>
                        <?php if($GLOBAL[$com][$type]['video']==true){ ?>
                        <td class="tb_data_small">Video</td>
                        <?php }?>
                        <td class="tb_data_small"><?=_thaotac?></td>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0, $count=count($items); $i<$count; $i++){?>
                    <tr>
                        <td>
                            <label class="stardust-checkbox checker">
                                <input class="stardust-checkbox__input" name="chon" id="check<?=$i?>" type="checkbox"
                                    value="<?=$items[$i]['id']?>" style="display:none">
                                <div class="stardust-checkbox__box"></div>
                            </label>
                        </td>
                        <td align="center">
                            <input type="text" value="<?=$items[$i]['stt']?>" name="ordering[]"
                                onkeypress="return OnlyNumber(event)" class="tipS smallText update_stt"
                                original-title="Nhập số thứ tự <?=_title?>" rel="<?=$items[$i]['id']?>" />
                            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$items[$i]['id']?>"
                                    src="images/loader.gif" alt="loader" /></div>
                        </td>
                        <td align="center">
                            <img src="<?=_upload_hinhanh.$items[$i]['photo_'.$lang]?>" width="100" border="0" />
                        </td>

                        <td class="title_name_data">
                            <a href="index.html?com=photo&act=edit&id=<?=$items[$i]['id']?><?php if($_GET['type']!='') echo'&type='. $_GET['type'];?><?php if($_GET['page']!='') echo'&page='. $_GET['page'];?>"
                                class="tipS SC_bold"><?=$items[$i]['ten_vi']?></a>
                        </td>
                        <td align="center">
                            <label class="stardust-checkbox checkOnOff">
                                <input class="stardust-checkbox__input" data-id="<?=$items[$i]['id']?>"
                                    data-table="table_photo" data-type="hienthi"
                                    rel="<?=$items[$i]['hienthi']?>"
                                    <?php if($items[$i]['hienthi']==1) echo 'checked'; ?> name="onOff" type="checkbox"
                                    style="display:none">
                                <div class="stardust-checkbox__box"></div>
                            </label>
                        </td>
                        <?php if($GLOBAL[$com][$type]['video']==true){ ?>
                        <td align="center">
                            <label class="stardust-checkbox checkOnOff">
                                <input class="stardust-checkbox__input" data-id="<?=$items[$i]['id']?>"
                                    data-table="table_photo" data-type="video"
                                    rel="<?=$items[$i]['video']?>"
                                    <?php if($items[$i]['video']==1) echo 'checked'; ?> name="onOff" type="checkbox"
                                    style="display:none">
                                <div class="stardust-checkbox__box"></div>
                            </label>
                        </td>
                        <?php }?>
                        <td class="actBtns">
                            <a class="text-primary" href="index.html?com=photo&act=edit&id=<?=$items[$i]['id']?><?php if($_GET['type']!='') echo'&type='. $_GET['type'];?><?php if($_GET['page']!='') echo'&page='. $_GET['page'];?>"
                                title="" class="smallButton tipS" original-title="Sửa hình ảnh"><i
                                    class="fas fa-edit"></i></a>
                        <a class="text-danger" data-product="<?=$items[$i]['id']?>" data-com="<?=$_GET['com']?>" data-act="delete" data-tbl="<?=$_GET['tbl']?>" data-type="<?=$_GET['type']?>" data-page="<?=$_GET['page']?>" href="javascript:" data-js-delete title=""
                                    class="smallButton tipS" original-title="Xóa "><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
<div class="paging"><?=$paging?></div>