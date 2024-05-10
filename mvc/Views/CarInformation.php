<?php 
// hiển thị giao diện thông tin xe
$data = $data['Bien_so_xe'][0];?>
            <div class="container">
                <h1 class="container-header"><a>Thông tin xe</a></h1>
                <div class="Container-content">
                    <!----them---->
                    <div class="container-content-top">
                        <div class="container-content-section-1">
                            <div class="avatar">
                                <img src="./public/img/gaixinh.jpg" alt="">
                            </div>
                            <div class = "car-information">
                                <h3><span>Biển số xe: </span> <?php echo $data['Bien_so'];?></h3>
                                <h3><span>Số đăng ký xe: </span> <?php echo $data['So_dang_ky_xe'];?></h3>
                                <h3><span>Tên chủ xe: </span> <?php echo $data['Ten_chu_xe'];?></h3>
                                <h3><span>Ngày sinh: </span> <?php echo $data['Ngay_sinh'];?></h3>
                                <h3><span>Địa chỉ: </span> <?php echo $data['Dia_chi'];?></h3>
                                <h3><span>Nơi đăng ký xe: </span> <?php echo $data['Noi_dang_ky'];?></h3>
                                <h3><span>Ngày cấp đăng ký xe: </span> <?php echo $data['Ngay_cap'];?></h3>
                            </div>
                        </div>
                        <div class="container-content-section-2">
                            <div class = "car-information">
                                <h3><span>Hãng sản xuất: </span> <?php echo $data['Hang_san_xuat'];?></h3>
                                <h3><span>Nước sản xuất: </span> <?php echo $data['Nuoc_san_xuat'];?></h3>
                                <h3><span>Năm sản xuất: </span>2012</h3>
                                <h3><span>Chiều dài: </span> <?php echo $data['Chieu_dai'];?></h3> 
                                <h3><span>Chiều rộng: </span> <?php echo $data['Chieu_rong'];?></h3>
                                <h3><span>Chiều cao: </span> <?php echo $data['Chieu_cao'];?></h3>
                                <h3><span>Khối lượng: </span> <?php echo $data['Khoi_luong'];?></h3>
                                <h3><span>Số người ngồi: </span> <?php echo $data['So_nguoi'];?></h3>
                                <h3><span>Chiều dài cơ sở: </span> <?php echo $data['Chieu_dai_co_so'];?></h3>
                            </div>
                            <div class="car-information">
                                <h3><span>Trạng thái: </span><?php echo $data['Trang_thai'];?></h3>
                                <h3><span>Mã đăng kiểm: </span><?php if ($data['Trang_thai'] == "Chưa đăng kiểm"){echo("Chưa đăng kiểm");}else {echo $data['Ma_dang_kiem'];}?></h3>
                                <h3><span>Ngày đăng kiểm gần nhất: </span><?php if ($data['Trang_thai'] == "Chưa đăng kiểm"){echo("Chưa đăng kiểm");}else {echo $data['Ngay_dang_kiem_gan_nhat'];}?></h3>
                                <h3><span>Ngày hết hạn đăng kiểm: </span><?php if ($data['Trang_thai'] == "Chưa đăng kiểm"){echo("Chưa đăng kiểm");}else {echo $data['Ngay_het_han'];}?></h3>
                                <h3><span>Nơi đăng kiểm: </span><?php if ($data['Trang_thai'] == "Chưa đăng kiểm"){echo("Chưa đăng kiểm");}else {echo $data['Noi_dang_kiem'];}?></h3>    
                                <div><!----sửa---->
                                    <button id="view" <?php if ($data['Trang_thai'] == "Chưa đăng kiểm"){echo('disabled class="button-disabled"');}?>>Xem chứng chỉ điện tử</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="container-content-bottom">
                        <div class="car">
                            <img src="./public/img/car.jpg" alt="">
                        </div>
                    </div>
                </div>
                <!----them---->
            </div>

            <!-- chứng chỉ  --->
            <div id = "pop_up" class = "pop_up" style="width: 900px; height: 1274px; position: relative; margin: 0px; background-color: palevioletred; border: 4px solid black; font-size: 17px;">
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
                            <div>Chủ sở hữu <a class="italic">(Owner):</a><a class = "Ten_chu_xe bold" style="padding-left: 5px;"><?php echo $data['Ten_chu_xe'];?></a></div>
                            <div>Ngày sinh <a class="italic">(Birth):</a><a class = "Ngay_sinh bold" style="padding-left: 5px;"><?php echo $data['Ngay_sinh'];?></a></div>
                            <div>Địa chỉ 
                                <a class="italic">(Address):</a>
                                <a class = "Dia_chi bold" style="padding-left: 5px;"><?php echo $data['Dia_chi'];?></a>
                            </div>
                            <div>Số đăng kí xe <a class="italic">(Registration Number):</a><a class = "So_dang_ky_xe bold" style="padding-left: 5px;"><?php echo $data['So_dang_ky_xe'];?></a></div>
                            <div>Biển số xe <a class="italic">(Car Number):</a><a class = "Bien_so bold" style="padding-left: 5px;"><?php echo $data['Bien_so'];?></a></div>
                            <div>Nơi đăng ký xe <a class="italic">(Place of Registration):</a><a class = "Noi_dang_ky bold" style="padding-left: 5px;"><?php echo $data['Noi_dang_ky'];?></a></div>
                            <div>Ngày cấp đăng ký xe <a class="italic">(Date of Registration):</a><a class = "Ngay_cap bold" style="padding-left: 5px;"><?php echo $data['Ngay_cap'];?></a></div>
                            <div style="display: flex;">
                                <div style="flex: 1;">Nhãn hiệu <a class="italic">(Trace Mark):</a><a class = "Hang_san_xuat bold" style="padding-left: 5px;"><?php echo $data['Hang_san_xuat'];?></a></div>
                            </div>
                            <div style="display: flex;">
                                <div style="flex: 1;">Nước sản xuất <a class="italic">(Production Country):</a><a style="padding-left: 5px;" class="Nuoc_san_xuat bold"><?php echo $data['Nuoc_san_xuat'];?></a></div>
                                <div style="flex: 1;">Năm sản xuất<a class="italic">(Production Year):</a><a style="padding-left: 5px;" class="bold">2012</a></div>
                            </div>
                            <div>Địa điểm kiểm tra <a class="italic">(Date Site):</a><a class = "Noi_dang_kiem bold" style="padding-left: 5px;"><?php echo $data['Noi_dang_kiem'];?></a></div>
                            <div>Thời gian kiểm tra <a class="italic">(Inspection Site):</a><a class = "Ngay_dang_kiem_gan_nhat bold" style="padding-left: 5px;"><?php echo $data['Ngay_dang_kiem_gan_nhat'];?></a></div>
                            <div>Thời gian hết hạn <a class="italic">(Expiration Date):</a><a class = "Ngay_het_han bold" style="padding-left: 5px;"><?php echo $data['Ngay_het_han'];?></a></div>
                            <div>Số đăng ký kiểm tra <a class="italic">(Registered N<span style="vertical-align: 4px;" class="underline">o</span> for Inspection):</a><a class = "Ma_dang_kiem bold" style="padding-left: 5px;"><?php echo $data['Ma_dang_kiem'];?></a></div>
                        </p>
                        <p>
                            <div id="heading-items-4">
                                <div class="uppercase">Thông số kỹ thuật cơ bản</div>
                                <div class="italic">(Major Technical Specification)</div>
                            </div></p>
                        <p>
                            <div style="clear: right;">Khối lượng bản thân <a class="italic">(Kerb Mass):</a><div style="float: right;"><a class = "Khoi_luong bold"><?php echo $data['Khoi_luong'];?></a><a style="width: 70px; display: inline-block; text-align: right;">kg</a></div></div>
                            <div style="clear: right;">Khối lượng toàn bộ theo TK/cho phép TGGT <a class="italic">(Designed/Authorized Gross Mass)</a><div style="float: right;"><a class = "Khoi_luong_tong bold"><?php echo $data['Khoi_luong'] + 300;?></a><a style="width: 70px; display: inline-block; text-align: right;">kg</a></div></div>
                            <div style="clear: right;">Số người cho phép chở, kể cả người lái: Tổng (ngồi+đứng+nằm+xe lăn)<div style="float: right;"><a class = "So_nguoi bold"><?php echo $data['So_nguoi'];?></a><a style="width: 70px; display: inline-block; text-align: right;">người</a></div><br><a class="italic">(Passenger capacity including driver: Total (seating+standing+lying+wheelchair))</a></div>
                            <div style="clear: right;">Kích thước bao: Dài x Rộng x Cao <a class="italic">(Overall Dimensions: L x W x H):</a><div style="float: right;"><a class = "Size bold"><?php echo $data['Chieu_dai']." x ".$data['Chieu_rong']." x ".$data['Chieu_cao'] ?></a><a style="width: 70px; display: inline-block; text-align: right;">mm</a></div></div>
                            <div style="clear: right;">Chiều dài cơ sở <a class="italic">(Wheel Base):</a><div style="float: right;"><a class = "Chieu_dai_co_so bold"><?php echo $data['Chieu_dai_co_so'];?></a><a style="width: 70px; display: inline-block; text-align: right;">mm</a></div></div>
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
                    <div class="italic"><a class ="Noi_dang_kiem"><?php echo $data['Noi_dang_kiem'];?></a>, Ngày <a id="date"><?php echo substr($data['Ngay_dang_kiem_gan_nhat'],8);?></a>, Tháng <a id="month"><?php echo substr($data['Ngay_dang_kiem_gan_nhat'],5,2);?></a>, Năm <a id="year"><?php echo substr($data['Ngay_dang_kiem_gan_nhat'],0,4);?></a></div>
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
</div>
        <script type="text/javascript" src="./public/js/Statistics.js"></script>