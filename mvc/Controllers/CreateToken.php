<?php
    require("JWT.php");
    $token = array();
    $token["username"] = "Thanh Hoa";
    $token["name"] = "TrungtamdangkiemThanhHoa";
    $token["city"] = "Thanh Hoa";
    $jsonwebtoken = JWT::encode($token,"30102002");
    echo JsonHelper::getJson("token", $jsonwebtoken);
?>