<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="login-container">
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

            <?php if (isset($thongbao)) : ?>
                <div class="alert alert-danger mt-3"><?= $thongbao ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
