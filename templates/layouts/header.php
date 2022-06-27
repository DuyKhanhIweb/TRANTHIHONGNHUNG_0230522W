<header class="wrapper-header pb20 pt20 d-none-m d-none-tablet d-none-tl <?php if($source!='index'){echo 'box-shadown-tpl';} ?>">

    <div class="grid wide">

        <div class="row align-items-center">

            <div class="col l-2 m-3 c-12">

                <a href="" title="Logo công ty" rel="dofollow" class="p-relative">

                    <img src="<?=_upload_hinhanh_l.$logo["photo"]?>" alt="Logo công ty">

                    <div class="star-box">

                        <img src="./assets/images/saolaplanh.png" class="saolaplanh star-animate" alt="Sao lấp lánh">

                    </div>

                </a>

            </div>

            <div class="col l-10 m-10 c-12">

                <div class="row">

                    <div class="col l-3 m-4 c-12">

                        <?=$func->getSocial($socical);?>

                    </div>

                    <div class="col l-6 m-4 c-12 d-flex justify-content-center">

                        <div class="section-head__search">

                            <input type="text" role="search-input" name="keywords" id="keywordspc">

                            <button data-btn-search-pc><img src="./assets/images/iconsearch.png" alt="Icon tìm kiếm"></button>

                        </div>

                    </div>

                    <div class="col l-3 m-4 c-12">

                        <a href="carts?src=gio-hang" class="wrapper-cart__menu d-flex justify-content-end align-items-center">

                            <div class="wrapper-cart__menu-img">

                                <span class="inline-block p-relative">

                                    <img src="assets/images/giohang.png" alt="">

                                    <span class="wrapper-cart__menu-img-qty view-cart"><?=$cart->getTotalQuality()?></span>

                                </span>

                            </div>

                            <div class="wrapper-cart__menu-detail">

                                <span class="wrapper-cart__menu-label">GIỎ HÀNG ( <span class="view-price"> <?=$cart->numbMoney($cart->getTotalOrder(),' ₫')?></span> )</span>

                            </div>

                        </a>

                    </div>

                    <div class="col l-12 m-12 c-12 mt10">
                        <?php include_once _layouts.'menu.php'; ?>
                    </div>
                    
                </div>

            </div>


        </div>

    </div>

</header>



