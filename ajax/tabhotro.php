<?php 

	

	require_once 'ajaxConfig.php';



	require_once _lib.'paginations.php';



	$field_load = "id,noidung_$lang as noidung,ngaytao,luotxem";


	$perPage = new paginations();

	$perPage->perpage = 6;

	$rowcount = (int)htmlspecialchars($_GET['rowcount']);

	$cateid = (int)htmlspecialchars($_GET['cateid']);

	$eShow = htmlspecialchars($_GET['eShow']);



	if(!empty($_GET['cateid'])){

		$where = " and id={$cateid} and type='ho-tro'";

	}



	$sql = "SELECT $field_load from #_baiviet where id<>0 $where and hienthi=1 order by stt asc, id desc";



	if(!empty($_GET['cateid'])){

		$paginationlink = "ajax/ajax_paging.php?cateid=".$cateid."&p=";

	}else{

		$paginationlink = "ajax/ajax_paging.php?p=";

	}
	
	$page = 1;

	if(!empty($_GET["p"])) { $page = (int)$_GET["p"]; }



	$start = ($page-1) * $perPage->perpage;

	if($start < 0) $start = 0;



	$query =  $sql . " limit " . $start . "," . $perPage->perpage; 



	$items = $db->rawQueryOne($query);


	$result = $db->rawQuery($sql);

	

	if($rowcount==0) {

		$rowcount = count($result);

	}

	

	$perpageresult = $perPage->getAllPageLinks($rowcount, $paginationlink,$eShow);	
    
	

	$output = '';

	if(count($result)==0){

		$output .= '<div class="item col-12 t-center">Nội dung đang được cập nhật...</div>';

	}else{

      $output .='<div class="pucblisher d-flex mt40">

                    <p class="mr30"><i class="fa fa-calendar mr5"></i>'.date('d/m/Y',$items['ngaytao']).'</p>

                    <p class="mr30"><i class="fa fa-user mr5"></i>Administrator</p>

                    <p><i class="fa fa-eye mr5"></i>'.$items["luotxem"].'</p>

                    </div>

                    <div class="content ul-list-detail" >

                        '.htmlspecialchars_decode($items['noidung']).'

                    </div>';

	}

	



	// if(!empty($perpageresult)) {

	// 	$output .= '<div class="col-12 item mt20 d-flex justify-content-center">
	// 					'.$perpageresult.'
	// 				</div>';

	// }

	echo $output;
?>