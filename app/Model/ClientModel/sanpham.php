<?php
function loadall_spHome()
{
    $sql = "select * from sanpham ";
    $listsp = pdo_query($sql);
    return $listsp;
}

function load_spnoibat()
{
    $query = "SELECT * FROM sanpham ORDER BY luotxem desc limit 0,4";
    return pdo_query($query);
}
function load_one_sp($id)
{
    $query = "SELECT * FROM sanpham WHERE id=" . $id;
    return pdo_query_one($query);
}


function load_one_spdm($iddm){
    $query="SELECT * FROM sanpham WHERE iddm=".$iddm;
    return pdo_query($query);
}
function load_category_name($iddm)
{
    $sql = "SELECT name FROM danhmuc WHERE id = " . $iddm;
    $category = pdo_query_one($sql);
    return $category;
}


function update_luotxem_sp($idsp) {
    $query = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id = $idsp";
    pdo_execute($query);
}