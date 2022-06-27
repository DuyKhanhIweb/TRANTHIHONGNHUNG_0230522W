<?php 

	

	require_once 'ajaxConfig.php';



	require_once _lib.'paginations.php';



	$field_load = "id_list,ten_$lang,tenkhongdau_$lang as tenkhongdau,masp, photo,giaban,giacu,type";

	

	$perPage = new paginations();

	$perPage->perpage = 12;

	$rowcount = (int)htmlspecialchars($_GET['rowcount']);

	$cateid = (int)htmlspecialchars($_GET['cateid']);

	$eShow = htmlspecialchars($_GET['eShow']);



	if(!empty($_GET['cateid'])){

		$where = " and hienthi=1 and khuyenmai=1 and find_in_set('".$cateid."',id_thuonghieu) and type='san-pham' ";

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



	$items = $db->rawQuery($query);

	


	$result = $db->rawQuery($sql);

	

	if($rowcount==0) {

		$rowcount = count($result);

	}

	

	$perpageresult = $perPage->getAllPageLinks($rowcount, $paginationlink,$eShow);	



	$output = '';

	if(count($result)==0){

		$output .= '<div class="item col-12 t-center">Dữ liệu không được tìm thấy</div>';

	}else{

		$output .= $func->getTemplateProduct($items,'item10 w-50-m col-3 mb20','/430x420x1/');

	}

	



	if(!empty($perpageresult)) {

		$output .= '<div class="col-12 item mt20 d-flex justify-content-center">
						<a href="khuyen-mai?page=1&idl='.$cateid.'" class="viewkm" title="Khuyến mãi">
							Xem thêm
						</a>
					</div>';

	}

	echo $output;
?>