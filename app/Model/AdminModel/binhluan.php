<?php
function loadall_binhluan()
{
    $sql = "SELECT *, binhluan.id AS idbl, tai_khoan.tendangnhap AS tendangnhap 
            FROM binhluan 
            LEFT JOIN sanpham ON binhluan.idsanpham = sanpham.id
            LEFT JOIN tai_khoan ON binhluan.idtaikhoan = tai_khoan.id
            ORDER BY binhluan.id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
