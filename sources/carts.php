
<?php
	/*
	link carts _ROOT.carts?src=gio-hang
	link checkout _ROOT.carts?src=thanh-toan
	*/
	if($func->isAjax()){

		$src=isset($_POST['src']) ? addslashes($_POST['src']) : '';

		switch ($src){

			case 'addCart':

				$pid=isset($_POST['pid']) ? addslashes($_POST['pid']) : '';

				$qty=isset($_POST['quality']) ? addslashes($_POST['quality']) : '';

				$color=isset($_POST['color']) ? addslashes($_POST['color']) : '';
				
				$size=isset($_POST['size']) ? addslashes($_POST['size']) : '';

				$cid = isset($_POST['color']) ? addslashes($_POST['color']) : 0;

				$sid = isset($_POST['size']) ? addslashes($_POST['size']) : 0;

				$code=md5($pid.$color.$size);

				$check_status = true;

				if($color!=''){

					if($color==0){

						$check_status=false;
						
						$result["status"] = 201;

						$result["message"] = "Bạn chưa lựa chọn màu sắc sản phẩm";

					}
				}
				if($size!=''){

					if($size==0){

						$check_status=false;

						$result["status"] = 201;

						$result["message"] = "Bạn chưa lựa chọn kích thước sản phẩm!";


					}
				}
				if($check_status == true){
				
					$cart->addToCart($pid,$cid,$sid,$qty);

					$result['cart']=$_SESSION['cart'];

					$result['count-cart']=count($_SESSION['cart']);

					$result['total-product']=$cart->getTotalQuality();

					$result['total-price']=$cart->getTotalOrder();

					$result['price-string']=$cart->numbMoney($cart->getTotalOrder(),' ₫');

					$result['html']=$cart->getTemplateCartP($lang);

					$result["status"] = 200;

					$result['url']='carts?src=thanh-toan';

				}

				echo json_encode($result);

				break;

			case 'updateCart':

				$code = (string)$_POST['code'];

                $qty = (string)$_POST['qty'];

                $pid = (int)$_POST['pid'];

                $cart->updateQuality($code,$qty);

				$result['total-product']=$cart->getTotalQuality();

				$result['total-price']=$cart->getTotalOrder();

				$result['price-string']=$cart->numbMoney($cart->getTotalOrder(),' ₫');

				if($deviceType=="computer"){

					$result['html']=$cart->getTemplateCheckout();

				}else{
					$result['html']=$cart->getTemplateCheckoutm();
				}

                echo json_encode($result);

				break;

			case 'updateSize':

					$code = (string)$_POST['code'];
	
					$qty = (string)$_POST['qty'];
	
					$pid = (int)$_POST['pid'];

					$size  = (int)$_POST["size"];
	
					$cart->UpdateSize($pid,$code,$size);
	
					$result['total-product']=$cart->getTotalQuality();
	
					$result['total-price']=$cart->getTotalOrder();
	
					$result['price-string']=$cart->numbMoney($cart->getTotalOrder(),' ₫');
	
					if($deviceType=="computer"){
	
						$result['html']=$cart->getTemplateCheckout();
	
					}else{
						$result['html']=$cart->getTemplateCheckoutm();
					}
	
					echo json_encode($result);
	
					break;

			case 'updateColor':

				$code = (string)$_POST['code'];

				$qty = (string)$_POST['qty'];

				$pid = (int)$_POST['pid'];

				$color  = (int)$_POST["color"];

				$cart->updateColor($code,$color);

				$result['total-product']=$cart->getTotalQuality();

				$result['total-price']=$cart->getTotalOrder();

				$result['price-string']=$cart->numbMoney($cart->getTotalOrder(),' ₫');

				if($deviceType=="computer"){

					$result['html']=$cart->getTemplateCheckout();

				}else{
					$result['html']=$cart->getTemplateCheckoutm();
				}

				echo json_encode($result);

				break;

			case 'deleteAll':

				$code=explode(',',$_POST['code']);

				foreach($code as $k => $v){

					$cart->removeProduct($v);

				}

				$result['count-cart']=count($_SESSION['cart']);

				$result['total-product']=$cart->getTotalQuality();

				$result['total-price']=$cart->getTotalOrder();

				$result['price-string']=$cart->numbMoney($cart->getTotalOrder(),' ₫');

				if($deviceType=="computer"){

					$result['html']=$cart->getTemplateCheckout();

				}else{
					$result['html']=$cart->getTemplateCheckoutm();
				}

				$result['url']='san-pham';

				echo json_encode($result);

				break;

			case 'deleteCart':

				$code = (string)$_POST['code'];

				$cart->removeProduct($code);

				$result['count-cart']=count($_SESSION['cart']);

				$result['total-product']=$cart->getTotalQuality();

				$result['total-price']=$cart->getTotalOrder();

				$result['price-string']=$cart->numbMoney($cart->getTotalOrder(),' ₫');

				if($deviceType=="computer"){

					$result['html']=$cart->getTemplateCheckout();

				}else{
					$result['html']=$cart->getTemplateCheckoutm();
				}

				$result['url']='san-pham';

                echo json_encode($result);
                
				break;

			case 'loadCart':
				$result['count-cart']=count($_SESSION['cart']);
                $result['html']=$cart->getTemplateCartP($lang);
                $result['url']='san-pham';
                echo json_encode($result);
                break;

			case 'couponCart':
				$dis = (int)htmlspecialchars($_POST['dis']);
                $check = (int)htmlspecialchars($_POST['check']);
                $coupon = htmlspecialchars($_POST['coupon']);
                $coupon_time = strtotime(date('d-m-Y'));
                if($dis==1){
                    $result['total-price'] = $cart->getTotalOrder();
                    $result['percents-price'] = 0;
                    $result['percents-price-string'] = $func->changeMoney(0,$lang);
                    $result['price-all'] = $cart->getTotalOrder();
                    $result['price-all-string'] = $func->changeMoney($result['price-all'],$lang);
                    unset($_SESSION['coupon']);
                    $result['status'] = 202;
                    $result['message'] = _thong_bao_xoa_ma_giam_gia_thanh_cong;
                }else{
                    $result['total-price'] = $cart->getTotalOrder();
                    $coupon_item  =  $d->rawQueryOne("select * from #_coupons where code=? and start_date<=? and end_date>=? and qty>0 and price_start<=? and price_end>? and find_in_set ('hienthi',status)",array($coupon,$coupon_time,$coupon_time,$result['total-price'],$result['total-price']));
                    if(!empty($coupon_item)){
                        $result['status'] = 200;
                        $result['percents'] = $coupon_item['percents'];
                        
                        $result['percents-price'] = round($coupon_item['percents']*$cart->getTotalOrder()/100);
                        $result['percents-price-string'] = $func->changeMoney($result['percents-price'],$lang);
                        $result['price-all'] = $cart->getTotalOrder()-$result['percents-price'];
                        $result['price-all-string'] = $func->changeMoney($result['price-all'],$lang);
                        if($check==0){
                            $_SESSION['coupon']['percents'] = $result['percents'];
                            $_SESSION['coupon']['percents-price'] = $result['percents-price'];
                            $_SESSION['coupon']['price-all'] = $result['price-all']; 
                            $_SESSION['coupon']['code'] = $coupon_item['code'];
                        }
                        $result['message'] = _thong_bao_su_dung_ma_giam_gia;
                    }else{
                        $result['percents-price'] = 0;
                        $result['percents-price-string'] = $func->changeMoney(0,$lang);
                        $result['price-all'] = $cart->getTotalOrder();
                        $result['price-all-string'] = $func->changeMoney($result['price-all'],$lang);
                        $result['status'] = 201;
                        $result['message'] = _thong_bao_su_dung_ma_giam_gia_qua_han;
                        if($check==0){
                            unset($_SESSION['coupon']);
                        }
                    }
                }

                echo json_encode($result);
                break;

			default:

				break;

		}

	}else{

		$src=isset($_REQUEST['src']) ? addslashes($_REQUEST['src']) : '';

		if($src=='thanh-toan'){

			if(!empty($_POST)){
				$order_n = 'DHW'.date('dmY');
                $order_new = $db->rawQueryOne("select id,code from #_orders where code like '$order_n%' order by id desc limit 0,1");
                if(empty($order_new['id'])){ $order_rand = 1001; }else{ $order_rand =  substr($order_new['code'],10)+1; }
                $order_code = 'DHW'.$order_rand.'_'.date('dmY');
                $data = array();
                $post = $_POST;
                if($post){
                    foreach ($post as $k => $v) {
                        if(!empty($post[$k])){
                            $data[$k] = htmlspecialchars($v);
                        }
                    }
                }
                if($_SESSION['coupon']){
                    $data['sale_off'] = $_SESSION['coupon']['percents-price'];
                    $data['coupon_percent'] = $_SESSION['coupon']['percents'];
                    $data['total_price'] = $_SESSION['coupon']['price-all'];
                }else{
                    $data['total_price'] = $cart->getTotalOrder();
                }

                $data['code'] = $order_code;
                $data['order_status'] = 1;
                $data['status'] = 'hienthi';
                $data['createdAt'] = $db->now();
                $data['type'] = 'don-hang';
                $city = $apiPlace->getPlaceId('id','place_citys',$data['id_city'],"id, name_$lang as name");
                $dist = $apiPlace->getPlaceId('id','place_dists',$data['id_dist'],"id, name_$lang as name");

				$body='<table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px" width="100%">
				  <tbody>
				    <tr>
				      <td align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
				      <table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="700">
				        <tbody>
				          <tr style="background:#fff">
				            <td align="left" height="auto" style="padding:15px" width="600">
				            <table>
				              <tbody>
				                <tr>
				                  <td>
				                  <h1 style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">Kính gửi quý khách hàng</h1>
				                  
				                  <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Trân trọng cám ơn Quý khách đã tin tưởng và sử dụng dịch vụ của '.$row_setting["name_".$lang].'</p>
				                  <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Đơn hàng của Quý khách đã được cập nhật.</p>
				                  <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Nhân viên '.$row_setting["name_".$lang].' sẽ liên lạc với quý khách để tư vấn thêm và xác nhận đơn hàng.</p>
				                  
				                  <p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Thông tin đơn hàng số: <span style="font-size:12px;color:#777;text-transform:none;font-weight:600">'.$order_code.'</span></p>
				                  </td>
				                </tr>
				                <tr>
				                  <td>
				                  <h2 style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:#02acea">CHI TIẾT ĐƠN HÀNG</h2>

				                  <table border="0" cellpadding="0" cellspacing="0" style="background:#f5f5f5" width="100%">';
				                  if(is_array($_SESSION['cart'])){
				                    $body.='<thead>
				                      <tr>
				                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">STT</th>
				                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Tên sản phẩm</th>
				                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Hình ảnh</th>
				                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Số lượng</th>
				                        <th align="left" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Đơn giá</th>
				                        <th align="right" bgcolor="#02acea" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">Tổng tạm</th>
				                      </tr>
				                    </thead>
				                    <tbody bgcolor="#eee"style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px"> ';
				                    $max=count($_SESSION['cart']);
				                    
									for($i=0;$i<$max;$i++){
										$_pid=$_SESSION['cart'][$i]['productid'];
				                        $_q=$_SESSION['cart'][$i]['qty'];
										$titleColor="";
										$titleSize = "";
				                        $_color = $_SESSION['cart'][$i]['color'];
				                        $_size = $_SESSION['cart'][$i]['size'];
				                        $_code=$_SESSION['cart'][$i]['code'];
				                        $_name = $cart->getProductName($_pid,'ten_'.$lang);
				                        $_alias = $cart->getProductName($_pid,'tenkhongdau_'.$lang);
				                        $_n_color = $cart->getPropertiesName($_color,'ten_'.$lang);
				                        $_n_size = $cart->getPropertiesName($_size,'ten_'.$lang);

										

										// $_pcolor = $cart->getPropertiesName($_color,'giaban');

										$_psize = $cart->getPropertiesName($_size,'giaban');

				                        $_title = $_name;

										$_price = 0;

				                        if($_color!=0){
				                            $titleColor .= ' - '.$_n_color;
				                        }
				                        if($_size!=0){
				                            $titleSize .= ' - Size '.$_n_size;
											$_price += (int) $_psize;
				                        }
										if($_size == 0){
											$_price += $cart->getPrice($_pid);
										}

				                        if($_q==0) continue;
										$k=$i+1;
										$body.='<tr>
											<td align="left" style="padding:3px 9px" valign="top"><span>'.$k.'</span></td>
											<td width="35%" align="left" style="padding:3px 9px" valign="top">
											<span>'.$_title.'</span>
											</td> 
											<td align="left" style="padding:3px 9px" valign="top"><span>
												'.$cart->getProductImg($_pid,$lang,_upload_baiviet_l,$https_config,50).'
											</span><br>
											</td>
											<td align="center" style="padding:3px 9px" valign="top"><span>'.$_q.'</span></td>
											<td align="left" style="padding:3px 9px" valign="top"><span>'.$func->changeMoney($_price,$lang).'</span></td>
											<td align="right" style="padding:3px 9px" valign="top"><span>'.$func->changeMoney($_price*$q,$lang).'</span></td>
											</tr>';
			                      	}
			                      	$body.='</tbody>';

				                  }else{
				                    $body.='<tr bgColor="#FFFFFF"><td>Không có sản phẩm nào trong giỏ hàng!</td>';
				                  }
				                    $body.='<tfoot style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">                     <tr>
				                        <td align="right" colspan="5" style="padding:5px 9px">Tạm tính</td>
				                        <td align="right" style="padding:5px 9px"><span>'.$func->changeMoney($cart->getTotalOrder(),$lang).'</span></td>
									  </tr>
				                    <tr bgcolor="#eee">
				                        <td align="right" colspan="5" style="padding:7px 9px"><strong><big>Tổng giá trị đơn hàng</big> </strong></td>
				                        <td align="right" style="padding:7px 9px"><strong><big><span>'.$func->changeMoney($cart->getTotalOrder(),$lang).'</span> </big> </strong></td>
				                      </tr>
				                    </tfoot>
				                  </table>
				                  </td>
				                </tr>
				                <tr>
				                  <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
				                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
				                    <thead>
				                      <tr>
				                        <th align="left" style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">Thông tin người đặt</th>
				                        <th align="left" style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">Thông tin người nhận </th>
				                      </tr>
				                    </thead>
				                    <tbody>
				                      <tr>
				                        <td style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:capitalize">'.$data['fullname'].'</span><br>
				                        <a href="mailto:'.$data['email'].'" target="_blank">'.$data['email'].'</a><br>
				                        '.$city["name"].'<br>
				                        '.$dist['name'].'<br>
				                        '.$data['address'].'<br>
				                        '.$$data['notes'].'</td>
				                      </tr>
				                    </tbody>
				                  </table>
				                  </td>
				                </tr>
				                <tr>
								<td><p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Trường hợp quý khách có những băn khoăn về đơn hàng, có thể xem thêm mục <a href="'.$https_config.'/cau-hoi-thuong-gap" title="Các câu hỏi thường gặp" target="_blank"> <strong>các câu hỏi thường gặp</strong>.</a></p>
											
									<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;border:1px #14ade5 dashed;padding:5px;list-style-type:none">Chúng tôi sẽ liên hệ trong trường hợp đơn hàng có thể bị trễ hoặc không liên hệ giao hàng được.</p>
											
									<p style="margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">Bạn cần được hỗ trợ ngay? Chỉ cần email <a href="mailto:'.$row_setting['email'].'" style="color:#099202;text-decoration:none" target="_blank"> <strong>'.$row_setting['email'].'</strong> </a>, hoặc gọi số điện thoại <strong style="color:#099202">'.$row_setting['dienthoai'].'</strong> (8-21h cả T7,CN). Đội ngũ chăm sóc luôn sẵn sàng hỗ trợ bạn bất kì lúc nào.</p>
									</td>
								</tr>
				                <tr>
				                  <td>&nbsp;
				                  <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">Một lần nữa '.$row_setting['website'].' cảm ơn quý khách đã tin tưởng và sử dụng sản phẩm của chúng tôi trong thời gian qua.</p>
				                  </td>
				                </tr>
				              </tbody>
				            </table>
				            </td>
				          </tr>
				        </tbody>
				      </table>
				      </td>
				    </tr>
				  </tbody>
				</table>';
				 
				$data['body_carts'] = htmlspecialchars($body);
                $data['body_codes'] = base64_encode($data['code']);
                $id_insert = $db->insert('order', $data);

                if ($id_insert) {
                    if(count($_SESSION['cart'])>0){
                        foreach ($_SESSION['cart'] as $k => $v) {

							

							$_psizeDetail = $cart->getPropertiesName($v["size"],'giaban');
							$_priceDetail = 0;

							if($v["size"] !=0 && $v["size"] !='' ){
								$_priceDetail += (int) $_psizeDetail;
							}else{
								$_priceDetail = $cart->getPrice($v['productid']);
							}

                            $color_name = $cart->getPropertiesName($v['color'],'ten_'.$lang);
                            $size_name = $cart->getPropertiesName($v['size'],'ten_'.$lang);
                            $product = $func->getFieldId($v['productid'],'baiviet');
                            $data_order['code'] = $product['code'];
                            $data_order['name'] = $product['ten_'.$lang];
                            $data_order['id_product'] = $product['id'];
                            $data_order['price'] = $_priceDetail;
                            $data_order['color'] = $v['color'];
                            $data_order['color_name'] = $color_name;
                            $data_order['size'] = $v['size'];
                            $data_order['size_name'] = $size_name;
                            $data_order['qty'] = $v['qty'];
                            $data_order['createdAt'] = $db->now();
                            $data_order['id_order'] = $id_insert;
                            $id_order = $db->insert('order_detail', $data_order);
                        }
                    }

                    if($_SESSION['coupon']){
                        $db->rawQuery("update #_coupons set qty=qty-1 where code=?",array($_SESSION['coupon']['code']));
                    }
                    $result['status'] = 200;
                    $result['message'] = 'Thêm dữ liệu thành công'.' id#'.$id_insert;
                    $message = base64_encode(json_encode($result));
                    $mail_send = array();
                    $mail_send[0] = $row_setting['email'];
                    $mail_send[1] = $post['email'];

                    if(isset($post['other_address'])){
                        $mail_send[2] = $post['email_other'];
						
                    }

					unset($_SESSION['cart']);

					unset($_SESSION['coupon']);

					$array_list=array(

						'code' => $order_code,

						'email' => $post["email"]

					);

					$func->transfer('Thông báo!, Đặt hàng thành công!!!.', $https_config.'carts?src=thanh-cong&token='.base64_encode(json_encode($array_list)));
					
                    // if($func->sendMailIndex($row_setting['email'],'Thông báo đơn hàng'.' ['.$order_code.']',$body,$mail_send,null,null)){

                    //     unset($_SESSION['cart']);
                    //     unset($_SESSION['coupon']);
					// 	$func->transfer('Thông báo!, Đặt hàng thành công!!!.', $config_base);
                    // }else{

                    //     $func->transfer('Thông báo!, Hệ thống gửi đơn hàng lỗi.', $config_base.'carts?src=gio-hang');
                    // }

                }else{
                    print_r($db->getLastError());
                    die;
                }
			}

		}elseif($src=='xac-nhan'){
            $code = base64_decode(htmlspecialchars($_GET['code']));
            $order_confirm = $d->rawQueryOne("select body_carts,body_checks,id from #_orders where code = '".$code."' order by id desc limit 0,1");
            if(!empty($_POST)){
                $check['body_checks'] = (int)$_POST['ok'];
                $d->where('id', (int)$_POST['id']);
                if ($d->update('orders', $check)) {
                    $func->redirect($https_config);
                }
            }
        }

	}


?>