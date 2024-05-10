<!-- hiển thị giao diện quản lý đăng kiểm -->
<div class = "hideThis" id = "hideThis">
<div class="container">
                <h1 class="container-header"><a>QUẢN LÝ ĐĂNG KIỂM</a></h1>
                <div class="container-content">
                    <form action="">
                        <div class="form-items">
                            <label for="registration-license-num">Số đăng ký xe/ Biển số xe:</label>
                            <input type="text" name="registration-license-num" id="registration-license-num" placeholder="Tìm kiếm">
                        </div>
                        
                        <div class="form-items">
                            <button type="button" value="Submit" onclick="searchVehicleData()" id="dataList-search-button">Tra cứu</button>
                        </div>
                    </form>
                    <div id="check"></div>
                    <div class = "status" id = "status">
                            <p id="warning"></p>
                    </div>
                </div> 
                <div id="popup">
                    <p id = "alert">Xác nhận đăng kiểm xe này, không thể hoàn tác</p>
                    <div id = "Button">
                    <button id = "yes">Đồng ý</button>
                    <button id = "cancel">Hủy bỏ</button>
                    </div>
                </div>
</div>

<div id = "car_info" class="container">

                <div class="Container-content">
                    <div class="container-content-top">
                        <div class="container-content-section-1">
                            <div class="avatar">
                                <img src="./public/img/gaixinh.jpg" alt="">
                            </div>
                            <div class = "car-information">
                                <div>Biển số xe: <strong class ="Bien_so"></strong></div>
                                <div>Số đăng ký xe: <strong class ="So_dang_ky_xe"></strong></div>
                                <div>Tên chủ xe: <strong class ="Ten_chu_xe"></strong></div>
                                <div>Ngày sinh: <strong class ="Ngay_sinh"></strong></div>
                                <div>Địa chỉ: <strong class ="Dia_chi"></strong></div>
                                <div>Nơi đăng ký xe: <strong class ="Noi_dang_ky"></strong></div>
                                <div>Ngày cấp đăng ký xe: <strong class ="Ngay_cap"></strong></div>
                            </div>
                        </div>
                        <div class="container-content-section-2">
                            <div class = "car-information">
                                <div>Hãng sản xuất: <strong class ="Hang_san_xuat"></strong> </div>
                                <div>Nước sản xuất: <strong class ="Nuoc_san_xuat"></strong> </div>
                                <div>Năm sản xuất: <strong>2012</strong></div>
                                <div>Chiều dài: <strong class="Chieu_dai"></strong></div>
                                <div>Chiều rộng: <strong class="Chieu_rong"> </strong></div>
                                <div>Chiều cao: <strong class ="Chieu_cao"></strong></div>
                                <div>Khối lượng: <strong class ="Khoi_luong"></strong></div>
                                <div>Số người ngồi: <strong class ="So_nguoi"></strong></div>
                                <div>Chiều dài cơ sở: <strong class ="Chieu_dai_co_so"></strong></div>
                            </div>
                            <div class="car-information">
                                <div>Trạng thái: <strong class ="Trang_thai"></strong></div>
                                <div>Mã đăng kiểm: <strong class ="Ma_dang_kiem"></strong></div>
                                <div>Ngày đăng kiểm gần nhất: <strong class ="Ngay_dang_kiem_gan_nhat"></strong></div>
                                <div>Ngày hết hạn đăng kiểm: <strong class ="Ngay_het_han"></strong></div>
                                <div>Nơi đăng kiểm: <strong class ="Noi_dang_kiem"></strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="container-content-bottom">
                        <div class="car">
                            <img src="./public/img/car.jpg" alt="">
                        </div>
                        <div>
                            <button id = "accept">Chấp nhận đăng kiểm</button>
                            <button id = "view">Xem chứng chỉ điện tử</button>
                            <button id ="print">In kết quả đăng kiểm</button>
                        </div>
                    </div>
                </div>
</div>
</div>

<div id = "pop_up" class = "pop_up">
<img src="./public/img/vector-trong-dong-innhanmac-2.jpg" alt="image" style="width: 100%; opacity: 0.4;">
        <div id="certificate-content" style="height: 100%;">
            <div class="heading-top">
                <article id="heading-items-1">
                    <div> Bộ giao thông vận tải </div>
                    <div style="margin-bottom: 10px;" class="bold"> Cục đăng kiểm Việt Nam </div>
                    <div><a style="border-top: 2px solid black; padding-top: 5px;"> Ministry of transport </a></div>
                    <div class="bold"> VietNam Register </div>
                    <div style="text-transform: none;" class="italic">Số(N<span style="vertical-align: 4px;" class="underline">o</span>):</div>
                </article>
                <article id="heading-items-2">
                    <div> Cộng hòa xã hội chủ nghĩa Việt Nam</div>
                    <div style="text-transform: none;" class="bold"><a style="border-bottom: 2px solid black; padding-bottom: 5px;"> Độc lập - Tự do - Hạnh phúc </a></div>
                    <div style="margin-top: 10px;"> Socialist republic of Việt Nam </div>
                    <div style="text-transform: none;" class="bold">Independence - Freedom - Happiness </div>
                </article>
            </div>
            <div class="heading-bottom">
                <article id="heading-items-3">
                    <div style="font-size: 20px; line-height: 24px;" class="bold uppercase">Giấy chứng nhận chất lượng an toàn kỹ thuật và <br> bảo vệ môi trường xe cơ giới</div>
                    <div class="italic">(Certificate of conformity from inspection of technical safety quality and environmental<br> protecttion for motor vehicle)</div>
                </article>
            </div>
            <div class="main-content">
                <article>
                    <p>
                        <div style="text-indent: 30px;" class="bold">
                            Tình trạng phương tiện 
                            <a style="font-weight: lighter;" class="italic">(Vehicle's Status):</a>
                            <a id="vehicle-status" style="padding-left: 5px;" class="bold">Đã qua sử dụng</a>
                        </div>
                        <div>Người nhập khẩu 
                            <a class="italic">(Importer):</a>
                            <a style="padding-left: 5px;" class="bold uppercase">Công ty TNHH xuất nhập khẩu thương mại Đông Dương</a>
                        </div>
                        <div>Chủ sở hữu <a class="italic">(Owner):</a><a class = "Ten_chu_xe bold" style="padding-left: 5px;"></a></div>
                        <div>Ngày sinh <a class="italic">(Birth):</a><a class = "Ngay_sinh bold" style="padding-left: 5px;"></a></div>
                        <div>Địa chỉ 
                            <a class="italic">(Address):</a>
                            <a class = "Dia_chi bold" style="padding-left: 5px;"></a>
                        </div>
                        <div>Số đăng kí xe <a class="italic">(Registration Number):</a><a class = "So_dang_ky_xe bold" style="padding-left: 5px;"></a></div>
                        <div>Biển số xe <a class="italic">(Car Number):</a><a class = "Bien_so bold" style="padding-left: 5px;"></a></div>
                        <div>Nơi đăng ký xe <a class="italic">(Place of Registration):</a><a class = "Noi_dang_ky bold" style="padding-left: 5px;"></a></div>
                        <div>Ngày cấp đăng ký xe <a class="italic">(Date of Registration):</a><a class = "Ngay_cap bold" style="padding-left: 5px;"></a></div>
                        <div style="display: flex;">
                            <div style="flex: 1;">Nhãn hiệu <a class="italic">(Trace Mark):</a><a class = "Hang_san_xuat bold" style="padding-left: 5px;"></a></div>
                        </div>
                        <div style="display: flex;">
                            <div style="flex: 1;">Nước sản xuất <a class="italic">(Production Country):</a><a style="padding-left: 5px;" class="Nuoc_san_xuat bold"></a></div>
                            <div style="flex: 1;">Năm sản xuất<a class="italic">(Production Year):</a><a style="padding-left: 5px;" class="bold">2012</a></div>
                        </div>
                        <div>Địa điểm kiểm tra <a class="italic">(Date Site):</a><a class = "Noi_dang_kiem bold" style="padding-left: 5px;"></a></div>
                        <div>Thời gian kiểm tra <a class="italic">(Inspection Site):</a><a class = "Ngay_dang_kiem_gan_nhat bold" style="padding-left: 5px;"></a></div>
                        <div>Thời gian hết hạn <a class="italic">(Expiration Date):</a><a class = "Ngay_het_han bold" style="padding-left: 5px;"></a></div>
                        <div>Số đăng ký kiểm tra <a class="italic">(Registered N<span style="vertical-align: 4px;" class="underline">o</span> for Inspection):</a><a class = "Ma_dang_kiem bold" style="padding-left: 5px;"></a></div>
                    </p>
                    <p>
                        <div id="heading-items-4">
                            <div class="uppercase">Thông số kỹ thuật cơ bản</div>
                            <div class="italic">(Major Technical Specification)</div>
                        </div></p>
                    <p>
                        <div style="clear: right;">Khối lượng bản thân <a class="italic">(Kerb Mass):</a><div style="float: right;"><a class = "Khoi_luong bold"></a><a style="width: 70px; display: inline-block; text-align: right;">kg</a></div></div>
                        <div style="clear: right;">Khối lượng toàn bộ theo TK/cho phép TGGT <a class="italic">(Designed/Authorized Gross Mass)</a><div style="float: right;"><a class = "Khoi_luong_tong bold"></a><a style="width: 70px; display: inline-block; text-align: right;">kg</a></div></div>
                        <div style="clear: right;">Số người cho phép chở, kể cả người lái: Tổng (ngồi+đứng+nằm+xe lăn)<div style="float: right;"><a class = "So_nguoi bold"></a><a style="width: 70px; display: inline-block; text-align: right;">người</a></div><br><a class="italic">(Passenger capacity including driver: Total (seating+standing+lying+wheelchair))</a></div>
                        <div style="clear: right;">Kích thước bao: Dài x Rộng x Cao <a class="italic">(Overall Dimensions: L x W x H):</a><div style="float: right;"><a class = "Size bold"></a><a style="width: 70px; display: inline-block; text-align: right;">mm</a></div></div>
                        <div style="clear: right;">Chiều dài cơ sở <a class="italic">(Wheel Base):</a><div style="float: right;"><a class = "Chieu_dai_co_so bold"></a><a style="width: 70px; display: inline-block; text-align: right;">mm</a></div></div>
                        <div style="clear: right;">Công thức bánh xe <a class="italic">(Drive Configuration):</a><div style="float: right;"><a class="bold">4 x 2</a><a style="width: 70px; display: inline-block; text-align: right;"></a></div></div>
                        <div style="display: flex;">
                            <div style="flex: 1;">Loại nhiên liệu <a class="italic">(Fuel):</a><a style="margin-left: 30px;" class="bold">Diesel</a></div> 
                            <div style="flex: 1;">Thể tích làm việc <a class="italic">(Displacement):</a>
                                <div style="float: right;">
                                    <a class="bold">9700</a>
                                    <a style="width: 70px; display: inline-block; text-align: right;">cm<span style="font-size: 0.75em; vertical-align: top;">3</span></a></div>
                            </div>
                        </div>
                        <div style="text-indent: 30px;" class="bold">Xe cơ giới đã được kiểm tra và đạt yêu cầu theo Thông tư số 31/2011/TT-BGTVT ngày 15 tháng 4 năm 2011 và Thông tư số 55/2014/TT-BGTVT ngày 20/10/2014 của Bộ trưởng Bộ Giao thông vận tải.</div>
                    </p>
                </article>
            </div>
            <div class="footer-top">
                <div class="italic"><a class ="Noi_dang_kiem"></a>, Ngày <a id="date"></a>, Tháng <a id="month"></a>, Năm <a id="year"></a></div>
                <p></p>
                <div class="bold">Cơ quan kiểm tra</div>
                <div class="italic">(Inspection body)</div>
                <p></p>
                <div class="bold uppercase">Giám đốc</div>
            </div>
            <div class="footer-bottom">
                <div><a class="underline">Lưu ý:</a> Giấy chứng nhận này sẽ không còn giá trị nếu chất lượng của phương tiện đã kiểm tra bị ảnh hưởng do vận chuyển, bảo quản, bóc xếp v.v..</div>
                <div><a class="underline">Note:</a> This certificate will be expired if quality of inspected motor vehicle is influenced by carrying, landing, storing etc.</div>
            </div>
        </div>    
</div>
        <script type="text/javascript" src="./public/js/RegistrationManagement.js"></script>