<?php  if(!defined('_source')) die("Error");


    $about=$db->rawQueryOne("select ten_$lang as ten, mota_$lang as mota,photo from #_info where type=? limit 0,1",array('gioi-thieu'));
   
    /* SEO */
    $seoDB = $seo->getSeoDB(0,'setting','capnhat','');

    $seopageIndex = $db->rawQueryOne("select mota_$lang from #_seopage where type = ? limit 0,1",array('dich-vu'));

    if(!empty($seoDB['title_'.$seolang])) $seo->setSeo('h1',$seoDB['title_'.$seolang]);

    if(!empty($seoDB['title_'.$seolang])) $seo->setSeo('title',$seoDB['title_'.$seolang]);

    if(!empty($seoDB['keywords_'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords_'.$seolang]);

    if(!empty($seoDB['description_'.$seolang])) $seo->setSeo('description',$seoDB['description_'.$seolang]);

    $seo->setSeo('url',$func->getCurrentPageURL());

    $seo->setSeo('type',$obj_type);

    $seo->setSeo('dichvu',$seopageIndex['mota_'.$lang]);

    $img_json_bar = (isset($seoPage['options']) && $seoPage['options'] != '') ? json_decode($seoPage['options'],true) : null;

    if($img_json_bar == null || ($img_json_bar['p'] != $seoPage['photo_'.$lang]))

    {

        $img_json_bar = $func->getImgSize($seoPage['photo_'.$lang],_upload_hinhanh_l.$seoPage['photo_'.$lang]);

        $seo->updateSeoDB(json_encode($img_json_bar),'photo',$seoPage['id']);

    }

    if(count($img_json_bar) > 0)

    {

        $seo->setSeo('photo',$https_config._upload_hinhanh_l.$seoPage['photo_'.$lang]);

        $seo->setSeo('photo:width',$img_json_bar['w']);

        $seo->setSeo('photo:height',$img_json_bar['h']);

        $seo->setSeo('photo:type',$img_json_bar['m']);

    }



?>