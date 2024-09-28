<!-- Begin Page Content -->
<?php if(is_array($tintuc)){
    extract($tintuc);
} ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa tintuc</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="index.php?act=updatetintuc" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tensp">Ngày đăng</label>
                    <input type="date" class="form-control" id="tensp" name="ngaydang" value="<?= $ngaydang ?>">
                    
                </div>
                <div class="form-group">
                    <label for="giasp">Tên tách giả</label>
                    <input type="text" class="form-control" id="giasp" name="tacgia" value="<?= $tacgia ?>">
                   
                </div>
            
                <div class="form-group">
                    <label for="hinh">Hình</label>
                    <input type="file" class="form-control" id="hinh" name="hinh" >
                    Ảnh cũ:<br>
                    <img style="width: 100px;" src="../../images/<?= $img ?>" alt="Ảnh cũ">
                </div>
                <div class="form-group">
                    <label for="soluong">Tiêu đề</label>
                    <input type="text" class="form-control" id="soluong" name="tieude" value="<?= $tieude ?>">
                    
                </div>
                <div class="form-group">
                    <label for="mota">Nội dung</label>
                    <textarea class="form-control" id="mota" name="noidung" rows="5"> <?= $noidung ?></textarea>
                    
                </div>
                <div class="form-group">
                    <label for="mota">Nội dung 2</label>
                    <textarea class="form-control" id="mota" name="noidunghai" rows="5"> <?= $noidunghai ?></textarea>
                   
                </div>
                <div class="form-group">
                <input type="hidden" name="id" value="<?php if(isset($id) && ($id != "")) echo $id; ?>" >
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
