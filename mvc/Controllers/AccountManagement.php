<?php
//Hiển thị trang quản lý tài khoản các trung tâm đăng kiểm
    class AccountManagement extends Controller {
        public static function showMainPage() {
            if ($_SESSION["account"] == "1") {
                $show = parent :: view("MainPage", 
                ["Page" => "AccountManagement"]);
            } else if ($_SESSION["account"] != "2") {
                $show = parent :: view("RegistrationMainPage", 
                ["Page" => "Account"]);
            }
        }

        //Action hiện thị danh sách tài khoản
        public static function showAccountList() {
            if (App::isText($_POST['name'])) {
                $city = $_POST['city'];
                $name = strtolower(trim($_POST['name']));

                if (($city == "All") && ($name == "")) {
                        // tim tat ca tinh thanh
                        $query = parent :: model("AccountManagementModel");
                        $kq = $query -> getAllAccount($city);
                        echo json_encode($kq);
                        
                    
                } else if (($city != "All") && ($name == "")) {
                        //tim theo tinh thanh
                        $query = parent :: model("AccountManagementModel");
                        $kq = $query -> getAccountByCity($city);
                        echo json_encode($kq);
                        
                    
                } else if (($city == "All") && ($name != "")) {
                    // tim theo ten trong tat ca tinh thanh
                        $query = parent :: model("AccountManagementModel");
                        $kq = $query -> getAccountByName($name);
                        echo json_encode($kq);

                } else {
                     // tim theo ten theo tinh thanh
                        $query = parent :: model("AccountManagementModel");
                        $kq = $query -> getAccountByNameAndCity($city, $name);
                        echo json_encode($kq);
                }
            } else {echo json_encode ("error");}       
        }

        //Action thay đổi thông tin tài khoản
        public static function changeAccountInformation($ten = 0) {
            if ($ten != 0) {
                $name = str_replace("_"," ",$ten);
            } else {
                $name = $_SESSION['account'];
            }
            $query = parent :: model("AccountManagementModel");
            $kq = $query -> getAccountByName($name);
            if ($_SESSION["account"] == "1") {
                $show = parent :: view("MainPage", 
                [
                    "Page" => "Account",
                    "Ten" => ($kq)
                    
                ]);
            } else {
                $show = parent :: view("RegistrationMainPage", 
                [
                    "Page" => "Account",
                    "Ten" => ($kq)
                    
                ]);
            }
        }

        //Action sửa xóa tài khoản
        public static function CRUD() {
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
                trim($_POST['pho_giam_doc_2_phone']),trim($_POST['new_password']));
                echo json_encode($kq);
            }
        }
    }
?>