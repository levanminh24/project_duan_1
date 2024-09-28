<?php
function load_tintuc(){
    $sql = "select * from tintuc order by id desc limit 0,3";
    $tintuc = pdo_query($sql);
    return $tintuc;
}
function insert_tintuc($ngaydang,$tacgia,$hinh,$tieude,$noidung){
    $sql = "insert into tintuc(`ngaydang`,`tacgia`,`img`,`tieude`,`noidung`)values('$ngaydang','$tacgia', '$hinh', '$tieude', '$noidung')";
    pdo_execute($sql);
}