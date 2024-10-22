<!-- /.container-fluid -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách danh mục</h1>
    <form action="" method="post">
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
                                <th>Mã sản phẩm</th>
                                <th>Image</th>
                                <th>idsanpham</th>
                                <th>Ngày đăng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listbanner as $danhmuc) {
                                extract($danhmuc);
                              
                                $xoabanner = "index.php?act=xoabanner&id=" . $idbanner;
                                $hinhpath = "../../../public/images/banner/" . $imagebanner;  // Đường dẫn đến ảnh
                                $hinh = is_file($hinhpath) ? $hinhpath : "path/to/default/image.jpg";
                              

                                echo '<tr>
                                <td>' . $idbanner . '</td>
                                <td><img src="' . $hinh . '" width="100px"></td>
                                <td>' . $tensp . '</td>
                                 <td>' . $ngaydang . '</td>
                                <td>
                                    <a href="' . $xoabanner . '" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Xóa</a>
                                   
                                  
                                     
                                   
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
        return confirm('Bạn có chắc chắn muốn xóa banner này không?');
    }
</script>