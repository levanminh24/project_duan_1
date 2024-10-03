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
                    echo "<script>alert('vui lòng đăng nhập');</script>";
                    echo '<script>window.location.href = "index.php?act=dangnhap"</script>';
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
        case 'timkiem':
            if (isset($_POST['tensp']) && !empty($_POST['tensp'])) {
                $tensp = $_POST['tensp'];
                // Gọi hàm để tìm kiếm sản phẩm dựa trên tên sản phẩm
                $list_sp_timkiem = search_sanpham($tensp);
            } else {
                $list_sp_timkiem = [];
            }
            // Gọi view hiển thị kết quả tìm kiếm
            include "app/view/Client/sanpham/timkiem.php";
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
            case 'doimatkhau':
                if (isset($_SESSION['idtendangnhap'])) {
                    $matkhaucuErr = "";
                    $matkhaumoiErr = "";
                    $nhaplaimatkhaumoiErr = "";
                    if (isset($_POST['doimatkhau'])) {
                        $matkhaucu = $_POST['matkhaucu'];
                        $matkhaumoi = $_POST['matkhaumoi'];
                        $nhaplaimatkhaumoi = $_POST['nhaplaimatkhaumoi'];
                        $check = true;
                        if (empty(trim($matkhaucu))) {
                            $check = false;
                            $matkhaucuErr = "Vui lòng không bỏ trống !";
                        }
                        $tk = load_one_tk($_SESSION['idtendangnhap']);
                        if ($tk) {
                            if ($matkhaucu !== $tk['matkhau']) {
                                $check = false;
                                $matkhaucuErr = "Mật khẩu không chính xác !";
                            }
                        }
                        if (empty(trim($matkhaumoi))) {
                            $check = false;
                            $matkhaumoiErr = "Vui lòng không bỏ trống !";
                        } else {
                            if (!preg_match("/^(?=.*[0-9])(?=.*[A-Z])\w{8,18}$/", $matkhaumoi)) {
                                $check = false;
                                $matkhaumoiErr = "Mật khẩu tối thiểu 8 ký tự bao gồm ký tự số và ký tự in hoa !";
                            }
                        }
                        if ($nhaplaimatkhaumoi !== $matkhaumoi) {
                            $check = false;
                            $nhaplaimatkhaumoiErr = "Mật khẩu nhập lại không trùng khớp !";
                        }
                        if ($check) {
                            if ($tk) {
                                update_mk($matkhaumoi, $tk['id']);
                                $nhaplaimatkhaumoiErr = "Chúc mừng bạn đã đổi mật khẩu thành công !";
                            }
                        }
                    }
                }
                include "app/view/Client/taikhoan/doimatkhau.php";
                case 'quenmatkhau':
                    if (isset($_POST['quenmatkhau'])) {
                        $email = $_POST['email'];
        
                        $check = laymatkhau($email);
                        if (!empty($check)) {
                            $matkhau = $check['matkhau'];
        
                            $errors = "Mật khẩu của bạn là: $matkhau";
                        } else {
                            $errors = "Email không tồn tại vui lòng nhập lại";
                        }
                    }
                    include "app/view/Client/taikhoan/quenmatkhau.php";
                    break;
                break;
                    case 'muangay':
                        if (isset($_POST['idsanpham'])) {
                            $idsanpham = $_POST['idsanpham'];
                            $idtaikhoan = $_SESSION['idtaikhoan']; // Lấy id tài khoản của người dùng hiện tại
                    
                            // Lấy thông tin sản phẩm từ database
                            $sanpham = load_sanpham_by_id($idsanpham);
                            if ($sanpham) {
                                $soluong = 1; // Mặc định số lượng là 1 cho mua lại
                                $giasp = $sanpham['giasp'];
                                $thanhtien = $soluong * $giasp;
                    
                                // Lưu thông tin vào session để tiến hành thanh toán
                                $_SESSION['muangay'] = [
                                    'idsanpham' => $idsanpham,
                                    'tensp' => $sanpham['tensp'], // Lưu tên sản phẩm
                                    'soluong' => $soluong,
                                    'giasp' => $giasp,
                                    'thanhtien' => $thanhtien
                                ];
                    
                                // Chuyển đến trang thanh toán
                                echo '<script>window.location.href = "?act=thanhtoan";</script>';
                            } else {
                                echo '<script>alert("Sản phẩm không tồn tại.");</script>';
                            }
                        }
                        include "app/view/Client/cart/dhct.php";
                        break;
                        
                    
                        case 'huydonhang':
                            if (isset($_POST['cancel_order'])) {
                                $id = $_POST['cancel_order'];
                        
                                // Cập nhật trạng thái đơn hàng thành 'Đã Hủy' (trangthai = 4)
                                update_order_status($id, 4);
                        
                                // Hiển thị thông báo đã hủy thành công
                                echo '<script>alert("Đơn hàng đã được hủy thành công.");</script>';
                        
                                // Chuyển hướng lại trang đơn hàng của tôi
                                echo '<script>window.location.href = "?act=donhangcuatoi";</script>';
                            }
                            break;
                                            
                    case 'donhangcuatoi':
                        // Lấy id của tài khoản người dùng đang đăng nhập từ session
                        $idtaikhoan = $_SESSION['idtendangnhap'];
                        
                        // Gọi hàm để lấy thông tin chi tiết tất cả đơn hàng và sản phẩm trong từng đơn hàng
                        $donhang = load_all_billchitiet($idtaikhoan);
                        
                        // Gọi giao diện để hiển thị thông tin đơn hàng
                        include "app/view/Client/cart/dhct.php";
                        break;
                    
            
            

            break;
            case 'thanhtoan':
                if (isset($_POST['thanhtoan'])) {
                    // Lấy thông tin từ form
                    $hovatennhan = $_POST['hovatennhan'];
                    $diachi = $_POST['diachi'];
                    $sodienthoai = $_POST['sodienthoai'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaydathang = date('Y-m-d H:i:s');
                    $pttt = $_POST['pttt']; // Phương thức thanh toán (0 hoặc 1)
                    $trangthai = 0; // Trạng thái mặc định là "chờ xác nhận"
    
                    // Lấy thông tin từ giỏ hàng
                    $idtaikhoan = $_SESSION['idtendangnhap'];
                    $giohang = load_all_giohang($idtaikhoan);
    
                    // Thêm dữ liệu vào bảng bill
                    $idbill = insert_bill($idtaikhoan, $hovatennhan, $diachi, $sodienthoai, $ngaydathang, $pttt, $trangthai);
    
    
                    foreach ($giohang as $item) {
                        $idsanpham = $item['idsanpham'];
                        $soluong = $item['soluong'];
                        $dongia = $item['giasp'];
                        $thanhtien = $item['thanhtien'];
    
    
                        // Thêm dữ liệu vào bảng bill_chitiet
                        insert_bill_chitiet($idsanpham, $soluong, $dongia, $thanhtien, $idbill);
    
                        // Cập nhật số lượng sản phẩm trong bảng sanpham
                        update_soluong_sanpham($idsanpham, $soluong);
                    }
    
                    // Xóa giỏ hàng của người dùng sau khi đặt hàng
                    delete_all_giohang($idtaikhoan);
    
                    echo '<script>alert("Đơn hàng của bạn đã được đặt thành công."); window.location.href = "index.php?act=donhangcuatoi";</script>';
                }
    
                include "app/view/Client/cart/donhang.php";
                break;
            case 'donhangcuatoi':
                // Lấy id của tài khoản người dùng đang đăng nhập từ session
                $idtaikhoan = $_SESSION['idtendangnhap'];
    
                // Gọi hàm để lấy thông tin chi tiết tất cả đơn hàng và sản phẩm trong từng đơn hàng
                $donhang = load_all_billchitiet($idtaikhoan);
    
                // Gọi giao diện để hiển thị thông tin đơn hàng
                include "app/view/Client/cart/dhct.php";
                break;

    }
} else {
    $list_banner_home = load_banner_home();
    $list_sp_home = loadall_spHome();
    $list_sp_nb = load_spnoibat();
    $listtintuchome = tintuc();
    include "app/view/Client/home.php";
}
