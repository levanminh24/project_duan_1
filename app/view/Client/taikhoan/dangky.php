<div class="login-register-area pb-100 pt-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                               
                                <a data-bs-toggle="tab" href="#lg2">
                                    <h4> Đăng ký </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="?act=dangky" method="post">
                                        <input type="text" name="tendangnhap" placeholder="username" >
                                        <p style="color: red;"><?= $errors['tendangnhap'] ?></p>
                                                <input type="password" name="matkhau" placeholder="Password">
                                                <p style="color: red;"><?= $errors['matkhau'] ?></p>
                                                
                                                <input name="email" placeholder="Email" type="email">
                                                <p style="color: red;"><?= $errors['email'] ?></p>
                                                <input name="sodienthoai" placeholder="Số điện thoại" type="text">
                                                <p style="color: red;"><?= $errors['sodienthoai'] ?></p>
                                                <input name="diachi" placeholder="Địa Chỉ" type="text">
                                                <p style="color: red;"><?= $errors['diachi'] ?></p>
                                                <div class="button-box btn-hover">
                                                    <button type="submit" name="dangky">Register</button>
                                                </div>
                                            </form>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>