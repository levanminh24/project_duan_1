<?php
function dangnhap($tendangnhap,$matkhau){
$sql = "select * from tai_khoan where tendangnhap = '$tendangnhap' and matkhau = '$matkhau'";
$dn = pdo_query_one($sql);
return $dn; 
}
function dangky($tendangnhap,$matkhau,$email,$sodienthoai,$diachi){
    $sql = "insert into tai_khoan(tendangnhap,matkhau,email,sodienthoai,diachi) values('$tendangnhap','$matkhau','$email','$sodienthoai','$diachi')";
    pdo_execute($sql);
}

function thongtin(){
    $taikhoan = $_SESSION['idtendangnhap'];
    $sql = "select tendangnhap,email,sodienthoai,diachi from taikhoan where id = '$taikhoan'";
return pdo_query($sql);
}
function  update_thongtin($id,$tendangnhap,$matkhau,$email,$sodienthoai,$diachi){
    $sql = "update tai_khoan set  =  tendangnhap = '$tendangnhap', matkhau = '$matkhau', email = '$email', sodienthoai = '$sodienthoai', diachi = '$diachi' where id = $id";
    pdo_execute($sql);
  
}
function update_mk($matkhau,$id){
    $query="UPDATE `tai_khoan` SET `matkhau`='$matkhau' WHERE id=".$id;
    pdo_execute($query);
}

function load_one_tk($id){
    $query="SELECT * FROM tai_khoan WHERE id=".$id;
    return pdo_query_one($query);
}
function laymatkhau($email){
    $sql = "SELECT matkhau FROM tai_khoan WHERE email = '$email'";
    $result = pdo_query_one($sql);
    return $result;
}

