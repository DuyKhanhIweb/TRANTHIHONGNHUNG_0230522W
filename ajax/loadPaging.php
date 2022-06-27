<?php

    require_once 'ajaxConfig.php';

	$type=isset($_POST['type']) ? htmlspecialchars($_POST['type']): '';

	$table=isset($_POST['table']) ? htmlspecialchars($_POST['table']): '';

    $item=isset($_POST['item']) ? htmlspecialchars($_POST['item']): '';

	$p=isset($_POST['p']) ? htmlspecialchars($_POST['p']): '';

    $page=$p+1;

    $pagenext=$page+1;

	$startpointNext = ($pagenext * $item) - $item;

	$startpoint=($page * $item) - $item;

	$itemDouble = $item * 2;


    $items = $db->rawQuery("select * from #_$table where hienthi=1 and type=? order by stt asc limit $startpoint,$itemDouble",array($type));
    $itemsNext= $db->rawQuery("select * from #_$table where hienthi=1 and type=? order by stt asc limit $startpointNext,$itemDouble",array($type));
    
    $result['count-list']=count($itemsNext);

    $output = '';

		foreach($items as $key=>$vvd){

		$output .= '<div class="col l-4 m-6 c-12 mb20 mb-t-16 mb-m-8 d-flex flex-column">

                <div class="wrap-videos__box d-flex flex-column">

                    <div class="wrap-videos__img p-relative">

                        <a href="'.$vvd["links"].'" title="'.$vvd["ten_$lang"].'" data-fancybox="video" class="d-block hover-left">

                            <img src="'._upload_hinhanh_l.$vvd["photo"].'" alt="'.$vvd["ten_$lang"].'" '.$func->errorImg().'>

                        </a>

                        <span class="wrap-videos__img-play">

                            <i class="fa-solid fa-play"></i>

                        </span>

                    </div>

                    <div class="wrap-videos__detail d-flex flex-column">

                        <h3 class="wrap-videos__detail-titles line-2">

                            <a href="'.$vvd["links"].'" title="'.$vvd["ten_$lang"].'" data-fancybox="video" class="wrap-videos__detail-links">'.$vvd["ten_$lang"].'</a>

                        </h3>

                    </div>

                </div>

            </div>';
		}
		$result["html"] = $output;

		echo json_encode($result);
?>
