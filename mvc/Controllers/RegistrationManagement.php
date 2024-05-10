<?php 
//Quản lý đăng kiểm
class RegistrationManagement extends Controller {
        public static function showMainPage() {
                $show = parent :: view("RegistrationMainPage", 
                ["Page" => "RegistrationManagement"]);
        }

        //Action hiển thị thông tin Ô tô
        public static function showRegistrationCar() {
        
                        //Kiểm tra xem dữ liệu nhập vào khi loại bỏ kí tự đầu tiên có phải text không
                        if (App::isText(substr($_POST['registration_license_num'], 1))){               
                            $registration_license_num = strtolower(trim(substr($_POST['registration_license_num'], 1))); 
                            //Nếu kí tự đầu tiên là '#' thì tìm theo biển số
                            if (substr($_POST['registration_license_num'], 0, 1) == "#") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getCarByCarNumber($registration_license_num);
                                echo json_encode($kq);
                            } else if (substr($_POST['registration_license_num'], 0, 1) == "%") {
                                // Nếu kí tự đầu tiên là '$' thì tìm theo số đăng ký xe
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getCarByRegistrationNumber($registration_license_num);
                                echo json_encode($kq);
                            } else {
                                echo json_encode("error");
                            }

                        } else {
                            //Dữ liệu nhập vào không hợp lệ
                            echo json_encode("error");
                        }
                     
        }

        //Action đăng kiểm ô tô
        public static function registerCar() {
                        $registration_license_num = $_POST['registration_license_num'];
                        $query = parent :: model("StatisticsModel");
                        $kq = $query -> acceptCar($registration_license_num);
                        echo json_encode($kq);
                

            
        }
    }
?>