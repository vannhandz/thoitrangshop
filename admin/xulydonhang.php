<?php
include('../db/connect.php');
?>
<?php 
 if(isset($_POST['capnhatdonhang']))
 {
    $xuly = $_POST['xuly'];
    $mahang =$_POST['mahang_xuly'];
    $sql_update_donhang=mysqli_query($con,"UPDATE tbl_donhang SET tinhtrang ='$xuly' WHERE mahang ='$mahang'");
    $sql_update_giaodich=mysqli_query($con,"UPDATE tbl_giaodich SET tinhtrangdon ='$xuly' WHERE magiaodich ='$mahang'");

 }
?>

<?php
    if (isset($_GET['xoadonhang'])) {
        $mahang = $_GET['xoadonhang'];
        $sql_delete = mysqli_query($con, "DELETE FROM tbl_donhang WHERE mahang='$mahang'");
        header('Location:xulydonhang.php');
    }
    if(isset($_GET['xacnhanhuy'])&& isset($_GET['mahang'])){
        $huydon=$_GET['xacnhanhuy'];
        $magiaodich=$_GET['mahang'];
    }else{
        $huydon='';
        $magiaodich='';
    }
    $sql_update_donhang=mysqli_query($con,"UPDATE tbl_donhang SET huydon ='$huydon' WHERE mahang ='$magiaodich'");
    $sql_update_giaodich=mysqli_query($con,"UPDATE tbl_giaodich SET huydon ='$huydon' WHERE magiaodich ='$magiaodich'");
   
?>

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
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
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
                        $sql_select = mysqli_query($con, "SELECT *FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id
                        AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id  GROUP BY mahang DESC");
                        ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Số Thứ Tự</th>
                                    <th>Mã Hàng</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Ngày Đặt</th>
                                    <th>Tình Trạng</th>
                                    <th>Hủy Đơn</th>
                                    <th>Tính năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row_donhang = mysqli_fetch_array($sql_select)) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td width="10"><input type="checkbox" name="danhmuc" value="1"></td>
                                        <td>
                                            <?php echo $i ?>
                                        </td>
                                        <!-- <td>
                                            <?php echo $row_donhang['sanpham_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row_donhang['soluong'] ?>
                                        </td> -->
                                        <td>
                                            <?php echo $row_donhang['mahang'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row_donhang['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row_donhang['ngaythang'] ?>
                                        </td>
                                        <td>
                                           <?php 
                                            if($row_donhang['tinhtrang']==0)
                                            {
                                               echo '<span class="badge bg-info">Chờ xử lý</span>';
                                            }elseif($row_donhang['tinhtrang']==1)
                                            {
                                                echo '<span class="badge bg-warning">Đang Vận Chuyển</span>';
                                            }elseif($row_donhang['tinhtrang']==2)
                                            {
                                                echo '<span class="badge bg-success">Đã Hoàn Thành</span>';
                                            }
                                           ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if($row_donhang['huydon']==0)
                                            {

                                            }elseif($row_donhang['huydon']==1)
                                            {
                                                echo '<a href="xulydonhang.php?quanly=xemdonhang&mahang='.$row_donhang['mahang'].'&xacnhanhuy=2">
                                                <span class="badge bg-danger">Xác nhận hủy</span></a>';
                                            }else{
                                                echo ' <span class="badge bg-danger">Đã hủy</span></a>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                                href="?xoadonhang=<?php echo $row_donhang['mahang'] ?> ">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a class="btn btn-primary btn-sm edit" type="button" title="Xem don hang"
                                                href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?> ">
                                                <i class="fa-solid fa-eye" style="color: #051104;"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php
                        if (isset($_GET['quanly']) == 'xemdonhang') {
                            $mahang = $_GET['mahang'];
                            $sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id
                            AND tbl_donhang.mahang='$mahang' "); 
                          
                            ?>
                            <h4>Trạng Thái Đơn Hàng</h4>
                            <form action="" method="POST">
                            <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Số Thứ Tự</th>
                                    <th>Mã Hàng</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Sản Phẩm</th>
                                    <th>Tổng Tiền</th>
                                    <th>Ngày Đặt</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row_donhang = mysqli_fetch_array($sql_chitiet)) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td width="10"><input type="checkbox" name="danhmuc" value="1"></td>
                                        <td>
                                            <?php echo $i ?>
                                        </td>
                                        <td>
                                            <?php echo $row_donhang['mahang'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row_donhang['sanpham_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row_donhang['soluong'] ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row_donhang['sanpham_gia']).' vnđ' ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row_donhang['soluong']*$row_donhang['sanpham_giakhuyenmai']).' vnđ' ?>
                                        </td>
                                        <td>
                                            <?php echo $row_donhang['ngaythang'] ?>
                                        </td>
                                        <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['mahang'] ?>">
                                    </tr>
                                    <?php
                                }
                                ?>
                                </table>
                                <select class="form-control" name="xuly">
                                    <option value="0">Chờ Xử Lý</option>
                                    <option value="1">Đang Vận Chuyển</option>
                                    <option value="2">Đã Hoàn Thành</option>     
                                </select><br>
                                <input class="btn btn-save" type="submit" name="capnhatdonhang" value="Cập Nhật Đơn Hàng">
                                </form>
                            <?php
                        } else {
                            ?>
                        <?php
                        }
                        ?>  
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