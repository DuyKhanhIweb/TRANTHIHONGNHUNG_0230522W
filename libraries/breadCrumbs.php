<?php

class breadCrumbs{

	private $_d;

	private $_func;

	public function __construct($db,$func){

		$this->_d= $db;

		$this->_func = $func;

	}

	public function getUrl($title,$arr=array()){

		global $https_config,$lang;
		
		$breadcumb .='<ol id="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

		$breadcumb .='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="'.$https_config.'"><span itemprop="name">
		<i class="fa-solid fa-house" style="color:#fff;"></i></i><span class="hidden">'.$title.'</span></span></a>
		<meta itemprop="position" content="1" /></li>';

		$k = 1;

		for ($i=0; $i < count($arr); $i++) { 

			$type=$arr[$i]['type']!='' ? $arr[$i]['type'].'/' : '';

			if($k==3) $alias_l=$this->_func->getAlias($arr[$i]['id_list'],'baiviet_list',$arr[$i]['type']).'/';

			$breadcumb .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">

							<a itemprop="item" href="'.$https_config.$type.$alias_l.$arr[$i]['alias'].'">

								<span itemprop="name">'.$arr[$i]["name"].'</span>

							</a>

							<meta itemprop="position" content="'.($k+1).'" />

						</li>';

			$k++;

		}

	    

	    $breadcumb .='</ol>';

	    return $this->Minify_Html($breadcumb);



	}
	public function getUrlDetail($arr=array()){

		global $https_config,$lang,$row_setting;
		
		$breadcumb .='<ol id="breadcrumb" class="mg-0" itemscope itemtype="http://schema.org/BreadcrumbList">';

		$breadcumb .='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="'.$https_config.'"><span itemprop="name">'.$row_setting["name_$lang"].'</span></a>
		<meta itemprop="position" content="1" /></li>';

		$k = 1;

		for ($i=0; $i < count($arr); $i++) { 

			$breadcumb .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">

							<a itemprop="item" href="'.$https_config.$arr[$i]['alias'].'">

								<span itemprop="name">'.$arr[$i]["name"].'</span>

							</a>

							<meta itemprop="position" content="'.($k+1).'" />

						</li>';

			$k++;

		}

	    

	    $breadcumb .='</ol>';

	    return $this->Minify_Html($breadcumb);



	}

	static function Minify_Html($Html){

		$Search = array(

			'/(\n|^)(\x20+|\t)/',

			'/(\n|^)\/\/(.*?)(\n|$)/',

			'/\n/',

			'/\<\!--.*?-->/',

			'/(\x20+|\t)/',

			'/\>\s+\</',

			'/(\"|\')\s+\>/',

			'/=\s+(\"|\')/'

		);



		$Replace = array(

			"\n",

			"\n",

			" ",

			"",

			" ",

			"><",

			"$1>",

			"=$1"

		);

		$Html = preg_replace($Search,$Replace,$Html);

		return $Html;

	}

}

?>