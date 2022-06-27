<?php

    $options = (isset($item['options']) && $item['options'] != '') ? json_decode($item['options'],true) : null;

?>

<link href="plugin/sumoselect/sumoselect.css" rel="stylesheet" />

<script src="plugin/sumoselect/jquery.sumoselect.min.js"></script>

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

<div class="wrapper">

    <div class="control_frm">

        <div class="bc">

            <ul id="breadcrumbs" class="breadcrumbs">

                <li><a
                        href="index.html?com=bannerqc&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span><?=$GLOBAL[$com][$type]['title']?></span></a>

                </li>

                <li class="current"><a href="" title=""><span><?=$GLOBAL[$com][$type]['title_main']?></span></a></li>

            </ul>

            <div class="clear"></div>

        </div>

    </div>

    <form name="supplier" class="form"
        action="index.html?com=bannerqc&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"
        method="post" enctype="multipart/form-data">

        <div class="mtop0">

            <div class="oneOne">

                <div class="widget mtop0">

                    <div class="title chonngonngu" style="border-bottom: 0px solid transparent">

                        <ul>

                            <?php  foreach ($config['lang'] as $k => $v){ ?>

                            <li><a href="<?=$k?>" class="<?= ($k == 'vi') ? 'active': '' ?> tipS" title="<?=$v?>"><img
                                        src="./images/<?=$k?>.png" alt=""
                                        class="<?=$func->changeTitle($v)?>" /><?=$v?></a>

                            </li>

                            <?php } ?>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="oneOne">

                <div class="widget mtop0">

                    <?php  foreach ($config['lang'] as $k => $v){ ?>

                    <?php if($GLOBAL[$com][$type]['ten']==true){ ?>

                    <div class="formRow">

                        <label><?=_ten?> [<?=$v?>]:</label>

                        <div class="formRight">

                            <input type="text" name="data[ten_<?=$k?>]" title="Nhập ten_<?=$k?>" id="ten_<?=$k?>"
                                class="tipS" value="<?=@$item['ten_'.$k]?>" />

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php } ?>

                    <?php if($GLOBAL[$com][$type]['img']==true){ ?>

                    <?php  foreach ($config['lang'] as $k => $v){ ?>

                    <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                        <label><?=_uploadhinhanh?>:</label>

                        <div class="formRight">

                            <input type="file" id="file" name="file_<?=$k?>" />

                            <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS"
                                original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">

                            <br />

                            <br />

                            <span style="display: inline-block; line-height: 30px;color:#CCC;">

                                Width: <?=$GLOBAL[$com][$type]['img-width']*$GLOBAL[$com][$type]['img-ratio']?>px -

                                <?=$GLOBAL[$com][$type]['img-height']*$GLOBAL[$com][$type]['img-ratio']?>px

                            </span>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                        <label><?=_hinhanh?> <?=_hientai?> :</label>

                        <div class="formRight">

                            <div class="mt10 change-photo">

                                <?php $pathImg=$GLOBAL[$com][$type]['watermark']==true ? _thumbs.'/'.$GLOBAL[$com][$type]['thumb'].'/'._upload_hinhanh_l.@$item["photo_$k"]: _upload_hinhanh.$item["photo_$k"]?>

                                <img style="max-width:100%" src="<?=$pathImg?>" alt="">

                            </div>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php }?>

                    <?php }?>

                    <?php  foreach ($config['lang'] as $k => $v){ ?>

                    <?php if($GLOBAL[$com][$type]['mota']==true){ ?>

                    <div class="formRow lang_hidden lang_<?=$k?> <?= ($k == 'vi') ? 'active': '' ?>">

                        <label><?=_mota?> [<?=$v?>]</label>

                        <div class="ck_editor">

                            <textarea title="Nhập mô tả [<?=$v?>]. " data-height="400" id="mota_<?=$k?>"
                                <?= ($GLOBAL[$com][$type]['mota-ckeditor']==true) ? 'class="ck_editors"':'rows="8"' ?>
                                name="data[mota_<?=$k?>]"><?=@$item['mota_'.$k]?></textarea>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php } ?>

                    <?php if($GLOBAL[$com][$type]['link']==true){ ?>

                    <div class="formRow">

                        <label><?=_links?>:</label>

                        <div class="formRight">

                            <input type="text" name="data[link]" title="Nhập link" id="link" class="tipS"
                                value="<?=@$item['link']?>" />

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php if($GLOBAL[$com][$type]['option']==true){ ?>

                    <div class="formRow">

                        <label>Chọn vị trí hiển thị:</label>

                        <div class="formRight">

                            <select name="options[]" class="main_select multiselect-info" multiple="multiple"
                                style="max-width:300px">

                                <?php 

                                $arr=json_decode($item['options'],true);

                                foreach($config['popup'] as $k => $v){?>

                                <option value="<?=$k?>" <?=(in_array($k,$arr)) ? 'selected' : ''?>><?=$v?></option>

                                <?php }?>

                            </select>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php if($GLOBAL[$com][$type]['time']==true){ ?>

                    <div class="formRow">

                        <label>Thời gian hiển thị:</label>

                        <div class="formRight">

                            <select name="time_out" class="main_select" style="max-width:300px">

                                <?php for($i=1;$i<=10;$i++){?>

                                <option value="<?=$i*1000?>" <?=($item['time_out']==$i*1000) ? 'selected' : ''?>><?=$i?>

                                    phút</option>

                                <?php }?>

                            </select>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>

                    <?php if($GLOBAL[$com][$type]['count']==true){ ?>

                    <div class="formRow">

                        <label>Số lần hiển thị:</label>

                        <div class="formRight">

                            <select name="data[count]" class="main_select" style="max-width:300px">

                                <?php for($i=1;$i<=10;$i++){?>

                                <option value="<?=$i?>" <?=($item['count']==$i) ? 'selected' : ''?>><?=$i?> lần</option>

                                <?php }?>

                            </select>

                        </div>

                        <div class="clear"></div>

                    </div>

                    <?php } ?>



                    <div class="formRow">



                        <div class="formRight">



                            <?php if(isset($GLOBAL[$com][$type]['watermark-advanced']) && $GLOBAL[$com][$type]['watermark-advanced'] == true) { ?>

                            <?php

                                    $tl = (isset($options) && $options != null && $options['watermark']['position'] == 1 || !isset($options['watermark']['position'])) ? 'checked' : '';

                                    $tc = (isset($options) && $options != null && $options['watermark']['position'] == 2) ? 'checked' : '';

                                    $tr = (isset($options) && $options != null && $options['watermark']['position'] == 3) ? 'checked' : '';

                                    $mr = (isset($options) && $options != null && $options['watermark']['position'] == 4) ? 'checked' : '';

                                    $br = (isset($options) && $options != null && $options['watermark']['position'] == 5) ? 'checked' : '';

                                    $bc = (isset($options) && $options != null && $options['watermark']['position'] == 6) ? 'checked' : '';

                                    $bl = (isset($options) && $options != null && $options['watermark']['position'] == 7) ? 'checked' : '';

                                    $ml = (isset($options) && $options != null && $options['watermark']['position'] == 8) ? 'checked' : '';

                                    $cc = (isset($options) && $options != null && $options['watermark']['position'] == 9) ? 'checked' : '';

                                    $watermark = _thumbs.'/'.$GLOBAL[$com][$type]['thumb'].'/'._upload_hinhanh_l.@$item["photo_vi"];

                                ?>

                            <div class="row d-flex pt10">

                                <div class="col-5 pr15">

                                    <div class="item col-12">

                                        <label>Vị trí đóng dấu:</label>

                                        <div class="clear"></div>

                                        <div class="watermark-position rounded">

                                            <label for="tl">

                                                <input type="radio" name="data[options][watermark][position]" id="tl"
                                                    value="1" <?=$tl?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($tl) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                            <label for="tc">

                                                <input type="radio" name="data[options][watermark][position]" id="tc"
                                                    value="2" <?=$tc?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($tc) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                            <label for="tr">

                                                <input type="radio" name="data[options][watermark][position]" id="tr"
                                                    value="3" <?=$tr?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($tr) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                            <label for="mr">

                                                <input type="radio" name="data[options][watermark][position]" id="mr"
                                                    value="4" <?=$mr?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($mr) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                            <label for="br">

                                                <input type="radio" name="data[options][watermark][position]" id="br"
                                                    value="5" <?=$br?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($br) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                            <label for="bc">

                                                <input type="radio" name="data[options][watermark][position]" id="bc"
                                                    value="6" <?=$bc?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($bc) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                            <label for="bl">

                                                <input type="radio" name="data[options][watermark][position]" id="bl"
                                                    value="7" <?=$bl?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($bl) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                            <label for="ml">

                                                <input type="radio" name="data[options][watermark][position]" id="ml"
                                                    value="8" <?=$ml?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($ml) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                            <label for="cc">

                                                <input type="radio" name="data[options][watermark][position]" id="cc"
                                                    value="9" <?=$cc?>>

                                                <img class="rounded" onerror="src='images/noimage.png'"
                                                    src="<?=($cc) ? $watermark : ''?>" alt="watermark-cover">

                                            </label>

                                        </div>

                                    </div>

                                </div>

                                <div class="item col-7">

                                    <div class="row d-flex flex-wrap">

                                        <div class="item col-12 mb15">

                                            <label>Độ trong suốt:</label>

                                            <input type="text" class="form-control "
                                                name="data[options][watermark][opacity]" placeholder="70"
                                                value="<?=$options['watermark']['opacity']?>">

                                        </div>

                                        <div class="item col-12 mb15">

                                            <label>Tỉ lệ:</label>

                                            <input type="text" class="form-control "
                                                name="data[options][watermark][per]" placeholder="2"
                                                value="<?=(isset($options['watermark']['per']) && $options['watermark']['per'] != '') ? $options['watermark']['per'] : ''?>">

                                        </div>

                                        <div class="item col-12 mb15">

                                            <label>Tỉ lệ < 300px:</label>

                                                    <input type="text" class="form-control "
                                                        name="data[options][watermark][small_per]" placeholder="3"
                                                        value="<?=(isset($options['watermark']['small_per']) && $options['watermark']['small_per'] != '') ? $options['watermark']['small_per'] : ''?>">

                                        </div>

                                        <div class="item col-12 mb15">

                                            <label>Kích thước tối đa:</label>

                                            <input type="text" class="form-control "
                                                name="data[options][watermark][max]" placeholder="600"
                                                value="<?=(isset($options['watermark']['max']) && $options['watermark']['max'] != '') ? $options['watermark']['max'] : ''?>">

                                        </div>

                                        <div class="item col-12 mb15">

                                            <label>Kích thước tối thiểu:</label>

                                            <input type="text" class="form-control "
                                                name="data[options][watermark][min]" placeholder="100"
                                                value="<?=(isset($options['watermark']['min']) && $options['watermark']['min'] != '') ? $options['watermark']['min'] : ''?>">

                                        </div>

                                    </div>

                                </div>

                                <?php } ?>



                            </div>



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

                </div>

            </div>

            <input type="hidden" name="type" value="<?=$_GET['type']?>">

            <div class="formRow fixedBottom">

                <div class="formRight">

                    <div class="box-admin" style="display:flex; align-items:center;justify-content:flex-end">

                        <div class="box-action">

                            <button type="submit" class="btn btn-sm bg-gradient-primary text-white submit-check">

                                <i class="far fa-save mr-2"></i>Lưu

                            </button>

                            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i
                                    class="fas fa-redo mr-2"></i>Làm

                                lại</button>

                        </div>

                    </div>

                </div>

                <div class="clear"></div>

            </div>

    </form>

</div>

<script type="text/javascript">
$(document).ready(function() {

    window.asd = $('.multiselect-info').SumoSelect({

        placeholder: 'Chọn vị trí hiển thị',

        csvDispCount: 3,

        captionFormat: '{0} Selected',

        floatWidth: 500,

        forceCustomRendering: false,

        triggerChangeCombined: true,

        selectAll: true,

        search: true,

        searchText: 'Search...',

        noMatch: 'No matches for "{0}"',

        prefix: '',

        locale: ['OK', 'Cancel', 'Select All'],

        up: 'false',

        showTitle: 'true',

    });

});
</script>