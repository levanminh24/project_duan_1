<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách đơn hàng</h1>
    <form action="" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <div class="input-group">
                        
                        
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
                        <th>Mã đơn hàng</th>
                        <th>Họ và tên nhận</th>
                        <th>Ngày đặt hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ nhận</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donHang as $bill) {
                        extract($bill);
                        $suabill = "index.php?act=suaDonHang&id=" . $id;

                        // Sử dụng hàm get_trangthai_text từ model của bạn
                        $trangthai_text = get_trangthai_text($trangthai);

                        echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $hovatennhan . '</td>
                            <td>' . $ngaydathang . '</td>
                            <td>' . $sodienthoainhan . '</td>
                            <td>' . $diachinhan . '</td>
                            <td>' . $trangthai_text . '</td>
                            <td>
                                <a href="' . $suabill . '" class="btn btn-primary btn-sm">Cập nhật</a>
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
