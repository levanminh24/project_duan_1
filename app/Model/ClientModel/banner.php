<?php
function load_banner_home()
{
    $query = "SELECT banner.id as idbanner, banner.idsanpham, banner.image as imagebanner, banner.ngaydang,
    sanpham.* FROM banner INNER JOIN sanpham ON sanpham.id=banner.idsanpham ORDER BY banner.id desc limit 0,4";
    return pdo_query($query);
}
