<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách sản phẩm</h1>
    <form action="index.php?act=listsize" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <div class="input-group">
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Số lượng</th>
                        <th>Lượt xem</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        $hinhpath = "../../images/" . $img;  // Đường dẫn đến ảnh
                        $hinh = is_file($hinhpath) ? $hinhpath : "path/to/default/image.jpg"; 
                        $trangthai_text = $trangthai == 0 ? "Còn hàng" : "Hết hàng";

                        echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $tensp . '</td>
                            <td>' . $giasp . '</td>
                            <td><img src="' . $hinh . '" width="100px"></td>
                            <td>' . $mota . '</td>
                            <td>' . $soluong . '</td>
                            <td>' . $luotxem . '</td>
                            <td>' . $trangthai_text . '</td>
                            <td>
                                <a href="' . $suasp . '" class="btn btn-primary btn-sm">Sửa</a>
                                <a href="' . $xoasp . '" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
