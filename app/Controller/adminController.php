<?php

// session_start(); // Bắt đầu session để sử dụng $_SESSION

// // Kiểm tra xem người dùng đã đăng nhập và có quyền truy cập (role == 1)
// if (!isset($_SESSION['tendangnhap']) || $_SESSION['role'] != 1) {
//     header("Location: index.php?act=dangnhap"); // Chuyển hướng đến trang đăng nhập nếu không có quyền
//     exit;
// }
// // Kiểm tra xem người dùng đã đăng nhập hay chưa và quyền truy cập

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // case 'dangnhap':
        //     $errors = ['tendangnhap' => '', 'matkhau' => ''];
        //     if (isset($_POST['dangnhap'])) {
        //         $tendangnhap = $_POST['tendangnhap'];
        //         $matkhau = $_POST['matkhau'];

        //         // Kiểm tra các giá trị trống
        //         if (empty($tendangnhap)) {
        //             $errors['tendangnhap'] = "Tên đăng nhập không được để trống";
        //         }
        //         if (empty($matkhau)) {
        //             $errors['matkhau'] = "Mật khẩu không được để trống";
        //         }

        //         // Nếu không có lỗi, thực hiện kiểm tra đăng nhập
        //         if (empty($errors['tendangnhap']) && empty($errors['matkhau'])) {
        //             $taikhoan = dangnhap($tendangnhap, $matkhau);
        //             if ($taikhoan) {
        //                 // Lưu thông tin vào session
        //                 $_SESSION['tendangnhap'] = $taikhoan['tendangnhap'];
        //                 $_SESSION['role'] = $taikhoan['role'];
        //                 $_SESSION['idtendangnhap'] = $taikhoan['id'];
        //                 header("Location: index.php?act=listdm"); // Chuyển hướng sau khi đăng nhập thành công
        //                 exit;
        //             } else {
        //                 $errors['tendangnhap'] = "Tên đăng nhập hoặc mật khẩu không đúng";
        //             }
        //         }
        //     }
        //     include "dangnhap/login.php";
        //     break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include 'danhmuc/list.php';
            break;
        case 'adddm':
            if (isset($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $hinh = "";  // Mặc định là không có tệp
                if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                    $hinh = basename($_FILES["hinh"]["name"]);
                    $target_dir = "../../images/";
                    $target_file = $target_dir . $hinh;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                }
                insert_danhmuc($tenloai, $hinh);
                $thongbao = "Thêm mới thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include 'danhmuc/update.php';
            break;
        case 'updatedm':
            if (isset($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];

                if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                    $hinh = basename($_FILES["hinh"]["name"]);
                    $target_dir = "../../images/";
                    $target_file = $target_dir . $hinh;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    update_danhmuc($id, $tenloai, $hinh); // Chỉ cập nhật hình ảnh nếu có tệp mới
                } else {
                    update_danhmuc($id, $tenloai, $hinh); // Không thay đổi hình ảnh
                }
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();

            include "danhmuc/list.php";
            break;
        case 'listsp':
            $listsanpham = loadall_sanpham();
            include 'sanpham/list.php';
            break;
        case 'addsp':
            if (isset($_POST['themmoi'])) {
                $tensp = $_POST['tensp'];
                $iddm = $_POST['iddm'];
                $hinh = "";  // Mặc định là không có tệp
                if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                    $hinh = basename($_FILES["hinh"]["name"]);
                    $target_dir = "../../images/";
                    $target_file = $target_dir . $hinh;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                }
                $mota = $_POST['mota'];
                $giasp = $_POST['giasp'];
                $soluong = $_POST['soluong'];

                $trangthai = $_POST['trangthai'];
                insert_sanpham($tensp, $iddm, $hinh, $mota, $giasp, $soluong, $trangthai);
                $thongbao = "Thêm thành công";
            }

            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $sanpham = getdetail_sanpham($_GET['id']);
            }

            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $iddm = $_POST['iddm'];
                $hinh = $_POST['hinhcu'];   // Giữ hình ảnh cũ nếu không có hình mới được tải lên
                if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                    $hinh = basename($_FILES["hinh"]["name"]);
                    $target_dir = "../../images/";
                    $target_file = $target_dir . $hinh;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                }
                $mota = $_POST['mota'];
                $giasp = $_POST['giasp'];
                $soluong = $_POST['soluong'];

                $trangthai = $_POST['trangthai'];
                update_sanpham($id, $tensp, $iddm, $hinh, $mota, $giasp, $soluong, $trangthai);
                $thongbao = "Cập nhật thành công";
            }
            $listsanpham = loadall_sanpham();

            $listdanhmuc = loadall_danhmuc();
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/list.php";
            break;
        case 'listtk':
            $listtaikhoan = listtaikhoan();
            include "taikhoan/list.php";
            break;
        case 'suatk':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $taikhoan = getId($id);
            }
            include "taikhoan/update.php";
        case 'updatetk':
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $vaitro = $_POST['role'];
                updatetaikhoan($id, $vaitro);
                $thongbao = "Cập nhật thành công";
                $listtaikhoan = listtaikhoan();
                include "taikhoan/list.php";
            }
            break;
        case "quanlybanner":
            $listbanner = loadall_banner('');
            include "banner/list.php";
            break;
        case 'addbanner':
            if (isset($_POST['thembanner'])) {
                $idsanpham = $_POST['idsanpham'];
                $ngaydang = $_POST['ngaydang'];

                // Xử lý file upload
                // Giữ hình ảnh cũ nếu không có hình mới được tải lên
                if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                    $hinh = basename($_FILES["hinh"]["name"]);
                    $target_dir = "../../images/banner/";
                    $target_file = $target_dir . $hinh;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    inssert_banner($idsanpham, $hinh, $ngaydang);

                    $thongbao = "thêm thành côg";
                } else {
                    $thongbao = "Đã xảy ra lỗi khi tải lên hình ảnh!";
                }
            }
            $sanpham_list = loadall_sanpham();
            include "banner/add.php";
            break;

            case 'xoabanner':
                if(isset($_GET['id'])&&($_GET['id']!="")){
                    $id=$_GET['id'];
                   delete_banner($id);
                    
                }
                $listbanner = loadall_banner('');
                include "banner/list.php";
                break;
               
                

        
    

    }
} else {
    
}
