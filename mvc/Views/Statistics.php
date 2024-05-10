<!-- hiển thị giao diện trang thống kê -->
            <div class="container">
                <h1 class="container-header"><a>Thống kê dữ liệu</a></h1>
                <div class="container-content">
                    <form action="">
                        <div class="form-items">
                            <label for="registration-license-num">Số đăng ký xe/ Biển số xe:</label>
                            <input type="text" name="registration-license-num" id="registration-license-num">
                        </div>
                        <div class="form-items">
                            <label for="city-list">Tỉnh/Thành phố: </label>
                            <select name="city-list" id="city-list">
                            <option value="All">Tất cả </option>
                                <option value="An Giang">An Giang</option>
                                <option value="Bà Rịa – Vũng Tàu">Bà Rịa – Vũng Tàu</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Bắc Kạn">Bắc Kạn</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Đắk Lắk">Đắk Lắk</option>
                                <option value="Đắk Nông">Đắk Nông</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Đồng Nai">Đồng Nai</option>
                                <option value="Đồng Tháp">Đồng Tháp</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Hà Giang">Hà Giang</option>
                                <option value="Hà Nam">Hà Nam</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Hải Dương">Hải Dương</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="Hậu Giang">Hậu Giang</option>
                                <option value="Hòa Bình">Hòa Bình</option>
                                <option value="Hưng Yên">Hưng Yên</option>
                                <option value="Khánh Hòa">Khánh Hòa</option>
                                <option value="Kiên Giang">Kiên Giang</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Lai Châu">Lai Châu</option>
                                <option value="Lâm Đồng">Lâm Đồng</option>
                                <option value="Lạng Sơn">Lạng Sơn</option>
                                <option value="Lào Cai">Lào Cai</option>
                                <option value="Long An">Long An</option>
                                <option value="Nam Định">Nam Định</option>
                                <option value="Nghệ An">Nghệ An</option>
                                <option value="Ninh Bình">Ninh Bình</option>
                                <option value="Ninh Thuận">Ninh Thuận</option>
                                <option value="Phú Thọ">Phú Thọ</option>
                                <option value="Phú Yên">Phú Yên</option>
                                <option value="Quảng Bình">Quảng Bình</option>
                                <option value="Quảng Nam">Quảng Nam</option>
                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                <option value="Quảng Ninh">Quảng Ninh</option>
                                <option value="Quảng Trị">Quảng Trị</option>
                                <option value="Sóc Trăng">Sóc Trăng</option>
                                <option value="Sơn La">Sơn La</option>
                                <option value="Tây Ninh">Tây Ninh</option>
                                <option value="Thái Bình">Thái Bình</option>
                                <option value="Thái Nguyên">Thái Nguyên</option>
                                <option value="Thanh Hóa">Thanh Hóa</option>
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                <option value="Tiền Giang">Tiền Giang</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Trà Vinh">Trà Vinh</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                <option value="Yên Bái">Yên Bái</option>
                            </select>
                        </div>
                        <div class="form-items">
                            <label for="vehicle-type">Loại phương tiện:</label>
                            <select name="vehicle-type" id="vehicle-type">
                                <option value="All">Tất cả</option>
                                <option value="Car">Ô tô con</option>
                            </select>
                        </div>
                        <div id="check">   
                        </div>
                        <div class="form-items-vehicle-state">
                            <span>Tình trạng xe:</span>
                        </div>
                        <div class="form-items">
                            <label for="vehicle-state-all" class="form-items-radio-labels">Tất cả</label>
                            <input type="radio" id = "vehicle-state-all" class="vehicle-state" name="vehicle-state" value="vehicle-state-all" checked>
                        </div>
                        <div class="form-items">
                            <label for="vehicle-state-near-expire" class="form-items-radio-labels">Sắp hết hạn</label>
                            <input type="radio" id="vehicle-state-near-expire" class="vehicle-state" name="vehicle-state" value="vehicle-state-near-expire">
                            
                        </div>
                        <div class="form-items">
                            <label for="vehicle-state-expired" class="form-items-radio-labels">Đã hết hạn</label>
                            <input type="radio" id="vehicle-state-expired" class="vehicle-state" name="vehicle-state" value="vehicle-state-expired">
                            
                        </div>
                        <div class="form-items">
                            <label for="vehicle-state-not-registered" class="form-items-radio-labels">Chưa đăng kiểm</label>
                            <input type="radio" id="vehicle-state-not-registered" class="vehicle-state" name="vehicle-state" value="vehicle-state-not-registered">
                        
                        </div>
                        <div class="form-items">
                            <label for="vehicle-state-registered" class="form-items-radio-labels">Đã đăng kiểm</label>
                            <input type="radio" id="vehicle-state-registered" class="vehicle-state" name="vehicle-state" value="vehicle-state-registered">
                        </div>
                        <div class="form-items">
                            <button type="button" value="Submit" onclick="searchVehicleData()" id="dataList-search-button">Tra cứu</button>
                        </div>
                    </form>
                    <div class = "status" id = "status">
                        <p id="warning"></p>
                    </div>
                    <div class="table-container" id="table-container">
                        <table id="data-table">
                            <thead>
                                <th>STT</th>
                                <th>Biển số xe</th>
                                <th>Số đăng ký xe</th>
                                <th>Tên chủ xe</th>
                                <th>Ngày cấp đăng ký xe</th>
                                <th>Nơi đăng ký xe</th>
                                <th>Trạng thái</th>
                                <th>Mã đăng kiểm</th>
                                <th>Ngày đăng kiểm gần nhất</th>
                                <th>Ngày hết hạn đăng kiểm</th>
                                <th>Nơi đăng kiểm</th>
                            </thead>
                            <tbody id="data-table-body">

                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <ul class="pagination-list">
                            
                        </ul>
                    </div>
                </div>
            </div>
        <script type="text/javascript" src="./public/js/Statistics.js"></script>