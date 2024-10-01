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
                    $namedm = load_category_name($iddm);
                    extract($namedm);
                    $comments = load_comments($product['id']);
                    $dembl = demBinhluan($product['id']);
                    $splq = load_sp_lq($product['iddm']);
                }


                include "app/view/Client/sanpham/ctsp.php";
            }
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
case 'allsanpham':
    include "app/view/Client/sanpham/sanpham.php";
    break;
  
        case 'sptheodm':
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $iddm = $_GET['id'];
                if (isset($_POST['submittimkiem'])) $kyw = $_POST['timkiem'];
                else $kyw = "";
                if (isset($_POST['submitlocgia'])) {
                    $giadau = $_POST['giaspdau'];
                    $giacuoi = $_POST['giaspcuoi'];
                } else {
                    $giadau = 0;
                    $giacuoi = 0;
                }
                // Lấy danh sách sản phẩm theo danh mục và các điều kiện lọc
                $list_sp_dm = load_all_spdm($_GET['id'], $kyw, $giadau, $giacuoi, 1);
                $listdm = load_one_spdm($_GET['id']);
            }

            // Gọi view để hiển thị
            include "app/view/Client/sanpham/sptheodm.php";
            break;
        case 'dangky':
            $errors = ['tendangnhap' => '', 'matkhau' => '', 'email' => '', 'sodienthoai' => '', 'diachi' => ''];
            $tendangnhap = $matkhau = $email = $sodienthoai = $diachi = ' ';
            if (isset($_POST['dangky'])) {

                $tendangnhap = $_POST['tendangnhap'];
                $matkhau = $_POST['matkhau'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['sodienthoai'];
                $diachi = $_POST['diachi'];

                if (empty($tendangnhap)) {
                    $errors['tendangnhap'] = "Tên đăng nhập không được để trống.";
                } elseif (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $tendangnhap)) {
                    $errors['tendangnhap'] = "Tên đăng nhập phải viết liền ko dấu từ 3 đến 20 ký tự";
                }

                // Kiểm tra mật khẩu
                if (empty($matkhau)) {
                    $errors['matkhau'] = "Mật khẩu không được để trống.";
                } elseif (strlen($matkhau) < 6 || strlen($matkhau) > 20) {
                    $errors['matkhau'] = "Mật khẩu phải từ 8 ký tự trở lên.";
                }

                // Kiểm tra email
                if (empty($email)) {
                    $errors['email'] = "Email không được để trống.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Email không hợp lệ.";
                }

                // Kiểm tra số điện thoại
                if (empty($sodienthoai)) {
                    $errors['sodienthoai'] = "Số điện thoại không được để trống.";
                } elseif (!preg_match("/^[0-9]{10,11}$/", $sodienthoai)) {
                    $errors['sodienthoai'] = "Số điện thoại phải chứa 10-11 chữ số.";
                }

                // Kiểm tra địa chỉ
                if (empty($diachi)) {
                    $errors['diachi'] = "Địa chỉ không được để trống.";
                }
                if (empty($errors['hovaten']) && empty($errors['tendangnhap']) && empty($errors['matkhau']) && empty($errors['email']) && empty($errors['sodienthoai']) && empty($errors['diachi'])) {
                    dangky($tendangnhap, $matkhau, $email, $sodienthoai, $diachi);
                    echo "<script>alert('Đăng ký thành công');</script>";
                    echo "<script>window.location.href='index.php?act=dangnhap';</script>";
                    exit;
                }
            }
            include "app/view/Client/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            $errors = ['tendangnhap' => '', 'matkhau' => ''];
            if (isset($_POST['dangnhap'])) {
                $tendangnhap = $_POST['tendangnhap'];
                $matkhau = $_POST['matkhau'];

                if (empty($tendangnhap)) {
                    $errors['tendangnhap'] = "Tên đang nhập không được để trống";
                }
                if (empty($matkhau)) {
                    $errors['matkhau'] = "Mật khẩu không được để trống";
                }
                if (empty($errors['tendangnhap'] && $errors['matkhau'])) {
                    $taikhoan = dangnhap($tendangnhap, $matkhau);
                    if ($taikhoan && $taikhoan['tendangnhap'] == $tendangnhap && $taikhoan['matkhau'] == $matkhau) {
                        $_SESSION['tendangnhap'] = $tendangnhap;
                        $_SESSION['role'] = $taikhoan['role'];
                        $_SESSION['idtendangnhap'] = $taikhoan['id'];
                        echo "<script>alert('Đăng nhập thành công');</script>";
                        echo "<script>window.location.href='index.php?act=trangchu';</script>";
                        exit;
                    }
                }
            }
            include "app/view/Client/taikhoan/dangnhap.php";
            break;
        case 'thongtintaikhoan':
            include "app/view/Client/taikhoan/thongtintaikhoan.php";
            break;
        case 'updatethongtintaikhoan':
            if (isset($_POST['capnhat'])) {
                $id = $_SESSION['idtendangnhap'];

                $tendangnhap = $_POST['tendangnhap'];
                $matkhau = $_POST['matkhau'];
                $email = $_POST['email'];
                $sodienthoai = $_POST['sodienthoai'];
                $diachi = $_POST['diachi'];

                update_thongtin($id, $tendangnhap, $matkhau, $email, $sodienthoai, $diachi);
                echo "<script>alert(' cập nhật thành công');</script>";
            }
            include "app/view/Client/taikhoan/thongtintaikhoan.php";
            break;
        case 'dangxuat':
            unset($_SESSION['idtendangnhap']);
            unset($_SESSION['role']);
            echo '<script>window.location.href ="index.php?act=dangnhap"</script>';
            break;
            case 'giohang':
                // Lấy ID tài khoản từ session
                $idtaikhoan = isset($_SESSION['idtendangnhap']) ? $_SESSION['idtendangnhap'] : null;
            
                // Kiểm tra nếu có POST dữ liệu từ form
                if (isset($_POST['addtocart'])) {
                    $idsanpham = isset($_POST['idsanpham']) ? $_POST['idsanpham'] : null; // Lấy ID sản phẩm từ form
                    $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 1; // Số lượng sản phẩm
                    $giasp = isset($_POST['giasp']) ? $_POST['giasp'] : 0; // Giá sản phẩm
                    $thanhtien = $soluong * $giasp; // Tính tổng tiền cho sản phẩm này
            
                    // Kiểm tra xem ID tài khoản và ID sản phẩm có hợp lệ không
                    if ($idtaikhoan && $idsanpham) {
                        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                        $existingItem = load_cart_item($idtaikhoan, $idsanpham);
                        if ($existingItem) {
                            // Nếu sản phẩm đã có, không gọi hàm insert_cart
                            echo " ";
                        } else {
                            // Nếu chưa có, gọi hàm insert_cart
                            insert_cart($idtaikhoan, $idsanpham, $soluong, $thanhtien);
                        }
                    } else {
                        echo "Lỗi: Không thể thêm sản phẩm vào giỏ hàng.";
                    }
                }
            
                // Lấy giỏ hàng từ cơ sở dữ liệu
                if ($idtaikhoan) {
                    $giohang = load_all_giohang($idtaikhoan);
                } else {
                    $giohang = []; // Nếu không có ID tài khoản, khởi tạo giỏ hàng rỗng
                }
            
                // Tính tổng thanh toán
                $tongThanhToan = 0;
                foreach ($giohang as $item) {
                    $tongThanhToan += $item['thanhtien'];
                }
            
                include "app/view/Client/cart/giohang.php";
                break;
            
            case 'xoagiohang':
                if (isset($_POST['delete_item'])) {
                    $id = $_POST['delete_item'];
                    delete_giohang($id); // Gọi hàm để xóa sản phẩm khỏi giỏ hàng
                }
            
                // Sau khi xoá, load lại giỏ hàng và tính lại tổng thanh toán
                $idtaikhoan = $_SESSION['idtendangnhap']; // Lấy ID tài khoản từ session
                $giohang = load_all_giohang($idtaikhoan); // Lấy lại giỏ hàng
            
                // Tính tổng thanh toán
                $tongThanhToan = 0;
                foreach ($giohang as $item) {
                    $tongThanhToan += $item['thanhtien'];
                }
            
                include "app/view/Client/cart/giohang.php"; // Hiển thị giỏ hàng
                break;
            
            
    }
} else {
}
