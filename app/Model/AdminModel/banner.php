<?php
function loadall_banner($kyw){
    $sql = "SELECT banner.id as idbanner, banner.idsanpham,banner.image as imagebanner,banner.ngaydang,sanpham.*FROM banner INNER JOIN sanpham ON sanpham.id = banner.idsanpham";
    if($kyw != ''){
        $sql .= "AND banner.idsanpham LIKE '%" . $kyw."%'";
    }
    $sql .=" ORDER BY banner.id desc";
    return pdo_query($sql);
}
function delete_banner($id){
    $sql = " delete from banner where id='$id'";
    pdo_execute($sql);
}
function inssert_banner($idsanpham,$hinh,$ngaydang){
    $sql = "insert into banner(`idsanpham`,`image`,`ngaydang`) values ('$idsanpham','$hinh','$ngaydang')";
    pdo_execute($sql);

}

function load_one_banner($id){
    $sql = "select * from banner where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_banner($id, $idsanpham, $hinh) {
    $sql = "update banner set idsanpham = '$idsanpham',image = '$hinh' where id = $id";
    pdo_execute($sql);
}

