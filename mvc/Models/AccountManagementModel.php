<?php
    class AccountManagementModel extends Database{
        //Lấy danh sách tài khoản
        public function getAllAccount(){
            $sql = "SELECT account.user_name, account.pass_word, account.role, registry_center.* FROM account INNER JOIN registry_center ON account.ten = registry_center.ten";
            $result = $this ->conn->prepare($sql);
            $result->execute();
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 
        //Lấy danh sách tài khoản bởi thành phố
        public function getAccountByCity($city){
            $sql = "SELECT account.user_name, account.pass_word, account.role, registry_center.* FROM account LEFT JOIN registry_center ON account.ten = registry_center.ten WHERE tinh_thanh = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //Lấy danh sách tài khoản bởi tên
        public function getAccountByName($name){
            $sqlName = "%".$name."%";
            $sql = "SELECT account.user_name, account.pass_word, account.role, registry_center.* FROM account LEFT JOIN registry_center ON account.ten = registry_center.ten WHERE registry_center.ten LIKE ? ";
            $result = $this ->conn->prepare($sql);
            $result->execute([$sqlName]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //Lấy danh sách tài khoản bởi thành phố và tên
        public function getAccountByNameAndCity($city, $name){
            $sqlName = "%".$name."%";
            $sql = "SELECT account.user_name, account.pass_word, account.role, registry_center.* FROM account LEFT JOIN registry_center ON account.ten = registry_center.ten WHERE tinh_thanh = ? AND registry_center.ten LIKE ? ";
            $result = $this ->conn->prepare($sql);
            $result->execute([$city, $sqlName]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        } 

        //cập nhật tài khoản
        public function updateAccount($ten,$dia_chi,
        $dien_thoai,$fax,$email,
        $giam_doc,$giam_doc_phone,$pho_giam_doc_1,
        $pho_giam_doc_1_phone,$pho_giam_doc_2,
        $pho_giam_doc_2_phone,$new_pass_word) {
            $sql = "UPDATE account SET pass_word = ? WHERE ten = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$new_pass_word,$ten]);
            $sql = "UPDATE registry_center SET dia_chi = ?,dien_thoai = ?,fax = ?,email = ?,giam_doc = ?,giam_doc_phone = ?,pho_giam_doc_1 = ?,
            pho_giam_doc_1_phone = ?,pho_giam_doc_2= ?,
            pho_giam_doc_2_phone = ? WHERE ten = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$dia_chi,
            $dien_thoai,$fax,$email,
            $giam_doc,$giam_doc_phone,$pho_giam_doc_1,
            $pho_giam_doc_1_phone,$pho_giam_doc_2,
            $pho_giam_doc_2_phone,$ten]);
            $sql = "SELECT account.user_name, account.pass_word, account.role, registry_center.* FROM account LEFT JOIN registry_center ON account.ten = registry_center.ten WHERE registry_center.ten = ? ";
            $result = $this ->conn->prepare($sql);
            $result->execute([$ten]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        }

        //xóa tài khoản
        public function deleteAccount($ten){
            $sql = "DELETE FROM account WHERE ten = ?";
            $result = $this ->conn->prepare($sql);
            $result->execute([$ten]);
        } 

        //tạo tài khoản
        public function createAccount($ten,$dia_chi,
        $dien_thoai,$fax,$email,
        $giam_doc,$giam_doc_phone,$pho_giam_doc_1,
        $pho_giam_doc_1_phone,$pho_giam_doc_2,
        $pho_giam_doc_2_phone,$user_name,$pass_word) {
            $sql = "INSERT INTO registry_center(ten,tinh_thanh,dia_chi,dien_thoai,
            fax,email,giam_doc,giam_doc_phone,pho_giam_doc_1,
            pho_giam_doc_1_phone,pho_giam_doc_2,
            pho_giam_doc_2_phone) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $result = $this ->conn->prepare($sql);
            $result->execute([$ten,substr($ten,47),$dia_chi,
            $dien_thoai,$fax,$email,
            $giam_doc,$giam_doc_phone,$pho_giam_doc_1,
            $pho_giam_doc_1_phone,$pho_giam_doc_2,
            $pho_giam_doc_2_phone]); 
            $sql = "INSERT INTO account(user_name,pass_word,city,
            ten,role) VALUES (?,?,?,?,?)";
            $result = $this ->conn->prepare($sql);
            $result->execute([$user_name,$pass_word,
            substr($ten,47),$ten,"0"]);
            $sql = "SELECT * FROM account INNER JOIN registry_center ON account.ten = registry_center.ten WHERE registry_center.ten = ? ";
            $result = $this ->conn->prepare($sql);
            $result->execute([$ten]);
            $row = $result -> fetchAll(PDO::FETCH_ASSOC);
            return ($row);
        }

    } 
    

?>