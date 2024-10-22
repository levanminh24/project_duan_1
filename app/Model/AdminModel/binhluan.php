<?php
function loadall_binhluan()
{
    $sql = "SELECT *, binhluan.id AS idbl, tai_khoan.tendangnhap AS tendangnhap 
            FROM binhluan 
            LEFT JOIN sanpham ON binhluan.idsanpham = sanpham.id
            LEFT JOIN tai_khoan ON binhluan.idtaikhoan = tai_khoan.id 
            WHERE binhluan.is_delete = 0
            ORDER BY binhluan.id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
function loadall_binhluankhoiphuc()
{
    $sql = "SELECT *, binhluan.id AS idbl, tai_khoan.tendangnhap AS tendangnhap 
            FROM binhluan 
            LEFT JOIN sanpham ON binhluan.idsanpham = sanpham.id
            LEFT JOIN tai_khoan ON binhluan.idtaikhoan = tai_khoan.id 
            WHERE binhluan.is_delete = 1
            ORDER BY binhluan.id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
// xáo bình luận
function delete_binhluan($id)
{
    $sql = "UPDATE binhluan SET is_delete = 1 WHERE id = " . $id;
    pdo_execute($sql);
}



