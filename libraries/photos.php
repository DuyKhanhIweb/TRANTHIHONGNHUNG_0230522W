<?php
    class photos{

        private $_d;//kết nối database

        private $_func;//tất cả hàm được gọi để thực hiện chức năng cần thiết

        private $_com;//com của page

        private $_table;//bảng lưu dữ liệu

        private $_temp_table="baiviet_photo";

        public function __construct($db,$func,$com,$table,$temp_table){

            $this->_d=$db;

            $this->_func=$func;

            $this->_com=$com;

            $this->_table=$table;

            $this->_temp_table=$temp_table;

        }

        public function getMans(){

            global $type,$url_path, $items, $paging,$page;

            $perPage = 10;

            $startpoint = ($page * $perPage) - $perPage;
            
            $limit = ' limit '.$startpoint.','.$perPage;

            $where = '#_'.$this->_table;

            $where.=" where type='$type'";

            if($_GET['keyword']!='')
            {
                $keyword=   ($_GET['keyword']);
                
                $where.=" and ten_vi LIKE '%{$keyword}%'";
            }

            $where .=" order by stt asc, id desc";

            $sql = "select * from {$where} {$limit}";

            $items = $this->_d->rawQuery($sql);

            $url = $this->_func->getCurrentPageURLAdmin();

            $sql = "SELECT COUNT(*) as `numb` FROM {$where}";
            
            $count = $this->_d->rawQueryOne($sql);

            $total=$count['numb'];

            $paging = $this->_func->paginationAdmin($total,$perPage,$page,$url);
        }
        public function getMan(){

            global $type,$url_path, $item;

            $id = (int)($_GET['id']);
            $item = $this->_d->rawQueryOne("select * from #_{$this->_table} where id=?",array($id));
            if(empty($item)){
               
                $response['status']=201;
               
                $response['message']="Dữ liệu #id{$id} không có trong hệ thống ";
               
                $message=base64_encode(json_encode($response));
                
                $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
            
            }

            
        
        }

        public function saveMan(){
           
            global $config,$url_path,$folder,$type,$GLOBAL;

            $table=$GLOBAL[$this->_table][$type];

            $id = (int)$_GET['id'];

            $data=$_POST['data'];

            if($_POST){

                foreach($data as $k=>$v){

                    $send[$k]=htmlspecialchars($this->_func->magicQuote($v));
                    
                }
                
            }

            if($data['number']){

                $send['number']=str_replace(',','',$data['number']);

            }

            foreach ($config['lang'] as $k => $v){

                $file_name=$this->_func->imagesName($_FILES['file_'.$k]['name']);

                $file=$_FILES['file_'.$k];

                if(!empty($file)){

                    if($id){

                        if($file['error']==0){
                            
                            $photo = $this->_func->uploadImg($id,"photo_".$k,"thumb_".$k,$file,$folder,$this->_com,$table['img-width'],$table['img-height'],$table['img-ratio'],$table['img-b']);
                            
                            $send['photo_'.$k] = $photo['photo_'.$k];
                            
                            $send['thumb_'.$k] = $photo['thumb_'.$k];
                        }

                    }else{

                        if($file['error']==0){
                            
                            $photo = $this->_func->uploadImg(0,"photo_".$k,"thumb_".$k,$file,$folder,$this->_com,$table['img-width'],$table['img-height'],$table['img-ratio'],$table['img-b']);
                            
                            $send['photo_'.$k] = $photo['photo_'.$k];
                            
                            $send['thumb_'.$k] = $photo['thumb_'.$k];

                        }
                    }
                }
            }

            $send['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

            $savehere = (isset($_POST['save-here'])) ? true : false;

            if($id){

                $send['ngaysua']=time();

                $this->_d->where('id', $id);

                $updateData=$this->_d->update($this->_table,$send);

                if($updateData){
                  
                    if (!empty($_FILES['files']) && count($_FILES['files'])>0) {
                        
                        if (isset($_FILES['files'])) {
                            for($i=0;$i<count($_FILES['files']['name']);$i++){
                                if($_FILES['files']['name'][$i]!=''){
                                    $file['name'] = $_FILES['files']['name'][$i];
                                    $file['type'] = $_FILES['files']['type'][$i];
                                    $file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                                    $file['error'] = $_FILES['files']['error'][$i];
                                    $file['size'] = $_FILES['files']['size'][$i];
                                    $file_name = $this->_func->imagesName($_FILES['files']['name'][$i]);
                                    $photo = $this->_func->uploadPhoto($file, $table['multi-gallery-arr'][$type]['img_type_photo'], $folder,$file_name);
                                    $sendx['photo'] = $photo;
                                    $sendx['stt'] = (int)$_POST['stthinh'][$i];
                                    $sendx['type'] = $type;
                                    $sendx['id_baiviet'] = $id;
                                    $sendx['hienthi'] = 1;
                                    $this->_d->insert($this->_temp_table,$sendx);
                                }
                            }
                        }
                    }
                    $response['status']=200;
                    $response['message']="Cập nhật thông tin #id{$id} thành công";
                    $message=base64_encode(json_encode($response));
                    if($savehere) $this->_func->redirect("index.html?com={$this->_com}&act=edit{$url_path}&message={$message}");
                    else $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
                }else{
                    $response['status']=201;
                    $response['message']="Cập nhật thông tin #id{$id} không thành công";
                    $message=base64_encode(json_encode($response));
                    $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
                }
            }else{

                $send['ngaytao']=time();

                $send['type']=$type;
                $insertID=$this->_d->insert($this->_table,$send);
                if($insertID){
                    if (!empty($_FILES['files']) && count($_FILES['files'])>0) {
                        if (isset($_FILES['files'])) {
                            for($i=0;$i<count($_FILES['files']['name']);$i++){
                                if($_FILES['files']['name'][$i]!=''){
                                    $file['name'] = $_FILES['files']['name'][$i];
                                    $file['type'] = $_FILES['files']['type'][$i];
                                    $file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                                    $file['error'] = $_FILES['files']['error'][$i];
                                    $file['size'] = $_FILES['files']['size'][$i];
                                    $file_name = $this->_func->imagesName($_FILES['files']['name'][$i]);
                                    $photo = $this->_func->uploadPhoto($file, $table['multi-gallery-arr'][$type]['img_type_photo'], $folder,$file_name);
                                    $sendx['photo'] = $photo;
                                    $sendx['stt'] = (int)$_POST['stthinh'][$i];
                                    $sendx['type'] = $type;
                                    $sendx['id_baiviet'] = $insertID;
                                    $sendx['hienthi'] = 1;
                                    $this->_d->insert($this->_temp_table,$sendx);
                                }
                            }
                        }
                    }
                    $response['status']=200;
                    $response['message']="Thêm dữ liệu #id{$insertID} thành công";
                    $message=base64_encode(json_encode($response));
                    if($savehere) $this->_func->redirect("index.html?com={$this->_com}&act=edit&id={$insertID}{$url_path}&message={$message}");
                    else $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
                }else{
                    $response['status']=201;
                    $response['message']="Thêm dữ liệu #id{$insertID} không thành công";
                    $message=base64_encode(json_encode($response));
                    $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
                }
            }
        }
        public function deleteMan(){
            global $type,$lang,$url_path,$folder;
            if(isset($_GET['id'])){
                $id =  (int)$_GET['id'];
                $item=$this->_d->rawQueryOne("select id,photo_$lang as photo,thumb_$lang as thumb from #_{$this->_table} where id=?",array($id));
                if($item){
                    $this->_func->deleteLink($folder.$item['photo']);
                    $this->_func->deleteLink($folder.$item['thumb']);
                    $this->_d->where('id', $item['id']);
                    $this->_d->delete($this->_table);
                    $response['status']=200;
                    $response['message']="Xóa thông tin #id{$id} thành công";
                    $message=base64_encode(json_encode($response));
                    $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
                }else{
                    $response['status']=201;
                    $response['message']='Hệ thống đang gặp vấn đề, không thể xóa dữ liệu!';
                    $message=base64_encode(json_encode($response));
                    $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
                }
            } elseif (isset($_GET['listid'])==true){
        
                $listid = explode(",",$_GET['listid']);
                if(count($listid)){
                    foreach ($listid as $k => $v) {
                        $id=(int)$v;
                        $item=$this->_d->rawQueryOne("select id,photo_$lang as photo,thumb_$lang as thumb from #_{$this->_table} where id=?",array($id));
                        if($item){
                            $this->_func->deleteLink($folder.$item['photo']);
                            $this->_func->deleteLink($folder.$item['thumb']);
                            $this->_d->where('id', $item['id']);
                            $this->_d->delete($this->_table);
                        }
                    }
                    $response['status']=200;
                    $response['message']="Xóa thông tin thành công";
                    $message=base64_encode(json_encode($response));
                    $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
                }else{
                    $response['status']=200;
                    $response['message']='Không nhận được dữ liệu';
                    $message=base64_encode(json_encode($response));
                    $this->_func->redirect("index.html?com={$this->_com}&act=man{$url_path}&message={$message}");
                }
            }
        }

    }
?>