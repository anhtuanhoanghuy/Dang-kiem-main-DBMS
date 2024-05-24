<!-- Hiển thị trang giới thiệu -->
<?php
    require("JWT.php");
    class Introduction extends Controller {
        public static function showMainPage() {
            if (isset($_COOKIE["token"]) && ($_COOKIE['token'] !='0')) {
                $token = $_COOKIE["token"];
                $jsonwebtoken = JWT::decode($token,"30102002",true);
                if(json_encode($jsonwebtoken->role) == '1') {
                    $show = parent :: view("MainPage", 
                    ["Page" => "Introduction"]);
                } else {
                    $show = parent :: view("RegistrationMainPage", 
                    ["Page" => "Introduction","name"=>($jsonwebtoken->ten)]);
                }
            } else {
                $show = parent :: view("GuestMainPage", 
                ["Page" => "Introduction"]);
            } 
        }
    }
?>