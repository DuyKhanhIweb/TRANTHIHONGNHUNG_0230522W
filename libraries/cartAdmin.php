<?php
    class cartAdmin{
        
        private $_d;

        private $_func;

        private $_com;

        private $_oDetail='order_detail';

        public function __construct($db,$func,$com){

            $this->_d=$db;

            $this->_func=$func;

            $this->_com=$com;

        }

        public function getMans(){

            global $type,$url_path, $items, $paging,$page;

            if(!empty($_POST)){

                $multi=$_REQUEST['multi'];

                $id_array=$_POST['iddel'];

                $count=count($id_array);	

                if($multi=='del'){

                    for($i=0;$i<$count;$i++){

                        $sql = "delete from #_order_detail where id_order 	='".$id_array[$i]."'";
                        
                        $this->_d->rawQuery($sql);
                
                        $sql = "delete from table_order where id = '".$id_array[$i]."'";
                       
                        $this->_d->rawQuery($sql) or die("Not query sqlUPDATE_ORDER");			
                                    
                    }
                    
                    $response['status']=200;

                    $response['message']="Xóa dữ liệu thành công!";

                    $message=base64_encode(json_encode($response));

                    $this->_func->redirect("index.php?com={$this->_com}&act=man{$url_path}&message={$message}");			
                }		
            }

            $perPage = 10;

            $startpoint = ($page * $perPage) - $perPage;
            
            $limit = ' limit '.$startpoint.','.$perPage;

            $where = '#_'.$this->_com;

            $where.=" where id<>0";

            if($_GET['loai']==1){

                if($_GET['code']!=''){

                    $where.=" and code = '{$_GET['code']}'";

                }

                if($_GET['hoten']!=''){

                    $where.=" and fullname = '{$_GET['hoten']}'";

                }

                if($_GET['phone']!=''){

                    $where.=" and phone = '{$_GET['phone']}'";

                }

            }elseif($_GET['loai']==2){

                if($_GET['code']!=''){

                    $where.=" and code = '{$_GET['code']}'";

                }

                if($_GET['hoten']!=''){

                    $where.=" and hoten = '{$_GET['hoten']}'";

                }

                if($_GET['phone']!=''){

                    $where.=" and phone = '{$_GET['phone']}'";

                }

                if($_GET['order_status']!=''){

                    $where.=" and order_status = '{$_GET['order_status']}'";

                }

                if($_GET['ngaybd']!=''){

                    $ngaybd = strtotime(str_replace('/','-',$_REQUEST['ngaybd']).' 00:00');

                    $where.=" and ngaybd = '{$ngaybd}'";

                }

                if($_GET['ngaykt']!=''){

                    $ngaykt = strtotime(str_replace('/','-',$_REQUEST['ngaykt']).' 23:59');

                    $where.=" and ngaykt = '{$ngaykt}'";

                }

                if($_GET['giatu']!=''){

                    $giatu = str_replace(',','',$_GET['giatu']);

                    $where .= " and tonggia >= '$giatu'";

                }
                if($_GET['giaden']!=''){

                    $giaden = str_replace(',','',$_GET['giaden']);

                    $where .= " and tonggia <= '$giaden'";

                }


            }else{

                if($_GET['order_status']!='' && $_GET['order_status']!=0){

                    $trangthai = $_GET['order_status'];	
                    
                    $where .= " and trangthai='$trangthai'";
                    
                }

            }

            $where .=" order by id desc";

            $sql = "select * from {$where} {$limit}";

            $items = $this->_d->rawQuery($sql);

            $url = "index.php?com={$this->_com}&act=man{$url_path}";

            $sql = "SELECT COUNT(*) as `num` FROM {$where}";
            
            $count = $this->_d->rawQueryOne($sql);

            $total=$count['num'];

            $paging = $this->_func->pagination($total,$perPage,$page,$url);
        }

        public function getMan(){

            global $url_path, $item,$cartOrder;

            $id = (int)($_GET['id']);

            if(!$id){
               
                $response['status']=201;
               
                $response['message']="Dữ liệu #id{$id} không có trong hệ thống ";
               
                $message=base64_encode(json_encode($response));
                
                $this->_func->redirect("index.php?com={$this->_com}&act=man{$url_path}&message={$message}");
            
            }

            $sql = "select * from #_{$this->_com} where id='{$id}'";

            $this->_func->updateOrder($this->_com,$id);

            $item = $this->_d->rawQueryOne($sql);

            $cartOrder=$this->_d->rawQuery("select * from #_{$this->_oDetail} where id_order = '".$item['id']."'");	
        
        }

        public function saveMan(){
           
            global $config,$url_path;

            $id = (int)$_GET['id'];

            $data=$_POST['data'];

            if($_POST){

                foreach($data as $k=>$v){

                  $send[$k]=htmlspecialchars($this->_func->magicQuote($v));
                    
                }
                
            }

            if($id){

                $this->_d->where('id', $id);

                $updateData=$this->_d->update($this->_com,$send);

                if($updateData){

                    $response['status']=200;

                    $response['message']="Cập nhật thông tin #id{$id} thành công";

                    $message=base64_encode(json_encode($response));

                    $this->_func->redirect("index.php?com={$this->_com}&act=man{$url_path}&message={$message}");
                
                }else{
                    $response['status']=201;

                    $response['message']="Cập nhật thông tin #id{$id} không thành công";

                    $message=base64_encode(json_encode($response));

                    $this->_func->redirect("index.php?com={$this->_com}&act=man{$url_path}&message={$message}");
                
                }
            }
        }
        public function deleteMan(){

            global $url_path;
        
            if(isset($_GET['id'])){

                $id =  (int)$_GET['id'];

                $item=$this->_d->rawQueryOne("select id from #_{$this->_com} where id=?",array($id));

                if($item){

                    $items  =  $this->_d->rawQuery("select id from #_order_detail where id_order=?",array($id));

                    if($items){

                        $this->_d->where('id_order', $id);

                        $this->_d->delete('order_detail');

                    }

                    $items_r  =  $this->_d->rawQuery("select id from #_order_returns where id_order=?",array($id));

                    if($items_r){

                        $this->_d->where('id_order', $id);

                        $this->_d->delete('order_returns');

                    }

                    $this->_d->where('id',$item['id']);

                    $this->_d->delete($this->_com);

                    $response['status']=200;

                    $response['message']="Xóa thông tin #id{$id} thành công";

                    $message=base64_encode(json_encode($response));

                    $this->_func->redirect("index.php?com={$this->_com}&act=man{$url_path}&message={$message}");
                
                }else{
                   
                    $response['status']=201;

                    $response['message']='Hệ thống đang gặp vấn đề, không thể xóa dữ liệu!';
                    
                    $message=base64_encode(json_encode($response));
                    
                    $this->_func->redirect("index.php?com={$this->_com}&act=man{$url_path}&message={$message}");
                
                }
            }elseif (isset($_GET['listid'])){
        
                $listid = explode(",",$_GET['listid']);

                if(count($listid)){

                    $result['message'] = 'Đã xóa dữ liệu thành công id#';

                    foreach ($listid as $k => $v) {

                        $id = (int)$v;

                        $items  =  $this->_d->rawQuery("select id from #_order_detail where id_order=?",array($id));

                        if($items){

                            $this->_d->where('id_order', $id);

                            $this->_d->delete('order_detail');

                        }

                        $items_r  =  $this->_d->rawQuery("select id from #_order_returns where id_order=?",array($id));

                        if($items_r){

                            $this->_d->where('id_order', $id);

                            $this->_d->delete('order_returns');

                        }

                        $item  =  $this->_d->rawQueryOne("select id from #_order where id=?",array($id));

                        if($item){

                            $this->_d->where('id', $item['id']);

                            $this->_d->delete('order');

                            $result['message'] .= $id.',';

                        }
                    }

                    $result['message'] = substr($result['message'], 0, -1);

                    $result['status'] = 200;

                    $message = base64_encode(json_encode($result));

                    $this->_func->redirect("index.php?com={$this->_com}&act=man{$url_path}&message={$message}");

                }else{

                    $response['status']=201;

                    $response['message']='Hệ thống đang gặp vấn đề, không thể xóa dữ liệu!';

                    $message=base64_encode(json_encode($response));

                    $this->_func->redirect("index.php?com={$this->_com}&act=man{$url_path}&message={$message}");
                    
                }

            }
        }

    }
?>