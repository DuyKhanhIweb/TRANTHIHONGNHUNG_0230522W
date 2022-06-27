<?php

    require_once 'ajaxConfig.php';

    $productId = isset($_POST["pid"]) ? addslashes($_POST["pid"]) : '';

    $size = isset($_POST["size"]) ? addslashes($_POST["size"]) : '';

    $type = isset($_POST["type"]) ? addslashes($_POST["type"]): '';

    $price_color = $db->rawQueryOne("select giaban from #_attribute where hienthi=1 and id=? and id_product=? and type=? limit 0,1",array($size,$productId,$type));

    $totalPrice = $price_color["giaban"];

    $result["price-string"] = ($totalPrice>0) ? $func->changeMoney($totalPrice,$lang) : 'Liên hệ';

    echo json_encode($result);

?>