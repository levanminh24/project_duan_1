<?php
function loadall_sanpham()
{
    $sql = "SELECT * FROM sanpham order by id desc";
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
    $sql = "delete from sanpham where id = " . $id;
    pdo_execute($sql);
}
function layChiTietSanPham($idbill) {
    $sql = "SELECT sp.tensp, sp.img, ctdh.soluong, ctdh.dongia, (ctdh.soluong * ctdh.dongia) AS thanhtien 
            FROM bill_chitiet ctdh 
            JOIN sanpham sp ON ctdh.idsanpham = sp.id 
            WHERE ctdh.idbill = $idbill";
    $list = pdo_query($sql);
    return $list;
}




