<ul class="h-card hidden">
    <li class="h-fn fn"><?=$row_setting['name_'.$lang]?></li>
    <li class="h-org org"><?=$row_setting['name_'.$lang]?></li>
    <li class="h-tel tel"><?=preg_replace('/[^0-9]/','',$row_setting['hotline']);?></li>
    <li><a class="u-url ul" href="<?=$https_config?>"><?=$https_config?></a></li>
</ul>
<?php if($com=='index' || $com==''){ ?>
<h1 class="d-none fn"><?=$seo->getSeo('h1')?></h1>
<?php } ?>