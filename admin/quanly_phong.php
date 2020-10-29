<?php include('../model/database.php'); ?>
<?php include('./quanly_truycap.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="">
  <title>Quản lí phòng</title>
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
  <main class="pt-5">
    <div class="container-fluid ">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="index.php">Trang chủ</a>
            <span>/</span>
            <span>Quản lý phòng</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
		
		<?php
		$get_all_phong="
		select ID_Phong, lp.MoTa, Ten, SucChua, SoLuongNguoiO, GhiChu
		from loaiphong lp JOIN phong p ON lp.ID_LoaiPhong=p.ID_LoaiPhong
						  JOIN khuvuc kv ON p.ID_KhuVuc=kv.ID_KhuVuc";
		$result=mysqli_query($conn,$get_all_phong);
		?>
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">
            <!--Card content-->
            <div class="card-body">
              	<!--thông báo-->
				<?php
				if($_GET['delete_id_phong'])
				{
					$id=$_GET['delete_id_phong'];
					if(mysqli_query($conn,"DELETE FROM phong where ID_Phong='$id'"))
					{
						header('location:./quanly_phong.php');
					}else{
						echo '<div class="alert alert-danger">Không thể xóa do có người đang ở</div>';
					}

				}
				?>
				<!--thông báo-->
				<a href="quanly_them_sua_phong.php"><button class="btn btn-outline-success waves-effect">Thêm phòng</button></a>
				<!--bảng liệt kê-->
				<table class="table table-hover table-responsive-xl">
					<thead>
						<tr>
							<th>Mã Phòng</th>
							<th>Loại phòng</th>
							<th>Khu Vực</th>
							<th>Sức chứa</th>
							<th>Số lượng người ở</th>
							<th>Ghi chú</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
						while($row=mysqli_fetch_array($result)){
							echo'
							<tr>
								<td>'.$row[0].'</td>
								<td>'.$row[1].'</td>
								<td>'.$row[2].'</td>
								<td>'.$row[3].'</td>
								<td>'.$row[4].'</td>
								<td>'.$row[5].'</td>
								<td>'?>
									<a href="quanly_them_sua_phong.php?edit_id_phong=<?=$row[0]?>">
										<span class="badge badge-primary pull-center">Sửa</span>
									<a onclick="return DelConfirm()" href="?delete_id_phong=<?=$row[0]?>">
										<span class="badge badge-danger pull-center ml-1">Xóa</span>
									</a>
									</a>
								</div>
								<?php echo '</td>
								
							</tr>';
						}
						?>
					</tbody>
				</table>
			<!--thông báo-->
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

		    <?php include('view/table_Khuvuc_loaiphong.php') ?>

        </div>
        <!--Grid column-->
		
      </div>
      <!--Grid row-->
  </main>
  <!--Main layout-->
</body>