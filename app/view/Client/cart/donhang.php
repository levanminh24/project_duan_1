<div class="checkout-main-area pb-100 pt-100">
            <div class="container">
                <div class="checkout-wrap pt-30">
                <form action="index.php?act=thanhtoan" method="post">
    <div class="row">
        <div class="col-lg-7">
            <div class="billing-info-wrap">
                <h3>Billing Details</h3>
                
                <div class="row">
    <div class="col-lg-12">
        <div class="billing-info mb-20">
            <label>Họ và Tên <abbr class="required" title="required">*</abbr></label>
            <input type="text" name="hovatennhan" value="<?= isset($hovatennhan) ? htmlspecialchars($hovatennhan) : '' ?>">
            <!-- Hiển thị lỗi nếu có -->
            <?php if (isset($errors['hovatennhan'])): ?>
                <p class="error-message" style="color: red;"><?= htmlspecialchars($errors['hovatennhan']) ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="billing-info mb-20">
            <label>Địa chỉ <abbr class="required" title="required">*</abbr></label>
            <input type="text" name="diachi" value="<?= isset($diachi) ? htmlspecialchars($diachi) : '' ?>">
            <!-- Hiển thị lỗi nếu có -->
            <?php if (isset($errors['diachi'])): ?>
                <p class="error-message" style="color: red;"><?= htmlspecialchars($errors['diachi']) ?></p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-lg-12 col-md-12">
        <div class="billing-info mb-20">
            <label>Số Điện Thoại <abbr class="required" title="required">*</abbr></label>
            <input type="text" name="sodienthoai" value="<?= isset($sodienthoai) ? htmlspecialchars($sodienthoai) : '' ?>">
            <!-- Hiển thị lỗi nếu có -->
            <?php if (isset($errors['sodienthoai'])): ?>
                <p class="error-message" style="color: red;"><?= htmlspecialchars($errors['sodienthoai']) ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="billing-info mb-20">
            <label>Ngày đặt hàng <abbr class="required" title="required">*</abbr></label>
            <input type="text" name="ngaydat" value="<?= date('Y-m-d') ?>" readonly>
        </div>
    </div>
</div>

            </div>
        </div>
        
        <div class="col-lg-5">
    <div class="your-order-area">
        <h3>Your order</h3>
        <div class="your-order-wrap gray-bg-4">
            <div class="your-order-info-wrap">
                <div class="your-order-info">
                    <ul>
                        <li>Product <span>Total</span></li>
                    </ul>
                </div>
                <div class="your-order-middle">
                    <ul>
                        <!-- Hiển thị sản phẩm trong giỏ hàng -->
                        <?php
                        $giohang = load_all_giohang($_SESSION['idtendangnhap']);
                        $tongthanhtoan = 0; // Biến tính tổng tiền thanh toán
                        foreach ($giohang as $item) {
                            // Tính tổng tiền cho từng sản phẩm
                            $tongthanhtoan += $item['thanhtien']; 
                        ?>
                            <!-- Hiển thị tên sản phẩm, số lượng và tổng tiền của từng sản phẩm -->
                            <li><?= $item['tensp'] ?> x <?= $item['soluong'] ?> <span><?= number_format($item['thanhtien'],3) ?> đ</span></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="your-order-info order-total">
                    <ul>
                        <!-- Hiển thị tổng số tiền thanh toán -->
                        <li>Total <span><?= number_format($tongthanhtoan,3) ?> đ</span></li>
                    </ul>
                </div>
            </div>

            <div class="payment-method">
                <div class="pay-top sin-payment">
                    <input id="payment-method-1" class="input-radio" type="radio" value="0" name="pttt" checked>
                    <label for="payment-method-1">Thanh toán bằng tiền mặt khi nhận hàng</label>
                </div>
                
            </div>
        </div>
        <div class="Place-order btn-hover">
            <button type="submit" name="thanhtoan">Place Order</button>
        </div>
    </div>
</div>

    </div>
</form>

                </div>
            </div>
        </div>