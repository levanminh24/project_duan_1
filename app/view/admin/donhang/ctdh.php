<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center">Chi tiết đơn hàng của tài khoản</h3>

        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Địa chỉ nhận</th>
                        <th>Họ và Tên</th>
                        <th>Số lượng</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số điện thoại</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (!empty($donHang)) {
                        foreach ($donHang as $bill) {
                            extract($bill);
                            $trangthai_text = get_trangthai_text($trangthai); // Hàm chuyển đổi trạng thái thành text
                            $suabill = "index.php?act=suaDonHang&id=" . $id;
                            $disabled = ($trangthai == 3 || $trangthai == 4) ? 'disabled' : ''; 
                            echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $ngaydathang . '</td>
                                <td>' . $trangthai_text . '</td>
                                <td>' . $diachinhan . '</td>
                                        <td>' . $hovatennhan . '</td>
                                <td>' . $soluong . '</td>
                                <td>' . $tensp . '</td>
                                <td><img src="../../images/' . $img . '" alt="' . $tensp . '" style="width: 100px; height: auto;"></td>
                                <td>' . $sodienthoainhan . '</td>
                                <td>
                                   <a href="' . $suabill . '" class="btn btn-primary btn-sm ' . $disabled . '">Cập nhật</a>
                                </td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="9" class="text-center">Không có đơn hàng nào.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="index.php?act=listBill" class="btn btn-secondary mt-3">Quay lại danh sách đơn hàng</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
