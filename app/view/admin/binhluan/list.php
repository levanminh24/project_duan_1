<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách sản phẩm</h1>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>id</th>
                        <th>Tên tài khoản</th>
                        <th>sản phẩm</th>
                    
                        <th>Nội dung bình luận</th>
                       
                        <th>Ngày bình luận</th>
                                  
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                   
                    <?php 
                     $bl = loadall_binhluan();
                    foreach ($bl as $binhluan) {
                        extract($binhluan);
                        $xoabl = "index.php?act=xoabinhluan&id=$idbl";
                      
                        echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $tendangnhap . '</td>
                            <td>' . $tensp . '</td>
                          
                            <td>' . $noidung . '</td>
                            <td>' . $ngaybinhluan . '</td>
                           
                            <td>
                               <a href="' . $xoabl . '" class="btn btn-danger btn-sm">Ẩn</a>
                              
                            </td>
                        </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

