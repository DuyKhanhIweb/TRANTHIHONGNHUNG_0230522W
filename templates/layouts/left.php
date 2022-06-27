<?php 

    $contactDetail = $func->OneDataDes('desc-detail','object'); // Mô tả liên hệ đặt hàng

    $shoppingDetail = $func->OneDataDes('desc-shopping','object'); // Mô tả mua sắm tiện ích
    
?>

<div class="col l-3 d-none-m d-none-tablet mb20">

    <div class="sidebar-detail-two">

        <div class="sidebar-detail">

            <div class="header-sidebar">

                <span>LIÊN HỆ ĐẶT HÀNG</span>

            </div>

            <div class="body-sidebar p-relative">

                <div class="body-sidebar-des"><?= htmlspecialchars_decode($contactDetail->mota)?></div>
                
            </div>

        </div>

    </div>

    <div class="sidebar-detail-two sidebar-detail-two--player2 mt20">

        <div class="sidebar-detail">

            <div class="header-sidebar">

                <span>MUA SẮM AN TOÀN TIỆN ÍCH</span>

            </div>

            <div class="body-sidebar p-relative">

                <div class="body-sidebar-des"><?= htmlspecialchars_decode($shoppingDetail->mota)?></div>
                
            </div>

        </div>

    </div>

</div>