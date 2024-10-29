<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<?php 
    if(isset($_GET['huydon'])&& isset($_GET['magiaodich'])){
        $huydon=$_GET['huydon'];
        $magiaodich=$_GET['magiaodich'];
    }else{
        $huydon='';
        $magiaodich='';
    }
    $sql_update_donhang=mysqli_query($con,"UPDATE tbl_donhang SET huydon ='$huydon' WHERE mahang ='$magiaodich'");
    $sql_update_giaodich=mysqli_query($con,"UPDATE tbl_giaodich SET huydon ='$huydon' WHERE magiaodich ='$magiaodich'");
?>


<div class="tab-content text-charcoal pt-8">
    <h3 class="title-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem Đơn Hàng</h3>
    <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">

        <?php
        if (isset($_GET['khachhang'])) {
            $id_khachhang = $_GET['khachhang'];
        } else {
            $id_khachhang = '';
        }
        $sql_select = mysqli_query($con, "SELECT *FROM tbl_giaodich,tbl_sanpham WHERE tbl_giaodich.khachhang_id='$id_khachhang' AND
                        tbl_giaodich.sanpham_id=tbl_sanpham.sanpham_id GROUP BY tbl_giaodich.magiaodich DESC");
        ?>
        </table>
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                    <th width="10"><input type="checkbox" id="all"></th>
                    <th>Số Thứ Tự</th>
                    <th>Mã Giao Dịch</th>
                    <th>Ngày Đặt</th>
                    <th>Trạng Thái</th>
                    <th>Chi Tiết</th>
                    <th>Hủy Đơn Hàng</th>
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
                        <td>
                            <?php echo $row_donhang['magiaodich'] ?>
                        </td>
                        <td>
                            <?php echo $row_donhang['ngaythang'] ?>
                        </td>
                        <td>
                            <?php 
                                if($row_donhang['tinhtrangdon']==0)
                                {
                                   echo '<span class="badge bg-info">Chờ xử lý</span>';
                                }elseif($row_donhang['tinhtrangdon']==1)
                                {
                                    echo '<span class="badge bg-warning">Đang Vận Chuyển</span>';
                                }elseif($row_donhang['tinhtrangdon']==2)
                                {
                                    echo '<span class="badge bg-success">Đã Hoàn Thành</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm edit" type="button" title="Xem giao dich"
                                href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?> ">
                                <i class="fa-solid fa-eye" style="color: #051104;"></i>
                            </a>
                        </td>
                        
                      <td>
                                <?php
                                    if($row_donhang['huydon']==0){
                                ?>

                        <a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1"><span 
                       class="badge bg-danger">Yêu Cầu</span></a>
                                <?php
                                    }elseif($row_donhang['huydon']==1){
                                ?>
                                <span class="badge bg-danger">Chờ xác nhận...</span>
                                
                                <?php
                                    }else{    
                                ?>
                                <span class="badge bg-danger">Đã Hủy</span>
                                <?php
                                    }
                                ?>


                      </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>

        </table>
        <?php
                         if(isset($_GET['magiaodich']))
                         {
                            $magiaodich=$_GET['magiaodich'];
                         }else{
                            $magiaodich= '';
                         }
                        $sql_select = mysqli_query($con, "SELECT *FROM tbl_giaodich,tbl_khachhang,tbl_sanpham WHERE tbl_giaodich.sanpham_id=tbl_sanpham.sanpham_id
                        AND tbl_khachhang.khachhang_id=tbl_giaodich.khachhang_id AND tbl_giaodich.magiaodich='$magiaodich'
                         ORDER BY tbl_giaodich.giaodich_id DESC");
                        ?>    
                        </table>
                        <h4>Chi Tiết Đơn Hàng</h4>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Số Thứ Tự</th>
                                    <th>Mã Giao Dịch</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Ngày Đặt</th>
                                   
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
                                        <td>
                                            <?php echo $row_donhang['magiaodich'] ?>
                                        </td>
                                        <td>
                                        <?php echo $row_donhang['sanpham_name'] ?>
                                        </td>
                                        <td>
                                        <?php echo $row_donhang['soluong'] ?>
                                        </td>
                                        <td>
                                        <?php echo $row_donhang['ngaythang'] ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            
                        </table>
    </div>
</div>