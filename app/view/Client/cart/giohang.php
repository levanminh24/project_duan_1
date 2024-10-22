<div class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form action="?act=xoagiohang" method="POST">
    <div class="cart-table-content">
        <div class="table-content table-responsive">
            <table>
                <thead>
                    <tr>
                        <th class="width-thumbnail"></th>
                        <th class="width-name">Product</th>
                        <th class="width-price"> Price</th>
                        <th class="width-quantity">Quantity</th>
                        <th class="width-subtotal">Subtotal</th>
                        <th class="width-remove"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($giohang as $item): ?>
                        <tr>
                            <td class="product-thumbnail">
                                <a href="?act=chitietsp&id=<?= $item['idsp'] ?>">
                                    <img src="public/images/<?= $item['img'] ?>" alt="<?= $item['tensp'] ?>">
                                </a>
                            </td>
                            <td class="product-name">
                                <h5><a href="product-details.php?id=<?= $item['idsp'] ?>"><?= $item['tensp'] ?></a></h5>
                            </td>
                            <td class="product-cart-price"><span class="amount"><?= number_format($item['giasp']) ?> VND</span></td>
                              
                            <td class="cart-quality">
  <p><?= $item['soluong'] ?></p>
</td>

                                
                          
                            <td class="product-total">
                                <span><?= number_format($item['soluong'] * $item['giasp']) ?> VND</span>
                            </td>
                            <td class="product-remove">
    <input type="hidden" name="delete_item" value="<?= $item['id'] ?>">
    <button type="button" class="btn-delete" title="Xóa sản phẩm" onclick="confirmDelete(<?= $item['id'] ?>)">
        <i class="ti-trash"></i>
    </button>
</td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="cart-shiping-update-wrapper">
                <div class="cart-shiping-update btn-hover">
                    <a href="?act=allsanpham">Continue Shopping</a>
                </div>
                <div class="cart-clear-wrap">
                    
                    
                </div>
            </div>
        </div>
    </div>
</form>

            </div>
        </div>
        <div class="row">
    <div class="col-lg-4 col-md-12 col-12">
        <div class="grand-total-wrap">
            <div class="grand-total-content">
                <h3>Subtotal <span><?= number_format($tongThanhToan) ?> VND</span></h3>
            </div>
            <div class="grand-total-btn btn-hover">
                <?php if (count($giohang) > 0): ?>
                    <a class="btn theme-color" href="?act=thanhtoan">Proceed to checkout</a>
                <?php else: ?>
                    <button class="btn theme-color" disabled>Proceed to checkout</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

    </div>
</div>
<script>
function confirmDelete(itemId) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?')) {
        // Gửi yêu cầu AJAX để xóa sản phẩm
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php?act=xoagiohang', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Gửi ID sản phẩm cần xóa
        xhr.send('delete_item=' + itemId);

        // Xử lý phản hồi từ máy chủ
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Tải lại giỏ hàng
                location.reload(); // Reload trang
            } else {
                alert('Có lỗi xảy ra. Vui lòng thử lại!');
            }
        };
    }
}
</script>
