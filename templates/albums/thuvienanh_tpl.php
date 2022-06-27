<style type="text/css">
.desc-project {
    border-bottom: 1px solid #eee;
    margin-top: 30px;
}

.list-project {
    margin-top: -20px;
    margin-bottom: 15px;
}

.list-project .item {
    display: inline-block;
    padding: 3px 8px;
    border: 1px solid #eee;
    margin-right: 6px;
    background-color: #fff;
    margin-top: 5px;
}

.list-project .item.active {
    background-color: #efefef;
}

.list-project .item:hover {
    background-color: #efefef;
    cursor: pointer;
}

.list-page .p {
    width: 20%;
    float: left;
    padding: 2px 10px;
}

.bx-project-page {
    -webkit-transition: background-color .5s ease;
    transition: background-color .5s ease;
}


.bx-project-page img {
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
    -webkit-transition: all .2s ease;
    opacity: .8;
    -webkit-filter: grayscale(80%);
    -moz-filter: grayscale(80%);
    -ms-filter: grayscale(80%);
    -o-filter: grayscale(80%);
    filter: grayscale(80%);
}

.bx-project-page:hover a img,
.bx-project-page:hover a:hover img {
    opacity: 1;
    -webkit-filter: grayscale(0%);
    -moz-filter: grayscale(0%);
    -ms-filter: grayscale(0%);
    -o-filter: grayscale(0%);
    filter: grayscale(0%);
}

.thumb-project {
    padding: 0;
    border: none;
    border-radius: 0;
}

.bx-project-page .lnk-wrapper {
    min-height: 24px;
    margin-bottom: 0;
}

.bx-project-page a.lnk {
    color: #333;
    font-size: 13px;
    font-weight: 600;
    display: none;
    text-align: center;
}

.bx-project-page:hover {
    background-color: var(--html-bg-website);
}

.bx-project-page:hover a,
.bx-project-page:hover a:hover {
    color: #fff;
    text-align: center;
    display: block;
}

#list-projects .mix {
    display: none;
}

@media screen and (max-width:992px) {
    .bx-project-page {
        background-color: #555;
    }

    .bx-project-page a {
        color: #ffcd07 !important;
        text-align: center;
        display: block !important;
    }
}
</style>
<?php 
    $list_project=$d->get_result_array("select id,ten_$lang as ten,tenkhongdau from #_baiviet_list where type='du-an' order by id asc");
?>
<div id="projects-tp">
    <div class="title-default t-center p-relative">
        <div><a href="<?=$type?>" title="<?=$title?>"><?=$title?></a></div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="desc-project"></div>
            <ul class="list-project">
                <li data-filter="all" class="item filter selected">Tất cả</li>
                <?php foreach ($list_project as $key => $value){?>
                <li data-filter=".<?=$value['id']?>" class="item filter"><?=$value["ten_$lang"]?></li>
                <?php }?>
            </ul>
        </div>
    </div> -->
    <div id="list-projects" class="list-page mt-50 clearfix">
        <div class="row">
            <?php foreach ($tintuc as $val){
                $album_photo = $d->get_result_array("select id,ten,photo,thumb from #_album_photo where hienthi=1 and id_baiviet='".$val['id']."' and type='album' order by stt asc,id desc");
            ?>
            <div class="col-md-4 col-sm-4 col-xs-12 mix 13 <?=$value['id']?>" style="display: inline-block;">
                <div class="item-albums bx-project-page mb-20i p-relative">
                    <p class="mb-5"><a href="javascript:" title="<?=$val["ten_$lang"]?>">
                            <img src="resize/480x270/1/<?=_upload_album_l.$val['photo']?>"
                                class="img-thumbnail thumb-project" alt="<?=$val["ten_$lang"]?>"></a></p>
                    <p class="lnk-wrapper line-clamp"><a class="lnk text-center" href="javascript:"
                            title="<?=$val["ten_$lang"]?>"><?=$val["ten_$lang"]?></a></p>
                    <div class="over_lay">
                        <ul class="grid grid_index">
                            <?php foreach ($album_photo as $m => $n) {?>
                            <li class="loaded" style='display: none;'>
                                <div class="rel">
                                    <a rel="prettyPhoto[gallery<?=$m+1?>]" title="<?=$value['ten']?>"
                                        href="<?=_upload_album_l.$n['photo']?>">
                                        <img src="<?=_upload_album_l.$n['photo']?>" alt="<?=$value['ten']?>">
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                            <a rel="prettyPhoto[gallery<?=$m+1?>]" href="<?=_upload_album_l.$val['photo']?>"
                                class="xemthem tf-hover"><i class="fa fa-search icon-fa" aria-hidden="true"></i></a>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="paging clear"><?=$paging?></div>
            </div>
        </div>
    </div>
</div>