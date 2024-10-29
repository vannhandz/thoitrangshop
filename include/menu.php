<div class="header-middle py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="header-middle-wrap">
                    <a href="index.php" class="header-logo">
                        <img src="../assets/images/logo/dark.png" alt="Header Logo">       
                    </a>
                    <?php
                    $sql_category = mysqli_query($con, 'SELECT * FROM tbl_category ORDER BY category_id DESC');
                    ?>
                    <div class="header-search-area d-none d-lg-block">
                        <form action="index.php?quanly=timkiem" class="header-searchbox" method="POST">
                            <select class="nice-select select-search-category wide">
                                <option value="all">Danh Mục Sản Phẩm</option>

                                <?php
                                while ($row_category = mysqli_fetch_array($sql_category)) {

                                    ?>
                                    <option value="<?php echo $row_category['category_id'] ?>">
                                        <?php echo $row_category['category_name'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input class="input-field" type="search" name="search_product" placeholder="Tìm Sản Phẩm">
                            <button class="btn btn-outline-whisper btn-primary-hover" type="submit" name="search_button"><i
                                    class="pe-7s-search"></i></button>
                        </form>
                    </div>
                    <div class="header-right">
                        <ul>
                        <?php
                                if(isset($_SESSION['dangnhap_home'])){
                                ?>
                            <li class="dropdown d-none d-md-block">
                                <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="pe-7s-users"></i>
                                </button>
                               
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButton">
                                    <li><a class="dropdown-item" href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>">Xem Đơn Hàng</a></li>
                                </ul>
                            </li>
                            <?php
                                }
                                ?>
                            <li class="d-none d-md-block">
                                <a href="index.php?quanly=giohang" >
                                    <i class="pe-7s-shopbag"></i>
                                </a>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main-header header-sticky" data-bg-color="#bac34e">
    <div class="container">
        <div class="main-header_nav position-relative">
            <div class="row align-items-center">
                <div class="col-lg-12 d-none d-lg-block">
                    <div class="main-menu">
                        <nav class="main-nav">
                            <ul>
                                <li class="drop-holder">
                                    <a href="../index.php">Trang Chủ
                                    </a>
                                </li>
                                <?php
                                $sql_category_danhmuc = mysqli_query($con, 'SELECT * FROM tbl_category ORDER BY category_id DESC');
                                while ($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)) {
                                    ?>
                                    <li class="drop-holder">
                                        <a href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>">
                                            <?php echo $row_category_danhmuc['category_name'] ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            <li>
                               
                                <a href="login.php">Cá Nhân</a>
                                
                            </li>    
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
