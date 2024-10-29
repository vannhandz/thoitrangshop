<div class="shipping-area section-space-top-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="assets/images/shipping/icon/plane.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Free Shipping</h5>
                                <p class="short-desc mb-0">Free Home Delivery Offer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-6 pt-md-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="assets/images/shipping/icon/earphones.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Online Support</h5>
                                <p class="short-desc mb-0">24/7 Online Support Provide</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-6 pt-lg-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="assets/images/shipping/icon/shield.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Secure Payment</h5>
                                <p class="short-desc mb-0">Fully Secure Payment System</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shipping Area End Here -->

        <!-- Begin Product Area -->
        <div class="product-area section-space-top-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav product-tab-nav pb-10" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="active" id="all-items-tab" data-bs-toggle="tab" href="#all-items" role="tab" aria-controls="all-items" aria-selected="true">
                                    <div class="product-tab-icon">
                                        <img src="assets/images/product/icon/1.png" alt="Product Icon">
                                    </div>
                                    All Items
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="fresh-fruits-tab" data-bs-toggle="tab" href="#fresh-fruits" role="tab" aria-controls="fresh-fruits" aria-selected="false">
                                    <div class="product-tab-icon">
                                        <img src="assets/images/product/icon/2.png" alt="Product Icon">
                                    </div>
                                    Fresh Fruits
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="vegetable-tab" data-bs-toggle="tab" href="#vegetable" role="tab" aria-controls="vegetable" aria-selected="false">
                                    <div class="product-tab-icon">
                                        <img src="assets/images/product/icon/3.png" alt="Product Icon">
                                    </div>
                                    Vegetable
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="fish-meat-tab" data-bs-toggle="tab" href="#fish-meat" role="tab" aria-controls="fish-meat" aria-selected="false">
                                    <div class="product-tab-icon">
                                        <img src="assets/images/product/icon/4.png" alt="Product Icon">
                                    </div>
                                    Fish & Meat
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="wheat-tab" data-bs-toggle="tab" href="#wheat" role="tab" aria-controls="wheat" aria-selected="false">
                                    <div class="product-tab-icon">
                                        <img src="assets/images/product/icon/5.png" alt="Product Icon">
                                    </div>
                                    Wheat
                                </a>
                            </li>
                        </ul>


                        <div class="tab-content" id="myTabContent">
                                  <?php 
                                    $sql_cate_home= mysqli_query($con,"SELECT *FROM  tbl_category ORDER BY category_id DESC");
                                    while($row_cate_home=mysqli_fetch_array($sql_cate_home)){
                                        $id_category= $row_cate_home["category_id"];
                                    ?>
                            <div class="tab-pane fade show active" id="all-items" role="tabpanel" aria-labelledby="all-items-tab">
                                <div class="product-item-wrap row">
                                    <?php 
                                    $sql_product=mysqli_query($con,"SELECT *FROM  tbl_sanpham ORDER BY sanpham_id DESC");
                                    while($row_sanpham=mysqli_fetch_array($sql_product)){
                                        if($row_sanpham['category_id']==$id_category){
                                    ?>
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img img-zoom-effect">
                                                <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><!-- Xem Sản Phẩm -->
                                                    <img class="img-full" src="assets/images/anh/<?php echo $row_sanpham['sanpham_image'] ?>" alt="Product Images">    
                                                </a>
                                               
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>">
                                                <?php echo $row_sanpham['sanpham_name'] ?></a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'vnđ' ?></span>
                                                    <br>
                                                    <del><?php echo number_format($row_sanpham['sanpham_gia']).'vnđ' ?></del>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                        <li><i class="pe-7s-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                     }
                                    }
                                    ?>
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
        <!-- Product Area End Here -->

        <!-- Begin Banner Area -->
     
        <!-- Banner Area End Here -->

        <!-- Begin Product Area -->
       
        <!-- Product Area End Here -->

        <!-- Begin Banner Area -->
        <div class="banner-area banner-with-parallax py-10" data-bg-image="assets/images/banner/2-1-1920x523.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="parallax-img-wrap">
                            <div class="papaya">
                                <div class="scene fill">
                                    <div class="expand-width" data-depth="0.2">
                                        <img src="assets/images/banner/inner-img/2-1-503x430.png" alt="Banner Images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="banner-content text-white text-center text-md-start">
                            <div class="section-title">
                                <span class="sub-title">New Offer Products</span>
                                <h2 class="title font-size-60 mb-6">SAVE 20% OFF</h2>
                            </div>
                            <div class="countdown-wrap">
                                <div class="countdown item-4" data-countdown="2022/01/01" data-format="short">
                                    <div class="countdown__item me-3">
                                        <span class="countdown__time daysLeft"></span>
                                        <span class="countdown__text daysText"></span>
                                    </div>
                                    <div class="countdown__item me-3">
                                        <span class="countdown__time hoursLeft"></span>
                                        <span class="countdown__text hoursText"></span>
                                    </div>
                                    <div class="countdown__item me-3">
                                        <span class="countdown__time minsLeft"></span>
                                        <span class="countdown__text minsText"></span>
                                    </div>
                                    <div class="countdown__item">
                                        <span class="countdown__time secsLeft"></span>
                                        <span class="countdown__text secsText"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="button-wrap pt-10">
                                <a class="btn btn-custom-size lg-size btn-white rounded-0" href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>