<!-- hiển thị giao diện tạo tài khoản -->
<div class="Account">
    <h1 class="Account__header"><a>Thông tin tài khoản</a></h1>
    <div id="popup">
        <p id = "alert">Xác nhận đăng kiểm xe này, không thể hoàn tác</p>
        <div id = "Button">
            <button id = "yes">Đồng ý</button>
            <button id = "cancel">Hủy bỏ</button>
        </div>
    </div>
    <div class="Account__main">
        <div class="horizon1">
            <span>Thông tin cơ bản</span>
        </div>
        <div class="Account__main-infomation">
            <div class="Account-infomation1">
                <div class="Account-infomation1-name">
                    <p>Tên trung tâm đăng kiểm</p>
                    <textarea placeholder = "Name" name="Account-infomation1-name-input" id="ten" class="Account-infomation1-name-input" cols="50" rows="1"></textarea>
                </div>
                <div class="Account-infomation1-adress">
                    <p>Địa chỉ</p>
                    <textarea placeholder = "Address" name="Account-infomation1-adress-input" id="dia_chi" class="Account-infomation1-adress-input" cols="50" rows="1"></textarea>
                </div>
            </div>
            <div class="Account-infomation2">
                <div class="Account-infomation2-email">
                    <p>Email</p>
                    <textarea placeholder = "Email" name="Account-infomation2-email-input" id="email"  class="Account-infomation2-email-input" cols="50" rows="1"></textarea>
                </div>
                <div class="Account-infomation2-SDT">
                    <p>Số Điện Thoại Trung tâm</p>
                    <textarea placeholder = "Phone Number" name="Account-infomation2-SDT-input" id="dien_thoai" class="Account-infomation2-SDT-input" cols="50" rows="1"></textarea>
                </div>
                <div class="Account-infomation2-SDT">
                    <p>Fax</p>
                    <textarea placeholder = "Fax" name="Account-infomation2-SDT-input" id="fax"  class="Account-infomation2-SDT-input" cols="50" rows="1"></textarea>
                </div>
            </div>
            <div class="Account-infomation3">
                <div class="Account-infomation3-GD">
                    <div class="Account-infomation3-NGD">
                        <p>Giám Đốc</p>
                        <textarea placeholder = "Name" name="Account-infomation3-GD-input"id="giam_doc" class="Account-infomation3-GD-input" cols="50" rows="1"></textarea>
                    </div>
                    <div class="Account-infomation3-SDTGD">
                        <p>Số điện thoại giám đốc</p>
                        <textarea placeholder = "Phone Number" name="Account-infomation3-PGD-input"  id="giam_doc_phone"  class="Account-infomation3-PGD-input" cols="50" rows="1"></textarea>
                    </div>
                </div>
                <div class="Account-infomation3-PGD1">
                    <div class="Account-infomation3-PGD">
                        <p>Phó giám đốc 1</p>
                        <textarea placeholder = "Name" name="Account-infomation3-PGD-input"id="pho_giam_doc_1" class="Account-infomation3-PGD-input" cols="50" rows="1"></textarea>
                    </div>
                    <div class="Account-infomation3-SDTGD">
                        <p>Số điện thoại phó giám đốc 1</p>
                        <textarea placeholder = "Phone Number" name="Account-infomation3-PGD-input"  id="pho_giam_doc_1_phone"  class="Account-infomation3-PGD-input" cols="50" rows="1"></textarea>
                    </div>
                </div>
                <div class="Account-infomation3-PGD1">
                    <div class="Account-infomation3-PGD">
                        <p>Phó giám đốc 2</p>
                        <textarea placeholder = "Name" name="Account-infomation3-PGD-input"  id="pho_giam_doc_2"  class="Account-infomation3-PGD-input" cols="50" rows="1"></textarea>
                    </div>
                    <div class="Account-infomation3-SDTGD">
                        <p>Số điện thoại phó giám đốc 2</p>
                        <textarea placeholder = "Phone Number" name="Account-infomation3-PGD-input"  id="pho_giam_doc_2_phone"  class="Account-infomation3-PGD-input" cols="50" rows="1"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizon3">
            <span>Tạo tài khoản, mật khẩu</span>
        </div>
        <div class="Account__main-password" id="Account__main">
            <div class="Account-password1">
            <div class="Account-password1-newPW">
                    <p>Tên đăng nhập</p>
                    <input id = "user_name" class="Account-password1-newPW-input" type="text" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="Account-password1-newPW">
                    <p>Mật khẩu</p>
                    <input id = "password" class="Account-password1-newPW-input" type="password" placeholder="Nhập mật khẩu">
                </div>
            </div>
        </div>
        <div class="Account__main-footer">
            <div class="Account-save">
                <button id="btn-Account-cancel"  class = "btn-Account-cancel" type="button">
                    <span>Hủy bỏ</span>
                </button>
                <button id="btn-Account-create" class="btn-Account-save" type="button">
                    <span>Tạo tài khoản</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./public/js/CreateAccount.js"></script>