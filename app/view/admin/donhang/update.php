<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật trạng thái đơn hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h3 class="text-center">Tình trạng đơn hàng</h3>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="boxcontent cart p-3 border rounded">
                    <form action="index.php?act=updatedonhang" method="post" enctype="multipart/form-data">

                        <?php
                        // Lấy ID đơn hàng từ GET
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            $idbill = (int)$_GET['id'];
                            // Gọi hàm kttt để lấy trạng thái đơn hàng
                            $kttt = kttt($idbill);

                            // Lấy trạng thái từ kết quả trả về
                            if ($kttt) {
                                $trangthai = $kttt[0]['trangthai']; // Giả sử kttt trả về một mảng
                                $id = $idbill; // Lưu lại ID đơn hàng
                        ?>

                                <div class="form-group">
                                    <label for="trangthai">Trạng thái</label>
                                    <select class="form-control" name="trangthai" id="trangthai">
                                        <?php
                                        // Tạo danh sách trạng thái có thể cập nhật
                                        $trangthaiOptions = [
                                            0 => 'Chờ xác nhận',
                                            1 => 'Đang lấy hàng',
                                            2 => 'Đang giao hàng',
                                            3 => 'Giao thành công',
                                        ];

                                        // Hiển thị trạng thái hiện tại
                                        echo '<option value="' . $trangthai . '">' . $trangthaiOptions[$trangthai] . ' (Hiện tại)</option>';

                                        // Hiển thị các trạng thái tiếp theo
                                        foreach ($trangthaiOptions as $value => $label) {
                                            // Chỉ cho phép chọn trạng thái tiếp theo
                                            if ($value > $trangthai) {
                                                echo '<option value="' . $value . '">' . $label . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                                <button type="submit" name="capnhat" class="btn btn-primary" <?php echo ($trangthai == 3) ? 'disabled' : ''; ?>>CẬP NHẬT</button>
                                

                        <?php
                            }
                        }
                        ?>
                        <?php if (isset($thongbao) && $thongbao !== "") : ?>
    <div class="alert alert-info"><?= $thongbao ?></div>
    <a href="?act=listBill" class="btn btn-secondary mt-2">Quay lại trang đơn hàng</a>
<?php endif; ?>

                    </form>
                </div>
            </div>
        </div>
       
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
