<?php 

	

	require_once 'ajaxConfig.php';



	require_once _lib.'paginations.php';



	$field_load = "id,type,ten_$lang as ten,links,photo";


	$perPage = new paginations();

	$perPage->perpage = 12;

	$rowcount = (int)htmlspecialchars($_GET['rowcount']);

	$cateid = (int)htmlspecialchars($_GET['cateid']);

	$eShow = htmlspecialchars($_GET['eShow']);

    $type = htmlspecialchars($_GET['type']);

	if(!empty($_GET['cateid'])){

		$where = "and id={$cateid} and type='".$type."'";

	}elseif($_GET['cateid']==0){

        $where = "and hienthi=1 and type={$type}";
    }




	$sql = "SELECT $field_load from #_video where id<>0 $where and hienthi=1 order by stt asc, id desc";

	if(!empty($_GET['cateid'])){

		$paginationlink = "ajax/ajax_paging.php?cateid=".$cateid."&p=";

	}else{

		$paginationlink = "ajax/ajax_paging.php?p=";

	}
	
	$page = 1;

	if(!empty($_GET["p"])) { $page = (int)$_GET["p"]; }



	$start = ($page-1) * $perPage->perpage;

	if($start < 0) $start = 0;



	$query =  $sql . " limit 0,1"; 



	$items = $db->rawQueryOne($query);

	


	$result = $db->rawQueryOne($sql);

	

	if($rowcount==0) {

		$rowcount = count($result);

	}

	

	$perpageresult = $perPage->getAllPageLinks($rowcount, $paginationlink,$eShow);	
    
	

	$output = '';

    $titles = 'Nội dung đang được cập nhật....';

	if(count($result)==0){

		$output .= '<div class="item col-12 t-center">'.$titles.'</div>';

	}else{
		$output .= '<a data-fancybox="video" href="'.$items["links"].'"

                        title="'.$items['ten'].'" class="d-block hover-left p-relative">

                        <img class="coverimg" width="387" height="274" ts="all 0.5s" src="'._upload_hinhanh_l.$items["photo"].'" alt="" ts="all 0.5s">

                        <span class="hover-playvideo">

                            <i class="fa-solid fa-play"></i>

                        </span>

                    </a>';

    }

	echo $output;
?>