$(document).ready(function(){
    $("#username").keypress(function(event) {
        if (event.keyCode == "13") {
            event.preventDefault();
            $("#password").focus();
            
        }
    })

    $("#logbttn").click(function(event) { //xử lý đăng nhập
        if ($("#username").val() == "" && $("#password").val() == "") {
            event.preventDefault();
            $(".logContainer__space").html("Vui lòng nhập tên đăng nhập và mật khẩu.");
        } else if ($("#username").val() == "" && $("#password").val() != "") {
            event.preventDefault();
            $(".logContainer__space").html("Vui lòng nhập tên đăng nhập.");
        } else if ($("#username").val() != "" && $("#password").val() == "") {
            event.preventDefault();
            $(".logContainer__space").html("Vui lòng nhập mật khẩu.");
        } else {
            var mikExp = /[\$\\\\\#\^\&\*\(\)\[\]\+\_\{\}\`\~\=\\!\|\/\?\.\,\:\;\"\'\@]/;  //Kiểm tra hợp thức
            if ($("#username").val().search(mikExp) >= 0 || $("#password").val().search(mikExp) >= 0) {
                event.preventDefault();
                $(".logContainer__space").html("Vui lòng nhập đúng định dạng.");
            } else {
                $("#login").trigger( "submit" );
            }

        }
    })
})
