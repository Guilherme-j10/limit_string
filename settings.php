<?php

    $production_mode = false;

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB_NAME', 'messages');

    if($production_mode){
        define('SITE_NAME', 'http://'.$_SERVER['HTTP_HOST']);
    }else{
        define('SITE_NAME', 'http://'.$_SERVER['HTTP_HOST'].'/tweet/');
    }