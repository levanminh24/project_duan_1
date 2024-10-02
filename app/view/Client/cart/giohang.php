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
                            <td class="product-cart-price"><span class="amount"><?= number_format($item['giasp'], 3) ?> VND</span></td>
                            <td class="cart-quality">
                               
                                   <p><?= $item['soluong'] ?></p>
                                
                            </td>
                            <td class="product-total">
                                <span><?= number_format($item['soluong'] * $item['giasp'], 3) ?> VND</span>
                            </td>
                            <td class="product-remove">
                                <input type="hidden" name="delete_item" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn-delete" title="Xóa sản phẩm">
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
                    
                    <div class="cart-clear btn-hover">
                        <a href="?act=clear_cart">Clear Cart</a>
                    </div>
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
                        <h3>Subtotal <span><?= number_format($tongThanhToan, 3) ?> VND</span></h3>
                    </div>
                    <div class="grand-total-btn btn-hover">
                        <a class="btn theme-color" href="?act=thanhtoan">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
