<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <!-- Custom fonts for this template -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?act=home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink" style="color: #f1c40f;"></i>
                </div>
                <div class="sidebar-brand-text mx-3">web Điện thoại</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="?act=home">
                    <i class="fas fa-fw fa-house-damage"></i>
                    <span>Home</span>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Quản lý
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Quản lý thành viên</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?act=listtk">Danh sách tai khoan</a>
                        <a class="collapse-item" href="index.php?act=listtkQtv">Danh sách Admin</a>
                        <a class="collapse-item" href="?act=addtk" style="background-color: #48dbfb;">
                            <i class="fas fa-fw fa-plus" style="color: #576574;"></i>
                            <span>Add Tài khoản Admin</span></a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý danh mục</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?act=listdm">Danh sách danh mục</a>
                        <a class="collapse-item" href="?act=adddm" style="background-color: #48dbfb;">
                            <i class="fas fa-fw fa-plus" style="color: #576574;"></i>
                            <span>Thêm mới</span></a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?act=listsp">Danh sách sản phẩm</a>
                        <a class="collapse-item" href="?act=addsp" style="background-color: #48dbfb;">
                            <i class="fas fa-fw fa-plus" style="color: #576574;"></i>
                            <span>Thêm mới</span></a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-cart-arrow-down"></i>
                    <span>Quản lý đơn hàng</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?act=listBill">Danh sách đơn hàng</a>
                        <a class="collapse-item" href="?act=kiemduyet">Kiểm duyệt đơn hàng </a>
                        <a class="collapse-item" href="?act=dagiao">Danh sách đã giao</a>
                        <a class="collapse-item" href="?act=donhangbihuy">Danh sách đã hủy</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThreer"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý banner</span>
                </a>
                <div id="collapseThreer" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?act=quanlybanner">Danh sách banner</a>
                        <a class="collapse-item" href="?act=addbanner" style="background-color: #48dbfb;">
                            <i class="fas fa-fw fa-plus" style="color: #576574;"></i>
                            <span>Thêm mới</span></a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Tables -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="?act=listbinhluan">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Quản lý bình luận</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="true" aria-controls="collapseSix">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Thống kê</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?act=bieudo">Biểu đồ</a>
                        <a class="collapse-item" href="?act=home">Danh sách</a>
                    </div>
                </div>
            </li>
            <li class="nav-item  mb-3">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSevent"
                    aria-expanded="true" aria-controls="collapseSevent">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Chức năng khác</span>
                </a>
                <div id="collapseSevent" class="collapse" aria-labelledby="headingSevent" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?act=qltintuc">Quản lý tin tức</a>
                    </div>
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?act=addtintuc">Thêm tin tức</a>
                    </div>

                </div>

                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <div id="collapseSevent" class="collapse" aria-labelledby="headingSevent" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <form action="index.php?act=logout" method="POST">
                                <button type="submit" class="collapse-item">Đăng xuất</button>
                            </form>
                        </div>

                <div id="collapseSevent" class="collapse" aria-labelledby="headingSevent" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <form action="index.php?act=logout" method="POST"> <!-- Thay your_script.php bằng tệp thực thi của bạn -->
                            <button type="submit" class="collapse-item">Đăng xuất</button>
                        </form>

                    </div>
                <?php
                }
                ?>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <i class="fas fa-fw fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <!-- <div class="dropdown-divider"></div> -->

                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->