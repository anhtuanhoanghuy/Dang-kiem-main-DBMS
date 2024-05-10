<!-- hiển thị giao diện đăng nhập -->
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/Dang-kiem-main-DBMS/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./public/js/jquery-3.2.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet">
    <link href = "./public/css/Base.css" rel = "stylesheet">
    <link href = "./public/css/Login.css" rel = "stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <title>Dang nhap</title>
</head>
<body>
    <div class = "background">
        <div class="web">
            <header class="logHeader">
                <div class="logHeader__logo">
                    <img src="./public/img/images_remove_BG.png" />
                </div>
            </header>
            
            <div class="logContainer">
                <h1 class="logContainer__header">
                        Đăng nhập
                </h1>
                <div class="logContainer__mid">
                    <form id = "login" action = "./mvc/Controllers/Login.php" method = "POST">
                        <div class="logContainer__mid1">
                            <div class="logContainer__mid1-item">
                                <label for="username">Tài Khoản</label>
                            </div>
                            <div class="logContainer__mid1-label">
                                <input type="text" id = "username" placeholder="Enter Account" name = "username"/>
                            </div>
                        </div>
                        <div class="logContainer__mid2">
                            <div id = "current password" class="logContainer__mid2-item">
                                <label for="password">Mật khẩu</label>
                            </div>
                            <div class="logContainer__mid2-label">
                                <input type="password" id = "password" placeholder="Enter Password" name="password"/>
                            </div>
                        </div>
                        <div class="logContainer__space"></div>
                        <div class="logContainer__footer">
                            <button type = "submit" id = "logbttn" class="logContainer__footer-button" name = "logbttn">
                                <span class="logContainer__footer-button-login">Đăng nhập</span>
                            </button>
                            <button class ="guest-bttn" type = "submit" name = "guest_login">
                                <span class="guest-login" name="guest">Đăng nhập với tư cách khách</span>
                            </button>
                        </div>
                        
                    </form>
                   
                </div>
                
            </div>
           
    
            <footer class="footer">
    
            </footer>
        </div>
    </div>
   <script src="./public/js/Login.js"></script>
</body>
</html>