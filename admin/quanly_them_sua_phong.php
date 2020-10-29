<?php include('../model/database.php'); ?>
<?php include('./quanly_truycap.php'); ?>
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
				<a href="index.html">Trang chủ</a>
				<span>/</span>
				<a href="quanly_phong.php" class="text-dark"><span>Quản lý phòng</span></a>
				<span>/</span>  
				<?php
				if($_GET['edit_id'])
					echo '<span>Sửa phòng</span>';
				else{
				?>
				<span>Thêm phòng</span>
				<?php
				}
				?>
				</h4>
			</div>
			<!-- Heading -->
		</div>
		
		<?php
		$id=$_GET['edit_id_phong'];
		$select_phong="SELECT * FROM phong WHERE ID_Phong='$id'";
			//echo "$select_phong";
		$get_phong=mysqli_query($conn,$select_phong);
		$row=mysqli_fetch_array($get_phong);
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
								<form action="xuly.php" method="post" enctype="multipart/form-data">
									<p class="h4 mb-4 text-center display-4">
										<?php if($id) echo 'SỬA PHÒNG';
										else{
										?>
										THÊM PHÒNG</p>
										<?php
										}
										?>
									<div class="form-row mb-4">
										<div class="col"><!-- Mã khu vực -->
											<span>Mã phòng</span>
											<input type="number" id="txt_IDPhong" name="txt_IDPhong" class="form-control" placeholder="Không cần nhập" value="<?=$row[0]?>" readonly>
										</div><!-- Mã khu vực -->
										<div class="col"><!-- Tên loại phòng -->
											<span>Loại phòng</span>
											<select name="sl_loaiphong" class="form-control">
												<?php
												$get_all_loaiphong="SELECT * FROM loaiphong";
												$result=mysqli_query($conn,$get_all_loaiphong);	
												while($rows=mysqli_fetch_array($result)){
													echo '<option value="'.$rows[0].'">'.$rows[1].'</option>';											
												}
												?>
											</select>
										</div><!-- Tên loại phòng -->
										<div class="col"><!-- Tên khu vực -->
											<span>Khu vực</span>
											<select name="sl_khuvuc" class="form-control">
												<?php
												$get_all_khuvuc="SELECT * FROM khuvuc";
												$result=mysqli_query($conn,$get_all_khuvuc);	
												while($rows=mysqli_fetch_array($result)){
													echo '<option value="'.$rows[0].'">'.$rows[1].'</option>';											
												}
												?>
											</select>
										</div><!-- Tên khu vực -->
									</div>

									<!-- Số lượng & giá & thời hạn -->
									<div class="form-row mb-4">
										<div class="col">
											<span>Số lượng người ở</span>
											<input type="number" name="txt_SoLuong" class="form-control" value="<?=$row[SucChua]?>" required>
										</div>
										<div class="col">
											<span>Số lượng WC</span>
											<input type="number" name="txt_SoLuongWC" class="form-control" value="<?=$row[WC]?>" required>
										</div>
										<div class="col">
											<span>Giá</span>
											<input type="number" name="txt_Gia" class="form-control" value="<?=$row[Gia]?>">
										</div>
										<div class="col">
											<span>Thời hạn (ngày)</span>
											<input type="text" name="txt_ThoiHan" class="form-control" value="<?=$row[ThoiHan]?>">
										</div>
									</div> <!-- Số lượng & giá & thời hạn -->
									
									<!-- An Ninh & Tiện nghi -->
									<div class="form-row mb-4">
										<div class="col-4">
											<span>An Ninh</span>
											<input type="text" name="txt_AnNinh" class="form-control" value="<?=$row[AnNinh]?>">
										</div>
										<div class="col">
											<span>Tiện nghi</span>
											<input type="text" name="txt_TienNghi" class="form-control" value="<?=$row[TienNghi]?>">
										</div>
									</div> <!-- An Ninh & Tiện nghi -->
									
									<!-- Hình ảnh -->
									<div class="form-row mb-4">
										<div class="col-6">
											<span>Hình ảnh</span>
											<input type="file" name="txt_HinhAnh" class="form-control-file">
										</div>
										
										<div class="col-6">
											<span>Thư viện hình ảnh</span>
											<?php
											if($id){
											?>
											<input type="file" name="txt_NhieuHinhAnh[]" class="form-control-file" multiple>
											<?php
											}else echo'<br>Chỉ áp dụng cho tính năng sửa phòng';
											?>
											
										</div>
									</div>
									<!-- Hình ảnh -->
									
									<!-- Mô tả ngắn & Ghi chú -->
									<div class="form-row mb-4">
										<div class="col">
											<span>Mô tả ngắn</span>
											<textarea class="form-control" name="txt_MoTaNgan" rows="4" value="<?=$row[MoTaNgan]?>"></textarea>
										</div>
										<div class="col">
											<span>Ghi chú</span>
											<textarea class="form-control" name="txt_GhiChu" placeholder="Ghi chú về căn phòng" rows="4" value="<?=$row[GhiChu]?>"></textarea>
										</div>
									</div>

									<!-- Mô tả ngắn & Ghi chú -->
									
									<!-- Mô tả dài -->
									<span>Mô tả dài</span>
									<input type="text" class="form-control mb-4" name="txt_MoTaDai" value="<?=$row[MoTaDai]?>" style="height: 300px;">
									<!-- Mô tả dài -->
									
									<?php
									if($id){
									?>
									<button class="btn btn-info my-4 btn-block" name="btn_suaphong" type="submit">Sửa phòng</button>	
									<?php
									}else{
									?>
									<button class="btn btn-info my-4 btn-block" name="btn_themphong" type="submit">Thêm phòng</button>										
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