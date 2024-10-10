<!-- Begin Page Content -->
<?php if(is_array($dm)){
    extract($dm);
} ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật danh mục</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="index.php?act=updatedm" method="post" class="form" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Mã loại</label>
                <input type="text" name="id" id="" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" name="tenloai" id="tendm" class="form-control" placeholder="Nhập tên danh mục..." value="<?php if(isset($name) && ($name != "")) echo $name; ?>" >
               
            </div>
            <div class="mb-3">
                <label class="form-label">Hình danh mục</label>
                <input type="file" name="hinh" class="form-control"  >
               
                    Ảnh cũ:<br>
                    <img style="width: 100px;" src="../../images/<?= $img ?>" alt="Ảnh cũ">
            </div>
            <div>
                <input type="hidden" name="id" value="<?php if(isset($id) && ($id != "")) echo $id; ?>" >
            <input type="submit" value="Cập Nhật" class="btn btn-success" name="capnhat">
            