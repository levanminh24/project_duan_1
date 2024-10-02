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
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                            </tr>
                        </thead>
                    </table>
                    <form action="index.php?act=updatedonhang" method="post" enctype="multipart/form-data">

                        <?php
                        // Lấy ID đơn hàng từ GET
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            $idbill = (int)$_GET['id'];
                            // Gọi hàm kttt để lấy trạng thái đơn hàng
                            $kttt = kttt($idbill);

                            // Lấy trạng thái từ kết quả trả về
                            if ($kttt) {
                                $trangthai = $kttt[0]['trangthai']; // Giả sử pdo_query trả về một mảng
                                $id = $idbill; // Lưu lại ID đơn hàng
                        ?>

                                <div class="form-group">
                                    <label for="trangthai">Trạng thái</label>
                                    <select class="form-control" name="trangthai" id="trangthai">
                                        <option value="0" <?php if ($trangthai == 0) echo 'selected'; ?>>Chờ xác nhận</option>
                                        <option value="1" <?php if ($trangthai == 1) echo 'selected'; ?>>Đang lấy hàng</option>
                                        <option value="2" <?php if ($trangthai == 2) echo 'selected'; ?>>Đang giao hàng</option>
                                        <option value="3" <?php if ($trangthai == 3) echo 'selected'; ?>>Giao thành công</option>
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                                <button type="submit" name="capnhat" class="btn btn-primary">CẬP NHẬT</button>
                                <a href="?act=listBill"><button type="button" class="btn btn-success">Quay lại</button></a>

                        <?php
                            }
                        }
                        ?>
                        <?php if (isset($thongbao) && $thongbao !== "") : ?>
                            <div class="alert alert-info"><?= $thongbao ?></div>
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