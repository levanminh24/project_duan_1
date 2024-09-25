<?php
function load_danhmuchome(){
    $sql = "select * from danhmuc";
    $dm = pdo_query($sql);
    return $dm;
}