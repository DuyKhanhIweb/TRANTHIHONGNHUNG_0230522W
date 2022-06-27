<?php 

    require_once 'ajaxConfig.php';


    $pid=isset($_POST['pid']) ? addslashes($_POST['pid']) : '';



    $qty=isset($_POST['quality']) ? addslashes($_POST['quality']) : '';



    $color=isset($_POST['color']) ? addslashes($_POST['color']) : '';

    

    $size=isset($_POST['size']) ? addslashes($_POST['size']) : '';



    $code=md5($pid.$color.$size);


    $cart->addToCart($pid,$color,$size,$qty);



    $result['cart']=$_SESSION['cart'];



    $result['count-cart']=count($_SESSION['cart']);



    $result['total-product']=$cart->getTotalQuality();



    $result['total-price']=$cart->getTotalOrder();
    

    $result['price-string']=$cart->numbMoney($cart->getTotalOrder(),' ₫');



    $result['html']=$cart->getTemplateCartP($lang);



    $result['url']='carts?src=thanh-toan';



    echo json_encode($result);

?>