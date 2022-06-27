<?php
	class sitemap{

		private $_db;

		private $_func;

		private $_data;

		private $_lang='vi';

		private $_allowed=array('san-pham');

		public function __construct($db,$func,$lang,$data){

			$this->_db=$db;	

			$this->_func=$func;

			$this->_data=is_array($data) ? $data : null;

			$this->_lang=$lang;

			$this->getSitemap();

		}
		public function getSitemap(){

			header("Content-Type: application/xml; charset=utf-8"); 

			echo '<?xml version="1.0" encoding="UTF-8"?>'; 

			echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'; 

			self::urlElement('','1.0',time()); 

			foreach($this->_data as $k => $v){

				$priority = $v['field']=='id' ? "1.0" : "0.8";

				if($v['field']=='id'){

					self::urlElement($v['com'],$priority,time()); 

				}

				if($v['tbl']!='info' && $v['tbl']!='contact'){

					$this->CreateXML($v['tbl'],$v['type'],$priority);

				}

			}

			echo '</urlset>';

		}
		public function CreateXML($tbl='',$type='',$priority=1){

			global $lang;

			if(empty($tbl)) return false;

			if($tbl=='baiviet_list'){

				$items_l=$this->_db->rawQuery("SELECT tenkhongdau_$lang as alias,ngaytao,type from #_$tbl where hienthi=1 and type=? order by id desc",array($type));
				
				foreach($items_l as $kl => $vl){

					self::urlElement($vl['type'].'/'.$vl['alias'],$priority,$vl['ngaytao']);

				}

			}

			if($tbl=='baiviet_cat'){

				$items_c=$this->_db->rawQuery("SELECT id_list, tenkhongdau_$lang as alias,ngaytao,type from #_$tbl where hienthi=1 and type=? order by id desc",array($type));

				foreach($items_c as $kc => $vc){

					$alias=$this->getAlias($vc['id_list'],'baiviet_list',$vc['type']);

					self::urlElement($vc['type'].'/'.$alias.'/'.$vc['alias'],$priority,$vc['ngaytao']);

				}

			}

			if($tbl=='baiviet_item'){

				$items_i=$this->_db->rawQuery("SELECT id_list, tenkhongdau_$lang as alias,ngaytao,type from #_$tbl where hienthi=1 and type=? order by id desc",array($type));

				foreach($items_i as $ki => $vi){

					$alias=$this->getAlias($vi['id_list'],'baiviet_list',$vi['type']);

					self::urlElement($vi['type'].'/'.$alias.'/'.$vi['alias'],$priority,$vi['ngaytao']);

				}

			}

			if($tbl=='baiviet'){

				$items=$this->_db->rawQuery("SELECT id_list, tenkhongdau_$lang as alias,ngaytao,type from #_$tbl where hienthi=1 and type=? order by id desc",array($type));

				foreach($items as $k => $v){

					if(in_array($v['type'],$this->_allowed)){

						$alias=$this->getAlias($v['id_list'],'baiviet_list',$v['type']);

						self::urlElement($v['type'].'/'.$alias.'/'.$v['alias'],$priority,$v['ngaytao']);

					}else{

						self::urlElement($v['type'].'/'.$v['alias'],$priority,$v['ngaytao']);

					}

				}

			}

		}

		public function getAlias($pid,$tbl,$type){

			global $lang;

			$item=$this->_db->rawQueryOne("SELECT tenkhongdau_$lang as alias,ngaytao,type from #_$tbl where hienthi=1 and id=? and type=? order by id desc",array($pid,$type));

			return !empty($item) ? $item['alias'] : 'catalogy';

		}

		public static function urlElement($url,$pri,$time){

			global $https_config; 

			$url = $https_config.$url;

			$str='<url><loc>'.$url.'</loc><lastmod>'.date("c",$time).'</lastmod><changefreq>weekly</changefreq><priority>'.$pri.'</priority></url>';

			echo $str;

		}
		

	}
?>