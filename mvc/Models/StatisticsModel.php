<?php
    class StatisticsModel extends Database{
        //lấy danh sách thông tin tất cả ô tô
        public function getAllCar(){
            $sql = "SELECT * FROM car_information";
            $result = $this ->conn->prepare($sql);
            $result->execute();
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô gần hết hạn đăng kiểm
        public function getAllNearExpiredCar(){
            $sql = "SELECT * FROM car_information WHERE Trang_thai = 'Sắp hết hạn'";
            $result = $this ->conn->prepare($sql);
            $result->execute();
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return  ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô đã hết hạn đăng kiểm
        public function getAllExpiredCar(){
            $sql = "SELECT * FROM car_information WHERE Trang_thai = 'Đã hết hạn'";
            $result = $this ->conn->prepare($sql);
            $result->execute();
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô chưa đăng kiểm
        public function getAllUnregisteredCar(){
            $sql = "SELECT * FROM car_information WHERE Trang_thai = 'Chưa đăng kiểm'";
            $result = $this ->conn->prepare($sql);
            $result->execute();
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô đã đăng kiểm
        public function getAllRegisteredCar(){
            $sql = "SELECT * FROM car_information WHERE Trang_thai = 'Đã đăng kiểm'";
            $result = $this ->conn->prepare($sql);
            $result->execute();
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô bởi thành phố
        public function getCarByCity($city){
            $sql = "SELECT * FROM car_information WHERE Noi_dang_ky = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô bởi thành phố gần hết hạn đăng kiểm
        public function getCarByCityAndNearExpired($city){
            $sql = "SELECT * FROM car_information WHERE Noi_dang_ky = ? AND Trang_thai = 'Sắp hết hạn'";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return  ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô bởi thành phố đã hết hạn đăng kiểm
        public function getCarByCityAndExpired($city){
            $sql = "SELECT * FROM car_information WHERE Noi_dang_ky = ? AND Trang_thai = 'Đã hết hạn'";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô bởi thành phố chưa đăng kiểm
        public function getCarByCityAndUnregistered($city){
            $sql = "SELECT * FROM car_information WHERE Noi_dang_ky = ? AND Trang_thai = 'Chưa đăng kiểm'";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách thông tin tất cả ô tô bởi thành phố đã đăng kiểm
        public function getCarByCityAndRegistered($city){
            $sql = "SELECT * FROM car_information WHERE Noi_dang_ky = ? AND Trang_thai = 'Đã đăng kiểm'";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy thông tin xe bởi biển số xe
        public function getCarByCarNumber($city){
            $sql = "SELECT * FROM car_information WHERE Bien_so = ? OR Bien_so = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city,str_replace($city[2],$city[2]."-",$city)]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy thông tin xe bởi số đăng ký xe
        public function getCarByRegistrationNumber($city){
            $sql = "SELECT * FROM car_information WHERE So_dang_ky_xe = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //chấp nhận đăng kiểm xe
        public function acceptCar($registration_license_num) {
            $a = chr(mt_rand(65, 90));
            $b = chr(mt_rand(65, 90));
            $code = $a . $b . "-" . mt_rand(1000000, 9999999);
            $sql = "UPDATE car_information SET Ngay_dang_kiem_gan_nhat = CURRENT_DATE,
            Ngay_het_han = DATE_ADD(Ngay_dang_kiem_gan_nhat, INTERVAL 730 DAY),
            Ma_dang_kiem = ?,
            Trang_thai = 'Đã đăng kiểm',
            Noi_dang_kiem = ?
            WHERE Bien_so = ?
            ";
            $result = $this ->conn->prepare($sql);
            $result->execute([$code, substr($_SESSION['account'],47), $registration_license_num]);
            $sql = "SELECT Ngay_dang_kiem_gan_nhat, Ngay_het_han, Ma_dang_kiem, Trang_thai, Noi_dang_kiem FROM car_information WHERE Bien_so = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$registration_license_num]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        }
    } 
    

?>