<?php 

	

	require_once 'ajaxConfig.php';



	require_once _lib.'paginations.php';

	$field_load = "id,mota_$lang as mota,photo";

	$perPage = new paginations();

	$perPage->perpage = 6;

	$rowcount = (int)htmlspecialchars($_GET['rowcount']);

	$cateid = (int)htmlspecialchars($_GET['cateid']);

	$eShow = htmlspecialchars($_GET['eShow']);

	$eimgShow = htmlspecialchars_decode($_GET["eimgShow"]);



	if(!empty($_GET['cateid'])){

		$where = " and id={$cateid} and type='he-thong-cua-hang'";

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
    
	

	$html['output'] = '';

	$html['img'] = '';

	if(count($result)==0){

		$html['output'] .= '<div class="item col-12 t-center">Nội dung đang được cập nhật...</div>';

	}else{

		$html['img'] .='<img src="'._upload_baiviet_l.$items["photo"].'" alt="Ảnh hệ thống cửa hàng">';

		$html['output'] .=''.htmlspecialchars_decode($items["mota"]).'';


		$html['output'] .='<div class="mt10">
        	<button class="button-loadmap js-map" data-id="'.$items["id"].'">Xem trên bản đồ</button>
      	</div>';

	}

	



	// if(!empty($perpageresult)) {

	// 	$output .= '<div class="col-12 item mt20 d-flex justify-content-center">
	// 					'.$perpageresult.'
	// 				</div>';

	// }

	echo json_encode($html);
?>