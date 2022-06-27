<?php 

    require_once 'ajaxConfig.php';


    $pid=isset($_POST['id']) ? addslashes($_POST['id']) : '';


    $product = $db->rawQueryOne("select ten_$lang as ten,photo,tenkhongdau_$lang as tenkhongdau,type from #_baiviet where type=? and id=? limit 0,1",array('san-pham',$pid));

    $func->viewAddFavor($pid);

    $result['countfavor'] = count($_SESSION['favor']);

    

    $output = '';

    $output.='<div class="dropdown__favor__box d-flex flex-wrap align-items-center" >
                <div class="dropdown__favor__img">
                    <a href="'.$product["type"].'/'.$product["tenkhongdau"].'"><img src="'._upload_baiviet_l.$product["photo"].'" alt=""></a>
                </div>
                <div class="dropdown__favor__content">
                    <a href="'.$product["type"].'/'.$product["tenkhongdau"].'"><span class="dropdown__favor-tittle">'.$product["ten"].'</span></a>
                </div>
            </div>';
    
    $result['html']= $output;

    $result['message'] = 'Bạn đã thích sản phẩm này!';

    echo json_encode($result);

?>