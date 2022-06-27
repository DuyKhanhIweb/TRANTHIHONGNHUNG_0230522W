<?php

    class functions{



        private $_d;



        private $_config;



        private $_login="logging";



        private $_loginadmin='login';



        private $_table="baiviet";



        public function __construct($db){



            $this->_d = $db;



        }
        public function money($dola,$currency=''){



            return number_format($dola,0,',','.').$currency;



        }

        public function checkListAlias($alias){

            
            if($alias == 'catalogy'){

                $result = '';
                
            }else{

                $result = $alias.'/';

            }

            return $result;
        }

        public function changeMoney($money,$lang){



            global $row_setting;



            switch($lang){



                case 'en':



                    return round($money/$row_setting['dola'],1).' $';



                    break;



                case 'jp':



                    return round(($money*100)/$row_setting['yen'],1).' ¥';



                    break;



                default:



                    return $this->money($money,' đ');



                    break;

                    

            }	

        }

        public function AllData($field,$type,$where=null,$limit=null,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQuery("select $field ten_$lang as ten,mota_$lang as mota,tenkhongdau_$lang as tenkhongdau,giaban,photo,type from #_baiviet where hienthi=1 and type=? {$w} order by stt asc {$limit}",array($type));    
            
            $sql = "select $field ten_$lang as ten,mota_$lang as mota,tenkhongdau_$lang as tenkhongdau,giaban,photo,type from #_baiviet where hienthi=1 and type=? {$w} order by stt asc {$limit}";

            if($checkData=='object'){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{
                $obj = $arr;
            }
            

            return $obj;
        }
         public function OneDataDes($type,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQueryOne("select mota_$lang as mota from #_company where hienthi=1 and type=? limit 0,1",array($type));    

            if($checkData=='object'){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{
                $obj = $arr;
            }
            

            return $obj;
        }
        public function OneData($field,$type,$where=null,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQueryOne("select $field ten_$lang as ten,mota_$lang as mota,tenkhongdau_$lang as tenkhongdau,giaban,photo,type from #_baiviet where hienthi=1 and type=? {$w} order by stt asc limit 0,1",array($type));

            if($checkData=='object'){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{

                $obj = $arr;
                
            }
            

            return $obj;
        }
        public function AllDataList($field=null,$type,$where=null,$limit=null,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQuery("select $field id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,type from #_baiviet_list where hienthi=1 and type=? {$w} order by stt asc {$limit}",array($type));    
           
            if($checkData=="object"){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{

                $obj = $arr;

            }
            

            return $obj;
        }

        public function AllDataCat($field=null,$type,$where=null,$limit=null,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQuery("select $field id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau,type from #_baiviet_cat where hienthi=1 and type=? {$w} order by stt asc {$limit}",array($type));    
           
            if($checkData=="object"){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{

                $obj = $arr;

            }
            

            return $obj;
        }

        public function OneDataPhoto($field=null,$type,$limit=null,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQueryOne("select $field photo_$lang as photo from #_bannerqc where hienthi=1 and type=? {$limit}",array($type));    
           
            if($checkData=="object"){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{

                $obj = $arr;

            }
            

            return $obj;
        }

        public function AllDataPhoto($field=null,$type,$limit=null,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQuery("select $field photo_$lang as photo from #_photo where hienthi=1 and type=? order by stt asc {$limit}",array($type));
           

            if($checkData=="object"){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{

                $obj = $arr;

            }
            

            return $obj;
        }

        public function AllDataVideo($field=null,$type,$limit=null,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQuery("select $field id,type,ten_$lang as ten,links,photo,mota_$lang as mota from #_video where hienthi=1 and type=? order by stt asc,id asc {$limit}",array($type));
           

            if($checkData=="object"){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{

                $obj = $arr;

            }
            

            return $obj;
        }
        
        public function OneDataVideo($field=null,$type,$checkData){

            global $lang;

            $w = $where;

            $arr = $this->_d->rawQueryOne("select $field id,type,ten_$lang as ten,links,photo,mota_$lang as mota from #_video where hienthi=1 and type=? order by stt asc,id asc limit 0,1",array($type));
           

            if($checkData=="object"){

                $obj = json_decode(json_encode($arr), FALSE);

            }else{

                $obj = $arr;

            }
            

            return $obj;
        }

        public function is_connected(){

            global $config;

            $connected = @fsockopen($config['website'], 80); 

            if ($connected){

              $is_conn = true;

              fclose($connected);

            }else{

                $is_conn = false;

            }

            return $is_conn;

        }

        /* Check URL */
        public function checkURL($index=false)
        {
            global $https_config;

            $url = '';
            $urls = array('index','index.html','trang-chu','trang-chu.html');

            if(array_key_exists('REDIRECT_URL', $_SERVER))
            {
                $root = str_replace("/index.php", "", $_SERVER['PHP_SELF']);
                $url = str_replace($root."/", "", $_SERVER['REDIRECT_URL']);
            }
            else
            {
                $url = explode("/", $_SERVER['REQUEST_URI']);
                $url = $url[count($url)-1];
                if(strpos($url, "?"))
                {
                    $url = explode("?", $url);
                    $url = $url[0];
                }
            }
            if($index) array_push($urls,"index.php");
            else if(array_search('index.php', $urls)) $urls = array_diff($urls, ["index.php"]);
            if(in_array($url, $urls)) $this->redirect($https_config,301);
        }

        function checkNumb($field,$table,$type){
            $check=$this->_d->rawQueryOne("select $field from #_$table where type=? order by stt desc limit 1",array($type));

            return $check[$field]+1 ;
        }

        public function getFieldOne($field,$table,$id){

            $row=$this->_d->rawQueryOne("select $field from #_$table where id=?",array($id));

            return $row[$field];

        }

        public function getFieldId($id,$table){
            $this->_d->where("id", $id);
            $item = $this->_d->getOne($table);
            return $item;
        }

        public function getTable($table){

            $sql="select * from #_{$table} order by id desc";

            $row=$this->_d->rawQuery($sql);

            return $row;

        }

        public function getTablePlace($table){

            $sql="select * from #_{$table} order by ten asc";

            $row=$this->_d->rawQuery($sql);

            return $row;

        }

        public function getPhantramTieptheo($point){



            global $d;

    

            $row = $d->rawQueryOne("select * from #_coupon where price_start>=$point order by id asc limit 0,1");

        

            return $row;

        

        }

        public function getRatingComment($numb=5){

            $str = '';

            for($i=1;$i<=$numb;$i++){

                $str .= '<i class="fa-solid fa-star-sharp"></i>';

            }

            // for($i=1;$i<=(5-$numb);$i++){

            //     $str .= '<i class="fa fa-star-o"></i>';

            // }

            return $str;

        }

        public function getPriceSaleOff($giamoi,$giacu){

            if($giacu!=0){

                return $giacu - $giamoi;

            }else{

                return 0;

            }

        }

        public function createdImg($string){

            $explode = explode(' ',$string);

            if(count($explode)==1){

                $str = substr($explode[0], 0, 1);

            }elseif(count($explode)>=2){

                $str = substr($explode[0], 0, 1);

                $str .= substr($explode[1], 0, 1);

            }

        

            return $str;

        }

        function make_avatar($character)
        {
            $path = "../images/". time() . ".png";
            $image = imagecreate(200, 200);
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);
            imagecolorallocate($image, 230, 230, 230);  
            $textcolor = imagecolorallocate($image, $red, $green, $blue);
            imagettftext($image, 100, 0, 55, 150, $textcolor, '../font/arial.ttf', $character);
            imagepng($image, $path);
            imagedestroy($image);
            return $path;
        }

        public function getCommentPersion($n,$pid){

            $this->_d->reset();

            $sql = "select count(rating) as su from #_comment where pid='".$pid."' and type='comment' and hienthi=1";

            $row_sc = $this->_d->rawQueryOne($sql);

            $this->_d->reset();

            $sql = "select count(rating) as su from #_comment where pid='".$pid."' and type='comment' and hienthi=1 and rating=$n";

            $this->_d->query($sql);

            $row_su = $this->_d->rawQueryOne($sql);

            if($row_sc['su']!=0 && $row_su['su']!=0){

                return round($row_su['su']*100/$row_sc['su'],1);

            }else{

                return 0;

            }

            

        }

        public function getCommentUser($pid){

            $this->_d->reset();

            $sql = "select sum(rating) as su from #_comment where pid='".$pid."' and type='comment' and hienthi=1 group by pid";

            $row_su = $this->_d->rawQueryOne($sql);

        

            $this->_d->reset();

            $sql = "select count(id) as co from #_comment where pid='".$pid."' and type='comment' and hienthi=1";

            $row_co = $this->_d->rawQueryOne($sql);

            if($row_su['su']!=0 && $row_co['co']!=0){

                $arr['medium'] = round($row_su['su']/$row_co['co'],1);

                $arr['count'] = $row_co['co'];

            }else{

                $arr['medium'] = 0;

                $arr['count'] = 0;

            }

            

            return $arr;

        }

       
        public function autoNumb($table,$type){

            $checkNumb=$this->getFieldType($table,$type);

            return $checkNumb['stt']+1;

        }

        public function getTotalMoney($id=''){

            if($id!=''){

                $this->_d->reset();

                $sql="select gia,soluong from #_order_detail where id_order='".$id."'";

                $result=$this->_d->rawQuery($sql);

                $tongtien=0;

                for($i=0,$count=count($result);$i<$count;$i++) {

    

                $tongtien+=	$result[$i]['gia']*$result[$i]['soluong'];

    

                }

                return $tongtien;

            }else return 0;

        }

        public function isJson($value){



            json_decode(current($value));



            return (json_last_error() == JSON_ERROR_NONE);

            

        }

        public function dd($data=null){



			echo '<pre>';



			print_r($data);



		}

        public function getShare($row_detail=null,$path,$type_ob,$set_index=false,$field='photo'){



			global $https_config,$row_setting,$row_share,$lang;



			if($set_index==false){



                $photo = $https_config.$path.$row_detail[$field];



				$description = ($row_detail['description']!='') ? strip_tags($row_detail['description']):strip_tags($row_setting['description']);



				$title = ($row_detail['title']!='') ? strip_tags($row_detail["ten_$lang"]):strip_tags($row_setting['title']);



			}else{



				$row_detail = $row_setting;



				$photo = $https_config.$path.$row_share['photo_'.$lang];



				$description = strip_tags($row_detail['description']);



				$title = ($row_detail['title']=='') ? strip_tags($row_detail["ten_$lang"]):strip_tags($row_detail['title']);strip_tags($row_detail['title']);



			}



			$result = '<meta property="og:url" content="'.$this->getCurrentPageURL().'" />



						<meta property="og:site_name" content="'.$row_setting['website'].'" />



						<meta property="og:type" content="'.$type_ob.'" />



						<meta property="og:title" content="'.$title.'" />



						<meta property="og:description" content="'.$description.'" />



						<meta property="og:locale" content="vi" />



						<meta property="og:image:alt" content="'.$title.'" />



						<meta property="og:image" content="'.$photo.'" />



						<meta itemprop="name" content="'.$title.'">



						<meta itemprop="description" content="'.$description.'">



						<meta itemprop="image" content="'.$photo.'">



						<meta name="twitter:card" content="product">



						<meta name="twitter:site" content="'.$title.'">



						<meta name="twitter:title" content="'.$title.'">



						<meta name="twitter:description" content="'.$description.'">



						<meta name="twitter:creator" content="'.$title.'">



						<meta name="twitter:image" content="'.$photo.'">';



			return self::compress($result);



		}

        public function updateTable($table,$id){

            $this->_d->rawQuery("update #_{$table} SET luotxem=luotxem+1 where id={$id}");

        }

        public function updateOrder($table,$id){

            $this->_d->rawQuery("update #_{$table} SET view=1 where id={$id}");

        }

        // =============================viewed======================

        public function viewAdd($pid){

            if($pid<1) return;

            if(is_array($_SESSION['viewed'])){

                if($this->viewExists($pid)) return;

                $max=count($_SESSION['viewed']);

                $_SESSION['viewed'][$max]['viewid']=$pid;

            }

            else{

                $_SESSION['viewed']=array();

                $_SESSION['viewed'][0]['viewid']=$pid;

            }

        }

        public function viewAddFavor($pid){

            if($pid<1) return;

            if(is_array($_SESSION['favor'])){

                if($this->viewExistsFavor($pid)) return;

                $max=count($_SESSION['favor']);

                $_SESSION['favor'][$max]['favorid']=$pid;

            }

            else{

                $_SESSION['favor']=array();

                $_SESSION['favor'][0]['favorid']=$pid;

            }

        }
        public function viewExistsFavor(){

            $pid=intval($pid);

            $max=count($_SESSION['favor']);

            $flag=0;

            for($i=0;$i<$max;$i++){

                if($pid==$_SESSION['favor'][$i]['favorid']){

                    $flag=1;

                    break;

                }

            }

            return $flag;

        }
        public function getTotalFavor(){

            $max = count($_SESSION["favor"]);

            $sum = 0;

            for($i=0;$i<$max;$i++){

                $q = $_SESSION["favor"][$i]["favorid"];

                $sum += $q;

            }

            return $sum;

        }

        public function viewExists(){

            $pid=intval($pid);

            $max=count($_SESSION['viewed']);

            $flag=0;

            for($i=0;$i<$max;$i++){

                if($pid==$_SESSION['viewed'][$i]['viewid']){

                    $flag=1;

                    break;

                }

            }

            return $flag;

        }

        public function errorImg(){

            $error='this.src="assets/images/no-image.jpg"';

            return "onerror='".$error."'";

        }

        public function getRating($num=5){

            $str = '';

            for($i=0;$i<$numb;$i++){

                $str .= '<i class="fa fa-star"></i>';

            }

            return $str;

        }

        public function totalSales($total,$percent){

            return $total * (1-($percent / 100));

        }

        public function percentPrice($giacu,$giaban){

			$total = ($giacu - $giaban)/$giacu;

			$result = round($total*100).'%';

			return $result;	

		}



		public function percentTotal($val,$total){

			$percent = ($val/$total)*100;

			return round($percent,2);

		}

        public function getTransfer($msg,$page="index.html"){

            $showtext = $msg;

            $page_transfer = $page;

            include("./templates/transfer_tpl.php");

            exit();

        }

        public function checkUrlRedirect(){

            global $db,$config,$http;

            $url=$http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

            $check_url=$db->rawQueryOne("SELECT * from #_redirect where oldlink='$url' limit 1");

            $new_url=$check_url['newlink'];

            $type=$check_url['typelink'];

            if(!empty($check_url)){

               switch($type){

                    case 301: $text = 'Moved Permanently';
                        break;
                    case 302: $text = 'Moved Temporarily';
                        break;
                    case 303: $text = 'See Other';
                        break;
                    case 304: $text = 'Not Modified';
                        break;
                    case 305: $text = 'Use Proxy';
                        break;
                    case 400: $text = 'Bad Request';
                        break;
                    case 401: $text = 'Unauthorized';
                        break;
                    case 402: $text = 'Payment Required';
                        break;
                    case 403: $text = 'Forbidden';
                        break;
                    case 404: $text = 'Not Found';
                        break;
                    case 405: $text = 'Method Not Allowed';
                        break;
                    case 406: $text = 'Not Acceptable';
                        break;
                    case 407: $text = 'Proxy Authentication Required';
                        break;
                    case 408: $text = 'Request Time-out';
                        break;
                    case 409: $text = 'Conflict';
                        break;
                    case 410: $text = 'Gone';
                        break;
                    case 411: $text = 'Length Required';
                        break;
                    case 412: $text = 'Precondition Failed';
                        break;
                    case 413: $text = 'Request Entity Too Large';
                        break;
                    case 414: $text = 'Request-URI Too Large';
                        break;
                    case 415: $text = 'Unsupported Media Type';
                        break;
                    case 500: $text = 'Internal Server Error';
                        break;
                    case 501: $text = 'Not Implemented';
                        break;
                    case 502: $text = 'Bad Gateway';
                        break;
                    case 503: $text = 'Service Unavailable';
                        break;
                    case 504: $text = 'Gateway Time-out';
                        break;
                    case 505: $text = 'HTTP Version not supported';
                        break;
                    default:
                        exit('Unknown http status code "' . htmlentities($code) . '"');
                        break;

                }

                $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

                header($protocol . ' ' . $type . ' ' . $text);

                header("Location: $new_url");

                exit();
            }

        }

        public function getMoneyText( $number ){



			$hyphen = ' ';



			$conjunction = '  ';



			$separator = ' ';



			$negative = 'âm ';



			$decimal = ' phẩy ';



			$dictionary = array(



				0 => 'Không',



				1 => 'Một',



				2 => 'Hai',



				3 => 'Ba',



				4 => 'Bốn',



				5 => 'Năm',



				6 => 'Sáu',



				7 => 'Bảy',



				8 => 'Tám',



				9 => 'Chín',



				10 => 'Mười',



				11 => 'Mười một',



				12 => 'Mười hai',



				13 => 'Mười ba',



				14 => 'Mười bốn',



				15 => 'Mười năm',



				16 => 'Mười sáu',



				17 => 'Mười bảy',



				18 => 'Mười tám',



				19 => 'Mười chín',



				20 => 'Hai mươi',



				30 => 'Ba mươi',



				40 => 'Bốn mươi',



				50 => 'Năm mươi',



				60 => 'Sáu mươi',



				70 => 'Bảy mươi',



				80 => 'Tám mươi',



				90 => 'Chín mươi',



				100 => 'trăm',



				1000 => 'ngàn',



				1000000 => 'triệu',



				1000000000 => 'tỷ',



				1000000000000 => 'nghìn tỷ',



				1000000000000000 => 'ngàn triệu triệu',



				1000000000000000000 => 'tỷ tỷ'



			);



			if( !is_numeric( $number ) )



			{



				return false;



			}



			if( ($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX )



			{



				// overflow



				trigger_error( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );



				return false;



			}



			if( $number < 0 )



			{



				return $negative . $this->getMoneyText( abs( $number ) );



			}



			$string = $fraction = null;



			if( strpos( $number, '.' ) !== false )



			{



				list( $number, $fraction ) = explode( '.', $number );



			}



			switch (true)



			{



				case $number < 21:



					$string = $dictionary[$number];



					break;



				case $number < 100:



					$tens = ((int)($number / 10)) * 10;



					$units = $number % 10;



					$string = $dictionary[$tens];



					if( $units )



					{



						$string .= $hyphen . $dictionary[$units];



					}



					break;



				case $number < 1000:



					$hundreds = $number / 100;



					$remainder = $number % 100;



					$string = $dictionary[$hundreds] . ' ' . $dictionary[100];



					if( $remainder )



					{



						$string .= $conjunction . $this->getMoneyText( $remainder );



					}



					break;



				default:



					$baseUnit = pow( 1000, floor( log( $number, 1000 ) ) );



					$numBaseUnits = (int)($number / $baseUnit);



					$remainder = $number % $baseUnit;



					$string = $this->getMoneyText( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];



					if( $remainder )



					{



						$string .= $remainder < 100 ? $conjunction : $separator;



						$string .= $this->getMoneyText( $remainder );



					}



					break;



			}



			if( null !== $fraction && is_numeric( $fraction ) )



			{



				$string .= $decimal;



				$words = array( );



				foreach( str_split((string) $fraction) as $number )



				{



					$words[] = $dictionary[$number];



				}



				$string .= implode( ' ', $words );



			}



			return $string;



		}

        public function checkPermissions($com,$act,$type){

            $str=$com;

            if(!empty($act)){

                $str.='_'.$act;

            }

            if(!empty($type)){

                $str.='_'.$type;

            }

            if(!in_array($str,$_SESSION['permissions']))

                return true;

            else return false;

        }

        public function checkPerStatic($com,$act,$arr=[]){

            $str=$com;

            if(!empty($act)){

                $str.='_'.$act;

            }

            if($arr!=NULL){

                foreach($arr as $key => $value){

                    if(!in_array($str.'_'.$key,$_SESSION['permissions'])){

                        return true;

                    }

                }

            }else{

                return false;

            }

        }

        public function checkUserAdmin()

        {

            if($_SESSION[$this->_loginadmin]['username']=='kythuat' || $_SESSION[$this->_loginadmin]['username']=='admin' || $_SESSION[$this->_loginadmin]['username']=='i-web')

                return true;

            else

                return false;

        }

        public function checkaddslashes($str){       

		    if(strpos(str_replace("\'",""," $str"),"'")!=false)

		        return addslashes($str);

		    else

		        return $str;

        }

        public function checkColumna($tName,$tCol){

            $sql="SHOW COLUMNS FROM #_{$tName} LIKE '{$tCol}'";

            $result=$this->_d->rawQuery($sql);

            $exits=$result ? TRUE : FALSE;

            return $exits;



        }

        function magicQuote($str, $id_connect=true)

        {

            if (is_array($str))

            {

                foreach($str as $key => $val)

                {

                    $str[$key] = escape_str($val);

                }

                return $str;

            }

            if (is_numeric($str)) {

                return $str;

            }

            if(get_magic_quotes_gpc()){



                $str = stripslashes($str);



            }

            if (function_exists('mysqli_real_escape_string') AND is_resource($id_connect))

            {

                return $this->_d->sqli_real_escape_string($str);;

            }

            // elseif (function_exists('mysqli_escape_string'))

            // {

            // 	return mysqli_escape_string($str);

            // }

            else

            {

                return $this->checkaddslashes($str);

            }

        }

        static public function compress($buffer){



            $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);

            

            $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  '), '', $buffer);

            

            $buffer = str_replace('{ ', '{', $buffer);



            $buffer = str_replace(' }', '}', $buffer);



            $buffer = str_replace('; ', ';', $buffer);



            $buffer = str_replace(', ', ',', $buffer);



            $buffer = str_replace(' {', '{', $buffer);



            $buffer = str_replace('} ', '}', $buffer);



            $buffer = str_replace(': ', ':', $buffer);



            $buffer = str_replace(' ,', ',', $buffer);



            $buffer = str_replace(' ;', ';', $buffer);

            

            return $buffer;

    

        }

        

		public function messagePage($message=''){

			$str = '';

			if($message!=''){

	

				$result = json_decode(base64_decode($message),true);

				if(count($result)){

	

					$class = ($result['status']==200) ? 'success':'danger';

	

					$status = ($result['status']==200) ? 'Success!':'Fails!';

	

				$str .= '<div class="row">

	

					 <div class="col-lg-12">

	

						<div class="alert alert-'.$class.' alert-dismissible mb-0 fade show" role="alert">

	

							<strong>'.$status.'</strong> '.$result['message'].'

	

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">

	

								<span aria-hidden="true">×</span>

	

							</button>

	

						</div>

	

					</div>

	

				</div>';

	

				}

	

			}

			return $str;

	

		}

        public function sendMessage($title,$contentnd,$url){

            $heading = array("en" => $title);

            $content = array("en" => $contentnd);

            $fields = array(

                'app_id' => "40ee4881-06af-43db-b29a-e70a19b1a208",

                'included_segments' => array('Active Users'),

                'contents' => $content,

                'headings'=>$heading,

                'url'=>$url

            );

            

            $fields = json_encode($fields);

    

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',

                                           'Authorization: Basic NDgxOTkzZTMtMTc5NC00MWQ0LThlNGMtYzllZGZkNTEzMmRh'));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            curl_setopt($ch, CURLOPT_HEADER, FALSE);

            curl_setopt($ch, CURLOPT_POST, TRUE);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);

            curl_close($ch);

            return $response;

        }

        public function isGoogleSpeed(){



            if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false){

                

                return false;

            

            }

           

            return true;

        

        }
        function sendMailIndexAjax($author,$title,$body,$emailAddress=null,$emailCC=null,$emailBCC=null){
            global $config;
            include_once "../libraries/Mailer/class.phpmailer.php";
            $mail = new PHPMailer();
            $mail->IsSMTP();
            if($config['mail']['gmail']==true){
                $mail->SMTPSecure = $config['mail']['secure'];
                $mail->Port   = $config['mail']['port'];
            }
            $mail->SMTPAuth   = true;
            // $mail->SMTPDebug   = true;
            $mail->Host       = $config['mail']['ip'];
            $mail->Username   = $config['mail']['email'];
            $mail->Password   = $config['mail']['password'];
            $mail->SetFrom($config['mail']['email'],$author);
            if(!empty($emailAddress)){
                foreach ($emailAddress as $k => $v) {
                    $mail->AddAddress($v,$author);
                }
            }
            if(!empty($emailCC)){
                foreach ($emailCC as $k => $v) {
                    $mail->AddCC($v,$author);
                }
            }
            if(!empty($emailBCC)){
                foreach ($emailBCC as $k => $v) {
                    $mail->AddBCC($v,$author);
                }
            }
            $mail->Subject    = $title;
            $mail->IsHTML(true);
            $mail->CharSet = "utf-8";
            $mail->Body = $body;
            if($mail->Send()){
                return true;
            }else{
                return false;
            }
        }
        
        function sendMailIndex($author,$title,$body,$emailAddress=null,$emailCC=null,$emailBCC=null){



			global $config;



			include_once "Mailer/class.phpmailer.php";



			$mail = new PHPMailer();



			$mail->IsSMTP();



			if($config['mail']['gmail']==true){



				$mail->SMTPSecure = $config['mail']['secure'];



				$mail->Port   = $config['mail']['port'];



            }

            //This should be the same as the domain of your From address

			$mail->DKIM_domain = $config['website'];

            //See the DKIM_gen_keys.phps script for making a key pair -

            //here we assume you've already done that.

            //Path to your private key:

            $mail->DKIM_private = $config['link-dkim'];

                //Set this to your own selector

            $mail->DKIM_selector = 'x._domainkey';

                //Put your private key's passphrase in here if it has one

            $mail->DKIM_passphrase = '';					

            //The identity you're signing as - usually your From address

            $mail->DKIM_identity = $mail->From;

                //Suppress listing signed header fields in signature, defaults to true for debugging purpose

            $mail->DKIM_copyHeaderFields = false;

                //Optionally you can add extra headers for signing to meet special requirements

            $mail->DKIM_extraHeaders = ['List-Unsubscribe', 'List-Help'];



			$mail->SMTPAuth   = true;



			// $mail->SMTPDebug   = true;



			$mail->Host       = $config['mail']['ip'];



			$mail->Username   = $config['mail']['email'];



			$mail->Password   = $config['mail']['password'];



			$mail->SetFrom($config['mail']['email'],$author);



			if(!empty($emailAddress)){



				foreach ($emailAddress as $k => $v) {



					$mail->AddAddress($v,$author);



				}



			}



			if(!empty($emailCC)){



				foreach ($emailCC as $k => $v) {



					$mail->AddCC($v,$author);



				}



			}



			if(!empty($emailBCC)){



				foreach ($emailBCC as $k => $v) {



					$mail->AddBCC($v,$author);



				}



			}



			$mail->Subject    = $title;



			$mail->IsHTML(true);



			$mail->CharSet = "utf-8";



			$mail->Body = $body;



			if($mail->Send()){



				return true;



			}else{



				return false;



			}



        }

        function sendMailAjax($author,$title,$body,$emailAddress=null,$emailCC=null,$emailBCC=null){



			global $config;



            include_once "../libraries/Mailer/class.phpmailer.php";



			$mail = new PHPMailer();



			$mail->IsSMTP();



			if($config['mail']['gmail']==true){



				$mail->SMTPSecure = $config['mail']['secure'];



				$mail->Port   = $config['mail']['port'];



            }


			$mail->SMTPAuth   = true;



			// $mail->SMTPDebug   = true;



			$mail->Host       = $config['mail']['ip'];



			$mail->Username   = $config['mail']['email'];



			$mail->Password   = $config['mail']['password'];



			$mail->SetFrom($config['mail']['email'],$author);



			if(!empty($emailAddress)){



				foreach ($emailAddress as $k => $v) {



					$mail->AddAddress($v,$author);



				}



			}



			if(!empty($emailCC)){



				foreach ($emailCC as $k => $v) {



					$mail->AddCC($v,$author);



				}



			}



			if(!empty($emailBCC)){



				foreach ($emailBCC as $k => $v) {



					$mail->AddBCC($v,$author);



				}



			}



			$mail->Subject    = $title;



			$mail->IsHTML(true);



			$mail->CharSet = "utf-8";



			$mail->Body = $body;



			if($mail->Send()){



				return true;



			}else{



				return false;



			}



		}

        public function getClientIpServer() {

            $ipaddress = '';

            if ($_SERVER['HTTP_CLIENT_IP'])

                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];

            else if($_SERVER['HTTP_X_FORWARDED_FOR'])

                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];

            else if($_SERVER['HTTP_X_FORWARDED'])

                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];

            else if($_SERVER['HTTP_FORWARDED_FOR'])

                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];

            else if($_SERVER['HTTP_FORWARDED'])

                $ipaddress = $_SERVER['HTTP_FORWARDED'];

            else if($_SERVER['REMOTE_ADDR'])

                $ipaddress = $_SERVER['REMOTE_ADDR'];

            else

                $ipaddress = 'UNKNOWN';

         

            return $ipaddress;

        }

        public function isAjax() {

		    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'));

		}

        public function orderCode($code,$table){

            $sql = "select id from table_{$table} order by id desc limit 0,1";

            $result = $this->_d->rawQuery($sql);

            if(count($result)==0){

                $kq = $code."00001";

            } else {

                $id = $result[0]['id']+1;

                $leng = strlen($id);

                if($leng==1){

                    $kq = $code."000".$id;

                } else if($leng==2){

                    $kq = $code."0000".$id;

                } else if($leng==3){

                    $kq = $code."000".$id;

                } else if($leng==4){

                    $kq = $code."00".$id;

                } else if($leng==5){

                    $kq = $code."0".$id;

                } else{

                    $kq = $code.$id;

                }

            }

            return $kq;

        }

        public function encryptPassword($secret,$str,$salt){

            return md5(sha1($secret.$str.$salt));

        } 

        

        public function getLink($str,$index=false,$html=false){

            if($index==true){

                return '<a href="" title="'.$str.'">'.$str.'</a>';

            }else{

                if($html==true){ $h = '.html'; }

                return '<a href="'.$this->changeTitle($str).$h.'" title="'.$str.'">'.$str.'</a>';

            }

        }

        public function isLogin(){

            return isset($_SESSION['signin']) && $_SESSION['signin']==true ?  true : false;

        }

         public function checkTwoAccess(){
        
        global $config,$func,$login_name,$notice_admin;

        if(isset($_SESSION[$login_name]) || $_SESSION[$login_name]==true){

            $id_user=(int)$_SESSION['login']['id'];
            
            $timenow=time();

            $row=$this->_d->rawQueryOne("select username,password,lastlogin,user_token from #_user WHERE id ='$id_user'");

            $cookiehash = md5(sha1($row['password'].$row['username']));
            
            if(!empty($_SESSION['login_session'])){
                if($_SESSION['login_session']!=$cookiehash || ($timenow - $row['lastlogin'])>3600)
                {
                    session_destroy();
                    
                    $func->redirect("index.html?com=user&act=login");
                    
                }
                
                if($_SESSION['login_token']!==$row['user_token']) $notice_admin = 'Có người đang đăng nhập tài khoản của bạn !';
                
                else $notice_admin ='';

                $token = md5(time());
                
                $_SESSION['login_token'] = $token;
                
                $sql = "update #_user set lastlogin = '$timenow',user_token = '$token' where id='$id_user'";
                
                $this->_d->rawQuery($sql);
            }
        
        }

    }

        public function getBrowser() { 

            $u_agent = $_SERVER['HTTP_USER_AGENT'];

            $bname = 'Unknown';

            $platform = 'Unknown';

            $version= "";

            if (preg_match('/linux/i', $u_agent)) {

              $platform = 'linux';

            }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {

              $platform = 'mac';

            }elseif (preg_match('/windows|win32/i', $u_agent)) {

              $platform = 'windows';

            }

            if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){

              $bname = 'Internet Explorer';

              $ub = "MSIE";

            }elseif(preg_match('/Firefox/i',$u_agent)){

              $bname = 'Mozilla Firefox';

              $ub = "Firefox";

            }elseif(preg_match('/OPR/i',$u_agent)){

              $bname = 'Opera';

              $ub = "Opera";

            }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){

              $bname = 'Google Chrome';

              $ub = "Chrome";

            }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){

              $bname = 'Apple Safari';

              $ub = "Safari";

            }elseif(preg_match('/Netscape/i',$u_agent)){

              $bname = 'Netscape';

              $ub = "Netscape";

            }elseif(preg_match('/Edge/i',$u_agent)){

              $bname = 'Edge';

              $ub = "Edge";

            }elseif(preg_match('/Trident/i',$u_agent)){

              $bname = 'Internet Explorer';

              $ub = "MSIE";

            }

            $known = array('Version', $ub, 'other');

            $pattern = '#(?<browser>' . join('|', $known) .

          ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

            if (!preg_match_all($pattern, $u_agent, $matches)) {

              // we have no matching number just continue

            }

            $i = count($matches['browser']);

            if ($i != 1) {

              if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){

                  $version= $matches['version'][0];

              }else {

                  $version= $matches['version'][1];

              }

            }else {

              $version= $matches['version'][0];

            }

            if ($version==null || $version=="") {$version="?";}

          

            return array(

              'userAgent' => $u_agent,

              'name'      => $bname,

              'version'   => $version,

              'platform'  => $platform,

              'pattern'    => $pattern

            );

          } 

        public function convertNumberToWords($number) 

        {

            $hyphen      = ' ';

            $conjunction = '  ';

            $separator   = ' ';

            $negative    = 'âm ';

            $decimal     = ' phẩy ';

            $dictionary  = array(

            0                   => 'Không',

            1                   => 'Một',

            2                   => 'Hai',

            3                   => 'Ba',

            4                   => 'Bốn',

            5                   => 'Năm',

            6                   => 'Sáu',

            7                   => 'Bảy',

            8                   => 'Tám',

            9                   => 'Chín',

            10                  => 'Mười',

            11                  => 'Mười Một',

            12                  => 'Mười Hai',

            13                  => 'Mười Ba',

            14                  => 'Mười Bốn',

            15                  => 'Mười Lăm',

            16                  => 'Mười Sáu',

            17                  => 'Mười Bảy',

            18                  => 'Mười Tám',

            19                  => 'Mười Chín',

            20                  => 'Hai Mươi',

            30                  => 'Ba Mươi',

            40                  => 'Bốn Mươi',

            50                  => 'Năm Mươi',

            60                  => 'Sáu Mươi',

            70                  => 'Bảy Mươi',

            80                  => 'Tám Mươi',

            90                  => 'Chín Mươi',

            100                 => 'Trăm',

            1000                => 'Ngàn',

            1000000             => 'Triệu',

            1000000000          => 'Tỷ',

            1000000000000       => 'Nghìn Tỷ',

            1000000000000000    => 'Ngàn Triệu Triệu',

            1000000000000000000 => 'Tỷ Tỷ'

            );

                

            if (!is_numeric($number)) 

            {

                return false;

            }

                

            if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) 

            {

                trigger_error('convert Number To Words only accepts numbers between -'.PHP_INT_MAX.' and '.PHP_INT_MAX,E_USER_WARNING);

                return false;

            }

                

            if ($number < 0) 

            {

                return $negative . convertNumberToWords(abs($number));

            }

                

            $string = $fraction = null;

                

            if (strpos($number, '.') !== false) 

            {

                list($number, $fraction) = explode('.', $number);

            }

                

            switch (true) 

            {

                case $number < 21:

                    $string = $dictionary[$number];

                    break;

                case $number < 100:

                    $tens   = ((int) ($number / 10)) * 10;

                    $units  = $number % 10;

                    $string = $dictionary[$tens];

                    if ($units) {

                    $string .= $hyphen . $dictionary[$units];

                    }

                    break;

                case $number < 1000:

                    $hundreds  = $number / 100;

                    $remainder = $number % 100;

                    $string = $dictionary[$hundreds] . ' ' . $dictionary[100];

                    if ($remainder) {

                    $string .= $conjunction . convertNumberToWords($remainder);

                    }

                    break;

                default:

                    $baseUnit = pow(1000, floor(log($number, 1000)));

                    $numBaseUnits = (int) ($number / $baseUnit);

                    $remainder = $number % $baseUnit;

                    $string = convertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];

                    if ($remainder) {

                    $string .= $remainder < 100 ? $conjunction : $separator;

                    $string .= convertNumberToWords($remainder);

                    }

                    break;

            }

                

            if (null !== $fraction && is_numeric($fraction)) 

            {

                $string .= $decimal;

                $words = array();

                foreach (str_split((string) $fraction) as $number) 

                {

                    $words[] = $dictionary[$number];

                }

                $string .= implode(' ', $words);

            }

            return $string;

        }

        public function timeAgo($time_ago)

        {

            $cur_time   = time();

            $time_elapsed   = $cur_time - $time_ago;

            $seconds    = $time_elapsed ;

            $minutes    = round($time_elapsed / 60 );

            $hours      = round($time_elapsed / 3600);

            $days       = round($time_elapsed / 86400 );

            $weeks      = round($time_elapsed / 604800);

            $months     = round($time_elapsed / 2600640 );

            $years      = round($time_elapsed / 31207680 );

            // Seconds

            if($seconds <= 60){

                return $seconds.' giây trước';

            }

            //Minutes

            else if($minutes <=60){

                if($minutes==1){

                    return "1 phút trước";

                }

                else{

                    return "$minutes phút trước";

                }

            }

            //Hours

            else if($hours <=24){

                if($hours==1){

                    return "1 giờ trước";

                }else{

                    return "$hours giờ trước";

                }

            }

            //Days

            else if($days <= 7){

                if($days==1){

                    return "hôm qua";

                }else{

                    return "$days ngày trước";

                }

            }

            //Weeks

            else if($weeks <= 4.3){

                if($weeks==1){

                    return "1 tuần trước";

                }else{

                    return "$weeks tuần trước";

                }

            }

            //Months

            else if($months <=12){

                if($months==1){

                    return "1 tháng trước";

                }else{

                    return "$months tháng trước";

                }

            }

            //Years

            else{

                if($years==1){

                    return "1 năm trước";

                }else{

                    return "$years 1 năm trước";

                }

            }

        }

        public function daysOfTheWeek($date)

        {

            $get_date = date('l',$date);

            switch ($get_date) {

                case 'Monday':

                    $result_date = 'Thứ 2';

                    break;

                case 'Tuesday':

                    $result_date = 'Thứ 3';

                    break;

                case 'Wednesday':

                    $result_date = 'Thứ 4';

                    break;

                case 'Thursday':

                    $result_date = 'Thứ 5';

                    break;

                case 'Friday':

                    $result_date = 'Thứ 6';

                    break;

                case 'Saturday':

                    $result_date = 'Thứ 7';

                    break;

                case 'Sunday':

                    $result_date = 'Chủ nhật';

                    break;

                default:

                    $result_date = '';

                    break;

            }



            return $result_date;

        }

        public function getYoutube($links)
        {

            $ext = explode('=',$links);

            $vaich = $ext[1];

            if(strpos($vaich,'&')>0){
                $id = explode('&',$vaich);
                return $id[0];
            }

            return $vaich;

        }

        public function getYoutubeImg($value){
            $uid = $this->getYoutube($value['links']);
            $videoimg = "https://img.youtube.com/vi/$uid/mqdefault.jpg";
            if($value['photo'] != null & $value['photo'] != ""){
                $videoimg = _upload_hinhanh_l.$value['photo'];
            }
            return $videoimg;
        }

        public function boCongThuong($v){

            global $lang;

            $hidden=($v['hienthi']==1) ? '' : 'hidden';

            $str='<div class="bocongthuong mt10 '.$hidden.'">

                <a href="'.$v["link"].'" target="_blank" rel="nofollow" title="Bộ công thương">

                    <img src="'._upload_hinhanh_l.$v["photo_$lang"].'" alt="Bộ công thương" />

                </a>

            </div>';

            return $str;

        }

        public function getSocial($values,$class="justify-content-start"){

            echo '<ul class="socical d-flex '.$class.' align-items-center flex-wrap mg0" style="gap:1rem;">';

                foreach ($values as $key => $value) {

                    echo '<li class="">';

                        echo '<a href="'.$value['link'].'" target="_blank" rel="nofollow" title="'.$value['ten_vi'].'">';

                            echo '<img src="'._upload_hinhanh_l.$value['photo'].'" alt="'.$value['ten_vi'].'" " loading="lazy"/>';

                        echo '</a>';

                    echo '</li>';

                }

            echo '</ul>';

        }

        function fnsRandDigit($min,$max,$num)

        {

            $result='';

            for($i=0;$i<$num;$i++){

                $result.=rand($min,$max);

            }

            return $result;

        }

        public function getArray($arr = array()){

            global $lang;

			return array('id_list'=>$arr['id_list'],'alias'=>$arr['tenkhongdau'],'name'=>$arr["ten_$lang"],'type'=>$arr['type']);

		}

        function delCache(){



            $files = glob('../cache/*');



            foreach($files as $file){



                if(is_file($file)){



                    unlink($file);



                }

                

            }

            

		}

		// =============================upload img====================



		public function uploadVideo($id=0,$photo='video',$file,$path,$table){
            if($file){
                $handle = new Upload($file);
                if($file['error']!=4){
                    if ($handle->uploaded) {
                        $handle->file_new_name_body = $this->imagesName($handle->file_src_name_body);
                        $data[$photo] = $handle->file_new_name_body.'.'.$handle->file_src_name_ext;
                        $handle->process($path);
                        if ($handle->processed) {
                            if($id!=0){
                                $this->_d->where("id", $id);
                                $item = $this->_d->getOne($table);
                                $this->deleteLink($path.$item[$photo]);
                            }
                            $msg_upload = true;
                        }
                    }
                }
                return $data;
            }
        }

		public function uploadFileSend($photo='file',$file,$path){
            if($file){
                $handle = new Upload($file);
                if($file['error']!=4){
                    if ($handle->uploaded) {
                        $handle->file_new_name_body = $this->imagesName($handle->file_src_name_body);
                        $data[$photo] = $handle->file_new_name_body.'.'.$handle->file_src_name_ext;
                        $handle->process($path);
                        if ($handle->processed) {
                            $msg_upload = true;
                        }
                    }
                }
                return $data;
            }
        }



		public function uploadImg($id=0,$photo='photo',$thumb='thumb',$file,$path,$table,$w,$h,$r=1,$b=false){
            if($file){
                $handle = new Upload($file);
                if($file['error']!=4){
                    if ($handle->uploaded) {
                        $handle->file_new_name_body = $this->imagesName($handle->file_src_name_body);
                        $data[$photo] = $handle->file_new_name_body.'.'.$handle->file_src_name_ext;
                        $handle->process($path);
                        if ($handle->processed) {
                            if($id!=0){

                                $this->_d->where("id", $id);

                                $item = $this->_d->getOne($table);

                                if(!file_exists($path.$item[$photo])){
                                    $this->deleteLink($path.$item[$photo]);
                                }
                            }

                            $msg_upload = true;
                        }
                    }
                    if ($handle->uploaded) {
                        $handle->image_resize = true;
                        $handle->image_x = $w;
                        $handle->image_y = $h;
                        $handle->file_new_name_body = $this->imagesName($handle->file_src_name_body).'_'.$handle->image_x.'x'.$handle->image_y;
                        $data[$thumb] = $handle->file_new_name_body.'.'.$handle->file_src_name_ext;
                        if($r==2){
                            $handle->image_ratio_fill  = true;
                            if($b==true){
                                $handle->image_background_color = '#FFF';
                            }
                        }else{
                            $handle->image_ratio_crop = true;
                        }
                        if($handle->file_src_name_ext=='jqg' || $handle->file_src_name_ext=='jpeg' || $handle->file_src_name_ext=='JPG' || $handle->file_src_name_ext=='JPEG'){
                            $handle->image_convert         = 'jpg';
                            $handle->jpeg_quality = 90;
                        }elseif($handle->file_src_name_ext=='png' || $handle->file_src_name_ext=='PNG'){
                            $handle->image_convert         = 'png';
                            $handle->png_compression = 3;
                        }
                        $handle->process($path);
                        if ($handle->processed) {
                            if($id!=0){
                                $this->_d->where("id", $id);
                                $item = $this->_d->getOne($table);
                                $this->deleteLink($path.$item[$thumb]);
                            }
                            $msg_upload = true;
                        }
                    }
                }
                return $data;
            }
        }

		public function uploadImgType($type='null',$photo='photo',$thumb='thumb',$file,$path,$table,$w,$h,$r=1,$b=false){
            if($file){
                $handle = new Upload($file);
                if($file['error']!=4){
                    if ($handle->uploaded) {
                        $handle->file_new_name_body = $this->imagesName($handle->file_src_name_body);
                        $data[$photo] = $handle->file_new_name_body.'.'.$handle->file_src_name_ext;
                        $handle->process($path);
                        if ($handle->processed) {
                            if($type!='null'){
                                $this->_d->where("type", $type);
                                $item = $this->_d->getOne($table);
                                $this->deleteLink($path.$item[$photo]);
                            }
                            $msg_upload = true;
                        }
                    }
                    if ($handle->uploaded) {
                        $handle->image_resize = true;
                        $handle->image_x = $w;
                        $handle->image_y = $h;
                        $handle->file_new_name_body = $this->imagesName($handle->file_src_name_body).'_'.$handle->image_x.'x'.$handle->image_y;
                        $data[$thumb] = $handle->file_new_name_body.'.'.$handle->file_src_name_ext;
                        if($r==2){
                            $handle->image_ratio_fill  = true;
                            if($b==true){
                                $handle->image_background_color = '#FFF';
                            }
                        }else{
                            $handle->image_ratio_crop = true;
                        }
                        if($handle->file_src_name_ext=='jqg' || $handle->file_src_name_ext=='jpeg' || $handle->file_src_name_ext=='JPG' || $handle->file_src_name_ext=='JPEG'){
                            $handle->image_convert         = 'jpg';
                            $handle->jpeg_quality = 60;
                        }elseif($handle->file_src_name_ext=='png' || $handle->file_src_name_ext=='PNG'){
                            $handle->image_convert         = 'png';
                            $handle->png_compression = 3;
                        }
                        $handle->process($path);
                        if ($handle->processed) {
                            if($type!='null'){
                                $this->_d->where("type", $type);
                                $item = $this->_d->getOne($table);
                                $this->deleteLink($path.$item[$thumb]);
                            }
                            $msg_upload = true;
                        }
                    }
                }
                return $data;
            }
        }
		public function uploadImgNotThumb($photo='photo',$file,$path){
            if($file){
                $handle = new Upload($file);
                if($file['error']!=4){
                    if ($handle->uploaded) {
                        $handle->file_new_name_body = $this->imagesName($handle->file_src_name_body);
                        $data[$photo] = $handle->file_new_name_body.'.'.$handle->file_src_name_ext;
                        $handle->process($path);
                        if ($handle->processed) {
                            $msg_upload = true;
                        }
                    }
                }
                return $data;
            }
        }

        public function uploadImage($file='', $extension='', $folder='', $newname='')
        {
            global $config;

            if(isset($_FILES[$file]) && !$_FILES[$file]['error'])
            {
                $postMaxSize = ini_get('post_max_size');
                $MaxSize = explode('M', $postMaxSize);
                $MaxSize = $MaxSize[0];
                if($_FILES[$file]['size'] > $MaxSize*1048576)
                {
                    $this->alert('Dung lượng file không được vượt quá '.$postMaxSize);
                    return false;
                }

                $ext = explode('.', $_FILES[$file]['name']);
                $ext = strtolower($ext[count($ext)-1]);
                $name = basename($_FILES[$file]['name'], '.'.$ext);

                if(strpos($extension, $ext)===false)
                {
                    $this->alert('Chỉ hỗ trợ upload file dạng '.$extension);
                    return false;
                }

                if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
                    for($i=0; $i<100; $i++)
                    {
                        if(!file_exists($folder.$name.$i.'.'.$ext))
                        {
                            $_FILES[$file]['name'] = $name.$i.'.'.$ext;
                            break;
                        }
                    }
                    else
                    {
                        $_FILES[$file]['name'] = $newname.'.'.$ext;
                    }

                    if(!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))   
                    {
                        if(!move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name'])) 
                        {
                            return false;
                        }
                    }

                    /* Resize image if width origin > config max width */
                    $array = getimagesize($folder.$_FILES[$file]['name']);
                    list($image_w, $image_h) = $array;
                    $maxWidth = $config['website']['upload']['max-width'];
                    $maxHeight = $config['website']['upload']['max-height'];
                    if($image_w > $maxWidth) $this->smartResizeImage($folder.$_FILES[$file]['name'],null,$maxWidth,$maxHeight,true);

                    return $_FILES[$file]['name'];
                }
                return false;
            }       

        public function uploadPhoto($file, $extension, $folder, $newname=''){

            if(isset($file) && !$file['error']){

        

                $ext = end(explode('.',$file['name']));

                $name = basename($file['name'], '.'.$ext);

                if(strpos($extension, $ext)===false){

                    alert('Chỉ hỗ trợ upload file dạng '.$ext.'-////-'.$extension);

                    return false;

                }

                if($newname=='' && file_exists($folder.$file['name']))

                    for($i=0; $i<100; $i++){

                        if(!file_exists($folder.$name.$i.'.'.$ext)){

                            $file['name'] = $name.$i.'.'.$ext;

                            break;

                        }

                    }

                else{

                    $file['name'] = $newname.'.'.$ext;

                }

        

                if (!copy($file["tmp_name"], $folder.$file['name']))	{

                    if ( !move_uploaded_file($file["tmp_name"], $folder.$file['name']))	{

                        return false;

                    }

                }

                return $file['name'];

            }

            return false;

        }

        public function getImgSize($photo='', $patch='')
        {
            $x = (file_exists($patch)) ? getimagesize($patch) : null;
            return array("p"=>$photo,"w"=>$x[0],"h"=>$x[1],"m"=>$x['mime']);
        }

        public function createThumb($width_thumb=0, $height_thumb=0, $zoom_crop='1', $src='', $watermark=null, $path=_thumbs, $preview=false, $args=array(), $quality=100)
        {
            
            $t = 3600*24*3;
             
            $this->RemoveFilesFromDirInXSeconds(_upload_temp_l, 1);

            if($watermark != null)
            {
                $this->RemoveFilesFromDirInXSeconds(_watermark.'/'.$path."/", $t);
                $this->RemoveEmptySubFolders(_watermark.'/'.$path."/");
            }
            else
            {
                $this->RemoveFilesFromDirInXSeconds($path."/", $t);
                $this->RemoveEmptySubFolders($path."/");
            }

            $src = str_replace("%20"," ",$src);
            if(!file_exists($src)) die("NO IMAGE $src");
            $image_url = $src;
            $origin_x = 0;
            $origin_y = 0;
            $new_width = $width_thumb;
            $new_height = $height_thumb;

            if($new_width < 10 && $new_height < 10)
            {
                header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
                die("Width and height larger than 10px");
            }
            if($new_width > 2000 || $new_height > 2000)
            {
                header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
                die("Width and height less than 2000px");
            }

            $array = getimagesize($image_url);
            if($array) list($image_w, $image_h) = $array;
            else die("NO IMAGE $image_url");

            $width = $image_w;
            $height = $image_h;

            if($new_height && !$new_width) $new_width = $width * ($new_height / $height);
            else if($new_width && !$new_height) $new_height = $height * ($new_width / $width);

            $image_ext = explode('.', $image_url);
            $image_ext = trim(strtolower(end($image_ext)));
            $image_name = explode('/', $image_url);
            $image_name = trim(strtolower(end($image_name)));
            switch(strtoupper($image_ext))
            {
                case 'JPG':
                case 'JPEG':
                $image = imagecreatefromjpeg($image_url);
                $func='imagejpeg';
                $mime_type = 'jpeg';
                break;

                case 'PNG':
                $image = imagecreatefrompng($image_url);
                $func='imagepng';
                $mime_type = 'png';
                break;

                case 'GIF':
                $image = imagecreatefromgif($image_url);
                $func='imagegif';
                $mime_type = 'png';
                break;

                default: die("UNKNOWN IMAGE TYPE: $image_url");
            }

            if($zoom_crop == 3)
            {
                $final_height = $height * ($new_width / $width);
                if($final_height > $new_height) $new_width = $width * ($new_height / $height);
                else $new_height = $final_height;
            }

            $canvas = imagecreatetruecolor($new_width, $new_height);
            imagealphablending($canvas, false);
            $color = imagecolorallocatealpha($canvas, 255, 255, 255, 127);
            imagefill ($canvas, 0, 0, $color);
            

            if($zoom_crop == 2)
            {
                $final_height = $height * ($new_width / $width);
                if($final_height > $new_height)
                {
                    $origin_x = $new_width / 2;
                    $new_width = $width * ($new_height / $height);
                    $origin_x = round($origin_x - ($new_width / 2));
                }
                else
                {
                    $origin_y = $new_height / 2;
                    $new_height = $final_height;
                    $origin_y = round($origin_y - ($new_height / 2));
                }
            }

            imagesavealpha($canvas, true);

            if($zoom_crop > 0)
            {
                $align = '';
                $src_x = $src_y = 0;
                $src_w = $width;
                $src_h = $height;

                $cmp_x = $width / $new_width;
                $cmp_y = $height / $new_height;

                if($cmp_x > $cmp_y)
                {
                    $src_w = round($width / $cmp_x * $cmp_y);
                    $src_x = round(($width - ($width / $cmp_x * $cmp_y)) / 2);
                }
                else if($cmp_y > $cmp_x)
                {
                    $src_h = round($height / $cmp_y * $cmp_x);
                    $src_y = round(($height - ($height / $cmp_y * $cmp_x)) / 2);
                }

                if($align)
                {
                    if(strpos($align, 't') !== false)
                    {
                        $src_y = 0;
                    }
                    if(strpos($align, 'b') !== false)
                    {
                        $src_y = $height - $src_h;
                    }
                    if(strpos($align, 'l') !== false)
                    {
                        $src_x = 0;
                    }
                    if(strpos($align, 'r') !== false)
                    {
                        $src_x = $width - $src_w;
                    }
                }

                imagecopyresampled($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);
            }
            else
            {
                imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            }

            if($preview)
            {
                $watermark = array();
                $watermark['hienthi'] = 1;
                $options = $args;
                $overlay_url = $args['watermark'];
            }
            
            $upload_dir = '';
            // $folder_old = str_replace($image_name, '', $image_url);
            $folder_old = dirname($image_url).'/';

            if(isset($watermark['hienthi']) && $watermark['hienthi'] > 0)
            {
                $upload_dir = _watermark.'/'.$path.'/'.$width_thumb.'x'.$height_thumb.'x'.$zoom_crop.'/'.$folder_old;

            }
            else
            {
                if($watermark != null) $upload_dir = _watermark.'/'.$path.'/'.$width_thumb.'x'.$height_thumb.'x'.$zoom_crop.'/'.$folder_old;
                else $upload_dir = $path.'/'.$width_thumb.'x'.$height_thumb.'x'.$zoom_crop.'/'.$folder_old;
            }

            if(!file_exists($upload_dir)) if(!mkdir($upload_dir, 0777, true)) die('Failed to create folders...');

            if(isset($watermark['hienthi']) && $watermark['hienthi'] > 0)
            {


             
                $options = (isset($options))?$options:json_decode($watermark['options'],true)['watermark'];
                $per_scale = $options['per'];
                $per_small_scale = $options['small_per'];
                $max_width_w = $options['max'];
                $min_width_w = $options['min'];
                $opacity = @$options['opacity'];
                $overlay_url = (isset($overlay_url))?$overlay_url:_upload_hinhanh_l.$watermark['photo'];
                $overlay_ext = explode('.', $overlay_url);
                $overlay_ext = trim(strtolower(end($overlay_ext)));
                switch(strtoupper($overlay_ext))
                {
                    case 'JPG':
                    case 'JPEG':
                    $overlay_image = imagecreatefromjpeg($overlay_url);
                    break;

                    case 'PNG':
                    $overlay_image = imagecreatefrompng($overlay_url);
                    break;

                    case 'GIF':
                    $overlay_image = imagecreatefromgif($overlay_url);
                    break;

                    default: die("UNKNOWN IMAGE TYPE: $overlay_url");
                }
                
                $this->filterOpacity($overlay_image,$opacity);

                $overlay_width = imagesx($overlay_image);
                $overlay_height = imagesy($overlay_image);
                $overlay_padding = 5;     
              
                imagealphablending($canvas, true);
                if(min($new_width,$new_height) <= 300) $per_scale = $per_small_scale;

                $oz = max($overlay_width,$overlay_height);              
                
                if($overlay_width > $overlay_height)
                {
                    $scale = $new_width/$oz;
                }
                else
                {
                    $scale = $new_height/$oz;
                }

                if($new_height > $new_width)
                {
                    $scale = $new_height/$oz;
                }
                
                $new_overlay_width = (floor($overlay_width*$scale) - $overlay_padding*2)/$per_scale;
                $new_overlay_height = (floor($overlay_height*$scale) - $overlay_padding*2)/$per_scale;
                $scale_w = $new_overlay_width/$new_overlay_height;
                $scale_h = $new_overlay_height/$new_overlay_width;
                $new_overlay_height = $new_overlay_width/$scale_w;

                if($new_overlay_height > $new_height)
                {
                    $new_overlay_height = $new_height / $per_scale;
                    $new_overlay_width = $new_overlay_height * $scale_w;
                }
                if($new_overlay_width > $new_width)
                {
                    $new_overlay_width = $new_width/$per_scale;
                    $new_overlay_height = $new_overlay_width * $scale_h;
                }
                if(($new_width / $new_overlay_width) < $per_scale)
                {
                    $new_overlay_width = $new_width/$per_scale;
                    $new_overlay_height = $new_overlay_width * $scale_h;
                }
                if($new_height < $new_width && ($new_height / $new_overlay_height) < $per_scale)
                {
                    $new_overlay_height = $new_height/$per_scale;
                    $new_overlay_width = $new_overlay_height / $scale_h;
                }
                if($new_overlay_width > $max_width_w && $new_overlay_width)
                {
                    $new_overlay_width = $max_width_w;
                    $new_overlay_height = $new_overlay_width * $scale_h;
                }
                if($new_overlay_width < $min_width_w && $new_width <= $min_width_w*3)
                {
                    $new_overlay_width = $min_width_w;  
                    $new_overlay_height = $new_overlay_width * $scale_h;
                }
                $new_overlay_width = round($new_overlay_width);
                $new_overlay_height = round($new_overlay_height);
                
                switch($options['position'])
                {
                    case 1:
                    $khoancachx = $overlay_padding;
                    $khoancachy = $overlay_padding;
                    break;

                    case 2:
                    $khoancachx = abs($new_width - $new_overlay_width)/2;
                    $khoancachy = $overlay_padding;
                    break;

                    case 3:
                    $khoancachx = abs($new_width - $new_overlay_width) - $overlay_padding;
                    $khoancachy = $overlay_padding;
                    break;

                    case 4:
                    $khoancachx = abs($new_width - $new_overlay_width) - $overlay_padding;
                    $khoancachy = abs($new_height - $new_overlay_height)/2;
                    break;

                    case 5:
                    $khoancachx = abs($new_width - $new_overlay_width) - $overlay_padding;
                    $khoancachy = abs($new_height - $new_overlay_height) - $overlay_padding;
                    break;

                    case 6:
                    $khoancachx = abs($new_width - $new_overlay_width)/2;
                    $khoancachy = abs($new_height - $new_overlay_height) - $overlay_padding;
                    break;

                    case 7:
                    $khoancachx = $overlay_padding;
                    $khoancachy = abs($new_height - $new_overlay_height) - $overlay_padding;
                    break;

                    case 8:
                    $khoancachx = $overlay_padding;
                    $khoancachy = abs($new_height - $new_overlay_height)/2;
                    break;

                    case 9:
                    $khoancachx = abs($new_width - $new_overlay_width)/2;
                    $khoancachy = abs($new_height - $new_overlay_height)/2;
                    break;
                    
                    default:
                    $khoancachx = $overlay_padding;
                    $khoancachy = $overlay_padding;
                    break;
                }
                
                $overlay_new_image = imagecreatetruecolor($new_overlay_width, $new_overlay_height);
                imagealphablending($overlay_new_image, false);
                imagesavealpha($overlay_new_image, true);
                imagecopyresampled($overlay_new_image, $overlay_image, 0, 0, 0, 0, $new_overlay_width, $new_overlay_height, $overlay_width, $overlay_height);
                imagecopy($canvas, $overlay_new_image, $khoancachx, $khoancachy, 0, 0, $new_overlay_width, $new_overlay_height);
                imagealphablending($canvas, false);
                imagesavealpha($canvas, true);
            }


            if($preview)
            {
                $upload_dir = '';
                $this->RemoveEmptySubFolders(_watermark.'/'.$path."/");
            }



            if($upload_dir)
            {
                if($func == 'imagejpeg') $func($canvas, $upload_dir.$image_name,100);
                else $func($canvas, $upload_dir.$image_name,floor($quality * 0.09));    
            }



            header('Content-Type: image/' . $mime_type);
            if($func=='imagejpeg') $func($canvas, NULL,100);
            else $func($canvas, NULL,floor($quality * 0.09));

            imagedestroy($canvas);
        }
        /* Filter opacity */
        public function filterOpacity($img='', $opacity=80)
        {
            /*
            if(!isset($opacity) || $img == '') return false;

            $opacity /= 100;
            $w = imagesx($img);
            $h = imagesy($img);
            imagealphablending($img, false);
            $minalpha = 127;

            for($x = 0; $x < $w; $x++)
            {
                for($y = 0; $y < $h; $y++)
                {
                    $alpha = (imagecolorat($img, $x, $y) >> 24) & 0xFF;
                    if($alpha < $minalpha) $minalpha = $alpha;
                }
            }

            for($x = 0; $x < $w; $x++)
            {
                for($y = 0; $y < $h; $y++)
                {
                    $colorxy = imagecolorat($img, $x, $y);
                    $alpha = ($colorxy >> 24) & 0xFF;
                    if($minalpha !== 127) $alpha = 127 + 127 * $opacity * ($alpha - 127) / (127 - $minalpha);
                    else $alpha += 127 * $opacity;
                    $alphacolorxy = imagecolorallocatealpha($img, ($colorxy >> 16) & 0xFF, ($colorxy >> 8) & 0xFF, $colorxy & 0xFF, $alpha);
                    if(!imagesetpixel($img, $x, $y, $alphacolorxy)) return false;
                }
            } */
            return true;
            
        }
        /* Remove files from dir in x seconds */
        public function RemoveFilesFromDirInXSeconds($dir='', $seconds=3600)
        {
            $files = glob(rtrim($dir, '/')."/*");
            $now = time();

            if($files)
            {
                foreach($files as $file)
                {
                    if(is_file($file))
                    {
                        if($now - filemtime($file) >= $seconds)
                        {
                            unlink($file);
                        }
                    }
                    else
                    {
                        $this->RemoveFilesFromDirInXSeconds($file,$seconds);
                    }
                }
            }
        }

        /* Remove Sub folder */
        public function RemoveEmptySubFolders($path='')
        {
            $empty = true;

            foreach(glob($path.DIRECTORY_SEPARATOR."*") as $file)
            {
                if(is_dir($file))
                {
                    if(!$this->RemoveEmptySubFolders($file)) $empty = false;
                }
                else
                {
                    $empty = false;
                }
            }

            if($empty)
            {
                if(is_dir($path))
                {
                    rmdir($path);
                }
            }

            return $empty;
        }

        public function removeDir($dirname='')
        {
            if(is_dir($dirname)) $dir_handle = opendir($dirname);
            if(!isset($dir_handle) || $dir_handle == false) return false;
            while($file = readdir($dir_handle))
            {
                if($file != "." && $file != "..")
                {
                    if(!is_dir($dirname."/".$file)) unlink($dirname."/".$file);
                    else $this->removeDir($dirname.'/'.$file);
                }
            }
            closedir($dir_handle);
            rmdir($dirname);
            return true;
        }
        function createThumb1($file, $width, $height, $folder,$file_name,$zoom_crop='1'){

            $new_width   = $width;

            $new_height   = $height;

             if ($new_width && !$new_height) {

                    $new_height = floor ($height * ($new_width / $width));

                } else if ($new_height && !$new_width) {

                    $new_width = floor ($width * ($new_height / $height));

                }

            $image_url = $folder.$file;

            $origin_x = 0;

            $origin_y = 0;

            $array = getimagesize($image_url);

            if ($array)

            {

                list($image_w, $image_h) = $array;

            }

            else

            {

                 die("NO IMAGE $image_url");

            }

            $width=$image_w;

            $height=$image_h;

            $image_ext = trim(strtolower(end(explode('.', $image_url))));

            switch(strtoupper($image_ext))

            {

                 case 'JPG' :

                 case 'JPEG' :

                     $image = imagecreatefromjpeg($image_url);

                     $func='imagejpeg';

                     break;

                 case 'PNG' :

                     $image = imagecreatefrompng($image_url);

                     $func='imagepng';

                     break;

                 case 'GIF' :

                      $image = imagecreatefromgif($image_url);

                     $func='imagegif';

                     break;

            

                 default : die("UNKNOWN IMAGE TYPE: $image_url");

            }

                if ($zoom_crop == 3) {

            

                    $final_height = $height * ($new_width / $width);

            

                    if ($final_height > $new_height) {

                        $new_width = $width * ($new_height / $height);

                    } else {

                        $new_height = $final_height;

                    }

            

                }

                $canvas = imagecreatetruecolor ($new_width, $new_height);

                imagealphablending ($canvas, false);

                $color = imagecolorallocatealpha ($canvas, 255, 255, 255, 127);

                imagefill ($canvas, 0, 0, $color);

                if ($zoom_crop == 2) {

                    $final_height = $height * ($new_width / $width);

                    if ($final_height > $new_height) {

                        $origin_x = $new_width / 2;

                        $new_width = $width * ($new_height / $height);

                        $origin_x = round ($origin_x - ($new_width / 2));

                    } else {

                        $origin_y = $new_height / 2;

                        $new_height = $final_height;

                        $origin_y = round ($origin_y - ($new_height / 2));

                    }

                }

                imagesavealpha ($canvas, true);

                if ($zoom_crop > 0) {

                    $src_x = $src_y = 0;

                    $src_w = $width;

                    $src_h = $height;

                    $cmp_x = $width / $new_width;

                    $cmp_y = $height / $new_height;

                    if ($cmp_x > $cmp_y) {

                        $src_w = round ($width / $cmp_x * $cmp_y);

                        $src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);

                    } else if ($cmp_y > $cmp_x) {

                        $src_h = round ($height / $cmp_y * $cmp_x);

                        $src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

                    }

                    if ($align) {

                        if (strpos ($align, 't') !== false) {

                            $src_y = 0;

                        }

                        if (strpos ($align, 'b') !== false) {

                            $src_y = $height - $src_h;

                        }

                        if (strpos ($align, 'l') !== false) {

                            $src_x = 0;

                        }

                        if (strpos ($align, 'r') !== false) {

                            $src_x = $width - $src_w;

                        }

                    }

                    imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

                } else {

                    imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                }

                $new_file=$file_name.'_'.$new_width.'x'.$new_height.'.'.$image_ext;

                if($func=='imagejpeg') $func($canvas, $folder.$new_file,100);

                else $func($canvas, $folder.$new_file,floor ($quality * 0.09));

            return $new_file;

        }

        public function imagesName($nameImg){

            $rand=rand(10,9999);

            $img=explode(".",$nameImg);

            $result = $this->changeTitle($img[0])."-".$rand;

            return $result;

        }

        public function limitWord($chuoi,$gioihan){

            if(strlen($chuoi)<=$gioihan)

            {

                return $chuoi;

            }else{

                if(strpos($chuoi," ",$gioihan) > $gioihan){

                    $new_gioihan=strpos($chuoi," ",$gioihan);

                    $new_chuoi = substr($chuoi,0,$new_gioihan)."...";

                    return $new_chuoi;

                }

                $new_chuoi = substr($chuoi,0,$gioihan)."...";

                return $new_chuoi;

            }

        }

        public function randString($sokytu){

            $chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZW0123456789";

            for ($i=0; $i < $sokytu; $i++){

                $vitri = mt_rand( 0 ,strlen($chuoi) );

                $giatri= $giatri . substr($chuoi,$vitri,1 );

            }

            return $giatri;

        }

        public function deleteLink($file){

            return @unlink($file);

        }

        public function redirect($url=''){

            echo '<script language="javascript">window.location = "'.$url.'" </script>';

            exit();

        }
       
        function transfer($msg,$page="index.html")

        {

            $showtext = $msg;

            $page_transfer = $page;

            include("./templates/transfer_tpl.php");

            exit();

        }

        public function changeTitle($str)

        {

            $str = $this->stripUnicode($str);

            $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');

            $str = trim($str);

            $str=preg_replace('/[^a-zA-Z0-9\ ]/','',$str);

            $str = str_replace("  "," ",$str);

            $str = str_replace(" ","-",$str);

            return $str;

        }

        public function changeSearch($str)

        {

            $str = $this->stripUnicode($str);

            $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');

            $str = trim($str);

            $str=preg_replace('/[^a-zA-Z0-9\ ]/','',$str);

            $str = str_replace("  "," ",$str);

            return $str;

        }

        public function stripUnicode($str){

            if(!$str) return false;

             $unicode = array(

               'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',

               'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

               'd'=>'đ',

               'D'=>'Đ',

               'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

                   'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

                   'i'=>'í|ì|ỉ|ĩ|ị',

                   'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

               'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

                   'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

               'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

                   'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

               'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

               'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'

             );

             foreach($unicode as $khongdau=>$codau) {

                   $arr=explode("|",$codau);

                   $str = str_replace($arr,$khongdau,$str);

             }

          return $str;

          }

        public function getCurrentPageUrlCano() {

            $pageURL = 'http';

            if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}

            $pageURL .= "://";

            if ($_SERVER["SERVER_PORT"] != "80") {

                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

            } else {

                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

            }

            $pageURL = str_replace("amp/", "", $pageURL);

            $pageURL = explode("&=", $pageURL);

            $pageURL = explode("?", $pageURL[0]);

            $pageURL = explode("#", $pageURL[0]);

            $pageURL = explode("index", $pageURL[0]);

            return $pageURL[0];

        }

        public function getCurrentPageURLAdmin() {

            $pageURL = 'http';

            if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}

            $pageURL .= "://";

            if ($_SERVER["SERVER_PORT"] != "80") {

                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

            } else {

                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

            }

            $pageURL = explode("&page=", $pageURL);

            return $pageURL[0];

        }

        public function getCurrentPageURL() {

            $pageURL = 'http';

            if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}

            $pageURL .= "://";

            if ($_SERVER["SERVER_PORT"] != "80") {

                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

            } else {

                $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

            }

            $pageURL=explode('?', $pageURL);

            

            return $pageURL[0];

        }

         public function paginationAdmin($total,$per_page=10,$page=1,$url='?'){   

            $total = $total;

            $adjacents = "2"; 

            $prevlabel = "&lsaquo; ";

            $nextlabel = " &rsaquo;";

            $lastlabel = " &rsaquo;&rsaquo;"; 

              

            $page = ($page == 0 ? 1 : $page);  

            $start = ($page - 1) * $per_page;                               

              

            $prev = $page - 1;                          

            $next = $page + 1;

              

            $lastpage = ceil($total/$per_page);

              

            $lpm1 = $lastpage - 1; // //last page minus 1

              

            $pagination = "";

            if($lastpage > 1){   

                $pagination .= "<ul class='pagination'>";

                      

                    if ($page > 1) $pagination.= "<li><a href='{$url}&page={$prev}'>{$prevlabel}</a></li>";

                      

                if ($lastpage < 7 + ($adjacents * 2)){   

                    for ($counter = 1; $counter <= $lastpage; $counter++){

                        if ($counter == $page)

                            $pagination.= "<li><a class='current'>{$counter}</a></li>";

                        else

                            $pagination.= "<li><a href='{$url}&page={$counter}'>{$counter}</a></li>";                    

                    }

                  

                } elseif($lastpage > 5 + ($adjacents * 2)){

                      

                    if($page < 1 + ($adjacents * 2)) {

                          

                        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){

                            if ($counter == $page)

                                $pagination.= "<li><a class='current'>{$counter}</a></li>";

                            else

                                $pagination.= "<li><a href='{$url}&page={$counter}'>{$counter}</a></li>";                    

                        }

                        $pagination.= "<li class='dot'>...</li>";

                        $pagination.= "<li><a href='{$url}&page={$lpm1}'>{$lpm1}</a></li>";

                        $pagination.= "<li><a href='{$url}&page={$lastpage}'>{$lastpage}</a></li>";  

                              

                    } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {

                          

                        $pagination.= "<li><a href='{$url}&page=1'>1</a></li>";

                        $pagination.= "<li><a href='{$url}&page=2'>2</a></li>";

                        $pagination.= "<li class='dot'>...</li>";

                        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {

                            if ($counter == $page)

                                $pagination.= "<li><a class='current'>{$counter}</a></li>";

                            else

                                $pagination.= "<li><a href='{$url}&page={$counter}'>{$counter}</a></li>";                    

                        }

                        $pagination.= "<li class='dot'>..</li>";

                        $pagination.= "<li><a href='{$url}&page={$lpm1}'>{$lpm1}</a></li>";

                        $pagination.= "<li><a href='{$url}&page={$lastpage}'>{$lastpage}</a></li>";      

                          

                    } else {

                          

                        $pagination.= "<li><a href='{$url}&page=1'>1</a></li>";

                        $pagination.= "<li><a href='{$url}&page=2'>2</a></li>";

                        $pagination.= "<li class='dot'>..</li>";

                        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {

                            if ($counter == $page)

                                $pagination.= "<li><a class='current'>{$counter}</a></li>";

                            else

                                $pagination.= "<li><a href='{$url}&page={$counter}'>{$counter}</a></li>";                    

                        }

                    }

                }

                  

                    if ($page < $counter - 1) {

                        $pagination.= "<li><a href='{$url}&page={$next}'>{$nextlabel}</a></li>";

                        $pagination.= "<li><a href='{$url}&page=$lastpage'>{$lastlabel}</a></li>"; 

                    }

                  

                $pagination.= "</ul>";        

            }

              

            return self::compress($pagination);

        }

        public function pagination($total,$per_page=10,$page=1,$url='?',$idl=''){   

            $total = $total;

            $adjacents = "2"; 

            $prevlabel = "<i class='fa-light fa-chevron-left'></i>";

            $nextlabel = "<i class='fa-light fa-angle-right'></i>";

            $lastlabel = "<i class='fa-light fa-angles-right'></i>"; 

              

            $page = ($page == 0 ? 1 : $page);  

            $start = ($page - 1) * $per_page;                               

              

            $prev = $page - 1;                          

            $next = $page + 1;

              

            $lastpage = ceil($total/$per_page);

              

            $lpm1 = $lastpage - 1; // //last page minus 1

            $condition = '';
            if($idl != ''){
                $condition = '&idl='.$idl;
            }

            $pagination = "";

            if($lastpage > 1){   

                $pagination .= "<ul class='pagination'>";

                      

                    if ($page > 1) $pagination.= "<li><a href='{$url}?page={$prev}{$condition}'>{$prevlabel}</a></li>";

                      

                if ($lastpage < 7 + ($adjacents * 2)){   

                    for ($counter = 1; $counter <= $lastpage; $counter++){

                        if ($counter == $page)

                            $pagination.= "<li><a class='current'>{$counter}</a></li>";

                        else

                            $pagination.= "<li><a href='{$url}?page={$counter}{$condition}'>{$counter}</a></li>";                    

                    }

                  

                } elseif($lastpage > 5 + ($adjacents * 2)){

                      

                    if($page < 1 + ($adjacents * 2)) {

                          

                        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){

                            if ($counter == $page)

                                $pagination.= "<li><a class='current'>{$counter}</a></li>";

                            else

                                $pagination.= "<li><a href='{$url}?page={$counter}{$condition}'>{$counter}</a></li>";                    

                        }

                        $pagination.= "<li class='dot'>...</li>";

                        $pagination.= "<li><a href='{$url}?page={$lpm1}{$condition}'>{$lpm1}</a></li>";

                        $pagination.= "<li><a href='{$url}?page={$lastpage}{$condition}'>{$lastpage}</a></li>";  

                              

                    } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {

                          

                        $pagination.= "<li><a href='{$url}?page=1{$condition}'>1</a></li>";

                        $pagination.= "<li><a href='{$url}?page=2{$condition}'>2</a></li>";

                        $pagination.= "<li class='dot'>...</li>";

                        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {

                            if ($counter == $page)

                                $pagination.= "<li><a class='current'>{$counter}</a></li>";

                            else

                                $pagination.= "<li><a href='{$url}?page={$counter}{$condition}'>{$counter}</a></li>";                    

                        }

                        $pagination.= "<li class='dot'>..</li>";

                        $pagination.= "<li><a href='{$url}?page={$lpm1}{$condition}'>{$lpm1}</a></li>";

                        $pagination.= "<li><a href='{$url}?page={$lastpage}{$condition}'>{$lastpage}</a></li>";      

                          

                    } else {

                          

                        $pagination.= "<li><a href='{$url}?page=1{$condition}'>1</a></li>";

                        $pagination.= "<li><a href='{$url}?page=2{$condition}'>2</a></li>";

                        $pagination.= "<li class='dot'>..</li>";

                        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {

                            if ($counter == $page)

                                $pagination.= "<li><a class='current'>{$counter}</a></li>";

                            else

                                $pagination.= "<li><a href='{$url}?page={$counter}{$condition}'>{$counter}</a></li>";                    

                        }

                    }

                }

                  

                    if ($page < $counter - 1) {

                        $pagination.= "<li><a href='{$url}?page={$next}{$condition}'>{$nextlabel}</a></li>";

                        $pagination.= "<li><a href='{$url}?page=$lastpage{$condition}'>{$lastlabel}</a></li>"; 

                    }

                  

                $pagination.= "</ul>";        

            }

              

            return self::compress($pagination);

        }

        public function insertDataPage($path,$table='baiviet'){

            $file=file_get_contents('upload/json/'.$path);

            $jsonFile=json_decode($file,true);

            $data=array();

            $_allowed=array('title','keywords', 'description','id_thuonghieu','mota','ten_cn','ten_jp','mota_jp','mota_cn','speeds','thuoctinh','mausac','name_jp');

            foreach($jsonFile['data'] as $key => $value){

                foreach($value as $k=> $v){
                    if(!in_array($k,$_allowed)){

                        $data[$k]=$v;

                    }
                   

                }

                $dataId=$this->_d->insert($table,$data);

                if(!$dataId){

                    print_r($this->_d->getLastError());
                    die;

                }

            }

           

            
        }

        public function dum($arr,$exit=false){

            echo '<pre>';

            var_dump($arr);

            echo '</pre>';

            if($exit) exit();

        }



        public function jsonDataPage($path='product.json',$table="baiviet"){
            global $lang;
            $list_product_json = $this->_d->get_result_array("select * from #_{$table}");
            $json_product['data'] = array();
            foreach ($list_product_json as $k => $v) {
                $json_product['data'][$k] = $v;
                // $cat_product_json = $this->_d->get_result_array("select * from #_baiviet_cat where hienthi=1 and id_list='".$v['id']."' order by stt asc,id desc");
                // foreach ($cat_product_json as $k1 => $v1) {
                //     $json_product['data'][$k]['cat'][$k1] =  $v1;                    
                //     $item_product_json = $this->_d->get_result_array("select * from #_baiviet_item where hienthi=1 and id_cat='".$v1['id']."' order by stt asc,id desc");
                //     foreach ($item_product_json as $k2 => $v2) {
                //         $json_product['data'][$k]['cat'][$k1]['item'][$k2] =  $v2;
                //     }
                // }
            }
            $path=_upload_json.$path;
            $file = @fopen($path, 'w+');
            $data = json_encode($json_product);
            fwrite($file, $data);

        }

        public function getAlias($pid,$table,$type){

            global $lang;
            
            $item=$this->_d->rawQueryOne("select tenkhongdau_$lang as alias from #_$table where hienthi=1 and id=? and type=? limit 1",array($pid,$type));
            return !empty($item) ? $item['alias'] : 'catalogy';
        }

        public function getTemplateList($arr){
            global $lang;
            $html='';
            foreach($arr as $k=>$v) {
                $alias_l=$this->getAlias($v['id_list'],'baiviet_list',$v['type']).'/';
                $html.='<div class="item10 col-3 w-50-m mb20">
                    <div class="border hover-shadown box-catology category-info">
                        <div class="image pd5 tf-hover o-hidden">
                            <a href="'.$v['type'].'/'.$alias_l.$v['tenkhongdau'].'"><img class="col-100 d-block" src="'._upload_baiviet_l.$v['photo'].'" alt="'.$v["ten_$lang"].'" '.$this->errorImg().'/></a>
                        </div>
                        <div class="title t-center"><h2><a href="'.$v['type'].'/'.$alias_l.$v['tenkhongdau'].'">'.$v["ten_$lang"].'</a></h2></div>
                    </div>
                </div>';
            }

            return $html;

        }

        public function getTemplateProduct($arr,$col='item10 col-3 w-50-m mb20',$resize='/430x420x1/'){
            global $lang;
            $html='';
            if(is_array($arr)){
                foreach($arr as $k=>$val){
                    $hidden=$val['giacu']==0 ? 'd-none' : '';
                    $giaban=($val['giaban']!=0) ? $this->changeMoney($val['giaban'],$lang) : 'Liên hệ';
                    $giacu=($val['giacu']!=0) ? $this->changeMoney($val['giacu'],$lang) : '';
                    $alias_l=$this->getAlias($val['id_list'],'baiviet_list',$val['type']);
                    $html.="<div class='".$col."'>
                            <a href='".$val['type'].'/'.$alias_l.'/'.$val['tenkhongdau']."' title='".$val['ten_'.$lang]."'>
                                <div class='box-product border pd5 hover-shadown p-relative'>
                                    <div class='mask-sale ".$hidden."'>
                                            ".$this->percentPrice($val['giacu'],$val['giaban'])."
                                    </div>
                                    <div class='thumb tf-hover o-hidden p-relative'>
                                        <img src='"._watermark.'/news'.$resize._upload_baiviet_l.$val['photo']."' alt='".$val['ten_'.$lang]."' ".$this->errorImg()."/>
                                        <div class='mask-code d-none'><span>".$val['masp']."</span></div>
                                        
                                    </div>
                                    <div class='desc-product pd10 t-center'>
                                        <div class='name'>
                                            <h3 class='line-2 mg0'>
                                            ".$val['ten_'.$lang]."
                                            </h3>
                                        </div>
                                        <div class='price-product'>
                                            <div class='d-flex justify-content-center align-items-center d-block-m'>
                                            <p class='price-new mg0i'>".$giaban."</p>
                                            <p class='price-old mg0i'>".$giacu."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ";
                }

            }
            return $html;

        }
        public function getTemplateAbout($arr,$col,$resize,$nameSection,$background){
            global $lang;
            $html = '';
            $html.='<section class="'.$nameSection.' fadeInDown wow" data-wow-offset="50" data-wow-duration="3" data-wow-delay="0.2s" style="background:url('._upload_hinhanh_l.$background["photo_$lang"].') center center/cover;">
                        <div class="grid wide">
                            <div class="row">
                            <div class="'.$col.'">
                                <div class="wrap-about__boxleft">
                                    <div class="wrap-about-boxleft__img hover-fade t-center">
                                        <img src="'.$resize.''._upload_hinhanh_l.$arr["photo"].'" alt="'.$arr["ten"].'" '.$this->errorImg().'>
                                    </div>
                                </div>
                            </div>
                            <div class="'.$col.'">
                                <div class="wrap-about__boxright">
                                    <div class="wrap-about__boxright-des">'.htmlspecialchars_decode($arr["mota"]).'</div>   
                                </div>
                            </div>
                            </div>
                        </div>
                    </section>';
            return $html;
        }

    }

?>