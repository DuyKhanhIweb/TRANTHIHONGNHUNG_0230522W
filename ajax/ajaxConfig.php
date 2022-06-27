<?php

    session_start();

    $_SESSION['ONWEB'] = true;


    defined( '_root' ) ?:  define( '_root', __DIR__);



    defined( '_ds' ) ?:  define( '_ds', DIRECTORY_SEPARATOR );



    defined( '_lib' ) ?:  define( '_lib', _root._ds.'../'._ds.'libraries'._ds );



    defined( '_source' ) ?:  define( '_source', _root._ds.'../'._ds.'sources'._ds );



    defined( '_thumbs' ) ?:  define( '_thumbs', 'thumbs');



    defined( '_watermark' ) ?:  define( '_watermark', 'watermark');



    $lang=$_SESSION['lang']=(!isset($_SESSION['lang']) || $_SESSION['lang']=='') ? 'vi' : $_SESSION['lang'];


    require_once _lib."config.php";

    require_once _source."langWeb/lang_$lang.php";

    require_once _lib.'autoload.php';

    new autoload();

    $db = new PDODb($config['database']);

    $func = new functions($db);

    $cart= new cartFrontEnd($db);

    $row_setting= $db->rawQueryOne("select * from #_setting limit 0,1");

?>