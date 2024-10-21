<?php
function loadall_sanpham()
{
    $sql = "SELECT * FROM sanpham WHERE is_delete = 0 ORDER BY id DESC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadall_sanpham_khoiphuc()
{
    $sql = "SELECT * FROM sanpham WHERE is_delete = 1 ORDER BY id DESC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function  insert_sanpham($tensp, $iddm, $hinh, $mota, $giasp, $soluong, $trangthai)
{
    $sql = "INSERT INTO sanpham(tensp, iddm, img, mota, giasp, soluong,trangthai) VALUES('$tensp', '$iddm', '$hinh', '$mota', '$giasp', '$soluong', '$trangthai')";
    pdo_execute($sql);
}
function getdetail_sanpham($id)
{
    $sql = "SELECT * FROM sanpham WHERE id = $id";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_sanpham($id, $tensp, $iddm, $hinh, $mota, $giasp, $soluong, $trangthai)
{
    $sql = "UPDATE sanpham SET tensp = '$tensp', iddm = '$iddm', img = '$hinh', mota = '$mota', giasp = '$giasp', soluong = '$soluong',  trangthai = '$trangthai' WHERE id = $id";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "UPDATE sanpham SET is_delete = 1 WHERE id = " . $id;
    pdo_execute($sql);
}
function restore_sanpham($id)
{
    // Kiểm tra xem sản phẩm có tồn tại không trước khi khôi phục
    $sql = "SELECT * FROM sanpham WHERE id = " . $id . " AND is_delete = 1";
    $result = pdo_query_one($sql);
    
    if ($result) {
        // Nếu sản phẩm đã bị xóa, thực hiện khôi phục
        $sql = "UPDATE sanpham SET is_delete = 0 WHERE id = " . $id;
        pdo_execute($sql);
        return true; // Khôi phục thành công
    }
    
    return false; // Sản phẩm không tồn tại hoặc không thể khôi phục
}


function layChiTietSanPham($idbill) {
    $sql = "SELECT sp.tensp, sp.img, ctdh.soluong, ctdh.dongia, (ctdh.soluong * ctdh.dongia) AS thanhtien 
            FROM bill_chitiet ctdh 
            JOIN sanpham sp ON ctdh.idsanpham = sp.id 
            WHERE ctdh.idbill = $idbill";
    $list = pdo_query($sql);
    return $list;
}
function load_one_spdm($iddm){
    $query="SELECT * FROM sanpham WHERE iddm=".$iddm;
    return pdo_query($query);
}
function delete_sp_dm($id){
    $query="DELETE FROM sanpham WHERE iddm=".$id;
    pdo_execute($query);
}



