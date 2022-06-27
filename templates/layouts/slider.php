<?php

    $slider=$db->rawQuery("select ten_$lang,photo_$lang photo,link,mota_$lang as mota from #_photo where hienthi=1 and type=? order by stt asc,id desc",array('slider'));

?>

<?php if($row_setting["slider_web"]==1){ ?>

<section class="slider-videoupload p-relative">

     <div class="full-slider__video-overflow" id="video__slider">

        <video width="100%" height="500" playsinline class="video-slider__index" autoplay muted loop>

            <source src="<?=_upload_hinhanh_l.$row_setting["photo"]?>" type="video/mp4">
            
        </video>

    </div>

</section>

<?php }else{ ?>

<section id="slider-top" class="p-relative clearfix">

    <div class="maxSlider">

        <div class="box-slider">

            <div class="slider-left1">

            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1440px;height:638px;overflow:hidden;visibility:hidden;">    

                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1440px;height:638px;overflow:hidden;">
                        
                        <?php foreach ($slider as $k => $v){ $stt++; ?>

                            <div data-idle="3000">

                                <a href="<?=$v['link']?>" title="<?=$v['ten']?>"><img width="1440" height="638" style="width: 100%;aspect-ratio: 1440 / 638;object-fit: cover;height: auto;" data-u="image" src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten_'.$lang]?>" <?=$func->errorImg()?>/></a>

                            </div>

                        <?php }?>

                    </div>

                    <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:14px;height:14px;">
                            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="b" cx="8000" cy="8000" r="5000"></circle>
                            </svg>
                        </div>
                    </div>

                    <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                        </svg>
                    </div>
            </div>

        </div>

    </div>

</section>

<script>
    $(function(){
        jssor_1_slider_init();
    });
</script>

<?php }?>


