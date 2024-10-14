<div class="shop-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-12">
                   
                        <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                <?php 
                                $list_sp_home =loadall_spHome();
                                foreach($list_sp_home as $all){
                                    extract($all);
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="800">
                                            <div class="product-img img-zoom mb-25">
                                                <a href="?act=chitietsp&id=<?= $id ?>">
                                                    <img src="public/images/<?= $img?>" alt="">
                                                </a>


                                            </div>
                                            <div class="product-content">
                                                <h3><a href="?act=chitietsp&id=<?= $id ?>"><?= $tensp?></a></h3>
                                                <div class="product-price">
                                                    <a href="" style="font-size: large;"><?=number_format($giasp) ?>₫</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                    }
                    
                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    </div>
                </div>
            </div>
        </div>