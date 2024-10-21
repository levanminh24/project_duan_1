<?php
function loadall_danhmuc(){
    $sql = "SELECT * FROM danhmuc WHERE is_delete = 0";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function insert_danhmuc($tenloai, $hinh) {
    // Kiểm tra xem tên danh mục đã tồn tại chưa
    $sql_check = "SELECT * FROM danhmuc WHERE name = '$tenloai' OR img = '$hinh'";
    $result = pdo_query($sql_check); // Sử dụng hàm pdo_query để thực hiện truy vấn

    if (count($result) > 0) {
        return false; // Tên danh mục hoặc hình ảnh đã tồn tại
    }

    // Nếu không tồn tại thì thực hiện thêm mới
    $sql = "INSERT INTO danhmuc(name, img) VALUES('$tenloai', '$hinh')";
    pdo_execute($sql);
    return true; // Thêm mới thành công
}


function loadone_danhmuc($id){
    $sql = "select * from danhmuc where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$tenloai,$hinh)  {
    $sql = "update danhmuc set name = '$tenloai',img = '$hinh' where id =".$id;
    pdo_execute($sql);
 }
 function delete_dm($id){
    $query="DELETE FROM danhmuc WHERE id=".$id;
    pdo_execute($query);
}


