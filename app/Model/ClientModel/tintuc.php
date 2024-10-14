<?php
function tintuc(){
    $sql = "select * from tintuc order by id desc limit 0,3";
    $tintuc = pdo_query($sql);
    return $tintuc;
}
function tintuc_Home(){
    $sql = "select * from tintuc order by id desc";
    $tintuc = pdo_query($sql);
    return $tintuc;
}
function tintuc_chitiet($id){
    $sql = "select * from tintuc where id =". intval($id);
    $tintuc = pdo_query_one($sql);
    return $tintuc;
}