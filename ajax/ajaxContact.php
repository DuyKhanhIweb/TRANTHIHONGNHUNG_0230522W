<?php

    require_once 'ajaxConfig.php';

    if($func->isAjax()){
        $fullName=htmlspecialchars($_POST['_fn']);
        $email=htmlspecialchars($_POST['_el']);
        $phone=htmlspecialchars($_POST['_pn']);
        $subject=htmlspecialchars($_POST['_obj']);
        $capcha_code=htmlspecialchars($_POST['_capcha']);

        if($capcha_code==$_SESSION['captcha_code']){

            $send['fullname']=$fullName;

            $send['email']=$email;

            $send['phone']=$phone;

            $send['content']=$subject;

            $send['subject']='Liên hệ đến từ website';

            $send['hienthi']=1;

            $send['type']='contact';

            $send['createdAt']=time();

            $id_insert=$db->insert('contact',$send);

            if ($id_insert) {

                $result['status'] = 200;

                $result['error']='success';

                $result['message'] = 'Gửi thông tin thành công, Cảm ơn bạn đã quan tâm!!!';

            }else{

                    $result['status'] = 201;

                    $result['error']='error';

                    $result['message'] = 'Liên hệ thất bại';

            }

            // if($func->sendMailAjax($row_setting['email'],'Liên hệ đến từ website',$subject,array($row_setting['email'],$email),null,null)){
                
            //     if ($id_insert) {

            //         $result['status'] = 200;

            //         $result['error']='success';

            //         $result['message'] = 'Gửi thông tin thành công, Cảm ơn bạn đã quan tâm!!!';

            //     }
            // }else{

            //         $result['status'] = 201;

            //         $result['error']='error';

            //         $result['message'] = 'Liên hệ thất bại';

            // }
            

        }else{
            $result['status'] = 201;

            $result['error']='error';

            $result['message'] = 'Mã bảo mật không đúng!';
        }

        echo json_encode($result);
    }
    
?>