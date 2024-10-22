<?php
function load_all_giohang($idtaikhoan)
{
    $query = "SELECT giohang.id, giohang.idtaikhoan, giohang.idsanpham, giohang.soluong, giohang.thanhtien, 
       sanpham.id as idsp, sanpham.tensp, sanpham.giasp, sanpham.img, sanpham.soluong as soluongsp, sanpham.trangthai
FROM giohang 
INNER JOIN sanpham ON giohang.idsanpham = sanpham.id 
WHERE giohang.idtaikhoan = $idtaikhoan AND sanpham.trangthai = 0
ORDER BY giohang.id DESC
";
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
    $sql = "SELECT * FROM giohang WHERE idtaikhoan = $idtaikhoan AND idsanpham = $idsanpham";
    // Thực thi truy vấn và trả về sản phẩm nếu có
    return pdo_query_one($sql); // pdo_query_one trả về 1 bản ghi
}

function insert_bill($idtaikhoan,$hovatennhan, $diachinhan, $sodienthoainhan, $ngaydathang, $pttt, $trangthai) {
    $query = "INSERT INTO bill (idtaikhoan,hovatennhan, diachinhan, sodienthoainhan, ngaydathang, pttt, trangthai) 
              VALUES ('$idtaikhoan','$hovatennhan', '$diachinhan', '$sodienthoainhan', '$ngaydathang', '$pttt', '$trangthai')";
    return pdo_execute_return_lastInsertId($query);
}


function insert_bill_chitiet($idsanpham, $soluong, $dongia, $thanhtien,  $idbill) {
    $query = "INSERT INTO bill_chitiet (idsanpham, soluong, dongia, thanhtien, idbill) 
              VALUES ('$idsanpham', '$soluong', '$dongia', '$thanhtien', '$idbill')";
   
    pdo_execute($query);
}
function insert_thongke($ngaydat, $id_bill_ct, $doanhthu, $soluongban) {
    $query = "INSERT INTO thongke (ngaydat, id_bill_ct, doanhthu, soluongban) 
              VALUES ('$ngaydat', '$id_bill_ct', '$doanhthu', '$soluongban')";
    
    pdo_execute($query);
}

function update_soluong_sanpham($idsanpham, $soluong) {
    $query = "UPDATE sanpham SET soluong = soluong - $soluong WHERE id = $idsanpham";
   
    pdo_execute($query);
}
function delete_all_giohang($idtaikhoan) {
    $query = "DELETE FROM giohang WHERE idtaikhoan = $idtaikhoan";
   
    pdo_execute($query);
}
// Lấy tất cả các đơn hàng của người dùng
function load_all_bills_by_user($idtaikhoan) {
    $query = "SELECT * FROM bill WHERE idtaikhoan = $idtaikhoan ORDER BY id DESC";
    return pdo_query($query);
}
function demsoluong_giohang($idtaikhoan) {
    // Truy vấn SQL để lấy tổng số lượng sản phẩm trong giỏ hàng của người dùng
    $sql = "SELECT SUM(giohang.soluong) AS tong_soluong 
            FROM giohang 
            WHERE giohang.idtaikhoan = '$idtaikhoan'";
    
    // Thực hiện truy vấn
    $result = pdo_query($sql);
    
    // Kiểm tra và trả về kết quả
    if (!empty($result)) {
        return $result[0]['tong_soluong'] ? $result[0]['tong_soluong'] : 0;
    } else {
        return 0; // Trả về 0 nếu không có sản phẩm nào trong giỏ hàng
    }
}

// Lấy chi tiết sản phẩm cho từng đơn hàng
function load_all_billchitiet($idtaikhoan) {
    $query = "SELECT bill.id, bill.hovatennhan, bill.diachinhan, bill.sodienthoainhan, bill.ngaydathang, bill.pttt, bill.trangthai,
              bill_chitiet.idsanpham, bill_chitiet.soluong, bill_chitiet.dongia, bill_chitiet.thanhtien,
              sanpham.tensp, sanpham.img
              FROM bill
              INNER JOIN bill_chitiet ON bill.id = bill_chitiet.idbill
              INNER JOIN sanpham ON bill_chitiet.idsanpham = sanpham.id
              WHERE bill.idtaikhoan = $idtaikhoan
              ORDER BY bill.ngaydathang DESC, bill_chitiet.id DESC";  // Sắp xếp sản phẩm trong mỗi hóa đơn theo mã sản phẩm mới nhất
              
    return pdo_query($query);
}

function update_cart_item($idtaikhoan, $idsanpham, $soluong, $thanhtien) {
    $sql = "UPDATE giohang SET soluong = $soluong, thanhtien = $thanhtien 
            WHERE idtaikhoan = $idtaikhoan AND idsanpham = $idsanpham";
    pdo_execute($sql);
}


function load_sanpham_by_id($idsanpham) {
    $sql = "SELECT * FROM sanpham WHERE id = $idsanpham";
    return pdo_query_one($sql); // Giả sử bạn đang dùng hàm này để lấy dữ liệu từ database
}
function update_order_status($id, $status) {
    $sql = "UPDATE bill SET trangthai = '$status' WHERE id = '$id'";
    pdo_execute($sql);
}


//cap nhap so luong gio hang
function get_product_details($idsanpham) {
    $query = "SELECT * FROM sanpham WHERE id = $idsanpham";
    $result = pdo_query($query); // Giả định pdo_query trả về một mảng các sản phẩm

    // Kiểm tra xem sản phẩm có tồn tại không
    if (count($result) > 0) {
        return $result[0]; // Trả về thông tin sản phẩm
    }
    
    return null; // Nếu không tìm thấy sản phẩm

}
function load_all_ctdh_lsmh($iddonhang){
    $query="SELECT chitietdonhang.id, chitietdonhang.iddonhang, chitietdonhang.idsanpham, chitietdonhang.soluong, chitietdonhang.dongia, chitietdonhang.thanhtien,
    donhang.id as iddh, donhang.idtaikhoan, donhang.hovatennhan, donhang.ngaydathang, donhang.diachinhan, donhang.sodienthoainhan, donhang.phuongthuctt, donhang.trangthai,
    sanpham.id as idsp, sanpham.iddm, sanpham.tensp, sanpham.giakm, sanpham.image FROM bill_chitiet 
    INNER JOIN bill ON chitietdonhang.iddonhang=donhang.id
    INNER JOIN sanpham ON chitietdonhang.idsanpham=sanpham.id  WHERE chitietdonhang.iddonhang='$iddonhang'";
    return pdo_query($query);
}
function load_all_ctdh_update($iddonhang){
    $query="SELECT chitietdonhang.id, chitietdonhang.iddonhang, chitietdonhang.idsanpham, chitietdonhang.soluong, chitietdonhang.dongia, chitietdonhang.thanhtien,
    donhang.id as iddh, donhang.idtaikhoan, donhang.hovatennhan, donhang.ngaydathang, donhang.diachinhan, donhang.sodienthoainhan, donhang.phuongthuctt, donhang.trangthai,
    sanpham.id as idsp, sanpham.iddm, sanpham.tensp, sanpham.giakm, sanpham.image FROM bill_chitiet
    INNER JOIN bill ON chitietdonhang.iddonhang=donhang.id
    INNER JOIN sanpham ON chitietdonhang.idsanpham=sanpham.id  WHERE chitietdonhang.iddonhang='$iddonhang'";
    return pdo_query($query);
}
function load_all_dh_lsmh($idtaikhoan,$trangthai){
    $query="SELECT * FROM bill WHERE idtaikhoan='$idtaikhoan'";
    if($trangthai==0){
        $query .=" AND trangthai='$trangthai'";
    }else if($trangthai==2){
        $query .=" AND (trangthai='1' OR trangthai='2')";
    }else if($trangthai==3){
        $query .=" AND trangthai='$trangthai'";
    }else if($trangthai==4){
        $query .=" AND trangthai='$trangthai'";
    }
    else if($trangthai==5){
        $query .=" AND trangthai='$trangthai'";
    }
    $query .=" ORDER BY id desc";
    return pdo_query($query);
}
function load_one_dh($id){
    $query="SELECT * FROM bill WHERE id=".$id;
    return pdo_query_one($query);
}
function update_giohang($soluong,$thanhtien,$idsanpham){
    $query="UPDATE `giohang` SET `soluong`='$soluong',`thanhtien`='$thanhtien' WHERE idsanpham=".$idsanpham;
    pdo_execute($query);
}

