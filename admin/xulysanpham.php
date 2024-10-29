<?php
include('../db/connect.php');
?>
<?php
if (isset($_POST['themsanpham'])) {
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];

    $soluong = $_POST['soluong'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $sql_insert_product = mysqli_query($con, "INSERT INTO tbl_sanpham(sanpham_name,sanpham_chitiet,
        sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,category_id) 
        values ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");
    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
}elseif(isset($_POST['capnhatsanpham'])){
   
    $id_update=$_POST['id_update'];
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $soluong = $_POST['soluong'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';

    if($hinhanh=='')
    {
        $sql_uptate_image="UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',
        sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',category_id='$danhmuc'
           WHERE sanpham_id='$id_update'";
    }else{
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        $sql_uptate_image="UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',
        sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',category_id='$danhmuc'
        WHERE sanpham_id='$id_update'";
    }
    mysqli_query($con,$sql_uptate_image);

}

?>

<?php
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con, "DELETE FROM tbl_sanpham WHERE sanpham_id='$id'");

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách nhân viên | Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
            aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">


            <!-- User Menu-->
            <li><a class="app-nav__item" href="?login=dangxuat"><i class='bx bx-log-out bx-rotate-180'></i> </a>

            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <?php
    include('sidebar.php');
    ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập"
                                    onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file" type="button" title="In"
                                    onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button"
                                    title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i>
                                    Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm pdf-file" type="button" title="In"
                                    onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                        class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                        </div>

                        <?php
                        if (isset($_GET['quanly'])) {
                            $capnhat = $_GET['quanly'];
                        } else {
                            $capnhat = '';
                        }
                        if ($capnhat == 'capnhat') {
                            $id_capnhat = $_GET['capnhat_id'];
                            $sql_capnhat = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
                            $row_capnhat = mysqli_fetch_array($sql_capnhat);
                            $id_category_1=$row_capnhat['category_id']
                            ?>
                            <div class="tile">
                                <h3 class="tile-title">Cập Nhật Sản Phẩm</h3>
                                <div class="tile-body">
                                    <form class="row" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group col-md-3">
                                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                                            <?php
                                            $sql_danhmuc = mysqli_query($con, "SELECT *FROM tbl_category ORDER BY category_id DESC");
                                            ?>
                                            <select class="form-control" id="exampleSelect1" name="danhmuc">
                                                <option value="0">-- Chọn danh mục --</option>
                                                <?php
                                                while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                                    if($id_category_1==$row_danhmuc["category_id"]) {
                                                    ?>
                                                    <option selected value="<?php echo $row_danhmuc['category_id'] ?>">
                                                        <?php echo $row_danhmuc['category_name'] ?>
                                                    </option>
                                                    <?php
                                                    }else{
                                                    ?>
                                                        <option value="<?php echo $row_danhmuc['category_id'] ?>">
                                                        <?php echo $row_danhmuc['category_name'] ?>
                                                    <?php

                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Tên sản phẩm</label>
                                            <input class="form-control" type="text" name="tensanpham" value="<?php echo $row_capnhat['sanpham_name'] ?>">
                                            <input class="form-control" type="hidden" name="id_update" value="<?php echo $row_capnhat['sanpham_id'] ?>">
                                        </div>


                                        <div class="form-group  col-md-3">
                                            <label class="control-label">Số lượng</label>
                                            <input class="form-control" type="number" name="soluong" value="<?php echo $row_capnhat['sanpham_soluong'] ?>" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Giá Sản Phẩm</label>
                                            <input class="form-control" type="text" name="giasanpham" value="<?php echo $row_capnhat['sanpham_gia'] ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Giá Khuyến Mãi</label>
                                            <input class="form-control" type="text" name="giakhuyenmai" value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Chi Tiết</label>
                                            <input class="form-control" type="text" name="chitiet" value="<?php echo $row_capnhat['sanpham_chitiet'] ?>">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="control-label">Hình Ảnh</label>
                                            <div id="myfileupload">
                                                <input type="file" id="uploadfile" name="hinhanh"
                                                    onchange="readURL(this);" />
                                                <img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="80" alt="">

                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Mô tả sản phẩm</label>
                                            <textarea class="form-control" name="mota" id="mota" ><?php echo $row_capnhat['sanpham_mota'] ?></textarea>
                                            <script>CKEDITOR.replace('mota');</script>
                                        </div>

                                </div>
                                <input class="btn btn-save" type="submit" name="capnhatsanpham" value="Cập Nhật Sản Phảm">
                                <a class="btn btn-cancel" href="/doc/table-data-oder.html">Hủy bỏ</a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="tile">
                                <h3 class="tile-title">Thêm Sản Phẩm</h3>
                                <div class="tile-body">
                                    <form class="row" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group col-md-3">
                                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                                            <?php
                                            $sql_danhmuc = mysqli_query($con, "SELECT *FROM tbl_category ORDER BY category_id DESC");
                                            ?>
                                            <select class="form-control" id="exampleSelect1" name="danhmuc">
                                                <option value="0">-- Chọn danh mục --</option>
                                                <?php
                                                while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                                    ?>
                                                    <option value="<?php echo $row_danhmuc['category_id'] ?>">
                                                        <?php echo $row_danhmuc['category_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Tên sản phẩm</label>
                                            <input class="form-control" type="text" name="tensanpham">
                                        </div>


                                        <div class="form-group  col-md-3">
                                            <label class="control-label">Số lượng</label>
                                            <input class="form-control" type="number" name="soluong">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Giá Sản Phẩm</label>
                                            <input class="form-control" type="text" name="giasanpham">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Giá Khuyến Mãi</label>
                                            <input class="form-control" type="text" name="giakhuyenmai">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Chi Tiết</label>
                                            <input class="form-control" type="text" name="chitiet">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="control-label">Hình Ảnh</label>
                                            <div id="myfileupload">
                                                <input type="file" id="uploadfile" name="hinhanh"
                                                    onchange="readURL(this);" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">Mô tả sản phẩm</label>
                                            <textarea class="form-control" name="mota" id="mota"></textarea>
                                            <script>CKEDITOR.replace('mota');</script>
                                        </div>

                                </div>
                                <input class="btn btn-save" type="submit" name="themsanpham" value="Thêm Sản Phảm">
                                <a class="btn btn-cancel" href="/doc/table-data-oder.html">Hủy bỏ</a>
                            </div>
                            <?php
                        }
                        ?>

                        <?php
                        $sql_select_sp = mysqli_query($con, "SELECT *FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.category_id=tbl_category.category_id 
                            ORDER BY tbl_sanpham.sanpham_id DESC");
                        ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Số Thứ Tự</th>
                                    <th>Tên Sản Phảm</th>
                                    <th>Ảnh</th>
                                    <th>Số Lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Giá Khuyến Mãi</th>
                                    <th>Danh mục</th>
                                    <th>Chức năng</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row_sp = mysqli_fetch_array($sql_select_sp)) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td width="10"><input type="checkbox" name="danhmuc" value="1"></td>
                                        <td>
                                            <?php echo $i ?>
                                        </td>
                                        <td>
                                            <?php echo $row_sp['sanpham_name'] ?>
                                        </td>
                                        <td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?> " width="100px">
                                        </td>
                                        <td>
                                            <?php echo $row_sp['sanpham_soluong'] ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row_sp['sanpham_gia']) . 'vnđ' ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row_sp['sanpham_giakhuyenmai']) . 'vnđ' ?>
                                        </td>
                                        <td>
                                            <?php echo $row_sp['category_name'] ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                                href="?xoa=<?php echo $row_sp['sanpham_id'] ?> ">
                                                <i class="fas fa-trash-alt"></i></a>
                                            <a class="btn btn-primary btn-sm edit" type="button" title="Sửa"
                                                href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?> ">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                          

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    </main>
    <script src="js/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/popper.min.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <!--===============================================================================================-->
    <script src="js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
    <script src="js/plugins/pace.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <!--===============================================================================================-->

</body>

</html>