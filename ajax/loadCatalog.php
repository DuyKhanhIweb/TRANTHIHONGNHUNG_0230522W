<?php 

	require_once 'ajaxConfig.php';

	@$data=isset($_POST['p']) ? $_POST['p'] : 'ssss';
	@$id=(int)$data['id'];
	@$type= htmlspecialchars($data['type']);
	list($table,$key)=explode('-',$data['view']);
	$title=$table=='cat' ? 'Phân loại sản phẩm' : 'Hãng';
	$result=$db->rawQuery("select id, ten_$lang ten from #_baiviet_{$table} where hienthi=1 and id_{$key}=? and type=? order by stt asc, id desc",array($id,$type));
	echo "<option value='0'>{$title}</option>";
	foreach($result as $k => $v){
		
		echo "<option value=".$v['id'].">".$v['ten']."</option>";

	}

?>