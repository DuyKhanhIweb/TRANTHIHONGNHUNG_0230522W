<?php

    require_once 'ajaxConfig.php';

    $name = $_POST["name"];

    $email = $_POST["email"];

    $address = $_POST["address"];

    $phone = $_POST["phone"];

    $content = $_POST["content"];

    $idship = $_POST["payship"];

    $idpayment = $_POST["payment"];

    $total = $_POST["total"];

    $rows_htgh = $db->rawQueryOne("select id, ten_$lang as ten from #_baiviet where hienthi=1 and type=? and id=? limit 1",array('htgh',$idship));

	$rows_httt = $db->rawQueryOne("select id, ten_$lang as ten from #_baiviet where hienthi=1 and type=? and id=? limit 1",array('pttt',$idpayment));

?>
<div id="modal-contact" class="modal">
    <div class="modal-container" id="modal-container">
        <div class="modal-content">
            <div class="modal-header">
                <p class="title">XÁC NHẬN THANH TOÁN</p>
                <span class="close-modal"><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
            <div class="modal-body mt20 mb20">

                <div class="row">

                    <div class="item col-12">

                        <div class="t-center">

                            <div class="row0 d-flex flex-wrap">

                    <div class="item0 col-12">

                        <div class="wrap-modal__two-layer">

                            <div class="row0 d-flex flex-wrap">

                                <div class="item0 col-4 d-flex">

                                    <span class="modal-body__label flex-100">Họ tên:</span>

                                </div>

                                <div class="item0 col-8 d-flex">

                                    <span class="modal-body__content"><?=$name?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item0 col-12">

                        <div class="wrap-modal__two-layer">

                            <div class="row0 d-flex flex-wrap">

                                <div class="item0 col-4 d-flex">
                                    <span class="modal-body__label flex-100">Số điện thoại:</span>
                                </div>

                                <div class="item0 col-8 d-flex">
                                    <span class="modal-body__content"><?=$phone?></span>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item0 col-12">

                        <div class="wrap-modal__two-layer">

                            <div class="row0 d-flex flex-wrap">

                                <div class="item0 col-4 d-flex">

                                    <span class="modal-body__label flex-100">Email</span>

                                </div>

                                <div class="item0 col-8 d-flex">

                                    <span class="modal-body__content"><?=$email?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item0 col-12">

                        <div class="wrap-modal__two-layer">

                            <div class="row0 d-flex flex-wrap">

                                <div class="item0 col-4 d-flex">

                                    <span class="modal-body__label flex-100">Địa chỉ</span>

                                </div>

                                <div class="item0 col-8 d-flex">

                                    <span class="modal-body__content"><?=$address?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item0 col-12">

                        <div class="wrap-modal__two-layer">

                            <div class="row0 d-flex flex-wrap">

                                <div class="item0 col-4 d-flex">

                                    <span class="modal-body__label flex-100">Nội dung</span>

                                </div>

                                <div class="item0 col-8 d-flex">

                                    <span class="modal-body__content"><?=$content?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item0 col-12">

                        <div class="wrap-modal__two-layer">

                            <div class="row0 d-flex flex-wrap">

                                <div class="item0 col-4 d-flex">

                                    <span class="modal-body__label flex-100">Chi phí hàng hóa</span>

                                </div>

                                <div class="item0 col-8 d-flex">

                                    <span class="modal-body__content"><?=$total?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item0 col-12">

                        <div class="wrap-modal__two-layer">

                            <div class="row0 d-flex flex-wrap">

                                <div class="item0 col-4 d-flex">

                                    <span class="modal-body__label flex-100">Phí vận chuyển</span>

                                </div>

                                <div class="item0 col-8 d-flex">

                                    <span class="modal-body__content">Thỏa thuận</span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item0 col-12">

                        <div class="wrap-modal__two-layer">

                            <div class="row0 d-flex flex-wrap">

                                <div class="item0 col-4 d-flex">

                                    <span class="modal-body__label flex-100">Thành tiền</span>

                                </div>

                                <div class="item0 col-8 d-flex">

                                    <span class="modal-body__content modal-body__content-price"><?=$total?></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item0 col-12 mt10">

                        <span class="d-block modal-checkout__payship mb10" style="text-align:left;mb10"><i class="fa-solid fa-truck"></i> Phương thức giao hàng: <span><?=$rows_htgh["ten"]?></span> </span>

                        <span class="d-block modal-checkout__payment" style="text-align:left;"><i class="fa-solid fa-credit-card"></i> Phương thức thanh toán: <span><?=$rows_httt["ten"]?></span></span>

                    </div>

                </div>

                        </div>
                    
                    </div>

                </div>

            </div>

            <div class="modal-footer d-flex flex-wrap">

                <div class="btn-boking item col-6 w-100-m  pl0 pd-m-0">
                    <a href="javascript:void(0)" class="btn-taovandon close-modal cl-white">
                        TRỞ LẠI
                    </a>
                </div>

                <div class="btn-boking mb10 item col-6 w-100-m pr0 pd-m-0">
                    <a href="javascript:void(0)" class="btn-taovandon cl-white" id="checkout-modal__submit-form">
                        XÁC NHẬN
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>