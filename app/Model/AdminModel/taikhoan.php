<?php
function listtaikhoan()
{
    $sql = "select * from tai_khoan where role =0 and is_delete = 0 order by id desc";
    $list = pdo_query($sql);
    return $list;
}
function listtaikhoanc()
{
    $sql = "SELECT * FROM tai_khoan WHERE is_delete = 1 ORDER BY id DESC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
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
  function delete_tk($id){
    $sql = "UPDATE tai_khoan SET is_delete = 1 WHERE id = $id";
    pdo_execute($sql);
      
  }
  function delete_tkc ($id)
{
    $sql = "delete from tai_khoan where id=" . $id;
    pdo_execute($sql);
}
  function restore_tk($id){
    $sql = "SELECT * FROM tai_khoan WHERE id = " . $id . " AND is_delete = 1";
    $result = pdo_query_one($sql);
    
    if ($result) {
        
        $sql = "UPDATE tai_khoan SET is_delete = 0 WHERE id = " . $id;
        pdo_execute($sql);
        return true; // Khôi phục thành công
    }
    
    return false;
  }
  function update_trangthai_tk($id,$trangthai){
    $query="UPDATE tai_khoan SET is_delete='$trangthai' WHERE id='$id'";
    pdo_execute($query);
}



   

