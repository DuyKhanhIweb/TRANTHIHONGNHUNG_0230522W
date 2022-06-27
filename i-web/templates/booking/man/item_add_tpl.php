<div class="wrapper">
    <div class="control_frm">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a
                        href="index.html?com=booking&act=add<?php if($_GET['type']!='') echo'&type='. $_GET['type'];?>"><span>Thêm
                            đặt lịch</span></a></li>
                <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>

    <form name="supplier" id="validate" class="form"
        action="index.html?com=booking&act=save&id=<?=($_GET['id']!='') ? $_GET['id'] : ''?>&type=<?=($_GET['type']!='') ? $_GET['type'] : ''?>"
        method="post" enctype="multipart/form-data">
        <div class="oneOne">
            <div class="widget mtop0">
                <?php if($GLOBAL[$com][$type]['file']==true){?>
                <div class="formRow">
                    <label>Tải file</label>
                    <div class="formRight">
                        <a href="<?=_upload_tailieu.$item['tailieu']?>" title=""><?=$item['tailieu']?></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php }?>
                <div class="formRow">
                    <label>Tên</label>
                    <div class="formRight">
                        <input type="text" name="data[ten_vi]" title="Họ tên" id="ten_vi"
                            class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <?php if($GLOBAL[$com][$type]['email']==true){?>
                <div class="formRow">
                    <label>Email</label>
                    <div class="formRight">
                        <input type="text" name="data[email]" title="Email người đặt đặt lịch" id="email"
                            class="tipS validate[required]" value="<?=@$item['email']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <?php }?>
                <?php if($GLOBAL[$com][$type]['phone']==true){?>
                <div class="formRow">
                    <label>Điện thoại</label>
                    <div class="formRight">
                        <input type="text" name="data[dienthoai]" title="Điện thoại người đặt đặ lịch" id="dienthoai"
                            class="tipS validate[required]" value="<?=@$item['dienthoai']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <?php }?>
                <?php if($GLOBAL[$com][$type]['diachi']==true){?>
                <div class="formRow">
                    <label>Địa chỉ</label>
                    <div class="formRight">
                        <input type="text" name="data[diachi]" title="Địa chỉ" readonly id="diachi"
                            class="tipS validate[required]" value="<?=$item['diachi']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <?php }?>
                <?php if($GLOBAL[$com][$type]['dichvu']==true){?>
                <div class="formRow">
                    <label>Dịch vụ đã chọn</label>
                    <div class="formRight">
                        <input type="text" name="data[dichvu]" title="Dịch vụ đã chọn" readonly id="dichvu"
                            class="tipS validate[required]"
                            value="<?=($item['dichvu']!=0) ? $func->getTableField('ten_' . $lang, 'baiviet', $item['dichvu']) : 'Empty...'?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <?php }?>
                <?php if($GLOBAL[$com][$type]['noidung']==true){?>
                <div class="formRow">
                    <label>Nội dung</label>
                    <div class="ck_editor">
                        <textarea id="noidung" name="data[noidung]"
                            class="ck_editors"><?=htmlspecialchars_decode(@$item['noidung'])?></textarea>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php }?>
                <div class="formRow">
                    <div class="formRight">
                        <label class="stardust-checkbox">
                            Hiển thị
                            <input class="stardust-checkbox__input"
                                <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>
                                name="hienthi" type="checkbox" value="1" style="display:none">
                            <div class="stardust-checkbox__box"></div>
                        </label>
                    </div>
                </div>
                <div class="formRow">
                    <div class="formRight">
                        <label>Số thứ tự: </label>
                        <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="data[stt]"
                            style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)"
                            original-title="Số thứ tự của danh mục, chỉ nhập số">
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
            <div class="formRow fixedBottom">
				<div class="box-admin" style="display:flex; align-items:center;justify-content:flex-end">
                    <div class="box-action">
                        <button type="submit" class="btn btn-sm bg-gradient-primary text-white submit-check">
                            <i class="far fa-save mr-2"></i>Lưu
                        </button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i
                                class="fas fa-redo mr-2"></i>Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger text-white"
                            href="index.html?com=booking&act=man&id=<?=($_GET['id']!='') ? $_GET['id'] : ''?>&type=<?=($_GET['type']!='') ? $_GET['type'] : ''?>">
                            <i class="fas fa-sign-out-alt mr-2"></i>Thoát
                        </a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </form>
</div>