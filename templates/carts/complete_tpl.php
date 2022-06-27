<?php

    if(isset($_GET["token"])){

        $token = json_decode(base64_decode($_GET["token"]));

?>

<section class="wrapper-checkout-complete">

    <div class="container">

        <div class="row10 d-flex flex-wrap">

            <div class="item10 col-12 w-100-m mb20 mt20">

                <div class="wrap__paymentstep">

                    <div class="row10 d-flex flex-wrap">

                        <div class="item10 col-4 <?php if($com=='carts' && $_GET["src"]=='gio-hang'){echo "bg-step__active";}?> d-none-m">

                            <a href="javascript:void(0)" class="wrap__paymentstep-links <?php if($com=='carts' && $_GET["src"]=='gio-hang'){echo "cl-white";}?>"><i class="fa-solid fa-cart-plus"></i> Giỏ hàng</a>

                        </div>

                        <div class="item10 col-4 <?php if($com=='carts' && $_GET["src"]=='thanh-toan'){echo "bg-step__active";}?> d-none-m">

                            <a href="javascript:void(0)" class="wrap__paymentstep-links <?php if($com=='carts' && $_GET["src"]=='thanh-toan'){echo "cl-white";}?>"><i class="fa-solid fa-money-check"></i> Giao hàng thanh toán</a>

                        </div>

                        <div class="item10 col-4 <?php if($com=='carts' && $_GET["src"]=='thanh-cong'){echo "bg-step__active";}?> w-100-m">

                            <a href="javascript:void(0)" class="wrap__paymentstep-links <?php if($com=='carts' && $_GET["src"]=='thanh-cong'){echo "cl-white";}?>"><i class="fa-solid fa-circle-check"></i> Hoàn tất</a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="item10 col-6 w-100-m mb-m-10">

                <div class="wrapper-checkout-complete__boxleft">

                    <span class="d-block hover-left t-center">

                        <img src="./assets/images/success.png" alt="Giỏ hàng thành công">

                    </span>

                </div>

            </div>

            <div class="item10 col-6 w-100-m">

                <div class="wrapper-checkout-complete__boxright">

                    <div class="wrapper-checkout-complete__boxright-alert mb20">

                        <span><i class="fa-solid fa-circle-check"></i> ĐẶT HÀNG THÀNH CÔNG</span>

                    </div>

                    <div class="wrapper-checkout-complete__boxright-top">

                        <span>Mã đơn hàng của bạn là: <span style="color:var(--html-bg-website);font-weight:bold;font-size:16px;">#<?=$token->code?></span> </span>

                        <span>Hiện tại đơn hàng đang được xử lý.</span>

                        <span>Thông tin chi tiết sẽ được gửi đến hộp thư của bạn: <b style="font-size:16px;color:var(--html-bg-website);"><?=$token->email?></b></span>


                    </div>

                    <div class="wrapper-checkout-complete__boxright-mid">

                        <span>Mọi thắc mắc xin vui lòng liên hệ</span>

                        <span>Hotline: <b><?=$row_setting["hotline"]?></b></span>

                        <span>Email: <b style="color:rgba(168, 141, 50)"><?=$row_setting["email"]?></b></span>

                        <p>Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn sẽ được xử lý trong thời gian sớm nhất <br> Chúng tôi sẽ liên hệ lại với bạn để xác nhận và yêu cầu giao hàng.</p>


                    </div>

                    <div class="wrapper-checkout-complete__boxright-bottom t-center mt20">

                        <a href="" class="wrapper-checkout-complete__boxright-bottom-btn">TIẾP TỤC MUA HÀNG <i class="fa-solid fa-angle-right"></i></a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php }else{ ?>

<section class="wrapper-checkout-complete">

    <div class="container">

        <div class="wrapper-checkout-complete-error bg-white pt20 pb20" style="border-top:3px solid var(--html-bg-website);border-radius:0.5rem;">

            <div class="row10 d-flex flex-wrap">

                <div class="item10 col-12 w-100-m t-center">

                    <p>Chưa có đơn hàng để thanh toán....</p>

                    <div class="wrapper-checkout-complete__boxright-bottom t-center mt20">

                        <a href="" class="wrapper-checkout-complete__boxright-bottom-btn">TIẾP TỤC MUA HÀNG <i class="fa-solid fa-angle-right"></i></a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php }?>

    

