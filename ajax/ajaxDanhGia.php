<?php

    require_once 'ajaxConfig.php';

    if($func->isAjax()){

        @$fullname = htmlspecialchars($_POST['ten']);

        @$email = htmlspecialchars($_POST['email']);

        @$id = htmlspecialchars($_POST['id']);

        @$content = htmlspecialchars($_POST['noidung']);

        $checkEmail=$db->rawQuery("select id from #_booking where email=? and type=? limit 0,1",array($email,'danh-gia'));

        if(count($checkEmail)>0){

            $response['status']=201;

            $response['error']='error';

            $response['message']='Email của bạn đã có trong hệ thống!';

        }else{

            $data['ten_vi']=$fullname;

            $data['email']=$email;

            $data['id_product']=$id;

            $data['noidung']=$content;

            $data['type']='danh-gia';

            $data['ngaytao']=time();

            $data['hienthi']=1;

            $insert=$db->insert('booking',$data);

            if($insert){

                $response['status']=200;

                $response['error']='success';

                $response['message']='Nhận xét thành công, cảm ơn bạn đã quan tâm!';

            }else{

                $response['status']=201;

                $response['error']='error';

                $response['message']='Nhận xét không thành công!';

            }

        }

        echo json_encode($response);

    }

?>