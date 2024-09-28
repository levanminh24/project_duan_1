<!-- /.container-fluid -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách danh mục</h1>
    <form action="index.php?act=listtintuc" method="post">
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
                                <th>id</th>
                                <th>Ngày đăng</th>
                                <th>Tên tác gia</th>
                                <th>Hình</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                      
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listtintuc as $tintuc) {
                                extract($tintuc);
                                $suatt = "index.php?act=suatintuc&id=" . $id;
                                $xoatt = "index.php?act=xoatintuc&id=" . $id;
                                $hinhpath = "../../images/" . $img;  // Đường dẫn đến ảnh
                                $hinh = is_file($hinhpath) ? $hinhpath : "path/to/default/image.jpg";

                                echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $ngaydang . '</td>
                                 <td>' . $tacgia . '</td>
                                   <td><img src="' . $hinh . '" width="100px"></td>
                                  <td>' . $tieude . '</td>
                                    <td>' . $noidung . '</td>
                                     
                              
                                <td>
                                    <a href="' . $suatt . '" class="btn btn-primary btn-sm">Sửa</a>
                                    <a href="' . $xoatt . '" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Xóa</a>
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