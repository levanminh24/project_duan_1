<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới danh mục</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            // Hiển thị thông báo lỗi nếu có
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
             if (isset($thongbao1) && $thongbao1 !== "") : ?>
                <div class="alert alert-info btn-danger" style="color: red"><?= $thongbao1 ?></div>
            <?php endif; ?>
            <?php
            if (!empty($thongbao)) {
                echo '<div class="alert alert-info">' . $thongbao . '</div>';
            }
            ?>
            <form action="index.php?act=adddm" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Mã loại</label>
                    <input type="text" name="id" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="tenloai" id="tendm" class="form-control" placeholder="Nhập tên danh mục..." value="<?php if (isset($tenloai)) echo htmlspecialchars($tenloai); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hình danh mục</label>
                    <input type="file" name="hinh" class="form-control">
                </div>
                <div>
                    <button type="submit" name="themmoi" class="btn btn-success">Xác nhận</button>
                    <a href="?act=listdm"><button type="button" class="btn btn-success">Quay lại</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
