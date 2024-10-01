<?php
function load_all_giohang($idtaikhoan)
{
    $query = "SELECT giohang.id, giohang.idtaikhoan, giohang.idsanpham, giohang.soluong, giohang.thanhtien,
              sanpham.id as idsp, sanpham.tensp, sanpham.giasp, sanpham.img, sanpham.soluong as soluongsp, sanpham.trangthai
              
              FROM giohang 
              INNER JOIN sanpham ON giohang.idsanpham = sanpham.id 
             
              WHERE giohang.idtaikhoan = $idtaikhoan AND sanpham.trangthai = 0
              ORDER BY giohang.id DESC";
    return pdo_query($query);
   
}


function insert_cart($idtaikhoan, $idsanpham, $soluong, $thanhtien)
{
    $query = "INSERT INTO giohang (idtaikhoan, idsanpham, soluong, thanhtien) 
              VALUES ('$idtaikhoan', '$idsanpham', '$soluong', '$thanhtien')";
    pdo_execute($query);
}
function delete_giohang($id) {
    $sql = "DELETE FROM giohang WHERE id = $id";
    pdo_execute($sql);
   
}
function load_cart_item($idtaikhoan, $idsanpham) {
    $query = "SELECT * FROM giohang WHERE idtaikhoan = '$idtaikhoan' AND idsanpham = '$idsanpham'";
    return pdo_query($query); // Hàm này nên trả về một mảng các sản phẩm trong giỏ hàng
}

