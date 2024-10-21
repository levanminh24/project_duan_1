<div class="login-register-area pb-100 pt-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4> Đăng Nhập </h4>
                                </a>
                                
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="?act=dangnhap" method="post">
                                                <input type="text" name="tendangnhap" placeholder="Username">
                                                <p style="color: red;"><?= $errors['tendangnhap'] ?></p>
                                                <input type="password" name="matkhau" placeholder="Password">
                                                <p style="color: red;"><?= $errors['matkhau'] ?></p>
                                                <div class="button-box btn-hover d-flex justify-content-between">
                                                    <button type="submit" name="dangnhap"> Đăng Nhập</button>
                                                    <a href="?act=quenmatkhau"><button type="button">Quên mật khẩu?</button></a>
                                                </div> 
                                            
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