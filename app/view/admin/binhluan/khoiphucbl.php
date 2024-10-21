<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách sản phẩm</h1>
    <form action="index.php?act=listsize" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    
                </div>
            </div>
        </div>
    </form>
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
                       
                    </tr>
                </thead>
                <tbody>
                   
                    <?php 
                     $bl = loadall_binhluankhoiphuc();
                    foreach ($bl as $binhluan) {
                        extract($binhluan);
                     
             
                        echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $tendangnhap . '</td>
                            <td>' . $tensp . '</td>
                          
                            <td>' . $noidung . '</td>
                            <td>' . $ngaybinhluan . '</td>
                           
                            
                        </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

