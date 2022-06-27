<?php

  require_once 'ajaxConfig.php';

  include_once "class_paging_ajax.php";

  if(isset($_REQUEST["page"]))

    {
      $idcat = "";
      
      $cond = [];

      $idlist = "";
      if($_REQUEST["id_list"]>0){
        $idlist = " and id_list= ?";
        array_push($cond,$_REQUEST["id_list"]);
      }
      if($_REQUEST["id_cat"]>0){
        $idcat = " and id_cat = ? ";
        array_push($cond,$_REQUEST["id_cat"]);
      }

      $type = $_REQUEST['type'];

      array_push($cond,$type);

      $str_van = "select *,tenkhongdau_$lang as tenkhongdau from #_baiviet where hienthi=1 ".$idlist." ".$idcat." and noibat=1 and type= ? order by stt asc,id desc";
  
      $paging = new paging_ajax();

      $paging->class_pagination = "pagination";

      $paging->class_active = "active";

      $paging->class_inactive = "inactive";

      $paging->class_go_button = "go_button";

      $paging->class_text_total = "total";

      $paging->class_txt_goto = "txt_go_button";

      $paging->cond = $cond;

        $paging->per_page = $_REQUEST['per_page'];   

        $sotrang=$_REQUEST['per_page'];

        $paging->page = $_REQUEST["page"];

      $paging->text_sql = $str_van;

        $result_pag_data = $paging->GetResult();

    }

    

?>
<div class="row">

<?php
    if(count($result_pag_data)>0){

      foreach ($result_pag_data as $key => $value){

        $alias_call = $func->getAlias($value['id_list'],'baiviet_list',$value['type']);

        $alias_l = $func->checkListAlias($alias_call);

        $photos = $db->rawQueryOne("select id,photo from #_baiviet_photo where type=? and id_baiviet=? order by stt asc, id desc",array($value["type"],$value["id"]));
  ?>
  
    <div class="col l-3 m-4 c-6 mb20 mb-m-8 mb-t-16 d-flex flex-column">

      <div class="wrap-productshot__boxbc wrap-productshot__boxbc--products d-flex  flex-column p-relative">

          <div class="wrap-productshot__boxbc-img wrap-productshot__boxbc-img--index p-relative">

              <a href="<?=$value["type"]?>/<?=$alias_l.$value["tenkhongdau"]?>" title="<?=$value["ten_$lang"]?>" rel="dofollow" class="d-block hover-left">

                  <img loading=lazy src="<?=_upload_baiviet_l.$value["photo"]?>" alt="<?=$value["ten_$lang"]?>" <?=$func->errorImg()?>>

                  <?php if($photos){ ?>

                      <div class="sup-img">

                          <img loading="lazy" src="<?=_upload_baiviet_l.$photos["photo"]?>" alt="<?=$value["ten_$lang"]?>" <?=$func->errorImg()?>>

                      </div>

                  <?php }?>

              </a>

              <a class="fa-transition fa-transition-view fa-transition--modifier" rel="dofollow" href="<?=$value["type"]?>/<?=$alias_l.$value["tenkhongdau"]?>" title="<?=$value["ten_$lang"]?>">
                  <i class="fa-light fa-eye"></i>
              </a>

              <a class="fa-transition fa-transition-addcart fa-transition--modifier fa-transition--changewidth js-addcart" data-id="<?=$value["id"]?>" data-qty="1">
                  <i class="fa-light fa-cart-shopping"></i><span>Thêm vào giỏ</span>
              </a>

          </div>

          <div class="wrap-productshot__boxbc-content wrap-productshot__boxbc-content--modifiers d-flex flex-column">

              <div class="wrap-productshot__boxbc-content-aside-title">

                <h5 class="line-2 wrap-productshot__boxbc-content-titles">

                    <a href="<?=$value["type"]?>/<?=$alias_l.$value["tenkhongdau"]?>" title="<?=$value["ten_$lang"]?>" rel="dofollow"><?=$value["ten_$lang"]?></a>

                </h5>

              </div>

              <div class="wrap-productshot__boxbc-content-asideprice wrap-productshot__boxbc-content-asideprice--modifiers d-flex flex-wrap">

                <span class="wrap-productshot__boxbc-content-price wrap-productshot__boxbc-content-price--modifiers col-6 t-left  mt10"><?=($value["giaban"]!=0) ? $func->changeMoney($value["giaban"],$lang):'Liên hệ';?></span>

                <span class="wrap-productshot__boxbc-content-priceold wrap-productshot__boxbc-content-priceold--modifiers col-6 t-right"><i class="fa-light fa-cart-shopping"></i> Mua ngay</span>

              </div>

          </div>
          
      </div>

    </div>

  <?php } ?>
  <?php if($paging->getRow()>$_REQUEST['per_page']){?>
  <div class="col l-12 c-12 m-12">
      <?= $paging->Load()?>
  </div>
  <?php }}else{?>
    <div class="col l-12 c-12 m-12 t-center">
        <p style="font-family:var(--monts-rg),Arial, Helvetica, sans-serif;">Nội dung đang được cập nhật...</p>
    </div>
  <?php }?>
</div>


