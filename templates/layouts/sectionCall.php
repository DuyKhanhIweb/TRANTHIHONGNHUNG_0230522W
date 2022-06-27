<style>

.addThis_listSharing {

    position: fixed;

    bottom: 35%;

    z-index: 999;

    width: 45px;

    opacity: 1;

    visibility: visible;

    transition: all .3s ease;

    -webkit-transition: all .3s ease;

    -moz-transition: all .3s ease;

    -o-transition: all .3s ease;

}



.addThis_listSharing.right {

    right: 24px;

}



.addThis_listSharing.right.animate {

    right: -24px;

    opacity: 0;

    visibility: hidden;

}



.addThis_listSharing.left {

    left: 24px;

}



.addThis_listSharing.left.animate {

    left: -24px;

    opacity: 0;

    visibility: hidden;

}



.addThis_listSharing.right.animate.is-show {

    left: 5px;

    opacity: 1;

    visibility: visible;

}



.addThis_listSharing.left.animate.is-show {

    left: 5px;

    opacity: 1;

    visibility: visible;

}



.addThis_listing .addThis_item {

    margin-bottom: 5px;

}



.addThis_listing .addThis_item .addThis_item--icon {

    position: relative;

    display: inline-block;

    text-align: center;

    width: 35px;

    height: 35px;

    line-height: 35px;

    color: #fff;

    border-radius: 50%;

    cursor: pointer;

    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.11);

    background-size: auto;

    background-repeat: no-repeat;

    background-position: center;

}



.addThis_listing .addThis_item .addThis_item--icon .tooltip-text {

    position: absolute;

    top: 4px;



    z-index: 9;

    height: 32px;

    line-height: 26px;

    padding: 3px 10px;

    width: auto;

    border-radius: 5px;

    font-size: 11px;

    color: #fff;

    text-align: center;

    white-space: nowrap;

    cursor: pointer;

    background-color: black;

    visibility: hidden;

    opacity: 0;

    -ms-transition: all 200ms linear;

    -webkit-transition: all 200ms linear;

    transition: all 200ms linear;

}



.addThis_listSharing.right .addThis_listing .addThis_item .addThis_item--icon .tooltip-text {

    left: 55px;

}



.addThis_listSharing.left .addThis_listing .addThis_item .addThis_item--icon .tooltip-text {

    left: 55px;

}



.addThis_listSharing.none-mobile.right.animate.is-show {

    max-width: 50px;

}



.addThis_listing .addThis_item .addThis_item--icon .tooltip-text:after {

    content: "";

    width: 0;

    height: 0;

    border-width: 5px;

    border-style: solid;

    position: absolute;

    top: 0;

    bottom: 0;

    margin: auto;

    -ms-transition: all 200ms linear;

    -webkit-transition: all 200ms linear;

    transition: all 200ms linear;

}



.addThis_listSharing.right .addThis_item .addThis_item--icon .tooltip-text:after {

    border-color: transparent transparent transparent black;

    right: 100%;

    -webkit-transform: rotate(

180deg

);

    transform: rotate(

180deg

);

}



.addThis_listSharing.left .addThis_item .addThis_item--icon .tooltip-text:after {

    border-color: transparent black transparent transparent;

    right: 100%;

}



.addThis_listing .addThis_item .addThis_item--icon:hover {

    text-decoration: none;

    opacity: .9;

    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15), 0 4px 15px rgba(0, 0, 0, 0.13);

}



.addThis_listing .addThis_item .addThis_item--icon:hover .tooltip-text {

    visibility: visible;

    opacity: 1;

}



.fab-wrapper {

    position: fixed;

    bottom: 5%;

    left: 0;

    z-index: 9999999;

}



input[type=checkbox] {

    border: 1px solid #e4e4e4;

    border-radius: 2px;

    margin: 0 3px 0 0;

    height: 20px;

    width: 20px;

    vertical-align: top;

    -webkit-appearance: none;

}



.fab-checkbox {

    display: none;

}



.fab:not(.fab-hothotline1) {

    width: 60px;

    max-width: unset;

    height: 60px;

    display: flex;

    justify-content: center;

    align-items: center;

    margin: 0;

    border-radius: 50%;

    background: #ee4d2d;

    box-shadow: 0 3px 6px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);

    position: absolute;

    left: 10px;

    bottom: -25px;

    z-index: 1000;

    overflow: hidden;

    transform: rotate(0deg);

    -webkit-transition: all .15s cubic-bezier(.15, .87, .45, 1.23);

    transition: all .15s cubic-bezier(.15, .87, .45, 1.23);

}



.icon-cps-fab-menu {

    width: 50px;

    height: 50px;

    margin: 0 5px 5px 0;

    background-size: 850px;

    background-position: -794px -374px;

}



.fab-checkbox:checked~.fab .icon-cps-fab-menu {

    width: 30px;

    height: 30px;

    margin: 0;

    background-size: 600px;

    background-position: -337.5px -316.5px;

}



.fab-wheel {

    width: 300px;

    height: 220px;

    position: absolute;

    bottom: 15px;

    left: 15px;

    transform: scale(0);

    transform-origin: bottom left;

    transition: all .3s ease;

}



.fab-checkbox:checked~.fab-wheel {

    transform: scale(1);

}



.fab-wheel .fab-action {

    display: flex;

    align-items: center;

    font-size: 14px;

    font-weight: 700;

    color: #fff;

    position: absolute;

    text-decoration: none;

}



.fab-wheel .fab-action-1 {

    top: 15px;

    left: 5px;

}



.fab-wheel .fab-action-2 {

    top: 75px;

    left: 50px;

}



.fab-wheel .fab-action-3 {

    left: 95px;

    bottom: 35px;

}



.fab-wheel .fab-action-4 {

    left: 115px;

    bottom: -35px;

}



.fab-title {

    float: left;

    margin: 0 0 0 5px;

    opacity: 0;

    font-family: 'Arial';

}



.fab-checkbox:checked~.fab-wheel .fab-title {

    opacity: 1;

}



.fab-button {

    width: 45px;

    height: 45px;

    display: flex;

    justify-content: center;

    align-items: center;

    float: left;

    padding: 4px;

    border-radius: 50%;

    background: #0f1941;

    box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);

    font-size: 24px;

    color: White;

    transition: all 1s ease;

    overflow: hidden;

}



.fab-wheel .fab-button-4 {

    background: #dd5145;

}



.fab-wheel .fab-button-3 {

    background: #fb0;

}



.fab-wheel .fab-button-2 {

    background: #0f9d58;

}



.fab-wheel .fab-button-1 {

    background: #2f82fc;

}



.icon-cps-local {

    width: 28px;

    height: 28px;

    background-position: -92.5px -262px;

}



.icon-cps-phone {

    width: 28px;

    height: 28px;

    background-position: -139px -262px;

}



.icon-cps-chat {

    width: 30px;

    height: 30px;

    background-size: 600px;

    background-position: -506px -265px;

}



.icon-cps-chat-zalo {

    width: 30px;

    height: 30px;

    background-size: 600px;

    background-position: -450px -265px;

}



.mask-overlay {

    visibility: hidden;

    position: fixed;

    top: 0;

    left: 0;

    width: 100%;

    height: 100%;

    background: rgba(0, 0, 0, .8);

    z-index: 30;

    opacity: 0;

    -webkit-transition: .3s;

    -moz-transition: .3s;

    -o-transition: .3s;

    transition: .3s;

}



.mask-overlay.is-active {

    visibility: visible;

    opacity: 1;

}

</style>

<div class="tool-pc d-none-m">

    <ul>
        
        <li class="p-relative">
            <a href="carts?src=gio-hang" title="Giỏ hàng">
                <i class="tool-cart"></i>
            </a>
            <span class="wrapper-top__right-cart-aside-qty wrapper-top__right-cart-aside-qty--modifiers view-cart"><?=$cart->getTotalQuality()?></span>
        </li>

        <li>
            <a href="http://zalo.me/<?=str_replace('.','',str_replace(' ','',$row_setting['sozalo']))?>" rel="nofollow" target="_blank">
                <i class="tool-zalo"></i>
            </a>
        </li>

        <li>
            <a href="https://m.me/<?=$row_setting['linkmessage']?>" rel="nofollow" target="_blank">
                <i class="tool-messenger"></i>
            </a>
        </li>

        <li class="to-top-pc">
            <a href="tel:<?=str_replace('.','',str_replace(' ','',$row_setting['hotline']))?>" rel="nofollow">
                <i class="tool-phone" aria-hidden="true" title="Gọi ngay"></i>
            </a>
        </li>

        <li>
            <a href="javascript:void(0)" rel="nofollow">
                <i class="icons-tool tool-address js-map"></i>
            </a>
        </li>

    </ul>

</div>

