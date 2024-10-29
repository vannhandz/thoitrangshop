<div class="slider-area">
            <?php
                $sql_slider=mysqli_query($con,"SELECT * FROM slider WHERE slider_active='1' ORDER BY slider_id");
                while($row_slider=mysqli_fetch_array($sql_slider)){
            ?>
            <!-- Main Slider -->
            <div class="swiper-container main-slider swiper-arrow with-bg_white">
                <div class="swiper-wrapper">
                    <div class="swiper-slide animation-style-01">
                        <div  class="slide-inner bg-height" data-bg-image="assets/images/anh/silde1.jpg">
                            <!-- <div class="parallax-img-wrap">
                                <div class="chilly">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.2">
                                            <img src="assets/images/anh/slide.jpg" alt="Inner Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="avocado">
                                    <div class="scene fill">
                                        <div class="expand-width" data-depth="0.5">
                                            <img src="assets/images/slider/inner-img/1-2-224x204.png" alt="Inner Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="parallax-with-content">
                                    <div class="slide-content">
                                        <span class="sub-title mb-3"></span>
                                        <h2 class="title mb-9">-40% Tất Cả <br>Sản Phẩm</h2>
                                        <div class="button-wrap">
                                            <a class="btn btn-custom-size lg-size btn-primary btn-white-hover rounded-0" href="shop.html">Shop Now</a>
                                        </div>
                                    </div>
                                    <div class="parallax-img-wrap">
                                        <div class="tomatoes">
                                            <div class="scene fill">
                                                <div class="expand-width" data-depth="0.5">
                                                    <img src="assets/images/slider/inner-img/1-3-601x534.png" alt="Inner Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                </div>
                <?php 
                }
                ?>
                <!-- Add Pagination -->
                <div class="swiper-pagination with-bg d-md-none"></div>

                <!-- Add Arrows -->
                <!-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> -->
            </div>

        </div>