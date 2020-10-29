<?php include('./quanly_truycap.php'); ?>
<?php include('../model/database.php');
if($_GET['delete_id_danhgia'])
{
	$id=$_GET['delete_id_danhgia'];
	mysqli_query($conn,"DELETE FROM danhgiaphong where ID_DanhGia='$id'");
	header('location:./quanly_phanhoi.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="">
	<title>Quản lý đánh giá - Phản hồi</title>
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
            <a href="#" target="_blank">Trang chủ</a>
            <span>/</span>
            <span>Quản lí đánh giá - Bình luận</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
	<!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">
            <!--Card content-->
            <div class="card-body">
              	<!--thông báo-->
				<!--thông báo-->
				<!--bảng liệt kê-->
				<?php
				$select_all_binhluan="SELECT * FROM danhgiaphong";
				$result_select_all_binhluan=mysqli_query($conn,$select_all_binhluan);
				?>
				<table class="table table-hover table-responsive-xl">
					<thead>
						<tr>
							<th>Mã KH</th>
							<th>Mã phòng</th>
							<th>Ngày giờ</th>
							<th>Nội dung</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
						while($row=mysqli_fetch_array($result_select_all_binhluan)){
							echo'
							<tr>
								<td>'.$row[1].'</td>
								<td>'.$row[2].'</td>
								<td>'.$row[3].'</td>
								<td>'.$row[4].'</td>
								<td>'?>
									<a onclick="return DelConfirm()" href="?delete_id_danhgia=<?=$row[0]?>">
										<span class="badge badge-danger pull-center ml-1">Xóa</span>
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

		    <!--<?php include('view/table_loaidon.php') ?>-->

        </div>
        <!--Grid column-->
		
      </div>
      <!--Grid row-->	
		
		
		
    </div>
  </main>
  <!--Main layout-->
</body>