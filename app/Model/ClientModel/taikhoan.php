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
    $sql = "select tendangnhap,email,sodienthoai,diachi from tai_khoan where id = '$taikhoan'";
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
function load_all_tk($vaitro,$kyw){
    $query="SELECT * FROM tai_khoan WHERE 1";
    if ($kyw != "") {
        $query .= " AND (hovaten LIKE '%" . $kyw . "%' OR email LIKE '%" . $kyw . "%' OR sodienthoai LIKE '%" . $kyw . "%')";
    }
    if($vaitro==1){
        $query .=" AND role='$vaitro' AND role=0";
    }else if($vaitro==0){
        $query .=" AND role='$vaitro' AND role=0";
    }
    $query .=" ORDER BY id asc";
    return pdo_query($query);
}
function checkuser($tendangnhap,$matkhau){
    $query="SELECT * FROM tai_khoan WHERE tendangnhap='$tendangnhap' AND  matkhau='$matkhau' AND role =0";
    return pdo_query_one($query);
}

