<?php
//Hiển thị trang quản lý tài khoản các trung tâm đăng kiểm
    require_once "./vendor/autoload.php";
    require("JWT.php");
    class AccountManagement extends Controller {
        public static function showMainPage() {
            if (isset($_COOKIE["token"])) {
                $token = $_COOKIE["token"];
                $jsonwebtoken = JWT::decode($token,"30102002",true);
                if(json_encode($jsonwebtoken->role) == '1') {
                    $show = parent :: view("MainPage", 
                    ["Page" => "AccountManagement","role"=>($jsonwebtoken->role)]);
                } else {
                    $show = parent :: view("RegistrationMainPage", 
                    ["Page" => "Account","roleAccount"=>($jsonwebtoken->role)]);
                }
            }
        }

        //Action hiện thị danh sách tài khoản
        public static function showAccountList() {
            $redis = new Predis\Client();
            if (App::isText($_POST['name'])) {
                $city = $_POST['city'];
                $name = strtolower(trim($_POST['name']));

                if (($city == "All") && ($name == "")) {
                        // tim tat ca tinh thanh
                        $cacheEntry = $redis->get('getAllAccount');
                        if ($cacheEntry) {
                            echo $cacheEntry;
                            exit();
                        } else {
                            $query = parent :: model("AccountManagementModel");
                            $kq = $query -> getAllAccount($city);
                            $redis->set('getAllAccount', json_encode($kq));
                            echo json_encode($kq);
                        }
                        
                    
                } else if (($city != "All") && ($name == "")) {
                        //tim theo tinh thanh
                        $cacheEntry = $redis->get('getAccountByCity');
                        if ($cacheEntry) {
                            echo $cacheEntry;
                            exit();
                        } else {
                            $query = parent :: model("AccountManagementModel");
                            $kq = $query -> getAccountByCity($city);
                            $redis->set('getAccountByCity', json_encode($kq));
                            echo json_encode($kq);
                        }
                        
                    
                } else if (($city == "All") && ($name != "")) {
                    // tim theo ten trong tat ca tinh thanh
                        $cacheEntry = $redis->get('getAccountByName'.$name);
                        if ($cacheEntry) {
                            echo $cacheEntry;
                            exit();
                        } else {
                            $query = parent :: model("AccountManagementModel");
                            $kq = $query -> getAccountByName($name);
                            $redis->set('getAccountByName'.$name, json_encode($kq));
                            echo json_encode($kq);
                        }

                } else {
                     // tim theo ten theo tinh thanh
                     $cacheEntry = $redis->get('getAccountByNameAndCity'.$name);
                     if ($cacheEntry) {
                         echo $cacheEntry;
                         exit();
                     } else {
                        $query = parent :: model("AccountManagementModel");
                        $kq = $query -> getAccountByNameAndCity($city, $name);
                        $redis->set('getAccountByNameAndCity'.$name, json_encode($kq));
                        echo json_encode($kq);
                     }
                }
            } else {echo json_encode ("error");}       
        }

        //Action thay đổi thông tin tài khoản
        public static function changeAccountInformation($ten = 0) {
            $redis = new Predis\Client();
            $token = $_COOKIE["token"];
            $jsonwebtoken = JWT::decode($token,"30102002",true);
            if ($ten != 0) {
                $name = str_replace("_"," ",$ten);
            } else {
                
                $name = $jsonwebtoken->ten;
            }
            $query = parent :: model("AccountManagementModel");
            $kq = $query -> getAccountByName($name);
            if ($jsonwebtoken->role == "1") {
                $show = parent :: view("MainPage", 
                [
                    "Page" => "Account",
                    "Ten" => ($kq),
                    'roleAccount' => ($jsonwebtoken->role)
            ]);
            } else {
                $show = parent :: view("RegistrationMainPage", 
                [
                    "Page" => "Account",
                    "Ten" => ($kq),
                    "name"=>($jsonwebtoken->ten),
                    'roleAccount' => ($jsonwebtoken->role)
                ]);
            }
        }

        //Action sửa xóa tài khoản
        public static function CRUD() {
            $redis = new Predis\Client();
            if(isset($_POST['method']) && $_POST['method'] == 'delete') {
                $query = parent :: model("AccountManagementModel");
                $kq = $query -> deleteAccount($_POST['ten']);
            }
            if(isset($_POST['method']) && $_POST['method'] == 'update') {
                $query = parent :: model("AccountManagementModel");
                $kq = $query -> updateAccount(trim($_POST['ten']),trim($_POST['dia_chi']),
                trim($_POST['dien_thoai']),trim($_POST['fax']),trim($_POST['email']),
                trim($_POST['giam_doc']),trim($_POST['giam_doc_phone']),trim($_POST['pho_giam_doc_1']),
                trim($_POST['pho_giam_doc_1_phone']),trim($_POST['pho_giam_doc_2']),
                trim($_POST['pho_giam_doc_2_phone']),trim(md5($_POST['new_password'])));
                echo json_encode($kq);
            }
            $result = $redis->flushdb();
        }
    }
?>