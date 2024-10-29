<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
$sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'");
?>



<?php

while ($row_chitiet = mysqli_fetch_array($sql_chitiet)) {
 ?>

    <div class="single-product-area section-space-top-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-product-img h-100">
                        <div class="swiper-container single-product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="assets/images/anh/<?php echo $row_chitiet['sanpham_image'] ?>"
                                        class="single-img gallery-popup">
                                        <img class="img-full" src="assets/images/anh/<?php echo $row_chitiet['sanpham_image'] ?>"
                                            alt="Product Image">
                                    </a>
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-thumb-with-content row">
                        <div class="col-12 order-lg-1 order-2 pt-10 pt-lg-0">
                            <div class="single-product-content">
                                <h2 class="title"><?php echo $row_chitiet['sanpham_name'] ?></h2>
                                <div class="price-box pb-1">
                                    <span class="new-price text-danger"><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']).'vnđ' ?></span>
                                    <span class="old-price text-primary"><?php echo number_format($row_chitiet['sanpham_gia']).'vnđ' ?></span>
                                </div>
                                <div class="rating-box-wrap pb-7">
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                            <li><i class="pe-7s-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="review-status ps-4">
                                        <a href="javascript:void(0)">( Miễn Phí Vẫn Chuyển )</a>
                                    </div>
                                </div>
                                <p class="short-desc mb-6">
                                   <p><?php echo $row_chitiet['sanpham_chitiet'] ?></p>
                                   <p><?php echo $row_chitiet['sanpham_mota'] ?></p>
                                </p>
                                <ul class="quantity-with-btn pb-7">
                                    <form action="?quanly=giohang" method="POST">
                                    <fieldset>
                                        <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>">
                                        <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>">
                                        <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_gia'] ?>">
                                        <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>">
                                        <input type="hidden" name="soluong" value="1">
                                        <input style="width: 170px; height: 50px;line-height: 50px;font-size: 16px;background-color: rgb(186, 195, 78);border: 0; ;"
                                         type="submit" name="themgiohang" value="Thêm Giỏ Hàng">      
                                    </fieldset>

                                    </form>
                                </ul>
                                <div class="social-link align-items-center pb-lg-8">
                                    <span class="title pe-3">Share:</span>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-tumblr"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-dribbble"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 order-lg-2 order-1 pt-10 pt-lg-0">
                            <div class="swiper-container single-product-thumbs">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>