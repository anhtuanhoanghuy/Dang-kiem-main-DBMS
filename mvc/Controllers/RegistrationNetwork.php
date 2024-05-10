<?php
// Hiển thị mạng lưới đăng kiểm
    require_once("./mvc/core/App.php");
    class RegistrationNetwork extends Controller {
        public static function showMainPage() {
            if ($_SESSION["account"] == "1") {
                $show = parent :: view("MainPage", 
                ["Page" => "RegistrationNetwork"]);
            } else if ($_SESSION["account"] == "2") {
                $show = parent :: view("GuestMainPage", 
                ["Page" => "RegistrationNetwork"]);
            } else {
                $show = parent :: view("RegistrationMainPage", 
                ["Page" => "RegistrationNetwork"]);
            } 
        }

        //Action hiển thị mạng lưới đăng kiểm
        public static function showRegistrationNetwork() {
            if (App::isText($_POST['name'])) {
                $city = $_POST['city'];
                $name = strtolower(trim($_POST['name']));

                if (($city == "All") && ($name == "")) {
                        // tim tat ca tinh thanh
                        $query = parent :: model("RegistrationNetworkModel");
                        $kq = $query -> getAllRegistrationNetwork($city);
                        echo json_encode($kq);
                        
                    
                } else if (($city != "All") && ($name == "")) {
                        //tim theo tinh thanh
                        $query = parent :: model("RegistrationNetworkModel");
                        $kq = $query -> getRegistrationNetworkByCity($city);
                        echo json_encode($kq);
                        
                    
                } else if (($city == "All") && ($name != "")) {
                    // tim theo ten trong tat ca tinh thanh
                        $query = parent :: model("RegistrationNetworkModel");
                        $kq = $query -> getRegistrationNetworkByName($name);
                        echo json_encode($kq);

                } else {
                     // tim theo ten theo tinh thanh
                        $query = parent :: model("RegistrationNetworkModel");
                        $kq = $query -> getRegistrationNetworkByNameAndCity($city, $name);
                        echo json_encode($kq);
                }
            } else {echo json_encode ("error");}       
        }

    }


?>