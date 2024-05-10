<!-- hiển thị giao diện quản lý tài khoản -->
<div class="QLTK">
            <h1 class="container-header"><a>QUẢN LÝ Tài khoản</a></h1>
            <div class="QLTK_content">
                <form action="">
                    <div class="QLTK_content-search-item">
                        <label for="qltk_search-text"><h2>Tên trung tâm </h2></label>
                        <input type="text" name="qltk_search-text" id="qltk_search-text" placeholder="Tìm kiếm">
                    </div>
                    <div class="QLTK_content-search-item">
                        <label for="qltk_City"><h2>Tỉnh/Thành Phố</h2></label>
                        <select name="qltk_City" id="qltk_City">
                            <option value="All">Tất cả </option>
                            <option value="Cục đăng kiểm Quốc Gia">Cục đăng kiểm Quốc Gia</option>
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
                    
                    <button type="button" id="qltk_search-button">Tìm</button>
                    <button type="button" id="qltk_create-button"><a href="/Dang-kiem-main-DBMS/CreateAccount">Tạo tài khoản</a></button>
                </form>
                <div class = "status" id = "status">
                        <p id ="notice"></p>
                </div>
                <div class="qltk_Datalist" id="qltk_Datalist">

                </div>
            </div>
            <div class="table-container" id="table-container">
                <table id="data-table">
                    <thead>
                        <th>STT</th>
                        <th>Tên trung tâm</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Giám đốc</th>
                        
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
<script type="text/javascript" src="./public/js/AccountManagement.js"></script>