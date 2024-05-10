<?php 
//Tạo tài khoản
class CreateAccount extends Controller {
        public static function showMainPage() {
            if ($_SESSION["account"] == "1") {
                $show = parent :: view("MainPage", 
                ["Page" => "CreateAccount"]);
            } else if ($_SESSION["account"] != "2") {
                $show = parent :: view("RegistrationMainPage", 
                ["Page" => "HomePage"]);
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