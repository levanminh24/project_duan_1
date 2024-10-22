<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Tài khoản</h1>
    <form action="index.php?act=listtk" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <div class="input-group">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Tên đăng nhập</th>
                                <th>Mật khẩu</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listtaikhoan as $taikhoan) {
                                extract($taikhoan);
                               $khoiphuc = "index.php?act=khoiphuctkk&id=" . $id;
                                $xoatk = "index.php?act=xoacung&id=" . $id;
                                $vaitro = $role == 0 ? "Người dùng" : "Admin";

                                echo '<tr>
                                    <td>' . $id . '</td>
                                    <td>' . $tendangnhap . '</td>
                                    <td>***</td>
                                    <td>' . $sodienthoai . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . $diachi . '</td>
                                    <td>' . $vaitro . '</td>
                                    <td>
                                     
                                        <a href="' . $xoatk . '" class="btn btn-danger btn-sm" onclick="return confirmDelete();">xoá</a>
                                        <a href="' . $khoiphuc . '" class="btn btn-success btn-sm">Khoiphuc</a>
                                    </td>
                                </tr>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->

<!-- JavaScript function to confirm delete -->

