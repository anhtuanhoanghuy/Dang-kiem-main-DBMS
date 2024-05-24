<?php
// Hiển thị mạng lưới đăng kiểm
    require_once "./vendor/autoload.php";
    require("JWT.php");
    require_once("./mvc/core/App.php");
    class RegistrationNetwork extends Controller {
        public static function showMainPage() {
            if (isset($_COOKIE["token"]) && ($_COOKIE['token'] !='0')) {
                $token = $_COOKIE["token"];
                $jsonwebtoken = JWT::decode($token,"30102002",true);
                if(json_encode($jsonwebtoken->role) == '1') {
                    $show = parent :: view("MainPage", 
                    ["Page" => "RegistrationNetwork"]);
                } else {
                    $show = parent :: view("RegistrationMainPage", 
                    ["Page" => "RegistrationNetwork","name"=>($jsonwebtoken->ten)]);
                }
            } else {
                $show = parent :: view("GuestMainPage", 
                ["Page" => "RegistrationNetwork"]);
            } 
        }

        //Action hiển thị mạng lưới đăng kiểm
        public static function showRegistrationNetwork() {
            $redis = new Predis\Client();
            if (App::isText($_POST['name'])) {
                $city = $_POST['city'];
                $name = strtolower(trim($_POST['name']));
                if (($city == "All") && ($name == "")) {
                    $cacheEntry = $redis->get('getAllRegistrationNetwork');
                    if ($cacheEntry) {
                        echo $cacheEntry;
                        exit();
                    } else {
                        // tim tat ca tinh thanh
                        $query = parent :: model("RegistrationNetworkModel");
                        $kq = $query -> getAllRegistrationNetwork($city);
                        $redis->set('getAllRegistrationNetwork', json_encode($kq));
                        echo json_encode($kq);
                    }
                        
                    
                } else if (($city != "All") && ($name == "")) {
                        //tim theo tinh thanh
                        $cacheEntry = $redis->get('getRegistrationNetworkByCity');
                        if ($cacheEntry) {
                            echo $cacheEntry;
                            exit();
                        } else {
                            $query = parent :: model("RegistrationNetworkModel");
                            $kq = $query -> getRegistrationNetworkByCity($city);
                            $redis->set('getRegistrationNetworkByCity', json_encode($kq));
                            echo json_encode($kq);
                        }
                        
                    
                } else if (($city == "All") && ($name != "")) {
                    // tim theo ten trong tat ca tinh thanh
                    $cacheEntry = $redis->get('getRegistrationNetworkByName'.$name);
                    if ($cacheEntry) {
                        echo $cacheEntry;
                        exit();
                    } else {
                        $query = parent :: model("RegistrationNetworkModel");
                        $kq = $query -> getRegistrationNetworkByName($name);
                        $redis->set('getRegistrationNetworkByName'.$name, json_encode($kq));
                        echo json_encode($kq);
                    }

                } else {
                     // tim theo ten theo tinh thanh
                     $cacheEntry = $redis->get('getRegistrationNetworkByNameAndCity'.$name);
                    if ($cacheEntry) {
                        echo $cacheEntry;
                        exit();
                    } else {
                        $query = parent :: model("RegistrationNetworkModel");
                        $kq = $query -> getRegistrationNetworkByNameAndCity($city, $name);
                        $redis->set('getRegistrationNetworkByNameAndCity'.$name, json_encode($kq));
                        echo json_encode($kq);
                    }
                }
            } else {echo json_encode ("error");}       
        }

    }


?>