<?php
//Đăng nhập tài khoản và lưu vào SESSION
session_start();
include ("../core/App.php");
class Login{
    //Hàm đăng nhập tài khoản sử dụng SESSION
    function __construct() {
        if (isset($_SESSION["account"])) {
            header("location:/Dang-kiem-main-DBMS/Home");
        } else {
            if(isset($_POST['username']) && isset($_POST['password'])) {
                if (App::isText($username = $_POST['username']) && App::isText($password = $_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    require_once("../Models/LoginModel.php");
                    $kq = new LoginModel();
                    $result = $kq -> login($username, $password);
                    if($result != 0 ) {
                        $_SESSION["account"] = $result;
                        header("location:/Dang-kiem-main-DBMS/Home");
                    } else if($result == 0) {
                        header("Refresh:0;  url=/Dang-kiem-main-DBMS");
                    }
                } else {echo ("error");} 
              
            }
            if(isset($_POST['guest_login']) && $_POST['username'] == '' && $_POST['password'] == '')  {
                header("location:/Dang-kiem-main-DBMS/Home");
                $_SESSION["account"] = '2';
            }         
        }
         
}
}
$login = new Login();

?>