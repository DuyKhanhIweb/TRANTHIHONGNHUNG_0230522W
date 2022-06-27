<?php

  require_once 'ajaxConfig.php';

  include_once "class_paging_ajax.php";

  if(isset($_REQUEST["page"]))

    {
          
      $cond = [];
      $idlist = "";
      if($_REQUEST["id_list"]>0){
        $idlist = " and id_list= ?";
        array_push($cond,$_REQUEST["id_list"]);
      }
      $type = $_REQUEST['type'];
      array_push($cond,$type);

      $str_van = "select * from #_baiviet_cat where hienthi=1 ".$idlist." ".$idcat." and type= ? order by stt asc,id desc";

      $colclass = 'col-4 w-50-m';
  
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
<div class="d-flex flex-wrap row10">
    <?php

    foreach ($result_pag_data as $key => $value){

  ?>

    <div class="<?= $colclass?> item10 mb20">

        <div class="pro mb10" element-type="cat">
            <a href="<?= $value['tenkhongdau_'.$lang]?>" title="<?= $value['ten_'.$lang]?>">
                <div class="thumb p-relative">

                    <figure>
                        <img src="<?= _thumbs?>/275x244x1/<?= _upload_baiviet_l.$value['photo']?>"
                            alt="<?= $value['ten_'.$lang]?>" <?= $func->errorImg()?> />
                    </figure>

                </div>
                <div class="content">

                    <p class="name line-2"><?= $value['ten_'.$lang]?></p>

                </div>
            </a>
        </div>

    </div>

    <?php } ?>
    <?php if($paging->getRow()>$_REQUEST['per_page']){?>
    <div class="col-12 item10">
        <?= $paging->Load()?>
    </div>
    <?php }?>
</div>