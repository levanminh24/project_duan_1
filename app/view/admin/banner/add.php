<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới Banner</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="index.php?act=addbanner" method="post" class="form" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Mã sản phẩm</label>
                <select name="idsanpham" class="form-control">
                    <?php
                    foreach ($sanpham_list as $sanpham) {
                        echo '<option value="">Chọn</option>';
                        echo '<option value="' . $sanpham['id'] . '">' . $sanpham['tensp'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Hình banner</label>
                <input type="file" name="hinh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày đăng</label>
                <input type="text" name="ngaydang" id="ngaydang" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <div>
                <button type="submit" name="thembanner" class="btn btn-success">Xác nhận</button>
                <a href="?act=listbanner"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo '<div class="alert alert-info">' . $thongbao . '</div>';
            ?>
        </form>
    </div>
</div>
</div>
<!-- /.container-fluid -->
