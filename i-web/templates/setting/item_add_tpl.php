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

<div class="control_frm">

    <div class="bc">

        <ul id="breadcrumbs" class="breadcrumbs">

            <li><a href="index.html?com=setting&act=capnhat"><span><?=_thietlaphethong?></span></a></li>

            <li class="current"><a href="#" onclick="return false;"><?=_cauhinhwebsite?></a></li>

        </ul>

        <div class="clear"></div>

    </div>

</div>



<form name="supplier" class="form" action="index.html?com=setting&act=save" method="post"  enctype="multipart/form-data" autocomplete="off" accept-charset="utf-8">

    <div class="oneOne">

        <div class="widget mtop0">

            <div class="title chonngonngu" style="border-bottom: 0px solid transparent">

                <ul>

                    <?php  foreach ($config['lang'] as $k => $v){ ?>

                    <li><a href="<?=$k?>" class="<?= ($k == 'vi') ? 'active': '' ?> tipS" title="<?=$v?>"><img

                                src="./images/<?=$k?>.png" alt="" class="<?=$func->changeTitle($v)?>" /><?=$v?></a></li>

                    <?php } ?>

                </ul>

            </div>

        </div>

    </div>

    <div class="colLeft">

        <div class="widget mtop0">

            <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />

                <h6><?=_thongtinchung?></h6>

            </div>

            <?php  foreach ($config['lang'] as $k => $v){ ?>

            <?php if($GLOBAL[$com]['tieude']==true) {?>

            <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                <label><?=_tieude?> [<?=$v?>]</label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Tên không được để trống" type="text" name="data[name_<?=$k?>]" title="Nhập tên công ty" id="name_<?=$k?>"

                        class="tipS validate[required]" value="<?=@$item['name_'.$k]?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['diachi']==true) {?>

            <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                <label><?=_diachi?> [<?=$v?>]</label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Địa chỉ không được để trống" type="text" name="data[address_<?=$k?>]" title="Nhập địa chỉ" id="address_<?=$k?>"

                        class="tipS validate[required]" value="<?=@$item['address_'.$k]?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['chaychu1']==true) {?>

            <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                <label>Chạy chữ 1 [<?=$v?>]</label>

                <div class="formRight">

                    <input type="text" name="data[scrolltext1_<?=$k?>]" title="Nhập chạy chữ" id="scrolltext1_<?=$k?>"

                        class="tipS validate[required]" value="<?=@$item['scrolltext1_'.$k]?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['chaychu2']==true) {?>

            <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                <label>Chạy chữ 2 [<?=$v?>]</label>

                <div class="formRight">

                    <input type="text" name="data[scrolltext2_<?=$k?>]" title="Nhập chạy chữ" id="scrolltext2_<?=$k?>"

                        class="tipS validate[required]" value="<?=@$item['scrolltext2_'.$k]?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['slogan']==true) {?>

            <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                <label>Slogan [<?=$v?>]</label>

                <div>

                    <input type="text" name="data[slogan_<?=$k?>]" title="Nhập slogan" id="slogan_<?=$k?>"

                        class="tipS validate[required]" value="<?=@$item['slogan_'.$k]?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['timework']==true) {?>

            <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                <label><?=_timework?> [<?=$v?>]</label>

                <div class="formRight">

                    <input type="text" name="data[timework_<?=$k?>]" title="Nhập thời gian làm việc"

                        id="timework_<?=$k?>" class="tipS validate[required]" value="<?=@$item['timework_'.$k]?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['copyright']==true) {?>

            <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                <label>Copyright [<?=$v?>]</label>

                <div class="formRight">

                    <textarea  name="data[copyright_<?=$k?>]" title="Copyright"

                        id="summernote" class="tipS validate[required]"><?=@$item['copyright_'.$k]?></textarea>

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php } ?>

            <?php if($GLOBAL[$com]['email']==true) {?>

            <div class="formRow">

                <label><?=_email?></label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Email không được để trống" type="text" value="<?=@$item['email']?>" name="data[email]" title="Nhập địa chỉ email"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['hotline']==true) {?>

            <div class="formRow">

                <label>Hotline</label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Hotline không được để trống" type="text" value="<?=@$item['hotline']?>" name="data[hotline]" title="Nhập hotline"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['dienthoai']==true) {?>

            <div class="formRow">

                <label><?=_dienthoai?></label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Điện thoại không được để trống" type="text" value="<?=@$item['dienthoai']?>" name="data[dienthoai]"

                        title="Nhập số điện thoại" class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['zalo']==true) {?>

            <div class="formRow">

                <label><?=_sozalo?></label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['sozalo']?>" name="data[sozalo]" title="Nhập số zalo"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['website']==true) {?>

            <div class="formRow">

                <label><?=_website?></label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Website" không được để trống" type="text" value="<?=@$item['website']?>" name="data[website]" title="Nhập địa chỉ website"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL['setting']['links']==true) {?>

            <div class="formRow">

                <label>Link youtube</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['linksyoutube']?>" name="data[linksyoutube]"

                        title="Links youtube" class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            
            <?php if($GLOBAL['setting']['slider']==true) {?>

            <div class="formRow">

                <label>Chọn slider</label>

                <div class="formRight">

                    <select name="data[slider_web]">

                        <option value="">Chọn dạng slider cho web</option>

                        <option value="1" <?php if($item['slider_web']==1) echo 'selected'; ?>>Dạng slider video upload file

                        </option>

                         <option value="2" <?php if($item['slider_web']==2) echo 'selected'; ?>>Dạng slider hình ảnh

                        </option>

                    </select>

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['faceid']==true) {?>

            <div class="formRow">

                <label>Facebook id</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['faceid']?>" name="data[faceid]" title="Nhập faceid"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['fanpage']==true) {?>

            <div class="formRow">

                <label>FanPage Facebook</label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Fanpage không được để trống" type="text" value="<?=@$item['facebook']?>" name="data[facebook]"

                        title="Nhập link fanpage facebook" class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <div class="formRow none">

                <label>FanPage Facebook 2</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['facebook2']?>" name="data[facebook2]"

                        title="Nhập link fanpage facebook 2" class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['message']==true) {?>

            <div class="formRow">

                <label><?=_linkmessage?></label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['linkmessage']?>" name="data[linkmessage]"

                        title="Nhập số điện thoại" class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['postalcode']==true) {?>

            <div class="formRow">

                <label>Mã khu vực</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['postalcode']?>" name="data[postalcode]" title="Nhập postalcode"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['city']==true) {?>

            <div class="formRow">

                <label>Thành phố</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['city']?>" name="data[city]" title="Nhập thành phố"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['district']==true) {?>

            <div class="formRow">

                <label>Quận huyện</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['district']?>" name="data[district]" title="Nhập số quận"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['toado']==true) {?>

            <div class="formRow">

                <label><?=_toadoweb?></label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Tọa độ không được để trống" type="text" name="data[map_marker]" title="Những tọa bản đồ vào đây" class="tipS"

                        value="<?=@$item['map_marker']?>">

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['iframe1']==true) {?>

            <div class="formRow">

                <label>Nhúng bản đồ map <strong><a href="https://www.google.com/maps" target="_blank"

                            title="Lấy mã nhúng Google Map">( <i class="fas fa-map-marker-alt" aria-hidden="true"></i>

                            <?=_laymanhung?> )</a></strong></a></label>

                <div class="formRight">

                    <textarea data-validation="required" data-validation-error-msg="Iframe không được để trống" rows="8" cols="" title="Những đoạn code nhúng bản đồ vào đây" class="tipS"

                        name="data[iframe_map1]"><?=@$item['iframe_map1']?></textarea>

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['iframe']==true) {?>

            <div class="formRow">

                <label><?=_nhungiframe?> <strong><a href="https://www.google.com/maps" target="_blank"

                            title="Lấy mã nhúng Google Map">( <i class="fas fa-map-marker-alt" aria-hidden="true"></i>

                            <?=_laymanhung?> )</a></strong> | <a href="index.html?com=map&act=man"

                        title="Lấy mã nhúng Google Map"><?=_hethongcuahang?></a></label>

                <div class="formRight">

                    <textarea data-validation="required" data-validation-error-msg="Iframe không được để trống" rows="8" cols="" title="Những đoạn code nhúng bản đồ vào đây" class="tipS"

                        name="data[iframe_map]"><?=@$item['iframe_map']?></textarea>

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

        </div>

        <div class="widget mtop10">

            <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />

                <h6>Chèn code thêm</h6>

            </div>

            <div class="formRow">

                <label><?=_codehead?> <strong><a

                            href="https://www.google.com/webmasters/verification/verification?hl=en&tid=alternate&siteUrl=<?=$https_config?>"

                            target="_blank" title="Lấy mã nhúng Google Map">( Mã xác minh google )</a></strong></label>

                <div class="formRight">

                    <textarea rows="8" cols="" title="Những đoạn code khách hàng muốn chèn trên header của website"

                        class="tipS" name="data[analytics]"><?=@$item['analytics']?></textarea>

                </div>

                <div class="clear"></div>

            </div>



            <div class="formRow">

                <label><?=_codebody?> :</label>

                <div class="formRight">

                    <textarea rows="8" cols="" title="Những đoạn code khách hàng muốn chèn trên footer của website"

                        class="tipS" name="data[vchat]"><?=@$item['vchat']?></textarea>

                </div>

                <div class="clear"></div>

            </div>

        </div>

    </div>

    <div class="colRight">

        <div class="widget mtop0">

            <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />

                <h6><?=_thuoctinhcauhinh?></h6>

            </div>

            <style>

                .flex-checkbox{

                    display: flex;

                    align-items: center;

                    justify-content:center;

                    margin-right: 10px!important;

                    padding: 0!important;

                    flex-wrap: wrap;

                }

                .flex-checkbox span{

                    display: inline-block;

                    margin-left: 5px;

                }

                .mg-label{margin-bottom: 10px}

            </style>

            <?php 

                $arr_seo=explode(',',$item['seo']);

            ?>

            <div class="formRow">

                <label>Cấu trúc seo ( hiển thị thẻ <b>HEADING</b> ở vị trí được chọn )</label>

                <div class="formRight">

                    <?php foreach($config['seo-debug'] as $key => $value){?>

                    <label class="stardust-checkbox checker flex-checkbox mg-label">

                        <input class="stardust-checkbox__input" <?php if(in_array($key,$arr_seo)) echo 'checked';?> name="seo[]" id="check<?=$key?>" type="checkbox"

                            value="<?=$key?>" style="display:none">

                        <div class="stardust-checkbox__box"></div>

                        <span><?=$value?></span>

                    </label>

                    <?php }?>

                </div>

                <div class="clear"></div>

            </div>

            <?php if($GLOBAL[$com]['background']==true) {?>

            <style>

            .canvas-color-picker .buttons button {

                color: #000;

            }



            .form-mausac input {

                color: <?=$item['mausac']?> !important;

            }

            </style>

            <div class="formRow">

                <label>Chọn màu background</label>

                <div class="formRight form-mausac">

                    <input type="text" name="data[color_page]" value="<?=@$item['color_page']?>" class="cp3" />

                </div>

                <div class="clear"></div>

            </div>

            <div class="formRow">

                <label>Chọn màu text</label>

                <div class="formRight form-mausac">

                    <input type="text" name="data[color_text]" value="<?=@$item['color_text']?>" class="cp3" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['page_in']==true) {?>

            <div class="formRow">

                <label>Phân trang trang chủ</label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Phân trang không được để trống" type="text" name="data[page_in]" title="Nhập số item sản phẩm" id="page_in" class="tipS"

                        value="<?=@$item['page_in']?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php }?>

            <?php if($GLOBAL[$com]['page_sp']==true) {?>

            <div class="formRow">

                <label><?=_soluongphantrang?></label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Phân trang không được để trống" type="text" name="data[page_sp]" title="Nhập số item sản phẩm" id="page_sp" class="tipS"

                        value="<?=@$item['page_sp']?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php }?>

            <?php if($GLOBAL[$com]['page_ne']==true) {?>

            <div class="formRow">

                <label>Phân trang bài viết</label>

                <div class="formRight">

                    <input data-validation="required" data-validation-error-msg="Phân trang không được để trống" type="text" name="data[page_ne]" title="Nhập số item sản phẩm" id="page_ne" class="tipS"

                        value="<?=@$item['page_ne']?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php }?>



            <?php if($GLOBAL[$com]['counter']==true) {?>

            <div class="formRow">

                <label>Thời gian bán hàng</label>

                <div class="formRight">

                    <input type="text" name="data[counter]" value="<?=@$item['counter']?>" class="date-picker" />

                </div>

                <div class="clear"></div>

            </div>

            <?php }?>

            <?php if($GLOBAL[$com]['nonecopy']==true) {?>

            <div class="formRow">

                <label for="nonecopy"

                    style="float: left; display: inline-block; width: auto !important; margin-right: 10px;">Chống

                    copy</label>

                <input type="checkbox" name="block_copy" style="float: left;margin-top:5px" id="nonecopy" value="1"

                    <?=(!isset($item['block_copy']) || $item['block_copy']==1)?'checked="checked"':''?> />

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['slider_video']==true) {?>

            <div class="formRow">

                <label for="slider_video"

                    style="float: left; display: inline-block; width: auto !important; margin-right: 10px;">Slider video</label>

                <input type="checkbox" name="slider_video" style="float: left;margin-top:5px" id="slider_video" value="1"

                    <?=(!isset($item['slider_video']) || $item['slider_video']==1) ? 'checked="checked"':''?> />

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['block']==true) {?>

            <div class="formRow">

                <label for="check1"

                    style="float: left; display: inline-block; width: auto !important; margin-right: 10px;">Khóa

                    website</label>

                <input type="checkbox" name="disable_web" style="float: left;" id="check1" value="1"

                    <?=(!isset($item['disable_web']) || $item['disable_web']==1)?'checked="checked"':''?> />

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['phivanchuyen']==true) {?>

            <div class="formRow">

                <label>Phí vận chuyển</label>

                <div class="formRight">

                    <input type="text" name="data[phivanchuyen]" title="Phí vận chuyển" id="phivanchuyen"

                        class="conso tipS" value="<?=@$item['phivanchuyen']?>" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['changedola']==true) {?>

            <div class="formRow">

                <label><?=_chuyendoitiente?> (<span style="color:red"><?=_nhapgiatritheogiavietnam?></span>)</label>

                <div class="formRight">

                    <div style="margin-top:10px">

                        <label>USA(DOLA)</label>

                        <input type="text" name="data[dola]" title="Chuyển đổi tiền tệ" id="dola" class="conso tipS"

                            value="<?=@$item['dola']?>" />

                    </div>

                    <div style="margin-top:10px">

                        <label><?=_yennhat?>(JPY) (<span style="color:red"><?=_vidu?></span>)</label>

                        <input type="text" name="data[yen]" title="Chuyển đổi tiền tệ" id="yen" class="conso tipS"

                            value="<?=@$item['yen']?>" />

                    </div>



                </div>

                <div class="clear"></div>

            </div>

            <?php }?>

            <div class="formRow">

                <label>Favicon :</label>

                <div class="formRight">

                    <input type="file" id="file" name="file1" />

                    <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS"

                        original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

                </div>

                <div class="clear"></div>

            </div>

            <div class="formRow">

                <label>Favicon :</label>

                <div class="formRight">

                    <img src="<?=_upload_hinhanh.@$item['bgtop']?>" alt="Upload hình" class="icon_question tipS"

                        width="50">

                </div>

                <div class="clear"></div>

            </div>

        </div>

         <?php if($GLOBAL[$com]['videofile']==true) {?>

            <div class="formRow">

                <label>Upload video :</label>

                <div class="formRight">

                    <input type="file" id="file" name="file" />

                    <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS"
                        original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

                </div>

                <div class="clear"></div>

            </div>

             <div class="formRow">

                <label>Tệp video hiện tại</label>

                <div class="formRight">

                    <div class="mt10 change-photo">

                        <?php $pathImg = _upload_hinhanh.$item["photo"]; ?>

                            <video width="300" height="300" autoplay muted loop controls style="width: 300px;object-fit: cover;height: 300px;aspect-ratio: 16/9;">

                            <source src="<?=$pathImg?>" type="video/mp4">

                        </video>

                        <span style="color:blue;display:block;font-size:16px;" class="mt20"><span style="color:#000;">Tên tệp video: </span> <?=@$item["photo"]?></span>

                    </div>

                </div>

                <div class="clear"></div>

            </div>

            <?php }?>

        <?php if($GLOBAL[$com]['watermark']==true) {?>
            <div class="formRow">
                <label>Hình đóng dấu :</label>
                <div class="formRight">
                    <input type="file" id="file" name="file2" />
                    <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS"
                        original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Hình đóng dấu : <span style="color:#f00">(max-width:278px-max-height:278px)</span></label>
                <div class="formRight" style="background: #333333;">
                    <img src="<?=_upload_hinhanh.@$item['bgcontent']?>" alt="Upload hình" class="icon_question tipS"
                        width="100">
                </div>
                <div class="clear"></div>
            </div>
        <?php } ?>

        <?php if($GLOBAL[$com]['tag']==true) {?>

        <div class="formRow">

            <label>Tag:</label>

            <div class="formRight">

                <input id="tags_1" type="text" name="data[tags][]" class="tags" value="<?=@$item['tags']?>" />

            </div>

            <div class="clear"></div>

        </div>

        <?php } ?>

        <?php if($GLOBAL[$com]['vat']==true) {?>

        <div class="widget mtop10">

            <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />

                <h6>Thông tin xuất GTGT</h6>

            </div>



            <?php if($GLOBAL[$com]['tax_code']==true) {?>

            <div class="formRow">

                <label>Mã số thuế</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['tax_code']?>" name="data[tax_code]" title="Nhập tax code"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['blank']==true) {?>

            <div class="formRow">

                <label>Số tài khoản</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['blank']?>" name="data[blank]" title="Nhập tax code"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['denominator']==true) {?>

            <div class="formRow">

                <label>Mẫu số</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['denominator']?>" name="data[denominator]" title="Nhập tax code"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['symbol']==true) {?>

            <div class="formRow">

                <label>Ký hiệu</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['symbol']?>" name="data[symbol]" title="Nhập tax code"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['postalcode']==true) {?>

            <div class="formRow">

                <label>Mã khu vực</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['postalcode']?>" name="data[postalcode]" title="Nhập postalcode"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['city']==true) {?>

            <div class="formRow">

                <label>Thành phố</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['city']?>" name="data[city]" title="Nhập thành phố"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>

            <?php if($GLOBAL[$com]['district']==true) {?>

            <div class="formRow">

                <label>Quận huyện</label>

                <div class="formRight">

                    <input type="text" value="<?=@$item['district']?>" name="data[district]" title="Nhập số quận"

                        class="tipS" />

                </div>

                <div class="clear"></div>

            </div>

            <?php } ?>



        </div>

        <?php } ?>

        <?php if(isset($GLOBAL['setting']['seo'])&&$GLOBAL['setting']['seo']==true){

            $seoDB = $seo->getSeoDB(0,'setting','capnhat','');

        ?>

            <div class="widget mtop10">

                <div class="formRow">

                    <div class="formRight">

                        <div class="box-seo">



                            <p style="font-size:18px;font-weight:normal;border-bottom:1px solid #ccc;padding-bottom:10px">

                                Hiển thị kết quả tìm kiếm google search</p>

                            <h3 style="padding-top:20px;font-size: 20px;line-height: 1.3;color: #1a0dab;margin-bottom: 0px;font-weight:500"

                                class="title_seo" id="title_seo">

                                <?=($seoDB['title_'.$k]!='') ? $seoDB['title_'.$k] : '[SEO Onpage] là gì? Hướng dẫn tối ưu SEO Onpage...' ?>

                            </h3>

                            <p style="padding-top:10px;font-size:14px;line-height: 1.57;word-wrap: break-word;color: #6a6a6a;margin-bottom: 0px;"

                                class="description_seo" id="description_seo">

                                <?=($seoDB['description_'.$k]!='') ? $seoDB['description_'.$k] : ' Hướng dẫn SEO onpage căn bản tối ưu để trang web chuẩn SEO lên top Google nhanh và bền vững, kỹ thuật tối ưu SEO onpage đơn giản' ?>



                            </p>

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

                            <input data-validation="required" data-validation-error-msg="Title trang không được để trống" type="text" value="<?=@$seoDB['title_'.$k]?>" id="title" name="dataseo[title_<?=$k?>]"

                                title="Nội dung thẻ meta Title dùng để SEO" class="tipS input100" />

                        </div>

                        <div class="clear"></div>

                    </div>



                    <div class="formRow">

                        <label>Keywords [ <?=$v?> ]: </label>

                        <div class="formRight">

                            <input type="text" value="<?=@$seoDB['keywords_'.$k]?>" id="keywords" name="dataseo[keywords_<?=$k?>]"

                                title="Từ khóa chính cho danh mục" class="tipS input100" />

                        </div>

                        <div class="clear"></div>

                    </div>



                    <div class="formRow">

                        <label>Description [ <?=$v?> ]:</label>

                        <div class="formRight">

                            <textarea data-validation="required" data-validation-error-msg="Description trang không được để trống" rows="4" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS input100"

                                name="dataseo[description_<?=$k?>]" id="description"><?=@$seoDB['description_'.$k]?></textarea>

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



    </div>

    <div class="formRow fixedBottom">

        <div class="formRight">

            <input type="hidden" name="data[id]" id="id_this_setting" value="<?=@$item['id']?>" />

            <div class="box-admin" style="display:flex; align-items:center;justify-content:flex-end">

                <div class="box-action">

                    <button type="submit" class="btn btn-sm bg-gradient-primary text-white submit-check">

                        <i class="far fa-save mr-2"></i>Lưu

                    </button>

                    <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm

                        lại</button>

                    <a class="btn btn-sm bg-gradient-danger text-white" href="index.html">

                        <i class="fas fa-sign-out-alt mr-2"></i>Thoát

                    </a>

                </div>

            </div>

        </div>

        <div class="clear"></div>

    </div>

</form>