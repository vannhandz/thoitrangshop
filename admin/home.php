
<?php
include('../db/connect.php');
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row">
      <!--Left-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
       <!-- col-6 -->
       <div class="col-md-6">
        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
          <div class="info">
            <h4>Tổng khách hàng</h4>
            <p><b>
            <?php 
            $sql_count_khachhang = mysqli_query($con, "SELECT COUNT(*) AS tong_so_khachhang FROM tbl_khachhang");

            // Kiểm tra và hiển thị kết quả
            if ($sql_count_khachhang) {
                $row = mysqli_fetch_assoc($sql_count_khachhang);
                $tongSoKhachHang = $row['tong_so_khachhang'];
            
                echo "" . $tongSoKhachHang . " khách hàng";
            } 
            ?>  
           </b></p>
            <p class="info-tong">Tổng số khách hàng được quản lý.</p>
          </div>
        </div>
      </div>
       <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <h4>Tổng sản phẩm</h4>
                <p><b>1850 sản phẩm</b></p>
                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
              <div class="info">
                <h4>Tổng đơn hàng</h4>
                <p><b>
                  <?php 
                  
                  $sql_sonhang = mysqli_query($con, "SELECT SUM(soluong) AS soluong FROM tbl_donhang");

                  // Kiểm tra và hiển thị kết quả
                  if ($sql_sonhang) {
                      $row = mysqli_fetch_assoc($sql_sonhang);
                      $tongSoLuong = $row['soluong'];
                       echo "" . $tongSoLuong . " đơn hàng";
                  }
                
                ?> </b></p>
                <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
              <div class="info">
                <h4>Sắp hết hàng</h4>
                <p><b>4 sản phẩm</b></p>
                <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập thêm.</p>
              </div>
            </div>
          </div>
           <!-- col-12 -->
           <div class="col-md-12">
            <div class="tile">
                
            <h3 class="tile-title">Đơn Hàng Gần Đây</h3>
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
                                   
                                    <th>Tình Trạng</th>
                                  
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
                                       
                                       

                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
              <!-- / div trống-->
            </div>
           </div>
            <!-- / col-12 -->
             <!-- col-12 -->
          
             <!-- / col-12 -->
        </div>
      </div>
      <!--END left-->
      <!--Right-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Thống kê doanh thu </h3>
              

    <?php
    // Kiểm tra nếu form đã được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Lấy dữ liệu từ form
      $start_date = $_POST['start_date'];
      $end_date = $_POST['end_date'];
  
      // Truy vấn để lấy thông tin doanh thu từng danh mục sản phẩm trong khoảng thời gian đã chọn
      $sql = "SELECT dm.category_name, SUM(sp.sanpham_gia) AS total_revenue
              FROM tbl_category dm
              INNER JOIN tbl_sanpham sp ON dm.category_id = sp.category_id
              INNER JOIN tbl_giaodich gd ON sp.sanpham_id = gd.sanpham_id
              WHERE gd.ngaythang BETWEEN '$start_date' AND '$end_date'
              GROUP BY dm.category_id";
      $sql_total_revenue = "SELECT COALESCE(SUM(sp.sanpham_gia), 0) AS total_revenue
      FROM tbl_category dm
      LEFT JOIN tbl_sanpham sp ON dm.category_id = sp.category_id
      LEFT JOIN tbl_giaodich gd ON sp.sanpham_id = gd.sanpham_id AND gd.ngaythang BETWEEN '$start_date' AND '$end_date'";

$result_total_revenue = mysqli_query($con, $sql_total_revenue);

$row_total_revenue = mysqli_fetch_assoc($result_total_revenue);
$total_revenue_all_categories = $row_total_revenue['total_revenue'];
      $result = mysqli_query($con, $sql);
  
      // Tạo mảng chứa dữ liệu cho biểu đồ
      $categories = [];
      $revenues = [];
  
      // Xử lý kết quả từ truy vấn và điền vào mảng dữ liệu cho biểu đồ
      while ($row = mysqli_fetch_assoc($result)) {
          $categories[] = $row['category_name'];
          $revenues[] = $row['total_revenue'];
      }
  
      mysqli_close($con);
  }
    ?>
    <form method="POST" action="">
              <label for="start_date">Từ ngày:</label>
              <input type="date" id="start_date" name="start_date">

              <label for="end_date">Đến ngày:</label>
              <input type="date" id="end_date" name="end_date">

              <input type="submit" value="Thực hiện">
              </form>
     <canvas id="myChart" width="800" height="400"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($categories); ?>,
            datasets: [{
                label: 'Doanh Thu',
                data: <?php echo json_encode($revenues); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

            </div>
          </div>
        </div>

      </div>
      <!--END right-->
    </div>