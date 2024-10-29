<?php 
    include('../db/connect.php');
?>
<?php 
       if(isset($_POST['themdanhmuc']))
       {
        $tendanhmuc=$_POST['danhmuc'];
        $sql_insert=mysqli_query($con,"INSERT INTO tbl_category(category_name) values ('$tendanhmuc')");
       }elseif(isset($_POST['capnhatdanhmuc']))
       {
        $id_post=$_POST['id_danhmuc'];
        $tendanhmuc=$_POST['danhmuc'];
        $sql_update=mysqli_query($con,"UPDATE tbl_category SET category_name='$tendanhmuc' WHERE category_id='$id_post' ");
        header('Location:xulydanhmuc.php');
       }
       if(isset($_GET['xoa']))
       {
        $id=$_GET['xoa'];
        $sql_xoa=mysqli_query($con,"DELETE FROM tbl_category WHERE category_id='$id'");
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
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách danh mục</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                  class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                  class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                  class="fas fa-copy"></i> Sao chép</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                                  class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                  class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                          </div>

                          <?php 
                            if(isset($_GET['quanly']))
                            {
                                $capnhat=$_GET['quanly'];
                            }else{
                                $capnhat='';
                            }
                            if($capnhat=='capnhat')
                            {
                                $id_capnhat=$_GET['id'];
                                $sql_capnhat=mysqli_query($con,"SELECT * FROM tbl_category WHERE category_id='$id_capnhat'");
                                $row_capnhat=mysqli_fetch_array($sql_capnhat);
                                ?>
                                 <div class="row">
                                   <div class="col-md-12">
                                    <div class="tile">
                                      <h3 class="tile-title">Cập Nhật Danh Mục</h3>
                                         <div class="tile-body">
                                            <form class="row" action="" method="POST">
                                                <div class="form-group  col-md-4">
                                                  <label class="control-label">Tên Danh Mục</label>
                                                  <input class="form-control" type="text" name="danhmuc" value="<?php echo $row_capnhat['category_name'] ?>">
                                                  <input class="form-control" type="hidden" name="id_danhmuc" value="<?php echo $row_capnhat['category_id'] ?>">
                                               </div>
                                               </div>
                                             <input class="btn btn-save" type="submit" name="capnhatdanhmuc" value="Cập Nhật">
                                           <a class="btn btn-cancel" href="/doc/table-data-oder.html">Hủy bỏ</a>
                                         </div>
                                        </form>
                                <?php
                            }else{
                          ?>
                                 <div class="row">
                                   <div class="col-md-12">
                                    <div class="tile">
                                      <h3 class="tile-title">Thêm Danh Mục</h3>
                                         <div class="tile-body">
                                            <form class="row" action="" method="POST">
                                                <div class="form-group  col-md-4">
                                                  <label class="control-label">Tên Danh Mục</label>
                                                  <input class="form-control" type="text" name="danhmuc">
                                               </div>
                                               </div>
                                             <input class="btn btn-save" type="submit" name="themdanhmuc" value="Lưu lại">
                                           <a class="btn btn-cancel" href="/doc/table-data-oder.html">Hủy bỏ</a>
                                         </div>
                                        </form>
                          <?php 
                            }
                          ?>

                        <?php 
                            $sql_select=mysqli_query($con,"SELECT *FROM tbl_category ORDER BY category_id DESC");
                        ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Số Thứ Tự</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                        $i=0;
                                        while($row_category=mysqli_fetch_array($sql_select)){
                                            $i++;
                                ?>
                                <tr>
                                    <td width="10"><input type="checkbox" name="danhmuc" value="1"></td>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row_category['category_name']?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm trash" type="button"  title="Xóa" href="?xoa=<?php echo $row_category['category_id'] ?> ">
                                        <i class="fas fa-trash-alt"></i></a>
                                        <a class="btn btn-primary btn-sm edit" type="button"  title="Sửa"  href="?quanly=capnhat&id=<?php echo $row_category['category_id'] ?> ">
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