<?php include('../model/database.php'); ?>
<?php include('./quanly_truycap.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="">
	<title>Quản lí khu vực</title>
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
				<a href="index.html">Trang chủ</a>
				<span>/</span>
				<a href="quanly_phong.php" class="text-dark"><span>Quản lý phòng</span></a>
				<span>/</span>  
				<?php
				if($_GET['edit_id'])
					echo '<span>Sửa khu vực</span>';
				else{
				?>
				<span>Thêm khu vực</span>
				<?php
				}
				?>
				</h4>
			</div>
			<!-- Heading -->
		</div>
		
		<?php
		$id=$_GET['edit_id'];
		$query="SELECT * FROM khuvuc WHERE ID_KhuVuc='$id'";
		$get_khuvuc=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($get_khuvuc);
		?>
		
		<!--Grid row-->
		<div class="row wow fadeIn">
			<!--Grid column-->
			<div class="col-md-9 mb-4">

			<!--Card-->
			<div class="card">
				<!--Card content-->
				<div class="card-body">
					<!--Section: Content-->
					<section class="px-md-3 mx-md-3 text-center text-lg-left dark-grey-text">
						<!--Grid row-->
						<div class="row d-flex justify-content-center">
							<!--Grid column-->
							<div class="col-md-9">
								<!-- Default form register -->
								<form class="text-center" action="xuly.php" method="post">
									<p class="h4 mb-4 text-center display-4">
										<?php if($_GET['edit_id']) echo 'SỬA KHU VỰC';
										else{
										?>
										THÊM KHU VỰC</p>
										<?php
										}
										?>
									<div class="form-row mb-4">
										<div class="col">
											<!-- Mã khu vực -->
											<input type="text" id="txt_IDKhuVuc" name="txt_IDKhuVuc" class="form-control" placeholder="Mã khu vực" value="<?=$row[0]?>">
										</div>
										<div class="col">
											<!-- Tên khu vực -->
											<input type="text" id="txt_TenKhuVuc" name="txt_TenKhuVuc" class="form-control" placeholder="Tên khu vực" value="<?=$row[1]?>">
										</div>
									</div>

									<!-- Địa chỉ -->
									<input type="text" name="txt_MoTa" class="form-control mb-4" placeholder="Mô tả" value="<?=$row[2]?>">

									<?php
									if($id){
									?>
									<button class="btn btn-info my-4 btn-block" name="btn_suakhuvuc" type="submit">Sửa khu vực</button>	
									<?php
									}else{
									?>
									<button class="btn btn-info my-4 btn-block" name="btn_themkhuvuc" type="submit">Thêm khu vực</button>										
									<?php
									}
									?>
									<!-- Sign up button -->
								</form>
								<!-- Default form register -->
							</div>
							<!--Grid column-->
						</div>
						<!--Grid row-->
					</section>
					<!--Section: Content-->
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