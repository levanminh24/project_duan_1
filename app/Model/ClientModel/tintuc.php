<?php
function tintuc(){
    $sql = "select * from tintuc order by id desc limit 0,3";
    $tintuc = pdo_query($sql);
    return $tintuc;
}