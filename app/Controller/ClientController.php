<?php
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch($act){
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
            case 'sptheodm':
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $iddm = $_GET['id'];
                    if(isset($_POST['submittimkiem'])) $kyw=$_POST['timkiem'];
                    else $kyw="";
                    if(isset($_POST['submitlocgia'])){
                        $giadau=$_POST['giaspdau'];
                        $giacuoi=$_POST['giaspcuoi'];
                    }else{
                        $giadau=0;
                        $giacuoi=0;
                    }
                    // Lấy danh sách sản phẩm theo danh mục và các điều kiện lọc
                    $list_sp_dm = load_all_spdm($_GET['id'], $kyw, $giadau, $giacuoi, 1); // Giả sử trang hiện tại là 1
                    $listdm = load_one_spdm($_GET['id']); 
                }
            
                // Gọi view để hiển thị
                include "app/view/Client/sanpham/sptheodm.php";
                break;
                case 'chitietsp':
                    if (isset($_GET['id']) && ($_GET['id']) > 0) {
                        $id = $_GET['id'];
                        $product = load_one_sp($id);
                        if ($product) {
                            extract($product);
                            $namedm =  load_category_name($iddm);
                            extract($namedm);
                         $splq = load_sp_lq($product['iddm']);
                        }
                    }
                    include "app/views/Client/sanpham/ctsp.php";
                    break;
    }
}