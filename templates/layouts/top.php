
<section class="wrap-top pt10 pb10 d-none-m d-none-tablet">

    <div class="grid wide">

        <div class="row align-items-center">

            <div class="col l-8 m-6 c-12">

                <ul class="wrap-top__left d-flex">

                    <li>

                        <span><b>Địa chỉ</b>: <?=$row_setting["address_$lang"]?></span>

                    </li>

                    <li>

                        <span><?=$row_setting["hotline"]?></span>

                    </li>

                </ul>

            </div>

            <div class="col l-4 m-6 c-12 t-right">

                <ul class="wrap-top__right d-flex">

                    <li>

                        <span><?=$row_setting["timework_$lang"]?></span>

                    </li>

                    <li class="<?=($com=='lien-he') ? 'activeAction':'';?>">

                        <?php if(in_array($template,explode(',',$row_setting["seo"]))){ ?>

                        <h2 class="mg0">

                        <?php }?>

                            <a href="lien-he" rel="dofollow" title="Liên hệ">Liên hệ</a>

                        <?php if(in_array($template,explode(',',$row_setting["seo"]))){ ?>

                        </h2>

                        <?php }?>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>