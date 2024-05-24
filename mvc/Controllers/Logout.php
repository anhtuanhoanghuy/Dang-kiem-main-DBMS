<?php
    if(isset($_COOKIE['token'])) {
        setcookie('token','',time()-3600,'/');
        header("location:/Dang-kiem-main-DBMS");
    }
?>