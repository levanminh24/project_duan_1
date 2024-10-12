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
                        $noidung = trim($_POST['noidung']);  
                        $ngaybinhluan = $_POST['ngaybinhluan'];
            
                      
                        $errors = [];
            
                      
                        if (empty($idtaikhoan)) {
                            $errors[] = "Tài khoản không hợp lệ.";
                        }
            
                        
                        if (empty($idsanpham)) {
                            $errors[] = "Sản phẩm không hợp lệ.";
                        }
            
                       
                        if (empty($noidung)) {
                            $errors[] = "Nội dung bình luận không được để trống.";
                        }
            
                        if (empty($errors)) {
                            insert_bl($idtaikhoan, $idsanpham, $noidung, $ngaybinhluan);
                            echo "<script>window.location.href='index.php?act=chitietsp&id=$idsanpham';</script>";
                        } else {
                            // Display validation errors
                            foreach ($errors as $error) {
                                echo "<script>alert('$error');</script>";
                            }
                        }
                    } else {
                        echo '<script>alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để bình luận.");</script>';
                        echo '<script>window.location.href = "index.php?act=dangnhap";</script>';
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
                      
                    }else {
                        $errors['tendangnhap'] = "Sai tài khoản hoặc mật khẩu.";
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
            
                // Kiểm tra nếu có POST dữ liệu từ form và tránh việc xử lý lại sau reload
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addtocart'])) {
                    $idsanpham = isset($_POST['idsanpham']) ? $_POST['idsanpham'] : null; // Lấy ID sản phẩm từ form
                    $soluong = isset($_POST['soluong']) ? intval($_POST['soluong']) : 1; // Số lượng sản phẩm, phải là số nguyên
                    $giasp = isset($_POST['giasp']) ? floatval($_POST['giasp']) : 0; // Giá sản phẩm, chuyển về số thực
                    $thanhtien = $soluong * $giasp; // Tính tổng tiền cho sản phẩm này
                    $currentUrl = isset($_POST['current_url']) ? $_POST['current_url'] : 'index.php'; // Lấy URL hiện tại
            
                    // Kiểm tra xem ID tài khoản và ID sản phẩm có hợp lệ không
                    if ($idtaikhoan && $idsanpham) {
                        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                        $existingItem = load_cart_item($idtaikhoan, $idsanpham);
                        if ($existingItem) {
                            // Nếu sản phẩm đã có, cập nhật số lượng và thành tiền
                            $newQuantity = $existingItem['soluong'] + $soluong;
                            $newTotal = $newQuantity * $giasp;
            
                            // Cập nhật sản phẩm trong giỏ hàng
                            update_cart_item($idtaikhoan, $idsanpham, $newQuantity, $newTotal);
                        } else {
                            // Nếu chưa có, thêm sản phẩm vào giỏ hàng
                            insert_cart($idtaikhoan, $idsanpham, $soluong, $thanhtien);
                        }
                    } else {
                        echo "<script>alert('Vui lòng đăng nhập');</script>";
                        echo '<script>window.location.href = "index.php?act=dangnhap"</script>';
                    }
            
                    // Chuyển hướng lại trang chi tiết sản phẩm sau khi thêm vào giỏ hàng thành công
                    echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng');</script>";
                    echo '<script>window.location.href = "'.$currentUrl.'"</script>';
                    exit();
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
            
                // Gọi view để hiển thị giỏ hàng
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
                    
                        case 'thanhtoan':
                            if (isset($_POST['thanhtoan'])) {
                                // Mảng để lưu trữ lỗi
                                $errors = [];
                        
                                // Lấy thông tin từ form
                                $hovatennhan = trim($_POST['hovatennhan']);
                                $diachi = trim($_POST['diachi']);
                                $sodienthoai = trim($_POST['sodienthoai']);
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $ngaydathang = date('Y-m-d H:i:s');
                                $pttt = $_POST['pttt']; // Phương thức thanh toán
                                $trangthai = 0; // Trạng thái mặc định
                        
                                // Validate input
                                if (empty($hovatennhan)) {
                                    $errors['hovatennhan'] = "Vui lòng nhập Họ và Tên.";
                                }
                        
                                if (empty($diachi)) {
                                    $errors['diachi'] = "Vui lòng nhập địa chỉ.";
                                }
                        
                                if (empty($sodienthoai)) {
                                    $errors['sodienthoai'] = "Vui lòng nhập số điện thoại.";
                                } elseif (!preg_match('/^[0-9]{10,11}$/', $sodienthoai)) {
                                    $errors['sodienthoai'] = "Số điện thoại không hợp lệ.";
                                }
                        
                                // Nếu không có lỗi, tiến hành đặt hàng
                                if (empty($errors)) {
                                    // Lấy thông tin từ giỏ hàng
                                    $idtaikhoan = $_SESSION['idtendangnhap'];
                                    $giohang = load_all_giohang($idtaikhoan);
                        
                                    // Thêm dữ liệu vào bảng bill
                                    $idbill = insert_bill($idtaikhoan, $hovatennhan, $diachi, $sodienthoai, $ngaydathang, $pttt, $trangthai);
                        
                                    // Kiểm tra xem đơn hàng đã được thêm thành công chưa
                                    if ($idbill) {
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
                        
                                        // Thông báo và chuyển hướng
                                        $successMessage = "Đơn hàng của bạn đã được đặt thành công.";
                                        echo '<script>alert("Đơn hàng của bạn đã được đặt thành công."); window.location.href = "index.php?act=donhangcuatoi";</script>';
                                    } else {
                                        // Nếu không thêm được bill
                                        $errorMessage = "Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại.";
                                    }
                                }
                            }
                        
                            include "app/view/Client/cart/donhang.php"; // Hoặc trang khác nếu cần
                            break;
                        
                           
            case 'donhangcuatoi':
                // Lấy id của tài khoản người dùng đang đăng nhập từ session
                $idtaikhoan = $_SESSION['idtendangnhap'];
    
                // Gọi hàm để lấy thông tin chi tiết tất cả đơn hàng và sản phẩm trong từng đơn hàng
                $donhang = load_all_billchitiet($idtaikhoan);
    
                // Gọi giao diện để hiển thị thông tin đơn hàng
                include "app/view/Client/cart/dhct.php";
                break;

              
            case 'gioithieu':
                include 'app/view/Client/gioithieu/gioithieu.php';
                break;

    }
} else {
    $list_banner_home = load_banner_home();
    $list_sp_home = loadall_spHome();
    $list_sp_nb = load_spnoibat();
    $listtintuchome = tintuc();
    include "app/view/Client/home.php";
}
