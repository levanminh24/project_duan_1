
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật Banner</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="index.php?act=updatebanner" method="post" class="form" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="sel1">Sản phẩm</label>
                <select class="form-control" id="sel1" name="idsanpham">
                  
                </select>
            </div>
                <div class="form-group">
                    <label for="hinh">Hình hiện tại</label><br>
                    <!-- Hiển thị hình ảnh cũ -->
                    <img style="width: 100px;" src="../../images/banner/<?= $image ?>" alt="Ảnh cũ">
                    <label for="hinh">Chọn hình mới (nếu cần)</label>
                    <input type="file" class="form-control" id="hinh" name="hinh">
                    <!-- Giữ lại hình ảnh cũ -->
                    <input type="hidden" name="hinhcu" value="<?= $image ?>">
                </div>

                <div>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" name="capnhatbanner" class="btn btn-success">Cập nhật</button>
                    <a href="?act=listbanner"><button type="button" class="btn btn-success">Quay lại</button></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo '<div class="alert alert-info">' . $thongbao . '</div>';
                ?>
            </form>
        </div>
    </div>
</div>
