<?php include('../model/database.php'); ?>
<?php include('./quanly_truycap.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="">
	<title>Quản lí loại phòng</title>
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
				<a href="quanly_phong.php" class="text-dark"><span>Quản lý phòng</span></a>
				<span>/</span>  
				<?php
				if($_GET['edit_id'])
					echo '<span>Sửa loại phòng</span>';
				else{
				?>
				<span>Thêm loại phòng</span>
				<?php
				}
				?>
				</h4>
			</div>
			<!-- Heading -->
		</div>
		
		<?php
		$id=$_GET['edit_id'];
		$query="SELECT * FROM loaiphong WHERE ID_LoaiPhong='$id'";
		$get_loaiphong=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($get_loaiphong);
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
										<?php if($_GET['edit_id']) echo 'SỬA LOẠI PHÒNG';
										else{
										?>
										THÊM LOẠI PHÒNG</p>
										<?php
										}
										?>
									<!-- Mã loại phòng -->
									<input type="text" id="txt_IDLoaiPhong" name="txt_IDLoaiPhong" class="form-control mb-4" placeholder="Mã loại phòng không cần nhập" value="<?=$row[0]?>" readonly>

									<!-- Mô tả -->
									<input type="text" name="txt_MoTa" class="form-control mb-4" placeholder="Mô tả" value="<?=$row[1]?>">

									<?php
									if($id){
									?>
									<button class="btn btn-info my-4 btn-block" name="btn_sualoaiphong" type="submit">Sửa loại phòng</button>	
									<?php
									}else{
									?>
									<button class="btn btn-info my-4 btn-block" name="btn_themloaiphong" type="submit">Thêm loại phòng</button>										
									<?php
									}
									?>
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