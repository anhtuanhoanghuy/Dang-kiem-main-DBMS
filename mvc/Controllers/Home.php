<?php
//Trang chủ
    require("JWT.php");
    class Home extends Controller {
        public static function showMainPage() {
            if (isset($_COOKIE["token"]) && ($_COOKIE['token'] != '0')) {
                $token = $_COOKIE["token"];
                $jsonwebtoken = JWT::decode($token,"30102002",true);
                if(json_encode($jsonwebtoken->role) == '1') {
                    $show = parent :: view("MainPage", 
                    ["Page" => "HomePage"]);
                } else {
                    $show = parent :: view("RegistrationMainPage", 
                    ["Page" => "HomePage","name"=>($jsonwebtoken->ten)]);
                }
            } else {
                $show = parent :: view("GuestMainPage", 
                ["Page" => "Homepage"]);
            } 

        }

        public static function showLatestNews() {
            if (isset($_POST['category_name'])) {
                $query = parent :: model("HomeModel");
                $kq = $query -> getLatestNews();
                echo json_encode($kq);
            }
           
        }
        public static function showGeneralNews() {
            if (isset($_POST['category_name'])) {
                $query = parent :: model("HomeModel");
                $kq = $query -> getGeneralNews();
                echo json_encode($kq);
            }
        }
        public static function showWaterwaysNews() {
            if (isset($_POST['category_name'])) {
                $query = parent :: model("HomeModel");
                $kq = $query -> getWaterwaysNews();
                echo json_encode($kq);
            }
        }
        public static function showRoadNews() {
            if (isset($_POST['category_name'])) {
                $query = parent :: model("HomeModel");
                $kq = $query -> getRoadNews();
                echo json_encode($kq);
            }
        }
        public static function showGlobalNews() {
            if (isset($_POST['category_name'])) {
                $query = parent :: model("HomeModel");
                $kq = $query -> getGlobalNews();
                echo json_encode($kq);
            }
        }
        public static function showNotification() {
            if (isset($_POST['category_name'])) {
                $query = parent :: model("HomeModel");
                $kq = $query -> getNotification();
                echo json_encode($kq);
            }
        }
    }



?>