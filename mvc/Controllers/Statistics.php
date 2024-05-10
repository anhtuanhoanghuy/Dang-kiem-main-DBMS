<?php 
// Hiển thị trang Thống kê
    class Statistics extends Controller {
        public static function showMainPage() {
            if ($_SESSION["account"] == "1") {
                $show = parent :: view("MainPage", 
                ["Page" => "Statistics"]);
            } else if ($_SESSION["account"] != "2"){
                $show = parent :: view("RegistrationMainPage", 
                ["Page" => "Statistics"]);
            }

        }

        //Action hiển thị danh sách ô tô
        public static function showStatistics() {
                    
                    $city = $_POST['city'];
                    $vehicle_type = $_POST['vehicle_type'];
                    $vehicle_state = $_POST['vehicle_state'];

                    if ($_POST['registration_license_num'] != ""){
                        //Kiểm tra xem dữ liệu nhập vào khi loại bỏ kí tự đầu tiên có phải text không
                        if (App::isText(substr($_POST['registration_license_num'], 1))){
                            $registration_license_num = trim(substr($_POST['registration_license_num'], 1)); 
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
                    } else {
                        if($city == "All") {
                            if ($vehicle_state == "vehicle-state-all") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getAllCar();
                                echo json_encode($kq);

                                // tìm tất cả xe trong tất cả tỉnh"
                            } else if ($vehicle_state == "vehicle-state-near-expire") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getAllNearExpiredCar();
                                echo json_encode($kq);

                                //tìm tất cả xe trong tất cả tỉnh mà gần hết hạn"
                            } else if ($vehicle_state == "vehicle-state-expired") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getAllExpiredCar();
                                echo json_encode($kq);

                                // tìm tất cả xe trong tất cả tỉnh mà đã hết hạn
                            } else if ($vehicle_state == "vehicle-state-not-registered") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getAllUnregisteredCar();
                                echo json_encode($kq);

                                //tìm tất cả xe trong tất cả tỉnh mà chưa được đăng kiểm
                            } else if ($vehicle_state == "vehicle-state-registered") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getAllRegisteredCar();
                                echo json_encode($kq);

                                //tìm tất cả xe trong tất cả tỉnh mà đã được đăng kiểm
                            }
                        } else {
                            if ($vehicle_state == "vehicle-state-all") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getCarByCity($city);
                                echo json_encode($kq);

                                //tìm tất cả xe trong tỉnh
                            } else if ($vehicle_state == "vehicle-state-near-expire") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getCarByCityAndNearExpired($city);
                                echo json_encode($kq);

                                //tìm tất cả xe trong tỉnh  mà gần hết hạn
                            } else if ($vehicle_state == "vehicle-state-expired") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getCarByCityAndExpired($city);
                                echo json_encode($kq);

                                //tìm tất cả xe trong tỉnh mà đã hết hạn
                            } else if ($vehicle_state == "vehicle-state-not-registered") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getCarByCityAndUnregistered($city);
                                echo json_encode($kq);

                                // tìm tất cả xe trong tỉnh mà chưa được đăng kiểm
                            } else if ($vehicle_state == "vehicle-state-registered") {
                                $query = parent :: model("StatisticsModel");
                                $kq = $query -> getCarByCityAndRegistered($city);
                                echo json_encode($kq);

                                //tìm tất cả xe trong tỉnh mà đã được đăng kiểm
                            }
                        }
                    }
        }

        //Action hiển thị thông tin ô tô
        public static function showCarInformation($bien_so_xe) {
            $query = parent :: model("StatisticsModel");
            $kq = $query -> getCarByCarNumber($bien_so_xe);
            if ($_SESSION["account"] == "1") {
                $show = parent :: view("MainPage", 
                [
                    "Page" => "CarInformation",
                    "Bien_so_xe" => ($kq)
                    
                ]);
            } else {
                $show = parent :: view("RegistrationMainPage", 
                [
                    "Page" => "CarInformation",
                    "Bien_so_xe" => ($kq)
                    
                ]);
            }
            
        }
    }
?>