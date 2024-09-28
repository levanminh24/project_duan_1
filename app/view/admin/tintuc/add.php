<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm tintuc</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="index.php?act=addtintuc" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tensp">Ngày đăng</label>
                    <input type="date" class="form-control" id="tensp" name="ngaydang">
                  
                </div>
                <div class="form-group">
                    <label >Tên tách giả</label>
                    <input type="text" class="form-control"  name="tacgia">
                    
                </div>
            
                <div class="form-group">
                    <label for="hinh">Hình</label>
                    <input type="file" class="form-control" id="hinh" name="hinh">
                    
                </div>
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control"  name="tieude">
                    
                </div>
                <div class="form-group">
                    <label for="mota">Nội dung </label>
                    <textarea class="form-control" id="mota" name="noidung" rows="5"></textarea>
                   
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="themmoi" value="Thêm mới">
                </div>
                <!-- Thông báo thành công -->
                <?php if (isset($thongbao) && $thongbao !== "") : ?>
                    <div class="alert alert-info"><?= $thongbao ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
