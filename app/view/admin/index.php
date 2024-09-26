<?php

ob_start();
session_start();
if (!isset($_SESSION['tendangnhap'])) {
    // Sử dụng header thay vì echo script để chuyển hướng nhanh chóng
    echo '<script>window.location.href = "index.php?act=dangnhap"</script>';
   // Dừng script sau khi chuyển hướng
}
// Include necessary models
require_once "../../Model/AdminModel/taikhoan.php";
require_once "../../Model/AdminModel/sanpham.php";
require_once "../../Model/AdminModel/banner.php";
require_once "../../Model/AdminModel/danhmuc.php";
require_once "../../Model/AdminModel/pdo.php";

// Include header and controller
require_once "../admin/header.php";
require_once "../../Controller/adminController.php";

// Include footer
require_once "../admin/footer.php";

