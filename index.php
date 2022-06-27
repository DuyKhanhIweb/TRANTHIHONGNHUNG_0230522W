<?php



    session_start();



    date_default_timezone_set('Asia/Ho_Chi_Minh');



    error_reporting(E_ALL & ~E_NOTICE & ~8192);



    defined( '_root' ) ?:  define( '_root', __DIR__);



    defined( '_ds' ) ?:  define( '_ds', DIRECTORY_SEPARATOR );



    defined( '_lib' ) ?:  define( '_lib', _root._ds.'libraries'._ds );



    defined( '_source' ) ?:  define( '_source', _root._ds.'sources'._ds );



    defined( '_template' ) ?:  define( '_template', _root._ds.'templates'._ds );



    defined( '_layouts' ) ?:  define( '_layouts', _template._ds.'layouts'._ds );



    defined( '_thumbs' ) ?:  define( '_thumbs', 'thumbs');



    defined( '_watermark' ) ?:  define( '_watermark', 'watermark');


    $lang=$_SESSION['lang']=(!isset($_SESSION['lang']) || $_SESSION['lang']=='') ? 'vi' : $_SESSION['lang'];



    include_once _lib."config.php";



    // include_once _lib.'firewall.php';



    include_once _source."langWeb/lang_$lang.php";



    include_once _lib.'autoload.php';



    new autoload();



    $injection = new AntiSQLInjection();



    $db = new PDODb($config['database']);



    $func = new functions($db);



    $cart= new cartFrontEnd($db);



    $detect = new MobileDetect;



    $router = new AltoRouter();



    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');



    $breadcrumbs = new breadCrumbs($db,$func);



    $json_schema = new jsonSchema($db,$func);



    $cache = new FileCache($db);



    $statistic = new statitis($db,$cache);  



    $apiPlace= new place($db,$func);



    $seo = new seos($db);



    $css = new CssMinify($config['website']['debug-css'], $func);



    $js = new JsMinify($config['website']['debug-js'], $func);



    include_once _lib.'controller.php';

    include_once _template."desktop.php";

?>