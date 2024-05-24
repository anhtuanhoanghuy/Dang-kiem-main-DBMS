<?php 
//Tạo tài khoản
require("JWT.php");
class CreateAccount extends Controller {
        public static function showMainPage() {
            if (isset($_COOKIE["token"])) {
                $token = $_COOKIE["token"];
                $jsonwebtoken = JWT::decode($token,"30102002",true);
                if(json_encode($jsonwebtoken->role) == '1') {
                    $show = parent :: view("MainPage", 
                    ["Page" => "CreateAccount"]);
                }
            }
        }

        //Action tạo tài khoản
        public static function createAccount() {
                $query = parent :: model("AccountManagementModel");
                $kq = $query -> createAccount(trim($_POST['ten']),trim($_POST['dia_chi']),
                trim($_POST['dien_thoai']),trim($_POST['fax']),trim($_POST['email']),
                trim($_POST['giam_doc']),trim($_POST['giam_doc_phone']),trim($_POST['pho_giam_doc_1']),
                trim($_POST['pho_giam_doc_1_phone']),trim($_POST['pho_giam_doc_2']),
                trim($_POST['pho_giam_doc_2_phone']),trim($_POST['user_name']),trim($_POST['password']));
                echo json_encode($kq);
        }
    }
?>