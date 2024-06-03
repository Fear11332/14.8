<?php
require_once("functional.php");
   $sessionTime=86400;
    ini_set('session.gc_maxlifetime', $sessionTime);
    ini_set('session.cookie_lifetime', $sessionTime);
    session_start();   
    if(isset($_POST['reg'])){
        
        // Устанавливаем флаг авторизации
        $_SESSION['auth'] = true;
    }
    elseif(isset($_POST['enter'])){

    }