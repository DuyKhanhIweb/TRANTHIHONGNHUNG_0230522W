<?php
    require_once 'ajaxConfig.php';
    if($func->isAjax()){
        @$data=$_POST['data'];
        @$fullname = htmlspecialchars($data['fullname']);
        @$email = htmlspecialchars($data['email']);
        @$phone = htmlspecialchars($data['phone']);
        @$address = htmlspecialchars($data['address']);
        @$services = htmlspecialchars($data['services']);
        @$content = htmlspecialchars($data['content']);
        $checkEmail=$db->rawQuery("select id from #_booking where email=? and type=? limit 0,1",array($email,'dat-lich'));
        if(count($checkEmail)>0){
            $response['status']=201;
            $response['message']='Email của bạn đã có trong hệ thống!';
        }else{
            $send['ten_vi']=$fullname;
            $send['email']=$email;
            $send['dienthoai']=$phone;
            $send['diachi']=$address;
            $send['id_dichvu']=$address;
            $send['noidung']=$content;
            $send['type']='dat-lich';
            $send['ngaytao']=time();
            $send['hienthi']=1;
            $insert=$db->insert('booking',$send);
            if($insert){
                $response['status']=200;
                $response['message']='Thêm dữ liệu thành công';
            }else{
                $response['status']=201;
                $response['message']='Thêm dữ liệu không thành công';
            }
        }
        echo json_encode($response);
    }
?>