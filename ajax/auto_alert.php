<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../libraries/');
	
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."functions_main.php";
	include_once _lib."file_requick.php";
	$d = new database($config['database']);
		
	$load_per=$d->get_fetch_array('select * from table_baiviet where hienthi<>0 and type="tin-tuc" order by rand() limit 0,1');
?>
<script>
    $(document).ready(function() {
        Lobibox.notify('success', {
            delay: 10000,
            position: 'bottom left',
            sound: false,
            icon: true,
            img:'images/no-image.png',
            size: 'mini',
            msg: '<span><?=$load_per['ten_'.$lang]?></span> <span> đăng ký kênh thành công</span>'
        });
    });
</script>