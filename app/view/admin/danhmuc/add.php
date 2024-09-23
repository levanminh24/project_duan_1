<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới danh mục</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="index.php?act=adddm" method="post" class="form" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Mã loại</label>
                <input type="text" name="id" id="" class="form-control" disabled>
                <p><?php  ?></p>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="tendm" class="form-control" placeholder="Nhập tên danh mục..." >
               
            </div>
            <div class="mb-3">
                <label class="form-label">Hình danh mục</label>
                <input type="file" name="hinh" class="form-control"  >
               
            </div>
            <div>
                <button type="submit" name="themmoi" class="btn btn-success">Xác nhận</button>
                <a href="?act=listdm"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
            <?php
                if (isset($thongbao) && ($thongbao != "")) echo '<div class="alert alert-info">' . $thongbao . '</div>';
                ?>
        </form>
    </div>
</div>
  
</span>
</div>
<!-- /.container-fluid -->