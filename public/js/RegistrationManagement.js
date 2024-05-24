document.getElementById("car_info").style.display = "None";

$("#registration-license-num").on("keyup", function() { //kiểm tra hợp thức
    var check = document.getElementById("check");
    if ($("#registration-license-num").val() != "") {
        var text = $("#registration-license-num").val();
        if (text.charAt(0) != "#" && text.charAt(0) != "%") {
            check.innerHTML = "Trường nhập bắt dầu bằng '%' với số đăng ký xe hoặc '#' với biển số xe !";
        } else {
            var mikExp = /[\$\\\\\#\^\&\*\(\)\[\]\+\_\{\}\`\~\=\\!\|\/\?\.\,\:\;\"\'\@]/;  //Kiểm tra hợp thức
            if (text.slice(1).search(mikExp) >= 0) {
                check.innerHTML = "Vui lòng nhập đúng định dạng.";  
            } else {
                check.innerHTML = "";
            }
        }
    } else {
        check.innerHTML = "";
    }
    
});   
$("#registration-license-num").keypress(function(event) {
    if (event.keyCode == "13") {
        event.preventDefault();
        searchVehicleData();
        $("#registration-license-num").blur();
    }
})

function searchVehicleData() { //tìm kiếm xe
    document.getElementById("car_info").style.display = "None";
    document.getElementById("popup").style.display = "none";
    var registration_license_num = $("#registration-license-num").val();
    if (registration_license_num == "") {
        document.getElementById("status").style.display = "block";
        document.getElementById("warning").innerHTML = "Vui lòng nhập số đăng ký xe hoặc biển số xe.";
    } else {
    $.post("./RegistrationManagement/showRegistrationCar", //AJAX không tải lại
    {registration_license_num:registration_license_num},function(data){
            data =  JSON.parse(data); //dữ liệu JSON
            if (data == "error") {
            document.getElementById("status").style.display = "block";
            document.getElementById("warning").innerHTML = "Vui lòng nhập đúng định dạng.";
            
            } else if(data.length == 0) {
                document.getElementById("status").style.display = "block"; 
                if(registration_license_num == "") {
                    document.getElementById("warning").innerHTML = "Không tìm thấy xe";
                } else {
                    if(registration_license_num.charAt(0) == "#") {document.getElementById("warning").innerHTML = "Không tìm thấy xe có biển số: "+registration_license_num.substr(1);} 
                    else if (registration_license_num.charAt(0) == "%") {document.getElementById("warning").innerHTML = "Không tìm thấy xe có số đăng ký xe: "+registration_license_num.substr(1);} 
                }
            } else {
                document.getElementById("warning").innerHTML = "";
                document.getElementById("car_info").style.display = "Block";
                $("#profile_image").attr('src',data[0].Anh_chu_xe);
                $("#car_image").attr('src',data[0].Anh_xe);
               $(".Bien_so").html(data[0].Bien_so);
               $(".So_dang_ky_xe").html(data[0].So_dang_ky_xe);
               $(".So_khung").html(data[0].So_khung);
               $(".Ten_chu_xe").html(data[0].Ten_chu_xe);
               $(".Ngay_sinh").html(data[0].Ngay_sinh); 
               $(".Dia_chi").html(data[0].Dia_chi);
               $(".Noi_dang_ky").html(data[0].Noi_dang_ky);
               $(".Ngay_cap").html(data[0].Ngay_cap);
               $(".Hang_san_xuat").html(data[0].Hang_san_xuat);
               $(".Nuoc_san_xuat").html(data[0].Nuoc_san_xuat);
               $(".Chieu_dai").html(data[0].Chieu_dai);
               $(".Chieu_rong").html(data[0].Chieu_rong);
               $(".Chieu_cao").html(data[0].Chieu_cao);
               $(".Size").html(data[0].Chieu_dai + " x " + data[0].Chieu_rong + " x " + data[0].Chieu_cao);
               $(".Khoi_luong").html(data[0].Khoi_luong);
               $(".Khoi_luong_tong").html(data[0].Khoi_luong + 300);
               $(".So_nguoi").html(data[0].So_nguoi);
               $(".Chieu_dai_co_so").html(data[0].Chieu_dai_co_so);
               $(".Trang_thai").html(data[0].Trang_thai);
               $(".Ma_dang_kiem").html(data[0].Ma_dang_kiem);
               if (data[0].Trang_thai != "Chưa đăng kiểm") {
                $("#date").html(data[0].Ngay_dang_kiem_gan_nhat.slice(8));
                $("#month").html(data[0].Ngay_dang_kiem_gan_nhat.slice(5,7));
                $("#year").html(data[0].Ngay_dang_kiem_gan_nhat.slice(0,4));
               }
                if (data[0].Trang_thai == "Đã đăng kiểm") {
                   $(".Ngay_dang_kiem_gan_nhat").html(data[0].Ngay_dang_kiem_gan_nhat);
                   $(".Ngay_het_han").html(data[0].Ngay_het_han);
                    document.getElementById("accept").disabled = true;
                    document.getElementById("accept").classList.add('button-disabled');
                    document.getElementById("print").style.disabled = false;
                    document.getElementById("print").classList.remove('button-disabled');
                    document.getElementById("view").style.disabled = false;
                    document.getElementById("view").classList.remove('button-disabled');
                    document.getElementById("print").onclick = function(event) {
                        document.getElementById("pop_up").classList.remove("pop_up");
                        document.getElementById("pop_up").classList.add("printThis");
                        print();
                    };
                    document.getElementById("view").onclick = function() {
                        document.getElementById("pop_up").classList.remove("printThis");
                        document.getElementById("pop_up").classList.add("pop_up");
                        
                        document.getElementById("pop_up").style.display = "Block";
                        document.getElementById("screen-cover").style.display = "Block";/****thêm******/   
    
                    }
                } else if (data[0].Trang_thai == "Chưa đăng kiểm") {
                    document.getElementById("print").style.disabled = true;
                    document.getElementById("view").style.disabled = true;
                    document.getElementById("print").onclick = function(event) {
                        event.preventDefault;
                    }
                    document.getElementById("print").classList.add('button-disabled');
                    document.getElementById("view").classList.add('button-disabled');

                    $(".Ngay_dang_kiem_gan_nhat").html("");
                    $(".Ngay_het_han").html("");
                    document.getElementById("accept").disabled= false;
                    document.getElementById("accept").classList.remove('button-disabled');
                } else {
                    $(".Ngay_dang_kiem_gan_nhat").html(data[0].Ngay_dang_kiem_gan_nhat);
                    $(".Ngay_het_han").html(data[0].Ngay_het_han);
                    document.getElementById("accept").disabled= false;
                    document.getElementById("accept").classList.remove('button-disabled');
                    document.getElementById("print").style.disabled = false;
                    document.getElementById("view").style.disabled = false;
                    document.getElementById("view").classList.remove('button-disabled');
                    document.getElementById("print").classList.remove('button-disabled');
                    document.getElementById("print").onclick = function(event) {
                        document.getElementById("pop_up").classList.remove("pop_up");
                        document.getElementById("pop_up").classList.add("printThis");
                        print();
                    };
                    document.getElementById("view").onclick = function() {
                        document.getElementById("pop_up").classList.remove("printThis");
                        document.getElementById("pop_up").classList.add("pop_up");
                        document.getElementById("pop_up").style.display = "Block";
                        document.getElementById("screen-cover").style.display = "Block";/****thêm******/   
    
                    }
                }
               $(".Noi_dang_kiem").html(data[0].Noi_dang_kiem);
                document.getElementById("accept").onclick = function() {
                    document.getElementById("popup").style.display = "Block";
                    document.getElementById("screen-cover").style.display = "block";/****thêm******/
                    document.getElementById("yes").onclick = () =>{
                        document.getElementById("print").style.disabled = false;
                        document.getElementById("print").classList.remove('button-disabled');
                        document.getElementById("view").style.disabled = false;
                        document.getElementById("view").classList.remove('button-disabled');
                        document.getElementById("view").onclick = function() {
                            document.getElementById("pop_up").classList.remove("printThis");
                            document.getElementById("pop_up").classList.add("pop_up");
                            document.getElementById("pop_up").style.display = "Block";
                            document.getElementById("screen-cover").style.display = "Block";/****thêm******/        
                        }
                        document.getElementById("print").onclick = function(event) { //in chứng chỉ
                            document.getElementById("pop_up").classList.remove("pop_up");
                            document.getElementById("pop_up").classList.add("printThis");
                            print();
                        };
                        $.post("./RegistrationManagement/registerCar", //AJAX không tải lại
                        {registration_license_num:data[0].Bien_so},function(data){
                            var registrationData =  JSON.parse(data); //dữ liệu JSON
                            $(".Trang_thai").html(registrationData[0].Trang_thai);
                            $(".Ma_dang_kiem").html(registrationData[0].Ma_dang_kiem);
                            $(".Ngay_dang_kiem_gan_nhat").html(registrationData[0].Ngay_dang_kiem_gan_nhat);
                            $(".Ngay_het_han").html(registrationData[0].Ngay_het_han);
                            $(".Noi_dang_kiem").html(registrationData[0].Noi_dang_kiem);
                            document.getElementById("accept").disabled= "true";
                            document.getElementById("accept").classList.add('button-disabled');
                            document.getElementById("popup").style.display = "none";
                            document.getElementById("screen-cover").style.display = "none";/****thêm******/

                        }
                        )
                    }
                    document.getElementById("cancel").onclick = ()=>{
                        document.getElementById("popup").style.display = "none";
                        document.getElementById("screen-cover").style.display = "none";/****thêm******/
                    }

                    if (document.getElementById("popup").style.display == "block") {
                        window.addEventListener("click", function(event) {
                            if (!event.target.matches('#popup') && !event.target.matches('#yes') && !event.target.matches('#cancel') && !event.target.matches('#accept')) {
                                document.getElementById("popup").style.display = "none";
                                document.getElementById("screen-cover").style.display = "none";/****thêm******/
                            } else {}
                        })
                    }   
                }
            }        
    }
)}
}

window.addEventListener("click", function(event) {
    if (event.target.matches('#screen-cover')) {
            document.getElementById("pop_up").style.display = "none";
            document.getElementById("screen-cover").style.display = "none";/****thêm******/
            document.getElementById("pop_up").removeAttribute("style");
        } else {}
})
