document.getElementById("btn-Account-cancel").onclick = function() {
    history.back();
}

document.getElementById("btn-Account-create").onclick = function() {
    document.getElementById("btn-Account-create").style.disabled = true;
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
    var user_name = $("#user_name").val();
    var password = $("#password").val();
    if (dia_chi != "" && validatePhoneNumber(fax)==true &&
        validatePhoneNumber(dien_thoai)==true &&
        validatePhoneNumber(giam_doc_phone)==true &&
        validateEmail(email) == true &&
        validateName (giam_doc) ==true) { 
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
                $.post("./CreateAccount/createAccount",{
                ten:ten,dia_chi:dia_chi,dien_thoai:dien_thoai,fax:fax,email:email,
                giam_doc:giam_doc,giam_doc_phone:giam_doc_phone,
                pho_giam_doc_1:pho_giam_doc_1,pho_giam_doc_1_phone:pho_giam_doc_1_phone,
                pho_giam_doc_2:pho_giam_doc_2,pho_giam_doc_2_phone:pho_giam_doc_2_phone,
                user_name:user_name,password:password},function(data){  //AJAX không tải lại
                data =  JSON.parse(data);
                alert("Cập nhật thông tin thành công");     //dữ liệu JSON
                // console.log(data);
                })
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
    
    
    
    
    