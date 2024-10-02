<form action="index.php?act=dangnhapadmin" method="post">
    <div class="form-group">
        <label for="tendangnhap">Tên đăng nhập</label>
        <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" placeholder="Nhập tên đăng nhập" required>
    </div>
    <div class="form-group">
        <label for="matkhau">Mật khẩu</label>
        <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="Nhập mật khẩu" required>
    </div>
    <button type="submit" class="btn btn-primary" name="dangnhap">Đăng nhập</button>

    <!-- Hiển thị thông báo lỗi nếu có -->
    <?php if (isset($thongbao)) : ?>
        <div class="alert alert-danger"><?= $thongbao ?></div>
    <?php endif; ?>
</form>
