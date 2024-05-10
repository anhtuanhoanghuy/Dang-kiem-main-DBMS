<?php
//Trang chủ
    class Home extends Controller {
        public static function showMainPage() {
            if ($_SESSION["account"] == "1") {
                $show = parent :: view("MainPage", 
                ["Page" => "HomePage"]);
            } else if ($_SESSION["account"] == "2") {
                $show = parent :: view("GuestMainPage", 
                ["Page" => "HomePage"]);
            } else {
                $show = parent :: view("RegistrationMainPage", 
                ["Page" => "HomePage"]);
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