<?php

if (isset($_POST['themgiohang'])) {
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $hinhanh = $_POST['hinhanh'];
    $gia = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];

    $sql_select_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
    $count = mysqli_num_rows($sql_select_giohang);
    if ($count > 0) {
        $row_sanpham = mysqli_fetch_array($sql_select_giohang);
        $soluong = $row_sanpham['soluong'] + 1;
        $sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'";
    } else {
        $soluong = $soluong;
        $sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong)
            value ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong')";
    }
    $insert_row = mysqli_query($con, $sql_giohang);
    if ($insert_row == 0) {
        header('Location:index.php?quanly=chitietsp&id=' . $sanpham_id);

    }
} elseif (isset($_POST['capnhatsoluong'])) {


    for ($i = 0; $i < count($_POST['product_id']); $i++) {
        $sanpham_id = $_POST['product_id'][$i];
        $soluong = $_POST['soluong'][$i];
        $sql_update = mysqli_query($con, "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
    }

} elseif (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($con, "DELETE FROM tbl_giohang WHERE giohang_id='$id'");

} elseif (isset($_GET['dangxuat']) == 'dangxuat') {
    $id = $_GET['dangxuat'];
    if ($id = 1) {
        unset($_SESSION['dangnhap_home']);
    }

    // header('Location:index.php?quanly=giohang&dangxuat=1');
} elseif (isset($_POST['thanhtoan'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = MD5($_POST['password']);
    $note = $_POST['note'];
    $address = $_POST['address'];

    $sql_khachhang = mysqli_query($con, "INSERT INTO tbl_khachhang(name,phone,email,address,note,password)
        value ('$name','$phone','$email','$address','$note','$password')");

    if ($sql_khachhang) {
        $sql_select_khachhang = mysqli_query($con, "SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
        $mahang = rand(0, 9999);
        $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
        $khachhang_id = $row_khachhang['khachhang_id'];
        $_SESSION['dangnhap_home'] = $row_khachhang['name'];
        $_SESSION['khachhang_id'] = $khachhang_id;
        for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {

            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];
            $sql_donhang = mysqli_query($con, "INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang)
                value ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
            $sql_giaodich = mysqli_query($con, "INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id) value
                ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
            $sql_delete_thanhtoan = mysqli_query($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");

        }

    }
} elseif (isset($_POST['thanhtoandangnhap'])) {
    $khachhang_id = $_SESSION['khachhang_id'];
    $mahang = rand(0, 9999);

    for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {

        $sanpham_id = $_POST['thanhtoan_product_id'][$i];
        $soluong = $_POST['thanhtoan_soluong'][$i];
        $sql_donhang = mysqli_query($con, "INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang)
                value ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
        $sql_giaodich = mysqli_query($con, "INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id) value
                ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
        $sql_delete_thanhtoan = mysqli_query($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");

    }
}

?>

<div class="cart-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $sql_lay_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                ?>

                <?php
                if (isset($_SESSION['dangnhap_home'])) {
                    echo '<p>Xin Chào: ' . $_SESSION['dangnhap_home'] . '<a href="index.php?quanly=giohang&dangxuat=1">  Đăng Xuất</a></p>';
                }
                ?>

                <form action="" method="POST">

                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product_remove">Xóa</th>
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="cart-product-name">Sản Phẩm</th>
                                    <th class="product-price">Đơn Giá</th>
                                    <th class="product-quantity">Số Lượng</th>
                                    <th class="product-subtotal">Tổng</th>

                                </tr>
                            </thead>
                            <?php

                            while ($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)) {
                                $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];


                                ?>
                                <tbody>
                                    <tr>
                                        <td class="product_remove">
                                            <a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>">
                                                <i class="pe-7s-close" title="Remove"></i>
                                            </a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="javascript:void(0)">
                                                <img style="max-width: 120px;"
                                                    src="assets/images/anh/<?php echo $row_fetch_giohang['hinhanh'] ?>">
                                            </a>
                                        </td>
                                        <td class="product-name"><a href="javascript:void(0)">
                                                <?php echo $row_fetch_giohang['tensanpham'] ?>
                                            </a></td>
                                        <td class="product-price"><span class="amount">
                                                <?php echo number_format($row_fetch_giohang['giasanpham']) . 'vnđ' ?>
                                            </span></td>
                                        <td class="quantity">
                                            <div class="cart-plus-minus">
                                                <div>
                                                    <input class="cart-plus-minus-box" type="text" name="soluong[]"
                                                        value="<?php echo $row_fetch_giohang['soluong'] ?>">
                                                    <input class="cart-plus-minus-box" type="hidden" name="product_id[]"
                                                        value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                                                </div>

                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">
                                                <?php echo number_format($subtotal) . 'vnđ' ?>
                                            </span></td>

                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Mã Giảm Giá" type="text">
                                    <input class="button mt-xxs-30" name="apply_coupon" value="Áp Dụng" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="capnhatsoluong" value="Cập Nhật Giỏ Hàng" type="submit">
                                    <?php
                                    $sql_giohang_select = mysqli_query($con, "SELECT * FROM tbl_giohang");
                                    $count_giohang_select = mysqli_num_rows($sql_giohang_select);

                                    if (isset($_SESSION['dangnhap_home']) && $count_giohang_select > 0) {
                                        while ($row_1 = mysqli_fetch_array($sql_giohang_select)) {
                                            ?>
                                            <input class="cart-plus-minus-box" type="hidden" name="thanhtoan_soluong[]"
                                                value="<?php echo $row_1['soluong'] ?>">
                                            <input class="cart-plus-minus-box" type="hidden" name="thanhtoan_product_id[]"
                                                value="<?php echo $row_1['sanpham_id'] ?>">
                                            <?php
                                        }
                                        ?>

                                        <input class="button" value="Đặt Hàng" name="thanhtoandangnhap" type="submit">
                                        <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <br>
                </form>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="" method="POST">
                            <div class="checkbox-form">
                                <?php
                                if (!isset($_SESSION['dangnhap_home'])) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Họ Và Tên</label>
                                                <input placeholder="" type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Số Điện Thoại <span class="required">*</span></label>
                                                <input type="text" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email <span class="required">*</span></label>
                                                <input placeholder="" type="email" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Password <span class="required">*</span></label>
                                                <input placeholder="" type="password" name="password" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ <span class="required">*</span></label>
                                                <input placeholder="tên đường,số nhà" type="text" name="address">
                                            </div>
                                        </div>
                                        <div class="order-notes">
                                            <div class="checkout-form-list checkout-form-list-2">
                                                <label>Ghi Chú</label>
                                                <textarea name="note" style="resize: none;" id="checkout-mess" cols="30"
                                                    rows="10"
                                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>
                                        <div class="payment-method">
                                            <div class="payment-accordion">
                                                <div class="order-button-payment">
                                                    <?php
                                                    $sql_lay_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                                                    while ($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)) {
                                                        ?>
                                                        <input class="cart-plus-minus-box" type="hidden"
                                                            name="thanhtoan_soluong[]"
                                                            value="<?php echo $row_thanhtoan['soluong'] ?>">
                                                        <input class="cart-plus-minus-box" type="hidden"
                                                            name="thanhtoan_product_id[]"
                                                            value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                                                    <?php
                                                    }
                                                    ?>
                                                    <input value="Đặt Hàng" name="thanhtoan" type="submit">
                                                </div>
                                            </div>
                                        <?php
                                }
                                ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12">
                        <form action="" method="post">
                            <div class="your-order">
                                <h3>Thông Tin Đặt Hàng</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Sản Phẩm</th>
                                                <th class="cart-product-total">Tổng</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                                        ?>
                                        <tbody>
                                            <?php
                                            while ($row_fetch_giohang = mysqli_fetch_array($sql_giohang)) {
                                                $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
                                                ?>
                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        <?php echo $row_fetch_giohang['tensanpham'] ?><strong
                                                            class="product-quantity">
                                                            x
                                                            <?php echo $row_fetch_giohang['soluong'] ?>
                                                        </strong>
                                                    </td>
                                                    <td class="cart-product-total"><span class="amount">
                                                            <?php echo number_format($subtotal) . 'vnđ' ?>
                                                        </span></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <?php
                                            $sql_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                                            $total = 0;
                                            while ($row_fetch_giohang = mysqli_fetch_array($sql_giohang)) {
                                                $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
                                                $total += $subtotal;
                                            }
                                            ?>
                                            <tr class="order-total">
                                                <th>Tổng Tiền</th>
                                                <td><strong><span class="amount">
                                                            <?php echo number_format($total) . 'vnđ' ?>
                                                        </span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>