<div class="box-tienich" id="options">
    <div class="p-relative">
        <ul class="socialf list">
            <li>
                <a href="https://m.me/<?=$row_setting['linkmessage']?>" rel="nofollow" target="_blank">
                    <i class="tienich  tool-messenger"></i>
                    <span class="label">Messenger</span>
                </a>
            </li>
            <li>
                <a href="http://zalo.me/<?=str_replace('.','',str_replace(' ','',$row_setting['sozalo']))?>" rel="nofollow"
                    target="_blank">
                    <i class="tienich tool-zalo"></i>
                    <span class="label">Zalo</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" rel="nofollow" class="js-map">
                    <i class="tienich  tool-map js-map"></i>
                    <span class="label js-map">Map</span>
                </a>
            </li>
        </ul>
    </div>
</div>