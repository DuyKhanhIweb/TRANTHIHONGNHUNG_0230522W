<?php	if(!defined('_source')) die("Error");
switch($act){
	
	#===================================================
	case "man":
		get_mans();
		$template = "comment/man/items";
		break;
	case "add":		
		$template = "comment/man/item_add";
		break;
	case "edit":		
		get_man();
		$template = "comment/man/item_add";
		break;
	case "save":
		save_man();
		break;
		
	case "delete":
		delete_man();
		break;	

	default:
		$template = "index";
}
$title_main = "Hỏi đáp";
			

#====================================

function get_mans(){
	global $d, $items, $paging,$page;
	
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	$where = " #_comment ";

	$where .= " where id!=0 ";
	
	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" and ten LIKE '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	if($_REQUEST['type']!='')
	{
		$type=addslashes($_REQUEST['type']);
		$where.=" and type = '$type'";
		$link_add .= "&type=".$_GET['type'];
	}
	if($_REQUEST['id_product']!='')
	{
		$id_product=addslashes($_REQUEST['id_product']);
		$where.=" and id_product = '$id_product'";
		$link_add .= "&id_product=".$_GET['id_product'];
	}
	$where .=" order by id desc";

	$sql = "select * from $where $limit";
	$d->query($sql);
	$items = $d->result_array();

	$url = "index.php?com=comment&act=man&type=".$_GET['type']."".$link_add;
	$paging = pagination($where,$per_page,$page,$url);		
	
}

function get_man(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=comment&act=man&type=".$_GET['type']);	
	$sql = "select * from #_comment where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=comment&act=man&type=".$_GET['type']);
	$item = $d->fetch_array();	

	$sqlUPDATE_ORDER = "UPDATE table_comment SET view =1 WHERE  id = ".$id."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
}

function save_man(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=comment&act=man&type=".$_GET['type']);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	if($id){
		$id =  themdau($_POST['id']);
		$data['cauhoi'] = $_POST['cauhoi'];
		$data['traloi'] = magic_quote($_POST['traloi']);
		$data['type'] = $_REQUEST['type'];
		$data['stt'] = $_POST['stt'];
		$data['ngaytraloi'] = time();
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('comment');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=comment&act=man&page=".$_REQUEST['page']."&type=".$_GET['type']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=comment&act=man&type=".$_GET['type']);
	}else{
		
		$data['cauhoi'] = $_POST['cauhoi'];
		$data['traloi'] = magic_quote($_POST['traloi']);	
		$data['stt'] = $_POST['stt'];
		$data['type'] = $_REQUEST['type'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('comment');
		if($d->insert($data))
		{			
			redirect("index.php?com=comment&act=man&type=".$_GET['type']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=comment&act=man&type=".$_GET['type']);
	}
}

function delete_man(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id from #_comment where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_comment where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=comment&act=man&page=".$_REQUEST['page']."&type=".$_GET['type']);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=comment&act=man&page=".$_REQUEST['page']."&type=".$_GET['type']);
	} elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id from #_comment where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				$sql = "delete from #_comment where id='".$id."'";
				$d->query($sql);
			}
		}
		redirect("index.php?com=comment&act=man&page=".$_REQUEST['page']."&type=".$_GET['type']);
	} else {
		transfer("Không nhận được dữ liệu", "index.php?com=comment&act=man&page=".$_REQUEST['page']."&type=".$_GET['type']);
	}
}


?>