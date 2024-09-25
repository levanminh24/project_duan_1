<?php

function insert_bl($idtaikhoan, $idsanpham, $noidung, $ngaybinhluan) {
    $query = "INSERT INTO `binhluan`(`idtaikhoan`, `idsanpham`, `noidung`, `ngaybinhluan`) VALUES ('$idtaikhoan','$idsanpham','$noidung','$ngaybinhluan')";
    pdo_execute($query);
}

function load_comments($idsanpham) {
    $query = "SELECT b.noidung, b.ngaybinhluan, t.tendangnhap FROM binhluan b JOIN tai_khoan t ON b.idtaikhoan = t.id WHERE b.idsanpham = $idsanpham";
    return pdo_query($query);
}

function demBinhluan($idsanpham){
    $query="SELECT COUNT(*) as countbl FROM binhluan WHERE idsanpham='$idsanpham'";
    return pdo_query_one($query);
}