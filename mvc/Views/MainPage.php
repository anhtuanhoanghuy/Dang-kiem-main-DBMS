<!-- hiển thị giao diện trang chủ cho cục đăng kiểm -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/Dang-kiem-main-DBMS/">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet">
        <script type="text/javascript" src="/Dang-kiem-main-DBMS/public/js/jquery-3.2.1.min.js"></script>
        <link rel = "stylesheet" href = "/Dang-kiem-main-DBMS/public/css/Base.css">
        <link rel="stylesheet" href="/Dang-kiem-main-DBMS/public/css/Home.css">
        <link rel="stylesheet" href="/Dang-kiem-main-DBMS/public/css/Intro.css">
        <link rel="stylesheet" href="/Dang-kiem-main-DBMS/public/css/DataList.css">
        <link rel="stylesheet" href="/Dang-kiem-main-DBMS/public/css/Regis.css">
        <link rel="stylesheet" href="/Dang-kiem-main-DBMS/public/css/CarInformation.css">
        <link rel="stylesheet" href="/Dang-kiem-main-DBMS/public/css/Account.css">
        <link rel="stylesheet" href="/Dang-kiem-main-DBMS/public/css/AccountManagement.css">
        <link rel="stylesheet" href="/Dang-kiem-main-DBMS/public/css/CreateAccount.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <title>Trang chu</title>
        <script>
            function clearSession() {
                sessionStorage.clear();
            }
        </script>
    </head>
    <body>
        <div class="web">
            <div class="screen-cover" id="screen-cover"></div>
            <header class="introHeader">
                <div class="introHeader_logo">
                    <img alt ="png" class="introHeader_logo-img" src="/Dang-kiem-main-DBMS/public/img/logo.png">
                </div>
            </header>
            <div class="introNavigation_direction">
                <a href="/Dang-kiem-main-DBMS/Home" id="Home" class="introDirection"><span class="material-symbols-outlined" id="Home_icon">
                    home
                </span></a>



                <a href="/Dang-kiem-main-DBMS/Introduction" id="introduction" class="introDirection">Giới thiệu</a>
                <a href="/Dang-kiem-main-DBMS/RegistrationNetwork" id="regisCentre" class="introDirection">Mạng lưới đăng kiểm</a>
                <a href="/Dang-kiem-main-DBMS/Statistics" id="dataList" class="introDirection">Thống kê dữ liệu</a>
                <a id="Menu" onclick="dropDownMenu()">
                        <span class="material-symbols-outlined" id="Menu_icon">
                            menu
                        </span>
                </a>
                <a href="/Dang-kiem-main-DBMS/AccountManagement" id="Account" class="introDirection">Quản lý tài khoản</a>

                <ul class="menuList_content" id="menuList">
                    <li><a href="/Dang-kiem-main-DBMS/Home" id="menuHome">Trang chủ</a></li>
                    <li><a href="/Dang-kiem-main-DBMS/Introduction" id="menuIntroduction">Giới thiệu</a></li>
                    <li><a href="/Dang-kiem-main-DBMS/RegistrationNetwork" id="menuRegisCentre">Mạng lưới đăng kiểm</a></li>
                    <li><a href="/Dang-kiem-main-DBMS/Statistics" id="menuDataList">Thống kê dữ liệu</a></li>
                    <li><a href="/Dang-kiem-main-DBMS/AccountManagement" id="menuAccount">Quản lý tài khoản</a></li>
                </ul>

                
                <a href="/Dang-kiem-main-DBMS/mvc/Controllers/Logout.php" id="LogOut" onclick="clearSession()">Đăng xuất</a>
                <div class="Time"><div id="currentTime"></div></div>
                <script type="text/javascript" src="/Dang-kiem-main-DBMS/public/js/CurrentTime.js"></script>
                <script type="text/javascript" src="/Dang-kiem-main-DBMS/public/js/Introduction.js"></script>
            </div>
            
            <?php  
            if(isset($data["Page"])) {
                require($data["Page"].".php");
            }
            
            ?>
            <footer class="introFooter" >
                <div class="introFooterContainer_top">
                    <div class="introFooter_logo">
                        <img alt ="png" src="/Dang-kiem-main-DBMS/public/img/images_remove_BG.png">
                    </div>
                    <div class="introFooterContainer_content">
                        <div class="introFooterContainer_knowledgement">
                            <div><strong>© 2017 Bản quyền thuộc về Cục Đăng kiểm Việt Nam</strong></div>
                            <ul>
                                <li><b>Trụ sở chính:</b> 18 Đường Phạm Hùng, Phường Mỹ Đình 2, Quận Nam Từ Liêm, Hà Nội</li>
                                <li><b>Điện thoại:</b> +84.24.37684714 - 37684715 | <b>Fax:</b> +84.24.37684779</li>
                                <li><b>Email:</b> vr-id@vr.org.vn | <b>Website:</b> http://www.vr.org.vn​</li>
                            </ul>
                        </div>
                        <div class="introFooterContainer_categories">
                            <div class="footerCategories_title"><b>Chuyên mục</b></div>
                            <div class="footerCategories_list">
                                <ul>
                                    <li><a href="http://www.vr.org.vn/hoi-thao-truc-tuyen/Trang/default.aspx">Hội thảo trực tuyến</a></li>
                                    <li><a href="http://www.vr.org.vn/thu-tuc-hanh-chinh/Pages/default.aspx">Thủ tục hành chính</a></li>
                                    <li><a href="http://www.vr.org.vn/du-an/Trang/default.aspx">Dự án</a></li>
                                    <li><a href="http://www.vr.org.vn/gioi-thieu/Pages/tai-chinh.aspx?ItemID=4792">Tài chính</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>