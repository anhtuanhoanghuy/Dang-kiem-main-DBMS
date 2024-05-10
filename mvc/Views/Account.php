<?php 
// hiển thị giao diện thông tin tài khoản
$data = $data['Ten'][0];?>
<div class="Account">
    <h1 class="Account__header"><a>Thông tin tài khoản</a></h1>
    <!--pop up -->
    <div id="popup">
        <p id = "alert"></p>
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
                    <textarea placeholder = "Name" name="Account-infomation1-name-input" id="ten" class="Account-infomation1-name-input" cols="50" rows="1" disabled><?php echo $data['ten'];?></textarea>
                </div>
                <div class="Account-infomation1-adress">
                    <p>Địa chỉ</p>
                    <textarea placeholder = "Address" name="Account-infomation1-adress-input" id="dia_chi" class="Account-infomation1-adress-input" cols="50" rows="1"><?php echo $data['dia_chi'];?></textarea>
                </div>
            </div>
            <div class="Account-infomation2">
                <div class="Account-infomation2-email">
                    <p>Email</p>
                    <textarea placeholder = "Email" name="Account-infomation2-email-input" id="email"  class="Account-infomation2-email-input" cols="50" rows="1"><?php echo $data['email'];?></textarea>
                </div>
                <div class="Account-infomation2-SDT">
                    <p>Số Điện Thoại trung tâm</p>
                    <textarea placeholder = "Phone Number" name="Account-infomation2-SDT-input" id="dien_thoai" class="Account-infomation2-SDT-input" cols="50" rows="1"><?php echo $data['dien_thoai'];?></textarea>
                </div>
                <div class="Account-infomation2-SDT">
                    <p>Fax</p>
                    <textarea placeholder = "Fax" name="Account-infomation2-SDT-input" id="fax"  class="Account-infomation2-SDT-input" cols="50" rows="1"><?php echo $data['fax'];?></textarea>
                </div>
            </div>
            <div class="Account-infomation3">
                <div class="Account-infomation3-GD">
                    <div class="Account-infomation3-NGD">
                        <p>Giám Đốc</p>
                        <textarea placeholder = "Name" name="Account-infomation3-GD-input"id="giam_doc" class="Account-infomation3-GD-input" cols="50" rows="1"><?php echo $data['giam_doc'];?></textarea>
                    </div>
                    <div class="Account-infomation3-SDTGD">
                        <p>Số điện thoại giám đốc</p>
                        <textarea placeholder = "Phone Number" name="Account-infomation3-PGD-input"  id="giam_doc_phone"  class="Account-infomation3-PGD-input" cols="50" rows="1"><?php echo $data['giam_doc_phone'];?></textarea>
                    </div>
                </div>
                <div class="Account-infomation3-PGD1">
                    <div class="Account-infomation3-PGD">
                        <p>Phó giám đốc 1</p>
                        <textarea placeholder = "Name" name="Account-infomation3-PGD-input"id="pho_giam_doc_1" class="Account-infomation3-PGD-input" cols="50" rows="1"><?php echo $data['pho_giam_doc_1'];?></textarea>
                    </div>
                    <div class="Account-infomation3-SDTGD">
                        <p>Số điện thoại phó giám đốc 1</p>
                        <textarea placeholder = "Name" name="Account-infomation3-PGD-input"  id="pho_giam_doc_1_phone"  class="Account-infomation3-PGD-input" cols="50" rows="1"><?php echo $data['pho_giam_doc_1_phone'];?></textarea>
                    </div>
                </div>
                <div class="Account-infomation3-PGD1">
                    <div class="Account-infomation3-PGD">
                        <p>Phó giám đốc 2</p>
                        <textarea placeholder = "Name" name="Account-infomation3-PGD-input"  id="pho_giam_doc_2"  class="Account-infomation3-PGD-input" cols="50" rows="1"><?php echo $data['pho_giam_doc_2'];?></textarea>
                    </div>
                    <div class="Account-infomation3-SDTGD">
                        <p>Số điện thoại phó giám đốc 2</p>
                        <textarea placeholder = "Name" name="Account-infomation3-PGD-input"  id="pho_giam_doc_2_phone"  class="Account-infomation3-PGD-input" cols="50" rows="1"><?php echo $data['pho_giam_doc_2_phone'];?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizon3">
            <span>Thay đổi Mật Khẩu</span>
        </div>
        <div class="Account__main-password" id="Account__main">
            <div class="Account-password1">
                <div class="Account-password1-PW">
                    <p>Mật khẩu cũ</p>
                    <input id = "old_password" class="Account-password1-PW-input" type="password" placeholder="Nhập mật khẩu cũ" value = <?php if ($_SESSION['account'] == 1) {echo $data['pass_word'];} ?>>
                </div>
                <div id="old_pass" style = "display:none"><?php echo $_SESSION['pass'] = $data['pass_word'] ?></div>
                <div class="Account-password1-newPW">
                    <p>Mật khẩu mới</p>
                    <input id = "new_password" class="Account-password1-newPW-input" type="password" placeholder="Nhập mật khẩu mới">
                </div>
                <div class="Account-password1-newPW">
                    <p>Nhập lại mật khẩu</p>
                    <input id = "re_password" class="Account-password1-newPW-input" type="password" placeholder="Nhập lại mật khẩu">
                </div>
            </div>
        </div>
        <div class="Account__main-footer">
            <div class="Account-save">
                <button id="btn-Account-cancel"  class = "btn-Account-cancel" type="button">
                    <span>Hủy bỏ</span>
                </button>
                <?php if ($_SESSION['account'] == 1) { ?>
                <button id="btn-Account-delete"  class = "btn-Account-delete" type="button">
                    <span>Xóa tài khoản</span>
                </button>
                <?php } ?>

                <button id="btn-Account-save" class="btn-Account-save" type="button">
                    <span>Lưu thay đổi</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./public/js/Account.js"></script>