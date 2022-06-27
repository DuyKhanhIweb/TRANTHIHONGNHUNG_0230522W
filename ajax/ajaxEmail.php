<?php
        require_once 'ajaxConfig.php';
        @$email = htmlspecialchars($_POST['email']);
        $checkEmail=$db->rawQueryOne("select id from #_booking where dienthoai=? and type=? limit 0,1",array($email,'client'));
        
        if($checkEmail>0){
            $response['status']=400;
            $response['message']='Số điện thoại của bạn đã tồn tại trong hệ thống';
        }else{
            $data['dienthoai']=$email;
            $data['type']='goi-lai';
            $data['ngaytao']=time();
            $data['hienthi']=1;
            $insert=$db->insert('booking',$data);
            
            if($insert){

                $response['status']=200;
                $response['message']='Gửi yêu cầu thành công, cảm ơn bạn đã quan tâm!';

            }else{

                $response['status']=201;
                $response['message']='Gửi không thành công!';

            }
        }

        echo json_encode($response);
?>