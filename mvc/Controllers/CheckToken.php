<?php
    $token = $_GET["token"];
    require("JWT.php");
    $json = JWT::decode($token,"30102002",true);
    echo json_encode($json);
  

?>