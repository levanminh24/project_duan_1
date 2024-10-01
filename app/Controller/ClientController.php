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
            case 'dangky':
                $errors = [ 'tendangnhap' => '', 'matkhau' => '', 'email' => '', 'sodienthoai' => '', 'diachi' => ''];
                $tendangnhap = $matkhau = $email = $sodienthoai = $diachi= '';
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
                    if ( empty($errors['tendangnhap']) && empty($errors['matkhau']) && empty($errors['email']) && empty($errors['sodienthoai']) && empty($errors['diachi'])) {
                        dangky( $tendangnhap, $matkhau, $email, $sodienthoai, $diachi);
                        echo "<script>alert('Đăng ký thành công');</script>";
                        echo "<script>window.location.href='index.php?act=dangnhap';</script>";
                        exit;
                    }
                }
                include "app/view/Client/taikhoan/dangky.php";

                break;
                case 'dangxuat':
                    unset($_SESSION['tendangnhap']);
                    unset($_SESSION['role']);
                    unset($_SESSION['idtendangnhap']);
                    echo "<script>window.location.href='index.php?act=trangchu';</script>";
                    exit;
                    break;
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
                        include "app/views/Client/taikhoan/quenmatkhau.php";
                        break;
                        case 'updatethongtintaikhoan':
                            if (isset($_POST['capnhat'])) {
                                $id = $_SESSION['idtendangnhap'];
                                $hovaten = $_POST['hovaten'];
                                $tendangnhap = $_POST['tendangnhap'];
                                $matkhau = $_POST['matkhau'];
                                $email = $_POST['email'];
                                $sodienthoai = $_POST['sodienthoai'];
                                $diachi = $_POST['diachi'];
                
                                update_thongtin($id, $hovaten, $tendangnhap, $matkhau, $email, $sodienthoai, $diachi);
                                echo "<script>alert(' cập nhật thành công');</script>";
                            }
                            include "app/views/Client/taikhoan/thongtintaikhoan.php";
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
                                include "app/views/Client/taikhoan/doimatkhau.php";
                                break;  
                                case 'thongtintaikhoan':

                                    include "app/views/Client/taikhoan/thongtintaikhoan.php";
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
                                        include "app/views/Client/sanpham/sptheodm.php";
                                        break;
                                          
                
    }
}
