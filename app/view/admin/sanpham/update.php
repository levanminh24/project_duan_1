<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật sản phẩm</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $sanpham['id'] ?>">
                <div class="form-group">
                    <label for="iddm">Danh mục</label>
                    <select class="form-control" id="iddm" name="iddm">
                        <option value="">Chọn danh mục</option>
                        <?php foreach($listdanhmuc as $danhmuc): ?>
                            <option value="<?= $danhmuc['id'] ?>" <?= $danhmuc['id'] == $sanpham['iddm'] ? 'selected' : '' ?>><?= $danhmuc['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="tensp">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="tensp" name="tensp" value="<?= $sanpham['tensp'] ?>">
                    <span class="text-danger">
                        <?php if (isset($err) && $err !== "") echo $err; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="giasp">Giá</label>
                    <input type="text" class="form-control" id="giasp" name="giasp" value="<?= $sanpham['giasp'] ?>">
                    <span class="text-danger">
                        <?php if (isset($err1) && $err1 !== "") echo $err1; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="soluong">Số lượng</label>
                    <input type="text" class="form-control" id="soluong" name="soluong" value="<?= $sanpham['soluong'] ?>">
                    <span class="text-danger">
                        <?php if (isset($err1) && $err1 !== "") echo $err1; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="hinh">Hình hiện tại</label><br>
                    <img src="../../images/<?= $sanpham['img'] ?>" width="100px"><br><br>
                    <label for="hinh">Chọn hình mới (nếu cần)</label>
                    <input type="file" class="form-control" id="hinh" name="hinh">
                    <input type="hidden" name="hinhcu" value="<?= $sanpham['img'] ?>">
                </div>
                <div class="form-group">
                    <label for="mota">Mô tả</label>
                    <textarea class="form-control" id="mota" name="mota" rows="5"><?= $sanpham['mota'] ?></textarea>
                    <span class="text-danger">
                        <?php if (isset($err2) && $err2 !== "") echo $err2; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="trangthai">Trạng thái</label>
                    <select class="form-control" id="trangthai" name="trangthai">
                        <option value="0" <?= $sanpham['trangthai'] == 0 ? 'selected' : '' ?>>Còn hàng</option>
                        <option value="1" <?= $sanpham['trangthai'] == 1 ? 'selected' : '' ?>>Hết hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="capnhat" value="Cập nhật">
                </div>
                <!-- Thông báo thành công -->
                <?php if (isset($thongbao) && $thongbao !== "") : ?>
                    <div class="alert alert-info"><?= $thongbao ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
