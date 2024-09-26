<h2>Đăng nhập quản trị</h2>
<?php if (!empty($errors)) { 
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
} ?>
<form action="index.php?act=dangnhap" method="post">
    <div>
        <label for="tendangnhap">Tên đăng nhập:</label>
        <input type="text" id="tendangnhap" name="tendangnhap" value="<?= isset($_POST['tendangnhap']) ? $_POST['tendangnhap'] : '' ?>" required>
    </div>
    <div>
        <label for="matkhau">Mật khẩu:</label>
        <input type="password" id="matkhau" name="matkhau" required>
    </div>
    <div>
        <button type="submit" name="dangnhap">Đăng nhập</button>
    </div>
</form>
