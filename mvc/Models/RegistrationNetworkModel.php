<?php
    class RegistrationNetworkModel extends Database{
        //lấy danh sách tất cả trung tâm đăng kiểm
        public function getAllRegistrationNetwork(){
            $sql = "SELECT * FROM registry_center";
            $result = $this ->conn->prepare($sql);
            $result->execute();
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách tất cả trung tâm đăng kiểm bởi thanh phố
        public function getRegistrationNetworkByCity($city){
            $sql = "SELECT * FROM registry_center WHERE tinh_thanh = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return  ($row);
        } 

        //lấy danh sách tất cả trung tâm đăng kiểm bởi tên
        public function getRegistrationNetworkByName($name){
            $sqlName = "%".$name."%";
            $sql = "SELECT * FROM registry_center WHERE ten LIKE ? ";
            $result = $this ->conn->prepare($sql);
            $result->execute([$sqlName]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //lấy danh sách tất cả trung tâm đăng kiểm bởi tên và thành phố
        public function getRegistrationNetworkByNameAndCity($city, $name){
            $sqlName = "%".$name."%";
            $sql = "SELECT * FROM registry_center WHERE tinh_thanh = ? AND ten LIKE ? ";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city, $sqlName]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

    } 

?>