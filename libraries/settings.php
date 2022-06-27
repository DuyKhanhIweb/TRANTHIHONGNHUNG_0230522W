<?php
    class settings{

        private $_d;

        private $_func;

        private $_table;

        private $_temp_table;

        public function __construct($db,$func,$table){

            $this->_d = $db;

            $this->_func = $func;

            $this->_table =$table;

        }
        public function getInfo(){

            global $type,$url_path, $item,$GLOBAL,$table;

            $table=$GLOBAL[$this->_table][$type];

            $sql = "select * from #_{$this->_table} limit 0,1";
           
            $item = $this->_d->rawQueryOne($sql);
        
        }
        public function saveInfo(){
           
            global $config,$url_path,$folder,$type,$GLOBAL,$table;

            $com=isset($_GET['com']) ? $_GET['com'] : '';

            $table=$GLOBAL[$this->_table][$type];

            $data=$_POST['data'];

            if($_POST){
                
                foreach($data as $k=>$v){

                   $send[$k]=htmlspecialchars($this->_func->magicQuote($v));
                    
                }
            }

            if(isset($data["analytics"])){
                $send["analytics"] = $data["analytics"];
            }

            if(isset($data["vchat"])){

                $send["vchat"] = $data["vchat"];

            }

            $send['slider_video'] = isset($_POST['slider_video']) ? 1 : 0;

            $file=$_FILES['file'];

            $file1=$_FILES['file1'];

            $file2=$_FILES['file2'];

            if(!empty($file)){

                if($file['error']==0){
                        
                    $photo = $this->_func->uploadImg(0,"photo","",$file,$folder,$this->_table,$table['img-width'],$table['img-height'],$table['img-ratio'],$table['img-b']);
                    
                    $send['photo'] = $photo['photo'];

                }
            }
            if(!empty($file1)){
               
                if($file1['error']==0){
                        
                    $photo = $this->_func->uploadImg(0,"bgtop","",$file1,$folder,$this->_table,$table['img-width'],$table['img-height'],$table['img-ratio'],$table['img-b']);
                    
                    $send['bgtop'] = $photo['bgtop'];

                }

            }
            if(!empty($file2)){
               
                if($file2['error']==0){
                        
                    $photo = $this->_func->uploadImg(0,"bgcontent","",$file2,$folder,$this->_table,$table['img-width'],$table['img-height'],$table['img-ratio'],$table['img-b']);
                    
                    $send['bgcontent'] = $photo['bgcontent'];

                }

            } 
            if(isset($GLOBAL['setting']['seo'])&&$GLOBAL['setting']['seo']==true){

                $dataSeo = (isset($_POST['dataseo'])) ? $_POST['dataseo'] : null;
                if($dataSeo)
                {
                    foreach($dataSeo as $column => $value)
                    {
                        $dataSeo[$column] = htmlspecialchars($value);
                    }
                }

            }
                
            $send['seo']=implode(',',$_POST['seo']);

            $send['ngaysua']=time();

            $updateData=$this->_d->update($this->_table,$send);
            
            if($updateData){

                if(isset($GLOBAL['setting']['seo'])&&$GLOBAL['setting']['seo']==true){
                    $this->_d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array(0,$com,'capnhat',$type));
                    $dataSeo['idmuc'] = 0;
                    $dataSeo['com'] = $com;
                    $dataSeo['act'] = 'capnhat';
                    $dataSeo['type'] = $type;
                    $this->_d->insert('seo',$dataSeo);
                }
               
                $response['status']=200;
                
                $response['message']="Cập nhật thông tin thành công";
                
                $message=base64_encode(json_encode($response));
                
                $this->_func->redirect("index.html?com={$this->_table}&act=capnhat{$url_path}&message={$message}");
            
            }else{
                
                $response['status']=201;
                
                $response['message']="Cập nhật thông tin không thành công";
                
                $message=base64_encode(json_encode($response));
                
                $this->_func->redirect("index.html?com={$this->_table}&act=capnhat{$url_path}&message={$message}");
            
            }
        }
    }
?>