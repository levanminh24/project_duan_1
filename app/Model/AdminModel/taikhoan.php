<?php
function listtaikhoan()
{
    $sql = "select * from tai_khoan where role =0 order by id desc";
    $list = pdo_query($sql);
    return $list;
}
function listtaikhoanadmin()
{
    $sql = "select * from tai_khoan where role =1 order by id desc";
    $list = pdo_query($sql);
    return $list;
}

function dangnhap($tendangnhap, $matkhau)
{
    $sql = "select * from tai_khoan where tendangnhap = '$tendangnhap' and matkhau = '$matkhau'";
    $dn = pdo_query_one($sql);
    return $dn;
}
function insert_tk($tendangnhap, $matkhau, $email, $sodienthoai, $diachi, $role)
{
    $query = "INSERT INTO `tai_khoan`( `tendangnhap`, `matkhau`, `email`, `sodienthoai`, `diachi`, `role`) 
        VALUES ('$tendangnhap','$matkhau','$email','$sodienthoai','$diachi','$role')";

        pdo_execute($query);
    }
  


   

function dangxuat()
{
    session_unset();
    session_destroy();
    include_once '../../view/admin/dangnhap/login.php';
    exit();
}

