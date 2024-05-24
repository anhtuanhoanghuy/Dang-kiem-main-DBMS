<?php
require("JWT.php");
include ("../core/App.php");
class Login{
    function __construct() {
        if (isset($_COOKIE["token"])) {
            header("location:/Dang-kiem-main-DBMS/Home");
        } else {
            if(($_POST['username']) != "" && isset($_POST['password']) != "" && !isset($_POST['guest_login'])) {
                if (App::isText($username = $_POST['username']) && App::isText($password = $_POST['password'])) {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    require_once("../Models/LoginModel.php");
                    $kq = new LoginModel();
                    $result = $kq -> login($username, $password);
                    if($result != 0 ) {
                        $token = array();
                        $token["username"] = $result['user_name'];
                        $token["city"] = $result['city'];
                        $token["ten"] = $result['ten'];
                        $token["role"] = $result['role'];
                        $jsonwebtoken = JWT::encode($token,"30102002");
                        setcookie('token',$jsonwebtoken,time()+3600,'/',null,true,true);
                        header("Location:/Dang-kiem-main-DBMS/Home");
                    } else if($result == 0) {
                        header("Refresh:0;  url=/Dang-kiem-main-DBMS");
                        echo "{'token:'ERROR'}";
                    }
                } else {echo ("error");} 
              
            } else if(isset($_POST['guest_login']))  {
                setcookie('token','0',time()+3600,'/',null,true,true);
                header("Location:/Dang-kiem-main-DBMS/Home");
            }         
        }
         
}
}
$login = new Login();

?>