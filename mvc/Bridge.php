<?php

    if( isset($_COOKIE['token'])) {
        require_once ("./mvc/core/App.php");
        $myApp = new App();
    } else {
        require_once("./mvc/Views/Login.php");
    }
?>