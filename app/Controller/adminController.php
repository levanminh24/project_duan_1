<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

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
 
            case 'listtkQtv':
                $listtaikhoan = listtaikhoanadmin();
                include "taikhoan/listtkQtv.php";
                break;
       

        case 'suatk':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $taikhoan = getId($id);
            }
            include "taikhoan/update.php";

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


        case 'updatetk':
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $vaitro = $_POST['role'];
                updatetaikhoan($id, $vaitro);
                $thongbao = "Cập nhật thành công";
                $listtaikhoan = listtaikhoan();
                include "taikhoan/list.php";

            }
            include "taikhoan/add.php";
            break;



        


        case 'dangnhapadmin':
            if (isset($_POST['dangnhap'])) {
                $tendangnhap = $_POST['tendangnhap'];
                $matkhau = $_POST['matkhau'];

                // Gọi hàm dangnhap từ model
                $user = dangnhap($tendangnhap, $matkhau);

                if ($user) {
                    // Nếu đăng nhập thành công, lưu thông tin người dùng vào session
                    session_start();
                    $_SESSION['user'] = $user;

                    // Kiểm tra quyền của người dùng (role)
                    if ($user['role'] == 1) {
                        // Chuyển hướng đến trang admin
                        header("Location: ../view/admin/index.php");
                    } else {
                        // Chuyển hướng đến trang chủ nếu không phải admin
                        header("Location: ../view/Client/home.php");
                    }
                    exit();
                } else {
                    // Nếu thông tin đăng nhập sai, hiển thị thông báo lỗi
                    $thongbao = "Tên đăng nhập hoặc mật khẩu không đúng!";
                }
            }
            include "dangnhap/login.php";
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



                // Xử lý file upload
                // Giữ hình ảnh cũ nếu không có hình mới được tải lên

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


    }
} else {
}
