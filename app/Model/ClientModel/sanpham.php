<?php
include_once "pdo.php";
function loadall_spHome()
{
    $sql = "select * from sanpham where is_delete = 0 order by id desc";
    $listsp = pdo_query($sql);
    return $listsp;
}

function load_spnoibat()
{
    $query = "SELECT * FROM sanpham WHERE is_delete = 0 ORDER BY luotxem desc limit 0,4";
    return pdo_query($query);
}
function load_one_sp($id)
{
    $query = "SELECT * FROM sanpham WHERE id=" . $id;
    return pdo_query_one($query);
}


function load_one_spdm($iddm)
{
    $query = "SELECT * FROM sanpham WHERE iddm=" . $iddm;
    return pdo_query($query);
}
function load_category_name($iddm)
{
    $sql = "SELECT name FROM danhmuc WHERE id = " . $iddm;
    $category = pdo_query_one($sql);
    return $category;
}
function update_luotxem_sp($idsp)
{
    $query = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id = $idsp";
    pdo_execute($query);
}



function loadall_danhmuc()
{
    $sql = "SELECT * FROM danhmuc WHERE is_delete = 0";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function dem_sp_dm($iddm)
{
    $query = "SELECT COUNT(*) as countsp FROM sanpham WHERE iddm = '$iddm'";
    return pdo_query_one($query);
}



function load_sp_lq($iddm){
    $query="SELECT sanpham.*, danhmuc.name FROM sanpham INNER JOIN danhmuc ON sanpham.iddm=danhmuc.id WHERE 1";
    if($iddm!=""){
        $query .=" AND iddm=".$iddm;
    }
    $query .=" ORDER BY id asc";
    return pdo_query($query);
}




function load_all_spdm($iddm, $kyw, $giadau, $giacuoi, $page)
{
    // Chuyển đổi biến $iddm, $giadau, $giacuoi thành kiểu số nguyên
    $query = "SELECT * FROM sanpham WHERE 1";
    if ($iddm > 0) {
        $query .= " AND iddm=$iddm";
    }
    if ($kyw != '') {
        $query .= " AND tensp like '%" . $kyw . "%' ";
    }
    if ($giadau > 0 && $giacuoi > 0) {
        $query .= " AND giasp BETWEEN $giadau AND $giacuoi";
    }
    $batdau = intval($page * 9 - 9);
    $query .= " ORDER BY id desc limit $batdau,9";
    return pdo_query($query);
}
function allsp()
{
    $sql = "select * from sanpham";
    $list_sp_home = pdo_query($sql);
    return $list_sp_home;
}
function search_sanpham($tensp)
{
    $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$tensp%'";
    return pdo_query($sql);
}
function update_luotxem($id) {
    $sql = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id = $id";
    
    pdo_execute($sql);
}

