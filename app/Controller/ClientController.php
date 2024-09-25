<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'trangchu':
            if (isset($_GET['idsp'])) {
                $id = $_GET['idsp'];
                update_luotxem_sp($id);
                echo "<script>window.location.href='index.php?act=chitietsp&id=$id';</script>";
                exit;
            } else {
                $list_banner_home = load_banner_home();
                $list_sp_home = loadall_spHome();
                $list_sp_nb = load_spnoibat();
                $listtintuchome = tintuc();
                include 'app/view/Client/home.php';
            }
            break;
        case 'chitietsp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $id = $_GET['id'];
                $product = load_one_sp($id);
                if ($product) {
                    extract($product);
                    $namedm =  load_category_name($iddm);
                    extract($namedm);
                    $comments = load_comments($product['id']);
                    $dembl =  demBinhluan($product['id']);
                    $splq = load_sp_lq($product['iddm']);
                }
            }
            include "app/view/Client/sanpham/ctsp.php";
            break;
        case 'addbinhluan':
            if (isset($_POST['guibinhluan'])) {
                if (isset($_SESSION['tendangnhap'])) {
                    $idtaikhoan = $_POST['idtaikhoan'];
                    $idsanpham = $_POST['idsanpham'];
                    $noidung = $_POST['noidung'];
                    $ngaybinhluan = $_POST['ngaybinhluan'];
                    insert_bl($idtaikhoan, $idsanpham, $noidung, $ngaybinhluan);
                    echo "<script>window.location.href='index.php?act=chitietsp&id=$idsanpham';</script>";
                } else {
                    echo '<script>alert("chưa đăng nhập")</script>';
                    echo '<script>window.location.href = "index.php?act=dangnhap"</script>';
                }
            }
            include "app/view/Client/binhluan/binhluan.php";
            break;
        
            
    }
}
