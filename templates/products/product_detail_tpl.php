<?php

	$des_chinhsach = $func->OneDataDes('desc-chinhsach','object');
	
	foreach($_SESSION['view'] as $key => $value){
		if(in_array($row_detail['id'],$_SESSION['view'])){
			$flag = 1;
			break;
		}
   }    
   if($flag == 0){
		array_push($_SESSION['view'],$row_detail['id']);
   }
?>

<style>

    ol#breadcrumb{

        margin: 0;

        margin-bottom: 15px;

    }

</style>

<section class="product-detail" id="detail-product">

	<div class="container">

		<form method="post" data-role="add-to-cart" enctype="multipart/form-data" onsubmit="return false" name="product-detail-<?=$row_detail['id']?>" id="product-detail-<?=$row_detail['id']?>">

            <input type="hidden" name="src" value="addCart">

            <input type="hidden" name="pid" value="<?=$row_detail['id']?>">

			<div class="row10 d-flex flex-wrap mt30">

				<div class="item10 col-12">

					<div class="breadcumb">

						<?=$str_breadcrumbs?>

					</div>

				</div>

			</div>

			<div class="row10 d-flex flex-wrap mt30">

				<div class="item10 col-9 w-100-m w-100-t">

				    <div class="row10 d-flex flex-wrap">

				       <div class="item10 col-5 w-100-m w-50-t">

				        	<div class="img-top">

	                            <a href="<?=_upload_baiviet_l.$row_detail['photo']?>" class="MagicZoom" id="Zoom-1" data-options="variableZoom: true;expand: on; hint: always; " >

	                                <img class="col-12" loading="lazy" src="thumbs/361x361x1/<?=_upload_baiviet_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>" style="width:100%;height: auto;aspect-ratio: 666 / 666;object-fit: cover;"/>

	                            </a>

	                        </div>

	                        <?php if(count($photos)>0){ ?>

	                        <div class="img-bottom">

	                            <div class="product-detail-slider owl-carousel owl-theme owl-carousel-loop in-home" data-height="575" data-dot="1" data-nav='0'

								data-loop='0' data-play='1' data-lg-items='4' data-md-items='4' data-sm-items='4' data-xs-items="4"

								data-margin='10'>

	                                <div class="items mb20"><div class="img"><a data-zoom-id="Zoom-1" href="<?=_upload_baiviet_l.$row_detail['photo']?>" data-image="thumbs/361x361x1/<?=_upload_baiviet_l.$row_detail['photo']?>"><img loading="lazy" <?= $func->errorImg() ?> src="<?=_upload_baiviet_l.$row_detail['thumb']?>" alt="<?=$row_detail['ten_'.$lang]?>"></a></div></div>

	                                <?php 
										foreach($photos as $k=>$v){  
									?>

	                                <div class="items mb20"><div class="img"><a data-zoom-id="Zoom-1" href="<?=_upload_baiviet_l.$v['photo']?>" data-image="thumbs/361x361x1/<?=_upload_baiviet_l.$v['photo']?>"><img loading="lazy" src="thumbs/361x361x1/<?=_upload_baiviet_l.$v['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>"></a></div></div>

	                                <?php } ?>

	                            </div>

	                        </div>

	                        <?php } ?>

				        </div>

						<div class="item10 col-7 w-100-m">

							<div class="row10">

								<div class="item10 col-12">

									<div class="box-detail box-detail--productdetail mt20i">

										<h1 class="mg0">

											<span><?=$row_detail['ten_'.$lang]?></span>

										</h1>

										<ul>

											<li style="">

												<div class="row10 d-flex">

													<div class="item10 col-12">

														<div class="row">

															<div class="item col-25 col-30-m"><span class="label__productdetails">Mã sản phẩm :</span></div>

															<div class="item col-75 col-70-m"><span class="desc-span"> <?=$row_detail['luotxem']?></span></span></div>

														</div>

													</div>

												</div>

											</li>

											<li style="">

												<div class="row10 d-flex">

													<div class="item10 col-12">

														<div class="row">

															<div class="item col-20 col-30-m"><span class="label__productdetails">Lượt xem :</span></div>

															<div class="item col-80 col-70-m"><span class="desc-span"> <?=$row_detail['luotxem']?></span></span></div>

														</div>

													</div>

												</div>

											</li>

											<li>

												<div class="row10 d-flex">

													<div class="item10 col-12">

														<div class="row">

															<div class="item col-20 col-30-m"><span class="label__productdetails label__productdetails--tinhtrang">Tình trạng :</span></div>

															<div class="item col-80 col-70-m"><span class="desc-span"><?=($row_detail["id_loai"]==1)? 'Còn hàng':'Tạm hết hàng';?></span></div>

														</div>

													</div>

												</div>

											</li>
											<li>

												<div class="row10 d-flex">

													<div class="item10 col-12 w-100-m">

														<div class="row align-items-center">

															<div class="item col-20 col-30-m"><span class="label__productdetails label__productdetails--modifiers" >Giá:</span></div>

															<div class="item col-80 col-70-m">
																
																<span class="price-new-product" id="view-price-detail"><?php if($row_detail["giaban"]!=0 && $row_detail["giacu"]!=0){ ?><del class="mr10"><?=$func->changeMoney($row_detail["giacu"],$lang);?></del><?php }?> <?=($row_detail['giaban']!=0) ? $func->changeMoney($row_detail['giaban'],$lang) : 'Liên hệ'?>
																
																	<?php
																		if($func->percentPrice($row_detail["giacu"],$row_detail["giaban"])>0){
																	?>
																		<span class="pro-sale">- <?=$func->percentPrice($row_detail["giacu"],$row_detail["giaban"])?></span>

																	<?php }?>

																</span>
													
															</div>

														</div>					

													</div>

												</div>

											</li>
											
											<?php if($config['cart-advance']){?>

												<li>

													<div class="bg-cart-fix center">

														<div class="">

															<div class="row align-items-center">

																<div class="item col-20 col-30-m"><div><span class="label__productdetails">Số lượng:</span> </div></div>

																	<div class="item col-80 col-70-m">
																		
																			<div class="mr10">

																<span class="inline-block">

																<div class="wrap_qty">

																	<span class="down" onclick="var result=document.getElementById('qty'); var qty=result.value; if(!isNaN(qty) && qty>1){result.value--}else{return false;} var btncart = document.querySelector('.js-addcart');
																		btncart.setAttribute('data-qty',result.value);">-</span>

																	<input type="text" class="input-text qty" name="quality" id="qty" value="1"

																		title="Số lượng" maxlength="6" min="1">

																	<span class="up" onclick="var result=document.getElementById('qty'); var qty=result.value; if(!isNaN(qty)){result.value++}else{return false;} var btncart = document.querySelector('.js-addcart');
																		btncart.setAttribute('data-qty',result.value);">+</span>

																</div>

																</span>

															</div>
															
																	</div>

																</div>

														</div>

													</div>

												</li>
												<li>

													<div class="row10 d-flex align-items-center" style="gap:1rem">

														<div class="item10 col-6">

															<a class="button-view__details button-view__details--addcart btn-addcart" data-el="#product-detail-<?=$row_detail['id']?>" data-qty="1" data-id="<?=$row_detail["id"]?>">
																<?=_themvaogio?> <i class="ml5 fa-solid fa-cart-shopping"></i>
															</a>

														</div>

														<div class="item10 col-6">

															<a href="carts?src=thanh-toan" data-el="#product-detail-<?=$row_detail['id']?>"  class="button-view__details btn-buynow">
																<?=_muangay?> <i class="ml5 fa-solid fa-cart-shopping"></i>
															</a>

														</div>

													</div>

												</li>

											<?php }?>

											<li style="border:0;">
												<?php include_once _source.'shareLinks.php'?>
											</li>

										</ul>

									</div>

								</div>

							</div>

						</div>

				    </div>

				</div>

				<?php  include _layouts.'left.php'; ?>

			</div>

		</form>

	</div>

</section>

<section class="wrapper-content__detail mt30 mb30">

	<div class="grid wide">
		
		<div class="row">

			<div class="col l-12 m-12 c-12">

				<div class="box-des-details mt-30">  

					<div class="tab">

						<button class="tablinks active" data-target="ThongTinSanPham">Thông tin sản phẩm</button>

						<button class="tablinks" data-target="BinhLuan">Bình luận</button>

					</div>

					<div id="ThongTinSanPham" class="tabcontent">
						
						<div class="wrapper-toc">

							<div class="content descript">
								
								<?php if($row_detail['noidung_'.$lang]!=''){ ?>

								<?= htmlspecialchars_decode($row_detail['noidung_'.$lang])?>

								<?php }else{ ?>

								<p class="t-center">Nội dung đang được cập nhật....</p>

								<?php }?>

							</div>

						</div>

					</div>

					<div id="BinhLuan" class="tabcontent">	

						<div class="fb-comments"data-href="<?= $func->getCurrentPageURL() ?>"data-width="100%" data-numposts="5"></div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>

<?php if(count($tintuc)>0){ ?>

<section class="section-other bg-white clearfix">

	<div class="container">

	    <div class="row">

	        <div class="col l-12 m-12 c-12">

				 <div class="sc-products__title">

                    <a href="javascript:void(0)" rel="dofollow" title="Sản phẩm cùng loại" class="sc-products__title-name"> 
                        
                        <span>SẢN PHẨM CÙNG LOẠI</span>

                    </a>

                </div>

	            <div class="box-other o-hidden mt20">

	                <div class="owl-carousel owl-theme owl-carousel-loop quick-slide"

				        data-height="575" data-dot="1" data-nav='0'

				        data-loop='0' data-play='1' data-lg-items='4' data-md-items='3' data-sm-items='3' data-xs-items="2" data-deplay="4000"

				        <?php if($deviceType=="computer"){ ?> data-margin='20' <?php }else{ ?> data-margin='8' <?php }?>>

						<?php foreach($tintuc as $key => $val){

							$photosrelated = $db->rawQueryOne("select id,photo from #_baiviet_photo where type=? and id_baiviet=? order by stt asc, id desc",array($val["type"],$val["id"]));

							?>

							<div class="pt10 pb10" <?php if($deviceType=="computer"){ ?> data-parallax='{"x": 0, "y": 20, "rotateZ":0}' <?php }?>>

								<div class="wrap-productshot__boxbc d-flex flex-column p-relative mb30">
																		
									<div class="wrap-productshot__boxbc-outline"></div>

									<div class="wrap-productshot__boxbc-img p-relative">

										<a href="<?=$val["type"]?>/<?=$alias_l.$val["tenkhongdau"]?>" title="<?=$val["ten_$lang"]?>" rel="dofollow" class="d-block hover-left">

											<img loading=lazy src="<?=_upload_baiviet_l.$val["photo"]?>" alt="<?=$val["ten_$lang"]?>" <?=$func->errorImg()?>>

											<?php if($photosrelated){ ?>

												<div class="sup-img">

													<img loading="lazy" src="<?=_upload_baiviet_l.$photosrelated["photo"]?>" alt="<?=$val["ten_$lang"]?>" <?=$func->errorImg()?>>

												</div>

											<?php }?>

											<?php if($func->percentPrice($val["giacu"],$val["giaban"])>0){ ?>

												<span class="label-sale__products">-<?=$func->percentPrice($val["giacu"],$val["giaban"])?></span>

											<?php }?>

										</a>

										<a class="fa-transition fa-transition-view fa-transition--modifier" rel="dofollow" href="<?=$val["type"]?>/<?=$alias_l.$val["tenkhongdau"]?>" title="<?=$val["ten_$lang"]?>">
											<i class="fa-light fa-eye"></i>
										</a>

										<a class="fa-transition fa-transition-addcart fa-transition--modifier fa-transition--changewidth js-addcart" data-id="<?=$val["id"]?>" data-qty="1">
											<i class="fa-light fa-cart-shopping"></i><span></span>
										</a>

									</div>

									<div class="wrap-productshot__boxbc-content d-flex flex-column">

										<h6 class="line-2 wrap-productshot__boxbc-content-titles wrap-productshot__boxbc-content-titles--productdetail">

											<a href="<?=$val["type"]?>/<?=$alias_l.$val["tenkhongdau"]?>" title="<?=$val["ten_$lang"]?>" rel="dofollow"><?=$val["ten_$lang"]?></a>

										</h6>

										<div class="wrap-productshot__boxbc-content-asideprice d-flex flex-wrap">

											<?php if($val["giaban"]!=0){ ?>

											<del class="wrap-productshot__boxbc-content-priceold col-6 t-left  mt10"><?=($val["giacu"]!=0) ? $func->changeMoney($val["giacu"],$lang):'';?></del>

											<?php }?>

											<span class="wrap-productshot__boxbc-content-price col-6 t-right  mt10"><?=($val["giaban"]!=0) ? $func->changeMoney($val["giaban"],$lang):'Liên hệ';?></span>

										</div>

									</div>
									
								</div>

							</div>
							
						<?php }?>

				    </div>

	            </div>

	        </div>

	    </div>

	</div>

</section>

<?php }?>

<script type="text/javascript">
    var buttons = document.getElementsByClassName('tablinks');
    var contents = document.getElementsByClassName('tabcontent');
    function showContent(id){
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = 'none';
        }
        var content = document.getElementById(id);
        content.style.display = 'block';
    }
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function(){
            var id = this.getAttribute('data-target');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove("active");
            }
            this.className += " active";
            showContent(id);
        });
    }
    showContent('ThongTinSanPham');
</script>