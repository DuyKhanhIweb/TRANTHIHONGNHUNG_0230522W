<?php if($GLOBAL_LEVEL1[$com][$type]['seo']==true){ ?>

<script>
function text_count_changed(textfield_id, counter_id) {

    var v = $(textfield_id).val();

    if (parseInt(v.length) > 300) {

        $(textfield_id).css('border', '1px solid #D90000');

        $(textfield_id).css('background', '#e5e5e5');

        $(counter_id).val(parseInt(v.length));

    } else {

        $(textfield_id).css('border', '1px solid #DDDDDD');

        $(textfield_id).css('background', '#FFF');

        $(counter_id).val(parseInt(v.length));

    }

}

$(document).ready(function() {

    text_count_changed("#description", "#des_char");

    $('#description').blur(function(event) {

        text_count_changed($(this), "#des_char");

    });

    $('#description').keypress(function(event) {

        text_count_changed($(this), "#des_char");

    });

});
</script>

<?php } ?>

<script type="text/javascript">
$(document).ready(function() {

    $('.chonngonngu li a').click(function(event) {

        var lang = $(this).attr('href');

        $('.chonngonngu li a').removeClass('active');

        $(this).addClass('active');

        $('.lang_hidden').removeClass('active');

        $('.lang_' + lang).addClass('active');

        return false;

    });

});
</script>

<?php

  function get_main_list()

  {

    global $d,$item;

    $sql="select * from table_baiviet_list where type='thuong-hieu' order by stt asc";

    $stmt=$d->query($sql);

    $str='

      <select id="id_thuonghieu" name="data[id_thuonghieu]" class="main_select">

      <option value="">Chọn thương hiệu</option>';

    while ($row=@mysqli_fetch_array($stmt)) 

    {

      if($row["id"]==(int)@$item["id_thuonghieu"])

        $selected="selected";

      else 

        $selected="";

      $str.='<option data-alias='.$row["tenkhongdau"].' value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';      

    }

    $str.='</select>';

    return $str;

  }

?>

<div class="wrapper">



    <div class="control_frm">

        <div class="bc">

            <ul id="breadcrumbs" class="breadcrumbs">

                <li><a
                        href="index.html?com=baiviet&act=add_list&tbl=<?=$_REQUEST['tbl']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span><?=$GLOBAL_LEVEL1[$com][$type]['title']?></span></a>

                </li>

                <li class="current"><a href="#"
                        onclick="return false;"><?=($_REQUEST['act']=='edit_list') ? _sua : _them?></a></li>

            </ul>

            <div class="clear"></div>

        </div>

    </div>



    <form name="supplier" class="form form-validate"
        action="index.html?com=baiviet&act=save_list&tbl=<?=$_REQUEST['tbl']?><?php if($_REQUEST['id']!='') echo'&id='. $_REQUEST['id'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?><?php if($_REQUEST['page']!='') echo'&page='. $_REQUEST['page'];?>"
        method="post" enctype="multipart/form-data" autocomplete="off" accept-charset="utf-8">

        <div class="mtop0">



            <div class="oneOne">

                <div class="widget mtop0">

                    <div class="title chonngonngu" style="border-bottom: 0px solid transparent">

                        <ul>

                            <?php  foreach ($config['lang'] as $k => $v){ ?>

                            <li><a href="<?=$k?>" class="<?= ($k == 'vi') ? 'active': '' ?> tipS" title="<?=$v?>"><img
                                        src="./images/<?=$k?>.png" alt=""
                                        class="<?=$func->changeTitle($v)?>" /><?=$v?></a></li>

                            <?php } ?>

                        </ul>

                    </div>

                </div>

            </div>



            <div class="<?=($GLOBAL_LEVEL1[$com][$type]['full']==true) ? 'oneOne':'colLeft' ?>">



                <div class="widget mtop0">

                    <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />

                        <h6><?=_thongtin?></h6>

                    </div>



                    <?php  foreach ($config['lang'] as $k => $v){ ?>

                    <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                        <label><?=_tieude?> [<?=$v?>]</label>

                        <div class="formRight">

                            <input type="text" data-validation="required"
                                data-validation-error-msg="Tên không được để trống"
                                onkeyup="changeSlug('name_<?=$k?>','alias_<?=$k?>','url_seo_<?=$k?>','title_seo_<?=$k?>','title_<?=$k?>')"
                                class="input100" name="data[ten_<?=$k?>]" title="Nhập tên danh mục" id="name_<?=$k?>"
                                class="tipS" value="<?=@$item['ten_'.$k]?>" />

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php }?>

                    <?php if($GLOBAL[$com][$type]['alias']==true){ ?>

                    <?php  foreach ($config['lang'] as $k => $v){ ?>

                    <div class="formRow">

                        <label class="d-block">[<?=$v?>] Đường hiển thị (Bạn có thể thay đổi đường dẫn) :</label>

                        <div class="formRight">

                            <div class="box-alias"
                                style="position: relative;display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;-ms-flex-align: stretch;align-items: stretch;width: 100%;">

                                <div class="alias-text-disabled">

                                    <b><?=$https_config?><?=$item['type']?>/</b>

                                </div>

                                <div
                                    style="position: relative;-ms-flex: 1 1 auto;flex: 1 1 auto;width: 1%;margin-bottom: 0;">

                                    <input readonly data-validation="required"
                                        data-validation-error-msg="Url không được để trống" type="text"
                                        name="data[tenkhongdau_<?=$k?>]" title="Nhập tên không dấu" id="alias_<?=$k?>"
                                        class="tipS input100" value="<?=@$item['tenkhongdau_'.$k]?>" />

                                </div>

                                <?php if($_GET['act']=='edit_list'){ ?>

                                <div class="input-group-append"
                                    style="display:flex;align-items:center;margin-left:10px">

                                    <div class="input-group-text">

                                        <input type="checkbox" id="checkUrl<?=$k?>" data-id="<?=$k?>"
                                            class="change_alias alias_<?=$k?>" checked>

                                        <label style="float:right;padding:0;margin-left:5px;" for="checkUrl<?=$k?>"
                                            class="mb-0 ml-1">Không đổi link</label>

                                    </div>

                                </div>

                                <?php } ?>

                            </div>



                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php }?>

                    <?php }?>


                </div>

                <div class="clear"></div>

            </div>

            <div class="<?=($GLOBAL_LEVEL1[$com][$type]['full']==true) ? 'oneOne':'colRight' ?>">



                <div class="widget mtop0">

                    <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />

                        <h6><?=_thuoctinh?></h6>

                    </div>

                    <?php /* ?>

                    <div class="formRow">

                        <label>Dạng hiển thị menu :</label>

                        <div class="formRight">

                            <label>

                                <input type="radio" id="menu1" <?php if($item['menu']==0) echo 'checked'; ?>
                                    name="data[menu]" value="0" />

                                <label style="float:none!important" for="menu1">Menu dọc</label>

                            </label>

                            <label>

                                <input type="radio" id="menu2" <?php if($item['menu']==1) echo 'checked'; ?>
                                    name="data[menu]" value="1" />

                                <label style="float:none!important" for="menu2">Menu ngang</label>

                            </label>

                        </div>

                        <div class="clear"></div>

                    </div>

                    */ ?>

                    <?php if($GLOBAL_LEVEL1[$com][$type]['dm_index']==true){ ?>

                    <div class="formRow">

                        <label>Danh mục trang chủ</label>

                        <div class="formRight">

                            <select name="data[dmindex]" id="dmindex" class="main_select">

                                <option value="0" <?=(@$item['dmindex']==0) ? 'selected':''?>>
                                    <?= $config['dmindex'][0]?>

                                </option>

                                <option value="1" <?=(@$item['dmindex']==1) ? 'selected':''?>>
                                    <?= $config['dmindex'][1]?>

                                </option>
                            </select>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php }?>

                    <?php if($GLOBAL_LEVEL1[$com][$type]['img']==true){ ?>

                    <div class="formRow">

                        <label>Tải hình ảnh:</label>

                        <div class="formRight">

                            <?php if($_GET['act']=='edit_list'){?>

                            <input type="file" id="file" name="file" />

                            <?php }else{?>

                            <input data-validation="required" data-validation-allowing="jpg, png"
                                data-validation-max-size="300kb" data-validation-error-msg-required="Bạn chưa chọn file"
                                type="file" id="file" name="file" />

                            <?php }?>

                            <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS"
                                original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

                            <br />

                            <br />

                            <span style="display: inline-block; line-height: 30px;color:#CCC;">

                                Width:

                                <?=$GLOBAL_LEVEL1[$com][$type]['img-width']*$GLOBAL_LEVEL1[$com][$type]['img-ratio']?>px

                                - Height:

                                <?=$GLOBAL_LEVEL1[$com][$type]['img-height']*$GLOBAL_LEVEL1[$com][$type]['img-ratio']?>px

                            </span>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php if($_REQUEST['act']=='edit_list' && $item['photo']!=''){?>

                    <div class="formRow">

                        <label>Hình Hiện Tại :</label>

                        <div class="formRight">



                            <div class="mt10"><img src="<?=_upload_baiviet.$item['photo']?>" alt="NO PHOTO"
                                    width="<?=$GLOBAL_LEVEL1[$com][$type]['img-width']?>"
                                    height="<?=$GLOBAL_LEVEL1[$com][$type]['img-height']?>" /></div>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php } ?>

                    <?php if($GLOBAL_LEVEL1[$com][$type]['icon']==true){ ?>

                    <div class="formRow">

                        <label>Tải icon:</label>

                        <div class="formRight">

                            <input type="file" id="file" name="icon" />

                            <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS"
                                original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

                            <br />

                            <br />

                            <span style="display: inline-block; line-height: 30px;color:#CCC;">

                                Width:

                                <?=$GLOBAL_LEVEL1[$com][$type]['img-width1']*$GLOBAL_LEVEL1[$com][$type]['img-ratio']?>px

                                - Height:

                                <?=$GLOBAL_LEVEL1[$com][$type]['img-height1']*$GLOBAL_LEVEL1[$com][$type]['img-ratio']?>px

                            </span>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php if($_REQUEST['act']=='edit_list' && $item['icon']!=''){?>

                    <div class="formRow">

                        <label>Icon Hiện Tại :</label>

                        <div class="formRight">

                            <div class="mt10"><img src="<?=_upload_baiviet.$item['icon']?>" alt="NO PHOTO" width="40" />

                            </div>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php } ?>

                    <?php if($GLOBAL_LEVEL1[$com][$type]['banner']==true){ ?>

                    <div class="formRow">

                        <label>Tải banner:</label>

                        <div class="formRight">

                            <input type="file" id="file" name="banner" />

                            <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS"
                                original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

                            <br />

                            <br />

                            <span style="display: inline-block; line-height: 30px;color:#CCC;">

                                Width:

                                <?=$GLOBAL_LEVEL1[$com][$type]['banner-width']*$GLOBAL_LEVEL1[$com][$type]['banner-ratio']?>px

                                - Height:

                                <?=$GLOBAL_LEVEL1[$com][$type]['banner-height']*$GLOBAL_LEVEL1[$com][$type]['banner-ratio']?>px

                            </span>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php if($_REQUEST['act']=='edit_list' && $item['banner']!=''){?>

                    <div class="formRow">

                        <label>Banner hiện tại :</label>

                        <div class="formRight">

                            <div class="mt10"><img src="<?=_upload_baiviet.$item['banner']?>" alt="NO PHOTO" width="40" />

                            </div>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php } ?>

                    <?php if($GLOBAL_LEVEL1[$com][$type]['advance']==true){ ?>

                    <div class="formRow">

                        <label>Tải quảng cáo:</label>

                        <div class="formRight">

                            <input type="file" id="file" name="advance" />

                            <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS"
                                original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

                            <br />

                            <br />

                            <span style="display: inline-block; line-height: 30px;color:#CCC;">

                                Width:

                                <?=$GLOBAL_LEVEL1[$com][$type]['adv-w']*$GLOBAL_LEVEL1[$com][$type]['img-ratio']?>px -

                                Height:

                                <?=$GLOBAL_LEVEL1[$com][$type]['adv-h']*$GLOBAL_LEVEL1[$com][$type]['img-ratio']?>px

                            </span>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php if($_REQUEST['act']=='edit_list' && $item['icon']!=''){?>

                    <div class="formRow">

                        <label>Hình quảng cáo hiện Tại :</label>

                        <div class="formRight">

                            <div class="mt10"><img src="<?=_upload_baiviet.$item['advance']?>" alt="NO PHOTO"
                                    width="200" /></div>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <div class="formRow">

                        <label>Link quảng cáo</label>

                        <div class="formRight">

                            <input type="text" name="data[links]" title="Nhập links" id="links" class="tipS"
                                value="<?=@$item['links']?>" />

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php  foreach ($config['lang'] as $k => $v){ ?>

                    <?php if($GLOBAL_LEVEL1[$com][$type]['mota']==true){ ?>

                    <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                        <label><?=_mota?> [<?=$v?>]</label>

                        <div class="formRight">

                            <div
                                <?php if($GLOBAL_LEVEL1['baiviet']['san-pham']['mota-ckeditor']==true) echo 'class="ck_editor"'; ?>>

                                <textarea title="Nhập mô tả . " data-height="400" id="mota_<?=$k?>"
                                    <?=($GLOBAL_LEVEL1[$com][$type]['mota-ckeditor']==true) ? 'class="ck_editors"':'rows="8"' ?>
                                    name="data[mota_<?=$k?>]"><?=@$item['mota_'.$k]?></textarea>

                            </div>

                            <div class="clear"></div>

                        </div>

                    </div>

                    <?php } ?>

                    
                    <?php if($GLOBAL_LEVEL1[$com][$type]['mota_km']==true){ ?>

                    <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                        <label>Mô tả khuyến mãi[<?=$v?>]</label>

                        <div class="ck_editor">

                            <textarea title="Nhập mô tả [<?=$v?>]. " data-height="400" id="mota_km_<?=$k?>"

                                <?=($GLOBAL_LEVEL1[$com][$type]['mota_km-ckeditor']==true) ? 'class="ck_editors"':'rows="8"' ?>

                                name="data[mota_km_<?=$k?>]"><?=@$item['mota_km_'.$k]?></textarea>

                        </div>

                        <div class="clear"></div>

                    </div>              

                    <?php } ?>


                    <?php if($GLOBAL_LEVEL1[$com][$type]['noidung']==true){ ?>

                    <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                        <label><?=_noidung?> [<?=$v?>]</label>

                        <div class="formRight">

                            <div
                                <?php if($GLOBAL_LEVEL1['baiviet']['san-pham']['noidung-ckeditor']==true) echo 'class="ck_editor"'; ?>>

                                <textarea title="Nhập mô tả . " data-height="400" id="noidung_<?=$k?>"
                                    <?=($GLOBAL_LEVEL1[$com][$type]['noidung-ckeditor']==true) ? 'class="ck_editors"':'rows="8"' ?>
                                    name="data[noidung_<?=$k?>]"><?=@$item['noidung_'.$k]?></textarea>

                            </div>

                            <div class="clear"></div>

                        </div>

                    </div>

                    <?php } ?>

                    <?php } ?>

                    <div class="formRow">



                        <div class="formRight">

                            <label><?=_sothutu?>: </label>

                            <input type="text" class="tipS"
                                value="<?=isset($item['stt']) ? $item['stt'] : $func->checkNumb('stt',$com.'_list',$type)?>"
                                name="data[stt]" style="width:40px; text-align:center;"
                                onkeypress="return OnlyNumber(event)"
                                original-title="Số thứ tự của danh mục, chỉ nhập số">

                        </div>

                        <div class="clear"></div>

                    </div>

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

                </div>

                <?php if($GLOBAL_LEVEL1[$com][$type]['seo']==true){ ?>

                <?php if(isset($GLOBAL_LEVEL1[$com][$type]['seo'])&&$GLOBAL_LEVEL1[$com][$type]['seo']==true){

                        $seoDB = $seo->getSeoDB($id,$com,'man'.$tbl,$type);

                    ?>

                <div class="widget mtop10">

                    <div class="formRow">

                        <div class="formRight">

                            <div class="box-seo">

                                <?php  foreach ($config['seo-lang'] as $k => $v){ ?>

                                <p
                                    style="font-size:18px;font-weight:normal;border-bottom:1px solid #ccc;padding-bottom:10px">

                                    Hiển thị kết quả tìm kiếm google search</p>

                                <p style="font-size:14px;font-weight:normal;padding:10px 0px">

                                    <a href="<?=$https_config?><?=$item['type']?>/<?=$item["tenkhongdau_$k"]?>"
                                        target="_blank"
                                        title="<?=$https_config?>"><span><?=$https_config?><?=$item['type']?>/</span><span
                                            id="url_seo_<?=$k?>"><?=$item["tenkhongdau_$k"]?></span></a>

                                </p>

                                <h3 style="font-size: 20px;line-height: 1.3;color: #1a0dab;margin-bottom: 0px;font-weight:500"
                                    class="title_seo" id="title_seo">

                                    <?=($seoDB['title_'.$k]!='') ? $seoDB['title_'.$k] : '[SEO Onpage] là gì? Hướng dẫn tối ưu SEO Onpage...' ?>

                                </h3>

                                <p style="padding-top:10px;font-size:14px;line-height: 1.57;word-wrap: break-word;color: #6a6a6a;margin-bottom: 0px;"
                                    class="description_seo" id="description_seo">

                                    <?=($seoDB['description_'.$k]!='') ? $seoDB['description_'.$k] : ' Hướng dẫn SEO onpage căn bản tối ưu để trang web chuẩn SEO lên top Google nhanh và bền vững, kỹ thuật tối ưu SEO onpage đơn giản' ?>



                                </p>

                                <?php }?>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="widget mtop10">

                    <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />

                        <h6><?=_noidungseo?></h6>

                    </div>



                    <?php  foreach ($config['seo-lang'] as $k => $v){ ?>



                    <div class="formRow">

                        <label>Title [ <?=$v?> ]: </label>

                        <div class="formRight">

                            <input data-validation="required" data-validation-error-msg="Title không được để trống"
                                type="text" value="<?=@$seoDB['title_'.$k]?>" id="title" name="dataseo[title_<?=$k?>]"
                                title="Nội dung thẻ meta Title dùng để SEO" class="tipS input100" />

                        </div>

                        <div class="clear"></div>

                    </div>



                    <div class="formRow">

                        <label>Keywords [ <?=$v?> ]: </label>

                        <div class="formRight">

                            <input type="text" value="<?=@$seoDB['keywords_'.$k]?>" id="title"
                                name="dataseo[keywords_<?=$k?>]" title="Từ khóa chính cho danh mục"
                                class="tipS input100" />

                        </div>

                        <div class="clear"></div>

                    </div>



                    <div class="formRow">

                        <label>Description [ <?=$v?> ]:</label>

                        <div class="formRight">

                            <textarea data-validation="required"
                                data-validation-error-msg="Description không được để trống" rows="4" cols=""
                                title="Nội dung thẻ meta Description dùng để SEO" class="tipS input100"
                                name="dataseo[description_<?=$k?>]"
                                id="description"><?=@$seoDB['description_'.$k]?></textarea>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <div class="formRow">

                        <div class="formRight">

                            <input readonly="readonly" type="text"
                                style="width:45px; margin-top:10px; text-align:center;" name="des_char" id="des_char"
                                value="<?=@$item['des_char']?>" /> <?=_kytu?> <b>(Từ 160-300 ký tự)</b>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                </div>

                <?php } ?>

                <?php } ?>

                <div class="clear"></div>

            </div>

        </div>

        <div class="formRow fixedBottom">

            <div class="formRight">

                <div class="box-admin" style="display:flex; align-items:center;justify-content:flex-end">

                    <div class="box-action">

                        <button type="submit" class="btn btn-sm bg-gradient-primary text-white">

                            <i class="far fa-save mr-2"></i>Lưu

                        </button>

                        <button type="submit" class="btn btn-sm bg-gradient-success" name="save-here"><i
                                class="far fa-save mr-2"></i>Lưu tại trang</button>

                        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i
                                class="fas fa-redo mr-2"></i>Làm lại</button>

                        <a class="btn btn-sm bg-gradient-danger text-white" href="index.html?com=user&act=man">

                            <i class="fas fa-sign-out-alt mr-2"></i>Thoát

                        </a>

                    </div>

                </div>

            </div>

            <div class="clear"></div>

        </div>

    </form>

</div>

<script>
$(function() {



    $('#id_thuonghieu').change(function() {

        var _o = $(this);

        var alias = _o.find('option:selected').attr('data-alias');

        var _v = $('#ten_vi').val();

        var slug = getSlug(_v + ' ' + alias);

        $('#tenkhongdau').val(slug);

    });

});
</script>