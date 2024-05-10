
var ten = $("#ten").val();
var dia_chi = $("#dia_chi").val();
var email = $("#email").val();
var dien_thoai = $("#dien_thoai").val();
var fax = $("#fax").val();
var giam_doc = $("#giam_doc").val();
var giam_doc_phone = $("#giam_doc_phone").val();
var pho_giam_doc_1 = $("#pho_giam_doc_1").val();
var pho_giam_doc_1_phone = $("#pho_giam_doc_1_phone").val();
var pho_giam_doc_2 = $("#pho_giam_doc_2").val();
var pho_giam_doc_2_phone = $("#pho_giam_doc_2_phone").val();
var old_password = $("#old_password").val();
var new_password = $("#new_password").val();
var re_password = $("#re_password").val();

document.getElementById("btn-Account-cancel").onclick = function() {
    $("#ten").val(ten);
    $("#dia_chi").val(dia_chi);
    $("#email").val(email);
    $("#dien_thoai").val(dien_thoai);
    $("#fax").val(fax);
    $("#giam_doc").val(giam_doc);
    $("#giam_doc_phone").val(giam_doc_phone);
    $("#pho_giam_doc_1").val(pho_giam_doc_1);
    $("#pho_giam_doc_1_phone").val(pho_giam_doc_1_phone);
    $("#pho_giam_doc_2").val(pho_giam_doc_2);
    $("#pho_giam_doc_2_phone").val(pho_giam_doc_2_phone);
    $("#old_password").val(old_password);
    $("#new_password").val(new_password);
    $("#re_password").val(re_password);
}

if(document.getElementById("btn-Account-delete")){
    document.getElementById("btn-Account-delete").onclick = function() {
    document.getElementById("alert").innerHTML = "Xác nhận xóa tài khoản, không thể hoàn tác";
////popup
    document.getElementById("popup").style.display = "Block";
    document.getElementById("screen-cover").style.display = "Block";/****thêm******/
    document.getElementById("yes").onclick = () =>{
        $.post("./AccountManagement/CRUD",{method:"delete",ten:ten},function(data){  //AJAX không tải lại
            history.back();       
        })

    }
    document.getElementById("cancel").onclick = ()=>{
        document.getElementById("popup").style.display = "none";
        document.getElementById("screen-cover").style.display = "none";/****thêm******/
    }
}
}

document.getElementById("btn-Account-save").onclick = function() {
    //hiện pop up sau đó nếu bấm nút đòng ý thì chạy lệnh dòng 46 -> hết hàm
   
        var ten = $("#ten").val();
        var dia_chi = $("#dia_chi").val();
        var email = $("#email").val();
        var dien_thoai = $("#dien_thoai").val();
        var fax = $("#fax").val();
        var giam_doc = $("#giam_doc").val();
        var giam_doc_phone = $("#giam_doc_phone").val();
        var pho_giam_doc_1 = $("#pho_giam_doc_1").val();
        var pho_giam_doc_1_phone = $("#pho_giam_doc_1_phone").val();
        var pho_giam_doc_2 = $("#pho_giam_doc_2").val();
        var pho_giam_doc_2_phone = $("#pho_giam_doc_2_phone").val();
        var old_password = $("#old_password").val();
        var new_password = $("#new_password").val();
        var re_password = $("#re_password").val();
        if (dia_chi != "" && validatePhoneNumber(fax)==true &&
            validatePhoneNumber(dien_thoai)==true &&
            validatePhoneNumber(giam_doc_phone)==true &&
            validateEmail(email) == true &&
            validateName (giam_doc) ==true && 
            checkPassword(old_password,new_password,re_password) == true) { 
                var status = true
                if (pho_giam_doc_1 != "" && validateName (pho_giam_doc_1) == false){
                    status = false};
                if (pho_giam_doc_1_phone != "" && validatePhoneNumber(pho_giam_doc_1_phone)== false){
                    status = false};   
                if (pho_giam_doc_2 != "" && validateName (pho_giam_doc_2) == false){
                    status = false};
                if (pho_giam_doc_2_phone != "" && validatePhoneNumber(pho_giam_doc_2_phone)== false){
                    status = false};
                if (status == true){
                    document.getElementById("alert").innerHTML = "Xác nhận thay đổi thông tin tài khoản";
                    document.getElementById("popup").style.display = "Block";
                    document.getElementById("screen-cover").style.display = "Block";/****thêm******/
                    document.getElementById("yes").onclick  = function(){

                    $.post("./AccountManagement/CRUD",{method:"update",
                    ten:ten,dia_chi:dia_chi,dien_thoai:dien_thoai,fax:fax,email:email,
                    giam_doc:giam_doc,giam_doc_phone:giam_doc_phone,
                    pho_giam_doc_1:pho_giam_doc_1,pho_giam_doc_1_phone:pho_giam_doc_1_phone,
                    pho_giam_doc_2:pho_giam_doc_2,pho_giam_doc_2_phone:pho_giam_doc_2_phone,
                    new_password:new_password},function(data){  //AJAX không tải lại
                    data =  JSON.parse(data);
                    document.getElementById("popup").style.display = "none";
                    document.getElementById("screen-cover").style.display = "none";/****thêm******/
                    alert("Cập nhật thông tin thành công");})
                    }
                    document.getElementById("cancel").onclick = function() {
                        document.getElementById("popup").style.display = "none";
                        document.getElementById("screen-cover").style.display = "none";/****thêm******/
                    }
                } else {
                    alert("Vui lòng kiểm tra lại thông tin");
                }
        } else {
            alert("Vui lòng kiểm tra lại thông tin");
        }

    }


//Xử lý email
function validateEmail(inputText){
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.match(mailformat)){
    // console.log("email đúng");
return true;}
else {
    // console.log("email không đúng định dạng");
return false;}
}

//Xử lý sdt

    function validatePhoneNumber(mobile) {
        var vnf_regex = /((01|02|03|04|05|06|07|08|09)+([0-9]{8})\b)/g;
        if(mobile !==''){
            if (vnf_regex.test(mobile) == false) 
            {
                // console.log('Số điện thoại không đúng định dạng!');
                return false
            }else{
                // console.log('Số điện thoại của bạn hợp lệ!');
                return true;
            }
        }else{
            // console.log('Bạn chưa điền số điện thoại!');
            return false
        }
    }

// xử lý họ tên
function validateName (str) {
    if (str === null || str === undefined) return str;
    str = str.toLowerCase();
    str = str.replaceAll(" ", "");
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    var re = /^[a-zA-Z!@#\$%\^\&*\)\(+=._-]{2,}$/g; // regex here
    return re.test(str);
}
function checkPassword(old_pass,new_pass,re){
    var pass = document.getElementById("old_pass").innerHTML;
    if (old_pass =="") {
        if (new_pass == "" && re == "") {
            return true;
        }
        else {
            // console.log("Nhập mk cũ");
            return false;
            
        }
    } else {
        if (old_pass != pass) {
            // console.log ("MK cũ không đúng");
            // console.log (old_pass);
            // console.log(pass);
            return false;
            
        } else {
            if (new_pass == "" && re == "") {
                return true;
            } else if (new_pass != re ) {
                // console.log("MK mới và nhập lại mk mới phải giống nhau");
                return false;
                
            } else {
                return true;
            }
        }
    }
}




