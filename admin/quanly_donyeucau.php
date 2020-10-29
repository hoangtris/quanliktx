<?php 
    include('./quanly_truycap.php');
    include('../model/database.php');
    include('../model/sql_query.php');
        
if($_GET['delete_id_don'])
{
	$id=$_GET['delete_id_don'];
	mysqli_query($conn,"DELETE FROM chitietthuephong where ID_HoaDon='$id'");
	header('location:./quanly_donyeucau.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="">
	<title>Quản lí đơn yêu cầu</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="css/style.min.css" rel="stylesheet">
  <style>
.map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>
</head>

<body class="white">

	<!--Main Navigation-->
	<?php 
	    include('view/nav_admin.php');
	?>
	<!--Main Navigation-->
	
	<!--Main layout-->
  <main class="pt-2">
    <div class="container-fluid ">

      <!-- Heading -->
      <div class="card mb-3 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="#" target="_blank">Trang chủ</a>
            <span>/</span>
            <span>Quản lí đơn - Hóa đơn</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
	<!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-10 mb-4">

          <!--Card-->
          <div class="card">
            <!--Card content-->
            <div class="card-body">
              	<!--thông báo-->
				<!--thông báo-->
				<!--bảng liệt kê-->
                <?php
                if($_GET['loaidon']=='donhuyphong'){
                ?>
                <h3 class="text-center">Đơn hủy phòng</h3>
				<table class="table table-hover table-responsive-xl">
					<thead>
						<tr>
							<th>Mã tài khoản</th>
							<th>Mã phòng</th>
							<th>Ngày hủy</th>
							<th>Ghi chú</th>
							<th>Tình trạng</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
						while($row=mysqli_fetch_array($result_select_donyeucau)){
							$date = date_create("2013-03-15");
                        ?>
							<tr>
								<td><?=$row[1]?></td>
								<td><?=$row[2]?></td>
								<td><?=date_format(date_create($row['NgayTraPhongSomHonDuKien']),"d-m-Y H:i:s")?></td>
								<td><?=$row['GhiChu']?></td>
                                <?php
                                if($row['TrangThai']==0){
                                ?>
                                    <td><span class="alert alert-danger">Chưa chấp nhận</span></td>
                                <?php
                                }else{
                                ?>
                                    <td><span class="alert alert-success">Đã chấp nhận</span></td>
                                <?php
                                }
                                ?><!--trạng thái-->
								<td>
									<a href="?idCTTP=<?=$row[0]?>">
                                        <span class="badge badge-primary pull-center">Xem</span>
                                    </a>
									<!--<a onclick="return DelConfirm()" href="?delete_id_don=<?=$row[2]?>">
										<span class="badge badge-danger pull-center ml-1">Xóa</span>
									</a>-->
                                </td>
                            </tr>
                        <?php
						}
						?>
					</tbody>
				</table>
			<!--thông báo-->
                <?php
                }elseif($_GET['loaidon']=='dondatphong'){
                ?>    
                    <h3 class="text-center">Đơn đặt phòng</h3>
                    <table class="table table-hover table-responsive-xl">
                        <thead>
                            <tr>
                                <th>Mã tài khoản</th>
                                <th>Mã phòng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày vào ở</th>
                                <th width="220px">Ghi chú</th>
                                <th>Tình trạng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while($row=mysqli_fetch_array($result_select_donyeucau)){
                            ?>
                                <tr>
                                    <td><?=$row['ID_TaiKhoan']?></td>
                                    <td><?=$row['ID_Phong']?></td>
                                    <td><?=date_format(date_create($row['NgayDat']),"d-m-Y H:i:s")?></td>
                                    <td><?=date_format(date_create($row['NgayVaoO']),"d-m-Y")?></td>
                                    <td><?=$row['GhiChu']?></td>
                                <?php
                                if($row['TrangThai']==0){
                                ?>
                                    <td><span class="alert alert-danger">Chưa thanh toán</span></td>
                                <?php
                                }else{
                                ?>
                                    <td><span class="alert alert-success">Đã thanh toán</span></td>
                                <?php
                                }
                                ?>
                                    <td>
                                        <a href="?idCTTP=<?=$row[0]?>">
                                            <span class="badge badge-primary pull-center">Xem</span>
                                        </a>
                                        <!--<a onclick="return DelConfirm()" href="?delete_id_don=<?=$row[2]?>">
                                            <span class="badge badge-danger pull-center ml-1">Xóa</span>
                                        </a>   --> 
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                }elseif($_GET['idCTTP']){
                ?>
                <?php
                    $cookieName='capnhattrangthai';
                    if(isset($_COOKIE[$cookieName])){
                        echo '<div class="alert alert-success">';
                        echo '<strong>Thành công!</strong>';
                        echo '</div>';
                        setcookie($cookieName, "", time() - 3600);
                    }
                ?>
                    <h3 class="text-center">Chi tiết đơn phòng #<?=$_GET['idCTTP']?></h3>
          <div class="row">
              <div class="col-5">
                  <p>ID: <?=$result['ID']?></p>
                  <p>Tên khách hàng: <?=$result['ID_TaiKhoan']?> - <?=$result['HoTen']?></p>
                  <p>Mã phòng: <?=$result['ID_Phong']?></p>
                  <p>Số hóa đơn: <?=$result['ID_HoaDon']?></p>
                  <p>Tình trạng:</p>
                  
                  <form action="xuly.php" method="post">
                        <?php
                        if($result['TrangThai']==0){
                        ?>
                            <select class="form-control" name="trangthai">
                              <option <?php if($result['TrangThai']==0) echo 'selected';?> value="0">Chưa chấp nhận</option>
                              <option <?php if($result['TrangThai']==1) echo 'selected';?> value="1">Đã chấp nhận</option>
                            </select>  
                        <?php
                        }else{
                        ?>
                            <select class="form-control" name="trangthai" disabled>
                              <option <?php if($result['TrangThai']==0) echo 'selected';?> value="0">Chưa chấp nhận</option>
                              <option <?php if($result['TrangThai']==1) echo 'selected';?> value="1">Đã chấp nhận</option>
                            </select> 
                        <?php
                        }
                        ?>
                      
                      <input type="hidden" value="<?=$result['ID']?>" name="idCTTP">
                      <input type="hidden" value="<?=$result['ID_HoaDon']?>" name="idHD">
                      <input type="hidden" value="<?=$result['GhiChu']?>" name="ghichu">
                      <input type="submit" class="btn btn-primary" value="Cập nhật" name="btnTrangThai">
                      
                  </form>
              </div>
              <div class="col-5">
                  <p>Ngày đặt: <?=$result['NgayDat']?></p>
                  <p>Ngày vào ở: <?=$result['NgayVaoO']?></p>
                  <p>Ngày trả: <?=$result['NgayTra']?></p>
                  <p>Ngày trả sớm hơn dự kiến: <?=$result['NgayTraSomHonDuKien']?></p>
                  <p>Ghi chú: <em><strong><?=$result['GhiChu']?></strong></em></p>
              </div>
          </div>
                <?php
                }
                ?>
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <?php include('view/table_loaidon.php') ?>
    
        </div>
        <!--Grid column-->
		
      </div>
      <!--Grid row-->	
		
		
		
    </div>
  </main>
  <!--Main layout-->


<script>       
    function DelConfirm()
    {
        return confirm("Bạn có chắc muốn xóa dòng này ?");
    }
</script> 
</body>