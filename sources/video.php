<?php  if(!defined('_source')) die("Error");

	

	@$id =  htmlspecialchars($_GET['id']);

	if($id!=''){

		$row_detail = $db->rawQueryOne("select * from #_video where hienthi=1 and type='".$type_com."' and tenkhongdau='".$id."'");

		$title_cat = $row_detail["ten_$lang"];

		$title_bar .= $row_detail["ten_$lang"];

		$title = $row_detail["ten_$lang"];

		$tintuc_khac = $db->rawQuery("select * from #_video where hienthi=1 and type='".$type_com."' and id<>'".$id."' limit 0,6");

	}else{

		$per_page = 6; // Set how many records do you want to display per page.

		$startpoint = ($page * $per_page) - $per_page;

		$limit = ' limit '.$startpoint.','.$per_page;



		$where = " #_video where type='video' and hienthi>0 order by stt,id desc";

		$sql="select * from $where $limit";

		$videos=$db->rawQuery($sql);

		$url = $func->getCurrentPageURL();

		// $paging = $func->pagination($where,$per_page,$page,$url);



		$title_bar .= $title_cat;

		if(count($videos)==0) $title_cat="Nội Dung Đang Cập Nhật...";

	}

?>