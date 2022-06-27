<?php

    require_once 'ajaxConfig.php';

    if($func->isAjax()){

        @$fullname = htmlspecialchars($_POST['fullname']);

        // @$email = htmlspecialchars($_POST['email']);

        @$phone = htmlspecialchars($_POST['phone']);

        // @$address = htmlspecialchars($_POST['address']);

        // @$content = htmlspecialchars($_POST['content']);

        $checkEmail=$db->rawQuery("select id from #_booking where dienthoai=? and type=? limit 0,1",array($email,'client'));

        if(count($checkEmail)>0){

            $response['status']=201;

            $response['error']='error';

            $response['message']='Số điện thoại đã tồn tại trong hệ thống !!!';

        }else{

            $data['ten_vi']=$fullname;

            // $data['email']=$email;

            $data['dienthoai']=$phone;

            // $data['noidung']=$content;

            // $data['diachi']=$address;

            $data['type']='client';

            $data['ngaytao']=time();

            $data['hienthi']=1;

            $insert=$db->insert('booking',$data);

            if($insert){

                $response['status']=200;

                $response['error']='success';

                $response['message']='Đăng ký thành công!!! cảm ơn bạn đã quan tâm';

            }else{

                $response['status']=201;

                $response['error']='error';

                $response['message']='Hệ thống lỗi đăng ký không thành công !!!!';

            }

        }

        echo json_encode($response);

    }

?>