<div class="product-details-area pb-100 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                        <a id="mainImageLink" href="#">
                            <img id="mainImage" src="public/images/<?= $img ?>" alt="<?= $tensp ?>" width="450px">
                        </a>
                    </div>
                    <div class="product-details-small-img-wrap">
                        <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                    <h2><?= $tensp ?></h2>
                    <div class="product-details-price">
                        <span class="new-price"><?= number_format($giasp, 3) ?> VND</span>
                    </div>
                    <div class="product-details-meta">
                        <ul>
                            <li><span class="title">Thương hiệu:</span>
                                <ul>
                                    <li><a href="#"><?= $name ?></a></li>
                                </ul>
                            </li>
                            <li><span class="title">Sản phẩm hiện đang có:</span>
                                <ul>
                                    <?php if ($soluong < 1) { ?>
                                        <li class="hethang">*Tạm thời hết hàng</li>
                                    <?php } else { ?>
                                        <li><a href="#"><?= $soluong ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="product-details-action-wrap">
                        <form action="index.php?act=giohang" method="POST">
                            <input type="hidden" name="idsanpham" value="<?= $id ?>">
                            <input type="hidden" name="tensp" value="<?= $tensp ?>">
                            <input type="hidden" name="giasp" value="<?= $giasp ?>">

                            <div class="product-quality">
                                <button type="button" class="dec qtybtn">-</button>
                                <input type="text" value="1" name="soluong" id="quantity-input">
                                <button type="button" class="inc qtybtn">+</button>
                            </div>
                            <div class="single-product-cart btn-hover">
                                <button type="submit" class="btn-theme btn-sm ml-3" name="addtocart">Thêm vào giỏ hàng</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const qtyInput = document.getElementById('quantity-input');
        const decBtn = document.querySelector('.dec.qtybtn');
        const incBtn = document.querySelector('.inc.qtybtn');

        decBtn.addEventListener('click', function() {
            let currentQty = parseInt(qtyInput.value);
            if (currentQty > 1) {
                qtyInput.value = currentQty - 1;
            }
        });

        incBtn.addEventListener('click', function() {
            let currentQty = parseInt(qtyInput.value);
            qtyInput.value = currentQty + 1;
        });
    });
</script>
<div class="description-review-area pb-85">
    <div class="container">
        <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
            <a class="active" data-bs-toggle="tab" href="#des-details1"> Mô tả </a>
            <a data-bs-toggle="tab" href="#des-details3" class=""> Đánh giá </a>
        </div>
        <div class="tab-content">
            <div id="des-details1" class="tab-pane active">
                <div class="product-description-content text-center">

                    <p data-aos="fade-up" data-aos-delay="400"><?= $mota ?></p>
                </div>
            </div>
            <div id="des-details3" class="tab-pane">
                <div id="loadbinhluan" class="review-wrapper">
                    <?php extract($dembl); ?>
                    <h3><span id="countbl"><?= $countbl ?></span> đánh giá</h3>
                    <?php
                    foreach ($comments as $bl) {
                        extract($bl);
                        echo '<div class="single-review">
                                            <div class="review-img">
                                                <img src="../assets/images/userbl.png" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h5><span>' . $tendangnhap . '</span> - ' . $ngaybinhluan . '</h5>
                                                <p>' . $noidung . '</p>
                                            </div>
                                        </div>';
                    }
                    ?>

                </div>
                <?php include 'app/view/Client/binhluan/binhluan.php'; ?>

            </div>

        </div>
    </div>
</div>
<div class="related-product-area pb-95">
    <div class="container">
        <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
            <h2>Sản phẩm liên quan</h2>
        </div>

        <div class="related-product-active swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($splq as $sp) : ?>
                    <?php extract($sp);
                    if ($soluong > 0) { ?>
                        <div class="swiper-slide">
                            <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-25">
                                    <a href="?act=chitietsp&id=<?= $id ?>">
                                        <img src="public/images/<?= $img ?>" alt="">
                                    </a>

                                    <div class="product-action-2-wrap">


                                        <button data-id="<?= $id ?>" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="?act=chitietsp&id=<?= $id ?>"><?= $tensp ?></a></h3>
                                    <div class="product-price">
                                        <span class="new-price"><?= number_format($giasp, 3) ?>₫</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                endforeach; ?>
            </div>
        </div>
    </div>
</div>