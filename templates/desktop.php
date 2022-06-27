<!DOCTYPE html>

<html lang="<?=$lang?>" itemscope itemtype="http://schema.org/WebSite">

<head>

    <?php include _source.'meta.php' ?>

    <?php include _layouts."css.php"; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="assets/js/all.js"></script>
</head>

<?php   $bg_allpage = $func->OneDataPhoto(null,'bg-allpage','limit 0,1',"object"); // Background toàn trang ?>

<body itemscope itemtype="https://schema.org/WebPage">

    <?php include _layouts."seo.php"; ?>

    <div id="wrapper" style="background:url('<?=_upload_hinhanh_l.$bg_allpage->photo?>') no-repeat center center/cover;">

        <?php  include_once _layouts."topmobile.php";?>

        <?php include _layouts."header.php";?>

        <?php include_once _layouts."menu.php";?>

        <?php if($source=='index'){?>
            
            <?php include _layouts."slider.php";?>

            <?php include _layouts."main.php";?>

        <?php }?>

        <?php if($com!='carts' && $template!='products/product_detail'){?>

        <div class="grid wide">

            <div class="row">

                <div class="col l-12 m-12 c-12">

                    <div class="breadcumb">

                        <?=$str_breadcrumbs?>

                    </div>

                </div>

            </div>

        </div>

        <?php }?>

        <?php include _template.$template."_tpl.php";?>

        <?php include _layouts."footer.php"; ?>

        <?php include _layouts."sectionCopy.php"; ?>

        <?php include _layouts."menu_mobile.php";?>

        <?php include _layouts."sectionCall.php";?>

    </div>

    <?php if($source =='index'){ ?>

        <?php if($popup){ ?>

        <?php include _layouts."popup.php"; ?>

        <?php }?>

    <?php }?>

    
    <?php include _layouts."js.php"; ?>

    <div class="mask-overlay"></div>

    <!-- Loader -->
    <div id="loader">

        <div class="loader">

            <div class="inner one"></div>

            <div class="inner two"></div>

            <div class="inner three"></div>

        </div>

    </div>

</body>



</html>

