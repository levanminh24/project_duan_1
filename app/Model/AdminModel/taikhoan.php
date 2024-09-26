<?php
function listtaikhoan(){
    $sql = "select * from tai_khoan order by id desc";
    $list = pdo_query($sql);
    return $list;
}
function getId($id){
    $sql = "select * from tai_khoan where id=".$id;
 $update = pdo_query_one($sql);
}
function updatetaikhoan($id,$vaitro){
    $sql = "update tai_khoan set role = '$vaitro' where id = '$id' ";
   pdo_execute($sql);
  
}
function dangnhap($tendangnhap,$matkhau){
    $sql = "select * from tai_khoan where tendangnhap = '$tendangnhap' and matkhau = '$matkhau'";
    $dn = pdo_query_one($sql);
    return $dn; 
    }

