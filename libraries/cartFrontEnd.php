<?php

    ini_set('max_execution_time', 3000000);

    class cartFrontEnd{

        private $d;

        private $table='baiviet';

        private $table_properties='baiviet_properties';

        private $name='cart';

        private $data;

        public function __construct($d){

            $this->d = $d;

        }

        public function addToCart($pid,$color=0,$size=0,$q=1){

            if($pid<1 or $q<1) return;

            $code = md5($pid.$color.$size);

            if(is_array($_SESSION[$this->name])){

                if($this->productExists($code,$q)) return;

                $max = count($_SESSION[$this->name]);

                $_SESSION[$this->name][$max]['productid']=$pid;

                $_SESSION[$this->name][$max]['qty']=$q;

                $_SESSION[$this->name][$max]['color']=$color;

                $_SESSION[$this->name][$max]['size']=$size;

                $_SESSION[$this->name][$max]['code']=$code;

                return count($_SESSION[$this->name]);	

            }else{

                $_SESSION[$this->name] = array();

                $_SESSION[$this->name][0]['productid']=$pid;

                $_SESSION[$this->name][0]['qty']=$q;

                $_SESSION[$this->name][0]['color']=$color;

                $_SESSION[$this->name][0]['size']=$size;

                $_SESSION[$this->name][0]['code']=$code;

                return count($_SESSION[$this->name]);	

            }

        }

        

        public function productExists($code,$q){

            $max=count($_SESSION[$this->name]);

            $flag=0;

            for($i=0;$i<$max;$i++){

                if($code==$_SESSION[$this->name][$i]['code']){

                    $_SESSION[$this->name][$i]['qty'] = $_SESSION[$this->name][$i]['qty'] + $q;

                    $flag=1;

                    break;

                }

            }

            return $flag;

        }



        public function getPriceProperties($pid,$code){

            $max=count($_SESSION[$this->name]);

            $price=0;

            for($i=0;$i<$max;$i++){

                if($code==$_SESSION[$this->name][$i]['code']){

                    if($_SESSION[$this->name][$i]['color']!=0){

                        $price = $this->getPropertiesName($_SESSION[$this->name][$i]['color'],'price');

                        if($price!=0){

                            $price = $price;

                        }else{

                            $price = $this->getPrice($pid);

                        }

                    }else{

                        $price = $this->getPrice($pid);

                    }

                    break;

                }

            }

            return $price;

        }





        public function updateQuality($code,$q){

            $max=count($_SESSION[$this->name]);

            $flag = 0;

            for($i=0;$i<$max;$i++){

                if($code==$_SESSION[$this->name][$i]['code']){

                    $_SESSION[$this->name][$i]['qty'] = $q;

                    $flag = 1;

                    break;

                }

            }

            return $flag;

        }



        public function removeProduct($code){

            $max=count($_SESSION[$this->name]);

            for($i=0;$i<$max;$i++){

                if($code==$_SESSION[$this->name][$i]['code']){

                    unset($_SESSION[$this->name][$i]);

                    break;

                }

            }

            $_SESSION[$this->name]=array_values($_SESSION[$this->name]);

        }



        public function getTotalQuality(){

            $max = count($_SESSION[$this->name]);

            $sum = 0;

            for($i=0;$i<$max;$i++){

                $q = $_SESSION[$this->name][$i]['qty'];

                $sum += $q;

            }

            return $sum;

        }

        public function getPrice($pid){

            $sql = "select giaban from #_".$this->table." where id='".$pid."'";

            $row = $this->d->rawQueryOne($sql);

            return $row['giaban'];

        }

        public function getTotalOrder(){

            $max=count($_SESSION[$this->name]);

            $sum=0;

            for($i=0;$i<$max;$i++){

                $pid = $_SESSION[$this->name][$i]['productid'];

                $code = $_SESSION[$this->name][$i]['code'];

                $q = $_SESSION[$this->name][$i]['qty'];

                $color = $_SESSION[$this->name][$i]['color'];

                $price = ($color!=0) ? $this->getPriceProperties($pid,$code):$this->getPrice($pid);

                $sum += $price*$q;

            }

            return $sum;

        }



        public function getProductImg($pid,$lang,$url,$config_url,$size){

            $sql = "select photo, ten_$lang as ten from #_".$this->table." where id='".$pid."'";

            $row = $this->d->rawQueryOne($sql);

            $hinhanh = $row['photo'];

            return '<img class="d-block" src="'.$config_url.$url.$hinhanh.'?v='.time().'" alt="'.$row['ten'].'" width="'.$size.'">';

        }

        public function getProduct($pid){

            $sql = "select * from #_".$this->table." where id='".$pid."'";

            $row = $this->d->rawQueryOne($sql);

            return $row;

        }

        public function getProductName($pid,$field){

            $sql = "select $field from #_".$this->table." where id='".$pid."'";

            $row = $this->d->rawQueryOne($sql);

            return $row[$field];

        }

        public function getPropertiesName($pid,$field){

            $sql = "select $field from #_".$this->table_properties." where id='".$pid."'";

            $row = $this->d->rawQueryOne($sql);

            return $row[$field];

        }



        public function getAlias($pid,$table,$type){

            global $lang;

            $item=$this->d->rawQueryOne("select tenkhongdau_$lang as alias from #_$table where hienthi=1 and id=? and type=? limit 1",array($pid,$type));

            return !empty($item) ? $item['alias'] : 'catalogy';

        }

        public function getTemplateCart_m($lang='vi'){



            global $https_config;



            $result=$this->getCart();



            if($result['count-cart']>0){



                $html='<div class="content-cart mt10">

                <div class="thead-cart pt20 pb20 bg-white bordered">

                    <div class="tr d-flex align-items-center">

                        <div class="td item col-10">

                            <label class="checker all">

                                <input type="checkbox" class="check--box">

                                <span class="checkbox-fake"></span>

                                <span class="label">Tất cả (<span id="total-product">'.$result["total-product"].'</span> sản phẩm)</span>

                            </label>

                        </div>

                        <div class="td item col-2 t-center">

                            <img id="deleteall" class="cs-pointer" src="assets/images/trash.svg" alt="deleted">

                        </div>

                    </div>

                </div>

                <div class="tbody body-cart pt20 pb20 mt10 bg-white bordered">';



                    for($i=0; $i<$result['count-cart']; $i++){



                    $pid=$result['cart'][$i]['productid'];

                    $qty=$result['cart'][$i]['qty'];

                    $code=$result['cart'][$i]['code'];

                    $price = $this->getPrice($pid);

                    $name = $this->getProductName($pid,'ten_'.$lang);

                    $alias = $this->getProductName($pid,'tenkhongdau_'.$lang);

                    $alias_l=$this->getAlias($this->getProductName($pid,'id_list'),'baiviet_list','san-pham');



                    $html.='<div class="border-bottom pt10 pb10">
                    
                    <div class="tr d-flex align-items-center pt10 pb10">

                        <div class="td item col-12 d-flex align-items-center">

                            <label class="checker check-o">

                                <input type="checkbox" class="check--box" value="'.$code.'">

                                <span class="checkbox-fake"></span>

                            </label>
                            <a class="cart-img" href="san-pham/'.$alias_l.'/'.$alias.'" title="'.$name.'">

                                '.$this->getProductImg($pid,$lang,_upload_baiviet_l,$config_url,60).'

                            </a>

                            <div class="name--cart">

                                <span>'.$name.'</span>

                            </div>

                        </div>

                    </div>
                    <div class="tr d-flex align-items-center mt10i">
                            <div class="td item col-5">

                                <div class="box-quality d-flex align-items-center">

                                    <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty) &amp; qty >1){result.value--;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}

                                    " class="btn btn-minus">-</button>

                                    <input type="number" id="qty'.$pid.'" class="input-quality" name="qty" value="'.$qty.'">

                                    <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty)){result.value++;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}" class="btn btn-plus">+</button>

                                </div>

                            </div>

                            <div class="td item t-center col-5">

                                <span>'.$this->numbMoney($price, '').' ₫ (x'.$qty.')</span>

                            </div>

                            <div class="td item col-2 t-center">

                                <img data-code="'.$code.'" class="delCart cs-pointer" src="assets/images/trash.svg" alt="deleted">

                            </div>

                    </div>
                </div>';

                    }

                $html.='</div></div>';

            }

            return $html;



        }
        public function getTemplateCart($lang='vi'){



            global $https_config;



            $result=$this->getCart();



            if($result['count-cart']>0){



                $html='<div class="content-cart mt10">

                <div class="thead-cart pt20 pb20 bg-white bordered">

                    <div class="tr d-flex align-items-center">

                        <div class="td item col-5">

                            <label class="checker all">

                                <input type="checkbox" class="check--box">

                                <span class="checkbox-fake"></span>

                                <span class="label">Tất cả (<span id="total-product">'.$result["total-product"].'</span> sản phẩm)</span>

                            </label>

                        </div>

                        <div class="td item col-2">

                            Đơn giá

                        </div>

                        <div class="td item col-2">

                            Số lượng

                        </div>

                        <div class="td item col-2">

                            Thành tiền

                        </div>

                        <div class="td item col-1 t-center">

                            <img id="deleteall" class="cs-pointer" src="assets/images/trash.svg" alt="deleted">

                        </div>

                    </div>

                </div>

                <div class="tbody body-cart pt20 pb20 mt10 bg-white bordered">';



                    for($i=0; $i<$result['count-cart']; $i++){



                    $pid=$result['cart'][$i]['productid'];

                    $qty=$result['cart'][$i]['qty'];

                    $code=$result['cart'][$i]['code'];

                    $price = $this->getPrice($pid);

                    $name = $this->getProductName($pid,'ten_'.$lang);

                    $alias = $this->getProductName($pid,'tenkhongdau_'.$lang);

                    $alias_l=$this->getAlias($this->getProductName($pid,'id_list'),'baiviet_list','san-pham');



                    $html.='<div class="tr d-flex align-items-center pt10 pb10 border-bottom">

                        <div class="td item col-5 d-flex align-items-center">

                            <label class="checker check-o">

                                <input type="checkbox" class="check--box" value="'.$code.'">

                                <span class="checkbox-fake"></span>

                            </label>

                            <a class="cart-img" href="san-pham/'.$alias_l.'/'.$alias.'" title="'.$name.'">

                                '.$this->getProductImg($pid,$lang,_upload_baiviet_l,$config_url,60).'

                            </a>

                            <div class="name--cart">

                                <span>'.$name.'</span>

                            </div>

                        </div>

                        <div class="td item col-2">

                            <span>'.$this->numbMoney($price, '').' ₫</span>

                        </div>

                        <div class="td item col-2">

                            <div class="box-quality d-flex align-items-center">

                                <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty) &amp; qty >1){result.value--;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}

                                " class="btn btn-minus">-</button>

                                <input type="number" id="qty'.$pid.'" class="input-quality" name="qty" value="'.$qty.'">

                                <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty)){result.value++;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}" class="btn btn-plus">+</button>

                            </div>

                        </div>

                        <div class="td item col-2">

                            <span class="cl-red">'.$this->numbMoney($price*$qty,'').' ₫</span>

                        </div>

                        <div class="td item col-1 t-center">

                            <img data-code="'.$code.'" class="delCart cs-pointer" src="assets/images/trash.svg" alt="deleted">

                        </div>

                    </div>';

                    }

                $html.='</div></div>';

            }

            return $html;



        }



        public function getTemplateCartP($lang='vi'){



            global $https_config;



            $result=$this->getCart();



            if($result['count-cart']>0){



                $html='<div id="popup">

                <div class="popup-element">

                    <div class="popup-dialog mx" style="max-width:900px">

                        <div class="popup-content p-relative">

                            <div class="popup-body">

                                <a class="close cs-pointer"><span>X</span></a>

                                <div class="body-mx mx">

                                    <h4 class="popup-title">Giỏ hàng</h4>

                                    <div class="content-cart mt10">

                                        <div class="thead-cart pt20 pb20 bg-white bordered">

                                            <div class="tr d-flex align-items-center">

                                                <div class="td item col-5">

                                                    <label class="checker all">

                                                        <input type="checkbox" class="check--box">

                                                        <span class="checkbox-fake"></span>

                                                        <span class="label">Tất cả (<span id="total-product">'.$result["total-product"].'</span> sản phẩm)</span>

                                                    </label>

                                                </div>

                                                <div class="td item col-2">

                                                    Đơn giá

                                                </div>

                                                <div class="td item col-2">

                                                    Số lượng

                                                </div>

                                                <div class="td item col-2">

                                                    Thành tiền

                                                </div>

                                                <div class="td item col-1 t-center">

                                                    <img id="deleteall" class="cs-pointer" src="assets/images/trash.svg" alt="deleted">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="tbody body-cart body-h pt20 pb20 mt10 bg-white bordered">';



                                            for($i=0; $i<$result['count-cart']; $i++){



                                            $pid=$result['cart'][$i]['productid'];

                                            $qty=$result['cart'][$i]['qty'];

                                            $code=$result['cart'][$i]['code'];

                                            $price = $this->getPrice($pid);

                                            $name = $this->getProductName($pid,'ten_'.$lang);

                                            $alias = $this->getProductName($pid,'tenkhongdau_'.$lang);

                                            $alias_l=$this->getAlias($this->getProductName($pid,'id_list'),'baiviet_list','san-pham');

                                            $html.='<div class="tr d-flex align-items-center pt10 pb10">

                                                <div class="td item col-5 d-flex align-items-center">

                                                    <label class="checker check-o">

                                                        <input type="checkbox" class="check--box" value="'.$code.'">

                                                        <span class="checkbox-fake"></span>

                                                    </label>

                                                    <a class="cart-img" href="san-pham/'.$alias_l.'/'.$alias.'" title="'.$name.'">

                                                        '.$this->getProductImg($pid,$lang,_upload_baiviet_l,$config_url,60).'

                                                    </a>

                                                    <div class="name--cart">

                                                        <span>'.$name.'</span>

                                                    </div>

                                                </div>

                                                <div class="td item col-2">

                                                    <span>'.$this->numbMoney($price, '').' ₫</span>

                                                </div>

                                                <div class="td item col-2">

                                                    <div class="box-quality d-flex align-items-center">

                                                        <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty) &amp; qty >1){result.value--;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}

                                                        " class="btn btn-minus">-</button>

                                                        <input type="number" id="qty'.$pid.'" class="input-quality" name="qty" value="'.$qty.'">

                                                        <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty)){result.value++;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}" class="btn btn-plus">+</button>

                                                    </div>

                                                </div>

                                                <div class="td item col-2">

                                                    <span class="cl-red">'.$this->numbMoney($price*$qty,'').' ₫</span>

                                                </div>

                                                <div class="td item col-1 t-center">

                                                    <img data-code="'.$code.'" class="delCart cs-pointer" src="assets/images/trash.svg" alt="deleted">

                                                </div>

                                            </div>';

                                            }

                                        $html.='</div>

                                        <div class="tfooter-cart pt20 pb20 mt10 bg-white bordered">

                                            <div class="tr d-flex align-items-center">

                                                <div class="td item col-7 d-flex justify-content-end">

                                                    <a class="btn-link-cart" href="carts?src=gio-hang" title="Vào giỏ hàng">Vào giỏ hàng <i class="fa fa-share" aria-hidden="true"></i></a>

                                                </div>

                                                <div class="td item col-2 d-flex justify-content-end">

                                                    Tổng giá:

                                                </div>

                                                <div class="td item col-3">

                                                    <span class="font-weight-bold cl-red font-2x"> <span id="total-price">'.$this->numbMoney($result['total-price'],'').' ₫</span></span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>          

                        </div>

                    </div>

                </div>

                <div class="popup-mask"></div>

                </div>';

            }

            return $html;



        }



        public function getTemplateCheckout($lang='vi'){



            global $https_config;



            $result=$this->getCart();



            if($result['count-cart']>0){

                $html='';

                for($i=0; $i<$result['count-cart']; $i++){



                    $pid=$result['cart'][$i]['productid'];

                    $qty=$result['cart'][$i]['qty'];

                    $code=$result['cart'][$i]['code'];

                    $price = $this->getPrice($pid);

                    $name = $this->getProductName($pid,'ten_'.$lang);

                    $alias = $this->getProductName($pid,'tenkhongdau_'.$lang);

                    $alias_l=$this->getAlias($this->getProductName($pid,'id_list'),'baiviet_list','san-pham');

                    $html.='<div class="tr d-flex align-items-center pt10 pb10 border-bottom">

                        <div class="td item col-5 d-flex align-items-center">

                            <label class="checker check-o">

                                <input type="checkbox" class="check--box" value="'.$code.'">

                                <span class="checkbox-fake"></span>

                            </label>

                            <a class="cart-img" href="san-pham/'.$alias_l.'/'.$alias.'" title="'.$name.'">

                                '.$this->getProductImg($pid,$lang,_upload_baiviet_l,$config_url,60).'

                            </a>

                            <div class="name--cart">

                                <span>'.$name.'</span>

                            </div>

                        </div>

                        <div class="td item col-2">

                            <span>'.$this->numbMoney($price, '').' ₫</span>

                        </div>

                        <div class="td item col-2">

                            <div class="box-quality d-flex align-items-center">

                                <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty) &amp; qty >1){result.value--;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}

                                " class="btn btn-minus">-</button>

                                <input type="number" id="qty'.$pid.'" class="input-quality" name="qty" value="'.$qty.'">

                                <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty)){result.value++;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}" class="btn btn-plus">+</button>

                            </div>

                        </div>

                        <div class="td item col-2">

                            <span class="cl-red">'.$this->numbMoney($price*$qty,'').' ₫</span>

                        </div>

                        <div class="td item col-1 t-center">

                            <img data-code="'.$code.'" class="delCart cs-pointer" src="assets/images/trash.svg" alt="deleted">

                        </div>

                    </div>';

                }

            }else{



                $html='<p class="t-center">Không có sản phẩm nào trong giỏ hàng!</p>';



            }

            return $html;



        }
        public function getTemplateCheckoutm($lang='vi'){



            
            global $https_config;



            $result=$this->getCart();



            if($result['count-cart']>0){



                    for($i=0; $i<$result['count-cart']; $i++){



                    $pid=$result['cart'][$i]['productid'];

                    $qty=$result['cart'][$i]['qty'];

                    $code=$result['cart'][$i]['code'];

                    $price = $this->getPrice($pid);

                    $name = $this->getProductName($pid,'ten_'.$lang);

                    $alias = $this->getProductName($pid,'tenkhongdau_'.$lang);

                    $alias_l=$this->getAlias($this->getProductName($pid,'id_list'),'baiviet_list','san-pham');



                    $html.='<div class="border-bottom pt10 pb10">
                    
                                <div class="tr d-flex align-items-center pt10 pb10">

                                    <div class="td item col-12 d-flex align-items-center">

                                        <label class="checker check-o">

                                            <input type="checkbox" class="check--box" value="'.$code.'">

                                            <span class="checkbox-fake"></span>

                                        </label>
                                        <a class="cart-img" href="san-pham/'.$alias_l.'/'.$alias.'" title="'.$name.'">

                                            '.$this->getProductImg($pid,$lang,_upload_baiviet_l,$config_url,60).'

                                        </a>

                                        <div class="name--cart">

                                            <span>'.$name.'</span>

                                        </div>

                                    </div>

                                </div>
                                <div class="tr d-flex align-items-center mt10i">
                                        <div class="td item col-5">

                                            <div class="box-quality d-flex align-items-center">

                                                <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty) &amp; qty >1){result.value--;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}

                                                " class="btn btn-minus">-</button>

                                                <input type="number" id="qty'.$pid.'" class="input-quality" name="qty" value="'.$qty.'">

                                                <button onclick="var result = document.getElementById(\'qty'.$pid.'\');var qty=result.value;if(!isNaN(qty)){result.value++;funcUpdateCart(\''.$code.'\',result.value,\''.$pid.'\');}else{return false}" class="btn btn-plus">+</button>

                                            </div>

                                        </div>

                                        <div class="td item t-center col-5">

                                            <span>'.$this->numbMoney($price, '').' ₫ (x'.$qty.')</span>

                                        </div>

                                        <div class="td item col-2 t-center">

                                            <img data-code="'.$code.'" class="delCart cs-pointer" src="assets/images/trash.svg" alt="deleted">

                                        </div>

                                </div>
                            </div>';

                    }
            }else{



                $html='<p class="t-center">Không có sản phẩm nào trong giỏ hàng!</p>';



            }

            return $html;



        }



        public function getCart(){



            $result['cart'] = $_SESSION['cart'];



            $result['count-cart'] = count($_SESSION['cart']);



            $result['total-price'] = $this->getTotalOrder();



            $result['total-product'] = $this->getTotalQuality();



            return $result;



        }

        

        public function numbMoney($val,$car='đ'){

            return number_format($val,0, ',', '.').''.$car;

        }

    }

?>