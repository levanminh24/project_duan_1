<!-- /.container-fluid -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách danh mục</h1>
    <form action="index.php?act=listdm" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <div class="input-group">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã loại</th>
                                <th>Tên danh mục</th>
                                <th>Hình</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                $suadm = "index.php?act=suadm&id=" . $id;
                                $xoadm = "index.php?act=xoadm&id=" . $id;
                                $hinhpath = "../../images/" . $img;  // Đường dẫn đến ảnh
                                $hinh = is_file($hinhpath) ? $hinhpath : "path/to/default/image.jpg";

                                echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td><img src="' . $hinh . '" width="100px"></td>
                                <td>
                                    <a href="' . $suadm . '" class="btn btn-primary btn-sm">Sửa</a>
                                    <a href="' . $xoadm . '" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Xóa</a>
                                </td>
                            </tr>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->

<!-- JavaScript function to confirm delete -->
<script>
    function confirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');
    }
</script>