<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangnhapadmin':
            if (isset($_POST['dangnhap'])) {
                $tendangnhap = $_POST['tendangnhap'];
                $matkhau = $_POST['matkhau'];
                $user = dangnhap($tendangnhap, $matkhau);
        
                if ($user) {
                    $_SESSION['user'] = $user;
        
                    // Chuyển hướng dựa trên vai trò
                    if ($user['role'] == 0) {
                        // Quản trị viên
                        header("Location: ../../index.php");
                    } elseif ($user['role'] == 1) {
                        // Nhân viên
                        echo '<script>alert("Đăng nhập thành công."); window.location.href = "index.php?act=listdm";</script>';
                    }
                    exit();
                } else {
                    $thongbao = "Tên đăng nhập hoặc mật khẩu không đúng!";
                }
            }
            include "dangnhap/login.php";
            break;
        case 'logout':
    // Xóa tất cả thông tin phiên
    session_start();
    session_destroy(); // Xóa toàn bộ thông tin phiên

    // Chuyển hướng về trang đăng nhập
    header("Location: login.php");
    exit();

        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include 'danhmuc/list.php';
            break;
            case 'adddm':
                $errors = [];
                $thongbao = "";
            
                if (isset($_POST['themmoi'])) {
                    $tenloai = trim($_POST['tenloai']);
                    $hinh = "";  // Mặc định là không có tệp
            
                    // Validate tên danh mục
                    if (empty($tenloai)) {
                        $errors[] = "Tên danh mục không được để trống.";
                    }
            
                    // Validate hình ảnh
                    if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                        $hinh = basename($_FILES["hinh"]["name"]);
                        $target_dir = "../../images/";
                        $target_file = $target_dir . $hinh;
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    } else {
                        $errors[] = "Hình danh mục không được để trống.";
                    }
            
                    // Nếu không có lỗi, thêm danh mục mới
                    if (empty($errors)) {
                        if (insert_danhmuc($tenloai, $hinh)) {
                            $thongbao = "Thêm mới thành công";
                        } else {
                            $thongbao1 = "Tên danh mục hoặc hình ảnh đã tồn tại.";
                        }
                    }
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
                $errors = [];
                $thongbao = "";
            
                if (isset($_POST['capnhat'])) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
            
                    // Validate fields
                    if (empty($tenloai)) {
                        $errors[] = "Tên danh mục không được để trống.";
                    }
            
                    if (empty($errors)) {
                        // Check if a new file is uploaded
                        if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                            $hinh = basename($_FILES["hinh"]["name"]);
                            $target_dir = "../../images/";
                            $target_file = $target_dir . $hinh;
                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        } else {
                            // If no new file is uploaded, keep the old image
                            $hinh = $_POST['old_img']; // $img should be the old image name retrieved from the database
                        }
            
                        // Update the category with or without the new image
                        update_danhmuc($id, $tenloai, $hinh);
                       
            
                        // Chuyển hướng về case 'listdm' sau khi cập nhật thành công
                        echo '<script>alert("Cập nhật thành công."); window.location.href = "index.php?act=listdm";</script>';
                        exit; // Dừng script để không thực thi thêm mã nào sau khi chuyển hướng
                    }
                }
            
                // Keep the update page loaded if there's an error
                break;
            
            
            
            
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']!="")){
                    $id=$_GET['id'];
                    $listsp=load_one_spdm($id);
                    foreach ($listsp as $sp) {
                        delete_sp_dm($sp['iddm']);
                    }
                    delete_dm($id);
                    echo '<script>
                            alert("Bạn đã xóa danh mục thành công !");
                            window.location.href="?act=listdm";
                        </script>';
                }
                include "danhmuc/list.php";
                break;
    
        case 'listsp':
            $listsanpham = loadall_sanpham();
            include 'sanpham/list.php';
            break;
            case 'listspkhoiphuc':
                $listsanpham = loadall_sanpham_khoiphuc();
                include 'sanpham/khoiphucsp.php';
                break;
            case 'addsp':
                $errors = [];
                $thongbao = "";
            
                if (isset($_POST['themmoi'])) {
                    $tensp = trim($_POST['tensp']);
                    $iddm = $_POST['iddm'];
                    $mota = trim($_POST['mota']);
                    $giasp = $_POST['giasp'];
                    $soluong = $_POST['soluong'];
                    $trangthai = $_POST['trangthai'];
                    $hinh = ""; // Mặc định là không có tệp
            
                    // Kiểm tra các trường
                    if (empty($tensp)) {
                        $errors[] = "Tên sản phẩm không được để trống.";
                    }
            
                    if (empty($iddm)) {
                        $errors[] = "Bạn chưa chọn danh mục.";
                    }
            
                    if (empty($giasp) || !is_numeric($giasp)) {
                        $errors[] = "Giá sản phẩm không hợp lệ.";
                    }
            
                    if (empty($soluong) || !is_numeric($soluong)) {
                        $errors[] = "Số lượng sản phẩm không hợp lệ.";
                    }
            
                    // Kiểm tra file hình ảnh
                    if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                        $hinh = basename($_FILES["hinh"]["name"]);
                        $target_dir = "../../images/";
                       
                        $target_file = $target_dir . $hinh;
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    } else {
                        $errors[] = "Vui lòng chọn hình sản phẩm.";
                    }
            
                    // Nếu không có lỗi, thực hiện thêm sản phẩm
                    if (empty($errors)) {
                        insert_sanpham($tensp, $iddm, $hinh, $mota, $giasp, $soluong, $trangthai);
                        $thongbao = "Thêm sản phẩm thành công.";
                    } else {
                        // Gán các thông báo lỗi cho các biến để hiển thị trên giao diện
                        foreach ($errors as $error) {
                            if (strpos($error, 'Tên sản phẩm') !== false) {
                                $err = $error;
                            } elseif (strpos($error, 'danh mục') !== false) {
                                $err4 = $error;
                            } elseif (strpos($error, 'Giá') !== false) {
                                $err1 = $error;
                            } elseif (strpos($error, 'Số lượng') !== false) {
                                $err2 = $error;
                            } elseif (strpos($error, 'hình') !== false) {
                                $err3 = $error;
                            }
                        }
                    }
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
            case 'khphục':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    // Gọi hàm khôi phục sản phẩm
                    if (restore_sanpham($id)) {
                        echo '<script>alert("Khôi phục sản phẩm thành công!"); window.location.href = "index.php?act=listsp";</script>';
                    } else {
                        echo '<script>alert("Không thể khôi phục sản phẩm!"); window.location.href = "index.php?act=listspkhoiphuc";</script>';
                    }
                }
                break;
            
 
            case 'listtkQtv':
                $listtaikhoan = listtaikhoanadmin();
                include "taikhoan/listtkQtv.php";
                break;

        case 'addtk':
            if (isset($_POST['themmoi'])) {
                $tendangnhap = $_POST['tendangnhap'];
                $matkhau = $_POST['matkhau'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['sodienthoai'];
                $diachi = $_POST['diachi'];
                $role = isset($_POST['role']) ? $_POST['role'] : 1; // Role mặc định là 1 nếu không nhập

                // Gọi model để thêm tài khoản mới
                insert_tk($tendangnhap, $matkhau, $email, $sodienthoai, $diachi, $role);
                $thongbao = "Thêm tài khoản thành công!";
            }
            include "taikhoan/add.php";
            break;

       


        case "quanlybanner":
            $listbanner = loadall_banner('');
            include "banner/list.php";
            break;
        case 'addbanner':
            if (isset($_POST['thembanner'])) {
                $idsanpham = $_POST['idsanpham'];
                $ngaydang = $_POST['ngaydang'];
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
            if (isset($_GET['id']) && ($_GET['id'] != "")) {
                $id = $_GET['id'];
                delete_banner($id);
            }
            $listbanner = loadall_banner('');
            include "banner/list.php";
            break;
        case "qltintuc":
            $listtintuc = load_tintuc();
            include "tintuc/list.php";
            break;
        case 'addtintuc':
            if (isset($_POST['themmoi'])) {
                $ngaydang = $_POST['ngaydang'];
                $tacgia = $_POST['tacgia'];
                $tieude = $_POST['tieude'];
                $noidung = $_POST['noidung'];

                if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                    $hinh = basename($_FILES["hinh"]["name"]);
                    $target_dir = "../../images/";
                    $target_file = $target_dir . $hinh;
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    insert_tintuc($ngaydang, $tacgia, $hinh, $tieude, $noidung);
                    $thongbao = "thêm thành côg";
                } else {
                    $thongbao = "Đã xảy ra lỗi khi tải lên hình ảnh!";
                }
            }
            include "tintuc/add.php";
            break;

        case 'listbinhluan':

            include "binhluan/list.php";
            break;

        case 'xoabinhluan':

            if (isset($_GET['id']) && ($_GET['id'] != "")) {
                $id = $_GET['id'];
                delete_binhluan($id);
            }
            include "binhluan/list.php";
            break;
            case 'listbinhluanan':

                include "binhluan/khoiphucbl.php";
                break;
                
                
            case 'listBill':
                $donHang = loadall_giohang();
                include "donhang/list.php";
                break;  
            case 'donhangbihuy':
              $litshuy = donHangbiHuy();
              include "donhang/donhuy.php";
              break;
              case 'dagiao':
                $dagiao = daGiao();
                include "donhang/dagiao.php";
                break;
        case 'suaDonHang':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $dm = getIdDonHang($_GET['id']);
            }
            $donHang = loadall_giohang();
            include "donhang/update.php";
            break;
        case 'updatedonhang':
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $trangthai = $_POST['trangthai'];
                updatetrangthaiDonHang($id, $trangthai);
                echo '<script>alert("Đơn hàng đã cập nhật thành công.");</script>';
                echo '<script>window.location.href = "?act=listBill";</script>';
            }
            $donHang = loadall_giohang();
            include "donhang/list.php";
            break;
    }
} else {
    $listdanhmuc = loadall_danhmuc();
    include "danhmuc/list.php";
}