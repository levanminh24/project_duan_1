<div class="shop-area shop-page-responsive pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                <?php
                                foreach ($list_sp_dm as $sp) {
                                    extract($sp);
                                ?>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                            <div class="product-img img-zoom mb-25">
                                                <a href="product-details.html">
                                                    <img src="public/images/<?= $img ?>" alt="">
                                                </a>

                                                <div class="product-action-wrap">
                                                    <button class="product-action-btn-1" title="Wishlist" data-idsp="<?= $id ?>"><i class="pe-7s-like"></i></button>
                                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="pe-7s-look"></i>
                                                    </button>
                                                </div>
                                                <div class="product-action-2-wrap">
                                                    <button class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Add to cart</button>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href=""><?= $tensp ?></a></h3>
                                                <div class="product-price">
                                                    <span class="new-price"><?= number_format($giasp, 3) ?> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="pagination-style-1" data-aos="fade-up" data-aos-delay="200">
                                <ul>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="ti-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="shop-2" class="tab-pane">
                            <div class="pagination-style-1">
                                <ul>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="ti-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            <?php extract($listdm);?>
                <div class="sidebar-wrapper">
                <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                        <div class="search-wrap-2">
                            <form class="search-2-form" method="post" action="?act=sptheodm&id=<?=$iddm?>">
                                <input placeholder="Tìm kiếm*" type="text" name="timkiem">
                                <button class="button-search" type="submit" name="submittimkiem"><i class=" ti-search "></i></button>
                            </form>
                        </div>
                    </div>
                    <form action="?act=sptheodm&id=<?=$iddm?>" method="post">
                        <div class="sidebar-widget  mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                            <div class="sidebar-widget-title mb-30">
                                <h3>Lọc giá</h3>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>Giá:</label>
                                        <input type="text" id="amount" placeholder="Tìm theo giá" />
                                        <input type="hidden" name="giaspdau" class="giaspdau">
                                        <input type="hidden" name="giaspcuoi" class="giaspcuoi">
                                    </div>
                                    <button type="submit" name="submitlocgia">Lọc</button>
                                </div>
                            </div>
                        </div>
                    </form>



                    <div class="sidebar-widget sidebar-widget-border mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                        <div class="sidebar-widget-title mb-25">
                            <h3>Product Categories</h3>
                        </div>
                        <div class="sidebar-list-style">
                            <ul>
                                <?php
                                $listdm = loadall_danhmuc();
                                foreach ($listdm as $dm) {
                                    extract($dm);
                                    $sp = dem_sp_dm($id);
                                    $countsp = $sp['countsp'];
                                    echo '<li><a href="index.php?act=sptheodm&id=' . $id . '">' . $name . ' <span>(' . $countsp . ')</span></a></li>';
                                }
                                ?>
                                <!-- Các danh mục khác -->
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

