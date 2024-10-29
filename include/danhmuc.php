<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$sql_cate = mysqli_query($con, "SELECT *FROM  tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id 
AND tbl_sanpham.category_id ='$id' ORDER BY tbl_sanpham.sanpham_id DESC");

?>

<div class="tab-content text-charcoal pt-8">
    <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
        <div class="product-grid-view row">
            <?php
            while ($row_sanpham = mysqli_fetch_array($sql_cate)) {
                ?>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product-item">
                        <div class="product-img img-zoom-effect">
                            <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><!-- Xem Sản Phẩm -->
                                <img class="img-full" src="assets/images/anh/<?php echo $row_sanpham['sanpham_image'] ?>"
                                    alt="Product Images">
                            </a>
                            
                        </div>
                        <div class="product-content">
                            <a class="product-name" href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>">
                                <?php echo $row_sanpham['sanpham_name'] ?>
                            </a>
                            <div class="price-box pb-1">
                                <span class="new-price">
                                    <?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) . 'vnđ' ?>
                                </span>
                                <br>
                                <del>
                                    <?php echo number_format($row_sanpham['sanpham_gia']) . 'vnđ' ?>
                                </del>
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
            ?>

        </div>
    </div>
</div>