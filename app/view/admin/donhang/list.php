<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách tài khoản đặt hàng</h1>
    <form action="" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <div class="input-group">
                        <!-- Bạn có thể thêm các tùy chọn tìm kiếm ở đây nếu cần -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>Mã tài khoản</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($taiKhoans as $taiKhoan) {
                        extract($taiKhoan);
                        $chitietLink = "index.php?act=chitietDonHang&id=" . $id;

                        echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $tendangnhap . '</td>
                            <td>' . $email . '</td>
                            <td>
                                <a href="' . $chitietLink . '" class="btn btn-info btn-sm">Chi tiết</a>
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
