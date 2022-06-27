<?php 
	require_once 'ajaxConfig.php';
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$content = $db->rawQueryOne("select iframe_map from #_baiviet where id=?",array($id));
	}else{
		$content = $db->rawQueryOne("select iframe_map from #_setting",array($id));
	}
	
?>
<div id="modal-map" class="modalmap">
	<div class="modalmap-container" id="modalmap-container">
		<div class="inside">
			<span class="close-modal">&times;</span>
			<?= htmlspecialchars_decode($content['iframe_map'])?>
		</div>
	</div>
</div>