<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới tài khoản</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="index.php?act=addtk" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                    <input type="text" name="tendangnhap" id="tendangnhap" class="form-control" placeholder="Nhập tên đăng nhập..." required>
                </div>
                <div class="mb-3">
                    <label for="matkhau" class="form-label">Mật khẩu</label>
                    <input type="password" name="matkhau" id="matkhau" class="form-control" placeholder="Nhập mật khẩu..." required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email..." required>
                </div>
                <div class="mb-3">
                    <label for="sodienthoai" class="form-label">Số điện thoại</label>
                    <input type="text" name="sodienthoai" id="sodienthoai" class="form-control" placeholder="Nhập số điện thoại..." required>
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" name="diachi" id="diachi" class="form-control" placeholder="Nhập địa chỉ..." required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Vai trò</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1" selected>Admin</option>
                        
                    </select>
                </div>
                <div>
                    <button type="submit" name="themmoi" class="btn btn-success">Xác nhận</button>
                    <a href="?act=listtk"><button type="button" class="btn btn-success">Quay lại</button></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo '<div class="alert alert-info">' . $thongbao . '</div>';
                }
                ?>
            </form>
        </div>
    </div>

</span>
</div>
<!-- /.container-fluid -->
