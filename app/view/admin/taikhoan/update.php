<!-- Begin Page Content -->
<?php if(is_array($taikhoan)){
    extract($taikhoan);
} ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật vai trò</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="index.php?act=updatetk" method="post" class="form" enctype="multipart/form-data">
           
            <div class="mb-3">
                <label class="form-label">Vai trò</label>
                <select name="role" id="">
                    <option value="0" <?php if(isset($role) && ($role == 0)) echo "selected" ?>>Người dùng</option>
                    <option value="1" <?php if(isset($role) && ($role == 1)) echo "selected" ?>>Admin</option>
                </select>
               
               
            </div>
            <div>
                <input type="hidden" name="id" value="<?php if(isset($id) && ($id != "")) echo $id; ?>" >
            <input type="submit" value="Cập Nhật" class="btn btn-success" name="capnhat">
            