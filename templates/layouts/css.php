<link rel="stylesheet" href="./assets/plugins/fontawesome/css/all.min.css">

<?php

    $css->setCache("cached");

    $css->setCss("./assets/css/all.css");

    $css->setCss("./assets/css/jssor.css");

    $css->setCss("./assets/css/fonts.css");

    $css->setCss("./assets/css/normalize.css");

    $css->setCss("./assets/css/fonts.css");

    $css->setCss("./assets/css/reset.css");

    $css->setCss("./assets/css/animate.css");

    $css->setCss("./assets/css/menu.mobile.css");

    $css->setCss("./assets/css/style.css?v=".filemtime("./assets/css/style.css"));

    $css->setCss("./assets/css/themes.css?v=".filemtime("./assets/css/themes.css"));
    
    $css->setCss("./assets/plugins/wow/animate.css");

    $css->setCss("./assets/css/grid.css?v=".filemtime("./assets/css/grid.css"));

    $css->setCss("./assets/css/main.css?v=".filemtime("./assets/css/main.css"));

    $css->setCss("./assets/css/base.css?v=".filemtime("./assets/css/base.css"));

    $css->setCss("./assets/css/index.css?v=".filemtime("./assets/css/index.css"));

    $css->setCss("./assets/css/responsive.css?v=".filemtime("./assets/css/responsive.css"));

    $css->setCss("./assets/css/cart.css");

    echo $css->getCss();

?>

<style>

    @font-face {

        font-family: 'SVN-BLOGSCRIPT';

        src: url('assets/images/fonts/SVN-BLOGSCRIPT.TTF') format('truetype');

    }

    @font-face {

        font-family: 'BVN-Bold';

        src: url('assets/images/fonts/font/BVN/BeVietnamBold700.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-BoldItalic';

        src: url('assets/images/fonts/font/BVN/BeVietnamBoldItalic700.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-ExtraBold';

        src: url('assets/images/fonts/font/BVN/BeVietnamExtraBold800.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-ExtraBoldItalic';

        src: url('assets/images/fonts/font/BVN/BeVietnamExtraBoldItalic 800.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-Italic';

        src: url('assets/images/fonts/font/BVN/BeVietnamItalic400.ttf') format('truetype');

    }

     @font-face {

        font-family: 'BVN-Light';

        src: url('assets/images/fonts/font/BVN/BeVietnamLight300.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-LightItalic';

        src: url('assets/images/fonts/font/BVN/BeVietnamLightItalic300.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-Medium';

        src: url('assets/images/fonts/font/BVN/BeVietnamMedium500.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-MediumItalic';

        src: url('assets/images/fonts/font/BVN/BeVietnamMediumItalic500.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-Regular';

        src: url('assets/images/fonts/font/BVN/BeVietnamRegular400.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-Semibold';

        src: url('assets/images/fonts/font/BVN/BeVietnamSemiBold600.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-SemiboldItalic';

        src: url('assets/images/fonts/font/BVN/BeVietnamSemiBoldItalic600.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-Thin';

        src: url('assets/images/fonts/font/BVN/BeVietnamThin100.ttf') format('truetype');

    }

    @font-face {

        font-family: 'BVN-ThinItalic';

        src: url('assets/images/fonts/font/BVN/BeVietnamThinItalic250.ttf') format('truetype');

    }

    @font-face {

        font-family: 'SVN-AgencyFB';

        src: url('assets/images/fonts/font/BVN/SVN-AgencyFB.ttf') format('truetype');

    }

    @font-face {

        font-family: 'SVN-AgencyFBbold';

        src: url('assets/images/fonts/font/BVN/SVN-AgencyFBbold.ttf') format('truetype');

    }

    @font-face {

        font-family: 'SVN-CocoFY';

        src: url('assets/images/fonts/font/BVN/SVN-CocoFY.ttf') format('truetype');

    }

     @font-face {

        font-family: 'VNF-ACaslonPro-Regular';

        src: url('assets/images/fonts/font/BVN/VNF-ACaslonPro-Regular.ttf') format('truetype');

    }

:root {

    --html-bg-website: <?=$row_setting['color_page']?>;

    --html-cl-website: <?=$row_setting['color_text']?>;

    --bvn-bold:'BVN-Bold';

    --bvn-bolditalic:'BVN-BoldItalic';

    --bvn-extrabold:'BVN-ExtraBold';

    --bvn-extrabolditalic:'BVN-ExtraBoldItalic';

    --bvn-italic:'BVN-Italic';

    --bvn-light:'BVN-Light';

    --bvn-lightitalic:'BVN-LightItalic';

    --bvn-medium:'BVN-Medium';

    --bvn-mediumitalic:'BVN-MediumItalic';

    --bvn-regular:'BVN-Regular';

    --bvn-semibold:'BVN-Semibold';

    --bvn-semibolditalic:'BVN-SemiboldItalic';

    --bvn-thin:'BVN-Thin';
    
    --bvn-thinitalic:'BVN-ThinItalic';

    --snv-agencyfb:'SVN-AgencyFB';

    --snv-agencyfbbold:'SVN-AgencyFBbold';

    --snv-cocofy:'SVN-CocoFY';

    --vnf-acaslonpro:'VNF-ACaslonPro-Regular';

    --svn-blogscript:'SVN-BLOGSCRIPT';

}
</style>