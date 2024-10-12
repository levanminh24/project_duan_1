<div class="cart-area pt-100 pb-100">
    
    <div class="container">
        <div class="row">
        <h2>Đơn Hàng Của Tôi</h2>
            <div class="col-12">
            <div class="orders-table-content">
    <div class="table-content table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th class="width-thumbnail">Ảnh</th>
                    <th class="width-name">Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Địa Chỉ Nhận</th>
                    <th>Thành Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Hủy</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donhang as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td class="order-thumbnail">
                            <a href="?act=chitietsp&id=<?= $item['idsanpham'] ?>">
                                <img src="public/images/<?= $item['img'] ?>" alt="<?= $item['tensp'] ?>" style="width: 50px;">
                            </a>
                        </td>
                        <td class="order-name">
                            <h6><a href="?act=chitietsp&id=<?= $item['idsanpham'] ?>"><?= $item['tensp'] ?></a></h6>
                        </td>
                        <td><?= $item['soluong'] ?></td>
                        <td><?= $item['ngaydathang'] ?></td>
                        <td><?= $item['diachinhan'] ?></td>
                        <td><?= number_format($item['thanhtien'], 3) ?> VND</td>
                        <td>
                            <?php
                            switch ($item['trangthai']) {
                                case 0:
                                    echo 'Chờ Xác Nhận';
                                    break;
                                case 1:
                                    echo 'Đang Lấy Hàng';
                                    break;
                                case 2:
                                    echo 'Đang Giao Hàng';
                                    break;
                                case 3:
                                    echo 'Giao Hàng Thành Công';
                                    break;
                                case 4:
                                    echo 'Đã Hủy';
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <form action="?act=huydonhang" method="POST">
                                <input type="hidden" name="cancel_order" value="<?= $item['id'] ?>">
                                <?php if ($item['trangthai'] == 0): ?>
                                    <button type="submit" class="btn-cancel" title="Hủy đơn hàng" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này chứ?');">
                                        <i class="ti-trash"></i> Hủy
                                    </button>
                                <?php elseif ($item['trangthai'] == 4): ?>
                                    <!-- Hiển thị nút Mua lại cho đơn hàng đã hủy -->
                                <?php else: ?>
                                    <button class="btn-cancel-disabled" disabled title="Không thể hủy đơn hàng"><i class="ti-lock"></i> Không thể hủy</button>
                                <?php endif; ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <div class="grand-total-wrap">
                    <div class="grand-total-btn btn-hover">
                        <a class="btn theme-color" href="?act=trangchu">Quay lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Tổng thể bảng */
.orders-table-content {
    margin-top: 20px;
}

.table-content {
    border: 1px solid #e6e6e6;
    border-radius: 10px;
    overflow: hidden;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

/* Căn chỉnh độ rộng các cột cho đều nhau */
th, td {
    padding: 15px;
    text-align: center;
    vertical-align: middle;
    width: calc(100% / 9); /* Chia đều 9 cột */
}

th {
    background-color: #f5f5f5;
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    font-size: 14px;
}

td {
    font-size: 14px;
    color: #555;
}

/* Cột ảnh sản phẩm */
.width-thumbnail img {
    border-radius: 8px;
    width: 50px; /* Kích thước ảnh nhỏ */
    transition: transform 0.3s ease;
}

.width-thumbnail img:hover {
    transform: scale(1.1);
}

/* Cột tên sản phẩm */
.order-name h6 a {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
}

.order-name h6 a:hover {
    text-decoration: underline;
}

/* Trạng thái */
th, td {
    border-bottom: 1px solid #e6e6e6;
}

/* Nút hủy */
.btn-cancel, .btn-cancel-disabled {
    background-color: #ff4d4d;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 13px;
}

.btn-cancel:hover {
    background-color: #ff3333;
}

.btn-cancel-disabled {
    background-color: #cccccc;
    cursor: not-allowed;
}

.btn-cancel-disabled i {
    color: #777;
}

/* Grand Total Button */
.grand-total-btn a.btn {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 12px 30px;
    border-radius: 5px;
    text-align: center;
    font-weight: 600;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
}

.grand-total-btn a.btn:hover {
    background-color: #0056b3;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    th, td {
        padding: 10px;
    }

    .width-thumbnail img {
        width: 40px;
    }

    td {
        font-size: 12px;
    }
}

</style>
