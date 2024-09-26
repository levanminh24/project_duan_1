<div class="login-register-area pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> Thông tin tài khoản </h4>
                        </a>
                    </div>
                    <div class="login-form-container">
                    <div class="login-register-form">
    <?php
    $thongtin = thongtin();
    foreach ($thongtin as $tho) {
        extract($tho);
    ?>
        <form action="?act=updatethongtintaikhoan" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?? ''; ?>">
            <input type="hidden" name="matkhau" value="<?php echo $matkhau ?? ''; ?>">
            <label for="" class="form-label">Tên đăng nhập:</label>
            <input type="text" name="tendangnhap" value="<?php echo htmlspecialchars($tendangnhap); ?>">
           

            <label for="" class="form-label">Họ và tên:</label>
            <input type="text" name="hovaten" value="<?php echo htmlspecialchars($hovaten); ?>">
            

            <label for="" class="form-label">Số điện thoại:</label>
            <input type="text" name="sodienthoai" value="<?php echo htmlspecialchars($sodienthoai); ?>">
           

            <label for="" class="form-label">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        
            <label for="" class="form-label">Địa chỉ:</label>
            <input type="text" name="diachi" value="<?php echo htmlspecialchars($diachi); ?>">
         
            <div class="button-box btn-hover">
                                            <button type="submit" name="capnhat">Lưu</button>
                                            <a href="?act=doimatkhau"><button type="button">Đổi mật khẩu</button></a>
                                        </div>
        </form>
    <?php } ?>
</div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>