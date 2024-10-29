<?php 
session_start();
include('db/connect.php');
if(isset($_POST['dangnhap_home']))
{
    $taikhoan=$_POST['email_login'];
    $matkhau=md5($_POST['password_login']);
    $sql_select_admin=mysqli_query($con,"SELECT *FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1 ");
    $count=mysqli_num_rows($sql_select_admin);
    $row_dangnhap=mysqli_fetch_array($sql_select_admin);
    if($count> 0)
    {
        $_SESSION['dangnhap_home']=$row_dangnhap['name'];
        $_SESSION['khachhang_id']=$row_dangnhap['khachhang_id'];
        header('Location: index.php?quanly=giohang');
    }else{
        echo '<script>alert("Tài Khoản Hoặc Mật Khẩu Không Đúng")</script>';
    }
}elseif(isset($_POST['dangky']))
{
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=MD5($_POST['password']);
    $address=$_POST['address'];
     $_SESSION['dangnhap_home']=$row_dangnhap['name'];
        $_SESSION['khachhang_id']=$row_dangnhap['khachhang_id'];
    $sql_khachhang=mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,password)
    value ('$name','$phone','$email','$address','$password')");
    $sql_select_khachhang=mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
    $row_khachhang=mysqli_fetch_array($sql_select_khachhang);
     $_SESSION['dangnhap_home']=$name;
     $_SESSION['khachhang_id']=$row_khachhang['khachhang_id'];
    header("Location:index.php?quanly=giohang");

}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thời Trang Shop</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/Pe-icon-7-stroke.css" />

    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <div class="main-wrapper">

        <!-- Begin Main Header Area -->
        <header class="main-header_area position-relative">
            
            <?php 
            include('include/topbar.php');
             include('include/menu.php');
            include('include/slider.php');
            if(isset($_GET['quanly']))
            {
                $tam=$_GET['quanly'];
            }else{
                $tam= '';
            }
            if( $tam =='danhmuc')
            {
                include('include/danhmuc.php');
            }elseif($tam=='chitietsp'){
                include('include/chitietsp.php');   
            }elseif($tam=='giohang'){
                include('include/giohang.php'); 
            }else{
                ?>
                <div class="login-register-area section-space-y-axis-100">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <form action="" method="POST">
                                  <div class="login-form">
                                      <h4 class="login-title "  >Đăng Nhập </h4>
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <label>Email Address*</label>
                                              <input type="text" placeholder="Email Address" name="email_login" required="">
                                          </div>
                                          <div class="col-lg-12">
                                              <label>Password</label>
                                              <input type="password" placeholder="Password" name="password_login" required="">
                                          </div>
                                          <div class="col-md-8">
                                              <div class="check-box">
                                                  <input type="checkbox" id="remember_me">
                                                  <label for="remember_me">Remember me</label>
                                              </div>
                                          </div>
                                          <div class="col-md-4 pt-1 mt-md-0">
                                              <div class="forgotton-password_info">
                                                  <a href="#"> Forgotten pasward?</a>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 pt-5">
                                              <button type="submit" name="dangnhap_home" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0">Đăng Nhập</button>
                                              
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div class="col-lg-6 pt-10 pt-lg-0">
                              <form action="" method="post">
                                  <div class="login-form">
                                      <h4 class="login-title">Đăng Kí</h4>
                                      <div class="row">
                                          <div class="col-md-12 ">
                                              <label>Tên Khách Hàng</label>
                                              <input type="text" placeholder="Họ Tên" name="name">
                                          </div>
                                          <div class="col-md-12">
                                              <label>Phone</label>
                                              <input type="text" placeholder="Số Điện Thoại" name="phone">
                                          </div>
                                          <div class="col-md-12">
                                              <label>Email Address*</label>
                                              <input type="email" placeholder="Email Address" name="email">
                                          </div>
                                          <div class="col-md-12">
                                              <label>Địa Chỉ</label>
                                              <input type="text" placeholder="Số Nhà" name="address">
                                          </div>
                                          <div class="col-md-12">
                                              <label>Password</label>
                                              <input type="password" placeholder="Mật Khẩu" name="password">
                                          </div>
                                          <div class="col-lg-12 pt-5">
                                              <button type="submit" name="dangky" class="btn btn-custom-size lg-size btn-secondary btn-primary-hover rounded-0">Tạo Tài Khoản</button>     
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
  
  
                          <?php 
            }

          
                        include('include/footer.php');
                        ?>
           
        </header>
     

        <a class="scroll-to-top" href="">
            <i class="fa fa-chevron-up"></i>
        </a>
       
    </div>

 
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery.waypoints.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/wow.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <script src="assets/js/plugins/parallax.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>

    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>

</body>

</html>