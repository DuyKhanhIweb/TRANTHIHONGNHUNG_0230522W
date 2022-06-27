<?php

	$rows_htgh=$db->rawQuery("select id, ten_$lang,tenkhongdau_$lang as tenkhongdau,mota_$lang from #_baiviet where hienthi=1 and type=? order by stt asc,id desc",array('htgh'));


	$rows_httt=$db->rawQuery("select id, ten_$lang,tenkhongdau_$lang as tenkhongdau,mota_$lang,noidung_$lang from #_baiviet where hienthi=1 and type=? order by stt asc,id desc",array('pttt'));

?>
<section class="carts pt20 pb20 bg-bray">

	<div class="container">

	<?php if(count($_SESSION['cart'])==0){ ?>

		<div class="row d-flex flex-wrap ds-mobile">

            
			<div class="empty-cart pd20 col-9 t-center mt-10">

				<img src="images/mascot@2x.png" alt="i-web" class="empty__img">

				<p class="empty__note mt-10">Không có sản phẩm nào trong giỏ</p><a href="san-pham" class="empty__btn">Tiếp tục mua hàng</a>

			</div>


		</div>
			
		<?php }else{ ?>

		<form action="carts?src=thanh-toan" method="post" id="form-checkout" autocomplete="off" enctype="multipart/form-data" name="form-checkout">

			<div class="row10 d-flex flex-wrap">

				<div class="item10 col-12 w-100-m mb20 mt20">

					<div class="wrap__paymentstep">

						<div class="row10 d-flex flex-wrap">

							<div class="item10 col-4 <?php if($com=='carts' && $_GET["src"]=='gio-hang'){echo "bg-step__active";}?> d-none-m border-step-right">

								<a href="javascript:void(0)" class="wrap__paymentstep-links <?php if($com=='carts' && $_GET["src"]=='gio-hang'){echo "cl-white";}?>"><i class="fa-solid fa-cart-plus"></i> Giỏ hàng</a>

							</div>

							<div class="item10 col-4 <?php if($com=='carts' && $_GET["src"]=='thanh-toan'){echo "bg-step__active";}?> w-100-m border-step-right">

								<a href="javascript:void(0)" class="wrap__paymentstep-links <?php if($com=='carts' && $_GET["src"]=='thanh-toan'){echo "cl-white";}?>"><i class="fa-solid fa-money-check"></i> Giao hàng thanh toán</a>

							</div>

							<div class="item10 col-4 d-none-m">

								<a href="javascript:void(0)" class="wrap__paymentstep-links"><i class="fa-solid fa-circle-check"></i> Hoàn tất</a>

							</div>

						</div>

					</div>

				</div>

				<div class="item10 col-9 w-100-m">

					<div class="row10 d-flex flex-wrap">

						<div class="item10 col-6 w-100-m">

                            <div class="line-gradient"></div>

							<div class="bg-white pd20">

								<div class="row-input">

									<div class="wrap-input">

	                                    <input class="input wrap-input__checkout-name" required type="text" name="fullname" id="fullname" value="<?=$_SESSION['signin']['fullname']?>" placeholder="Họ và tên">

	                                </div>

								</div>

                                <div class="row-input">

                                    <div class="wrap-input">

                                         <input class="input wrap-input__checkout-email" type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" value="<?=$_SESSION['signin']['email']?>" placeholder="Email">

                                    </div>

                                </div>

								<div class="row-input">

									<div class="wrap-input">

										  <input class="input wrap-input__checkout-phone" required type="text" name="phone" id="phone" pattern="(0[3|5|7|8|9])+([0-9]{8})\b" data-validation="required" value="<?=$_SESSION['signin']['phone']?>" placeholder="Điện thoại">

									</div>

								</div>

								 <?php

	                                $result_city = $apiPlace->getPlace('place_citys',"id, name_$lang",'id asc');

	                                if($_SESSION['signin']['id_city']!=0){

	                                    $result_dist = $apiPlace->getFieldWhere('place_dists',$_SESSION['signin']['id_city'],"id, name_$lang as name,code",'id_city','numb asc, id desc');

	                                }

	                            ?>

	                            
	                            <div class="row-input">

	                                <div class="wrap-input">

	                                    <select class="input-select select wrap-input__checkout-city" required name="id_city" id="id_city"  onchange="onChangeSelect('#id_dist',{id:this.value, fs:'id,name_<?=$lang?> as name, code',fw:'id_city',t:'place/dists',tt:'Chọn quận huyện'})">

	                                        <option value=""><?=_chontinhthanh?></option>

	                                        <?php foreach($result_city as $k => $v){ ?>

	                                        	<option value="<?=$v['id']?>" <?=($v['id']==$_SESSION['signin']['id_city']) ? 'selected':''?>><?=$v['name_'.$lang]?></option>

	                                        <?php } ?>

	                                    </select>

	                                </div>

	                            </div>

	                            <div class="row-input">

	                                <div class="wrap-input">

	                                    <select class="input-select select wrap-input__checkout-dist" name="id_dist" id="id_dist" required>

	                                        <option value=""><?=_chonquanhuyen?></option>

	                                        <?php if(count($result_dist)>0) { foreach($result_dist as $k => $v){ ?>

	                                        <option value="<?=$v['id']?>" <?=($v['id']==$_SESSION['signin']['id_dist']) ? 'selected':''?>><?=$v['code']?> <?=$v['name']?></option>

	                                        <?php } } ?>

	                                    </select>

	                                </div>

	                            </div>

	                            <div class="row-input">

									<div class="wrap-input">

										 <input class="input wrap-input__checkout-address" type="text" name="address" id="address" required value="<?=$_SESSION['signin']['address']?>" placeholder="Địa chỉ">

									</div>

								</div>

								<div class="row-input">

                                    <div class="wrap-input">

                                        <textarea class="input h wrap-input__checkout-content" name="notes" required id="notes" rows="10" placeholder="Ghi chú"></textarea>

                                    </div>

                                </div>

	                        </div>

						</div>

						<div class="item10 col-6 w-100-m mt20i">

							<div class="line-gradient"></div>

							<div class="shadown--cart pd-checkout">

				                <div class="box-payments">

				                    <div class="box-payment-ship">

				                        <label class="lbl-payment">

				                            <i class="fa fa-question-circle" aria-hidden="true"></i> <?=_phuongthucgiaohang?>

				                        </label>

				                        <?php foreach ($rows_htgh as $key => $value){?>

				                        <div class="rd-giaohang tooltip-checkout p-relative">

				                            <label class="radio-item">

				                                <input type="radio" name="payship" class="wrap-input__checkout-payship"

				                                    <?php if($key==0) echo 'checked'?> value="<?=$value['id']?>" />

				                                <span class="rd-text"><?=$value["ten_$lang"]?></span>

				                            </label>

				                            <?php if(!empty($value["mota_$lang"])){?>

				                            <div class="show-hover-box <?=$key==0 ? 'active' : ''?>">

				                                <?=htmlspecialchars_decode($value["mota_$lang"])?>

				                            </div>

				                        	<?php }?>

				                        </div>

				                        <?php } ?>

				                    </div>

				                    <div class="box-payment-checkout mt10">

				                        <label class="lbl-payment">

				                            <i class="fa fa-question-circle" aria-hidden="true"></i> <?=_phuongthucthanhtoan?>

				                        </label>

				                        <?php foreach ($rows_httt as $key => $val){?>

				                        <div class="rd-giaohang tooltip-checkout p-relative">

				                            <label class="radio-item">

				                                <input type="radio" name="payment" class="wrap-input__checkout-payment" <?php if($key==0) echo 'checked'?>

				                                    value="<?=$val['id']?>"/>

				                                <span class="rd-text"><?=$val["ten_$lang"]?></span>

				                            </label>

				                            <?php if(!empty($val["noidung_$lang"])){?>

					                            <div class="show-hover-box">

					                                <?=htmlspecialchars_decode($val["noidung_$lang"])?>

					                            </div>

					                        <?php }?>

				                        </div>

				                        <?php } ?>

				                    </div>

				                </div>

				            </div>

						</div>

					</div>

				</div>

				<div class="item10 col-3 w-100-m mt20i">

					<div class="box-total-cart-price sticky-cart">

                        <div class="line-gradient"></div>

			            <div class="shadown--cart">

			                <ul class="prices__items">

			                    <li class="prices__item"><span class="prices__text"><?=_tamtinh?></span><span class="prices__value"><span id="js-price-temp"><?=$cart->numbMoney($cart->getTotalOrder(),' ₫')?></span></span>

			                    </li>

			                </ul>

			                <div class="prices__total">

			                    <span class="prices__text"><?=_thanhtien?></span>

			                    <span class="prices__value prices__value--final"><span id="js-total-cart"><?=$cart->numbMoney($cart->getTotalOrder(),' ₫')?></span><i>(Đã bao gồm VAT nếu có)</i>

			                    </span>

								<input type="hidden" id="js-total-cart-input" class="wrap-input__checkout-payment-total" value="<?=$cart->numbMoney($cart->getTotalOrder(),' ₫')?>">

			                </div>

			            </div>

			            <button type="button" class="cart__submit cs--btn-cart t-uppercase js-checkout__tpl"><?=_thanhtoan?></button>

			        </div>

				</div>

			</div>

		</form>

		<?php }?>

	</div>

</section>