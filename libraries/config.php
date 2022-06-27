<?php

	if(!defined('_lib')) die("Errors");



	date_default_timezone_set('Asia/Ho_Chi_Minh');



	$config=array(



		'arrayDomainSSL' => array(),



		'website'=>array(



			'server-name'=>$_SERVER['SERVER_NAME'],



			'url'=>':8099/LONGPHUNG/',



			'debug-css' => false,



			'debug-js'=>true,



			'debug-responsive'=>true,



			'error-reporting'=>false,



			'robots'=>'index,follow',



			'upload' => array(

				

				'max-width' => 1600,



				'max-height' => 1600

			),

		),

		'database'=>array(



			'type' => 'mysql',



			'host' => 'localhost',



			'username' => 'root',



			'password' => '',



			'url'=>'/upload/',



			'dbname'=> 'longphung',



			'port' => 3306,



			'prefix' => 'table_',



			'charset' => 'utf8'

			

		),

		'dmindex'=>array(
			0 => "Danh mục Thiết bị vệ sinh",
			1 => "Danh mục Gạch kiến trúc"
		),

		'login-lock'=>array(

		

			'attempt'=>5,



			'delay'=>15

		),

		'mail'=>array(



			'ip'=>'',



			'email'=>'',



			'password'=>'',



			'smtp' => true,



			'secure' => 'ssl',



			'port' => 465,

			

			'gmail' => false



		),

		'author'=>array(



			'name'=>'Nguyễn Hoàng Nam',



			'email'=>'kythuat.iweb@gmail.com',



			'create'=>date('d/m/Y H:i:s')



		),

		'seo-debug'=>array(

			'index'=>'Trang chủ',

			'products/product'=>'Trang sản phẩm',

			'products/product_list'=>'Sản phẩm cấp 1',

			'products/product_cat'=>'Sản phẩm cấp 2',

			'products/product_item'=>'Sản phẩm cấp 3',

			'products/product_detail'=>'Chi tiết sản phẩm',

			'news/news'=>'Tin tức, Dịch vụ, Tuyển dụng...',

			'shares/share'=>'Góc chia sẻ',

			'news/news_detail'=>'Trang chi tiết bài viết',

			'pages/baiviet'=>'Trang tĩnh ( vd: giới thiệu...)'
		),

		'seo-lang'=>array(



			'vi'=>'Vi',


		),

		'cart-advance'=>true,



		'lang'=>array('vi'=>'Vi'),



		"faceid"=>"582534979152027",



		'salt'=>'^29#_%z/@$',



		'secret'=>'@287Rzx_^!*95&'

	);

	// firewall



	$fw_conf['firewall']=false; //Bat tat firewall



	$fw_conf['max_lockcount']=10;//So lan toi da phat hien dau hieu DDOS va khoa IP do vinh vien 



	$fw_conf['max_connect']=15;//So ket noi toi da dc gioi han boi $fw_conf['time_limit']



	$fw_conf['time_limit']=3;//Thoi gian dc thuc hien toi da $fw_conf['max_connect'] ket noi



	$fw_conf['time_wait']=5;//Thoi gian cho de dc mo khoa khi IP bi khoa tam thoi



	$fw_conf['email_admin']='kythuat.iweb@gmail.com';//Email lien lac voi Admin



	$fw_conf['htaccess']=".htaccess";//Duong dan toi file htaccess tren server



	$fw_conf['ip_allow']='127.0.0.1';



	$fw_conf['ip_deny']='';

	

	/* Error reporting */

	error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);



	/* Cấu hình base */

	require_once _lib.'checkSSL.php';



	$check_ssl = new checkSSL();



	$http = $check_ssl->getProtocol();



	$config_url = $config['website']['server-name'].$config['website']['url'];



	$https_config = $http.$config_url;



	// cấu hình upload

	require_once _lib."constant.php";

?>