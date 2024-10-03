<?php
session_start();
if (!isset($_SESSION['user']) && (!isset($_GET['act']) || $_GET['act'] != 'dangnhapadmin')) {
    // Nếu chưa đăng nhập và không phải đang trong case 'dangnhapadmin', chuyển hướng về trang đăng nhập
    header("Location: index.php?act=dangnhapadmin");
    exit();
}
require_once "../../Model/AdminModel/giohang.php";
require_once "../../Model/AdminModel/binhluan.php";
require_once "../../Model/AdminModel/tintuc.php";
require_once "../../Model/AdminModel/taikhoan.php";
require_once "../../Model/AdminModel/sanpham.php";
require_once "../../Model/AdminModel/banner.php";
require_once "../../Model/AdminModel/danhmuc.php";
require_once "../../Model/AdminModel/pdo.php";




require_once "../admin/header.php"; 
require_once "../../Controller/adminController.php"; 
require_once "../admin/footer.php"; 
?>
