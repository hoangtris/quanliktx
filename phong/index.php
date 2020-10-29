<?php
include('../model/database.php');

$get_all_khuvuc="SELECT * FROM khuvuc";
$result_all_khuvuc=mysqli_query($conn,$get_all_khuvuc);

$get_all_loaiphong="SELECT * FROM loaiphong";
$result_all_loaiphong=mysqli_query($conn,$get_all_loaiphong);

$get_phong_slide="SELECT * FROM phong
					ORDER BY 'ID_Phong' desc
					LIMIT 3";
$result_get_phong_slide=mysqli_query($conn,$get_phong_slide);

if($id=$_GET['kv']){
	$get_all_phong="SELECT * FROM phong p JOIN khuvuc kv ON p.ID_KhuVuc=kv.ID_KhuVuc JOIN loaiphong lp ON p.ID_LoaiPhong=lp.ID_LoaiPhong WHERE p.ID_KhuVuc='$id' ORDER BY ID_Phong desc";
	$result_all_phong=mysqli_query($conn,$get_all_phong);
}elseif($id=$_GET['lp']){
	$get_all_phong="SELECT * FROM phong p JOIN khuvuc kv ON p.ID_KhuVuc=kv.ID_KhuVuc JOIN loaiphong lp ON p.ID_LoaiPhong=lp.ID_LoaiPhong WHERE p.ID_LoaiPhong='$id' ORDER BY ID_Phong desc";
	$result_all_phong=mysqli_query($conn,$get_all_phong);	
}elseif($search=$_GET['timkiem']){
	$get_all_phong="SELECT *
FROM phong p JOIN khuvuc kv ON p.ID_KhuVuc=kv.ID_KhuVuc JOIN loaiphong lp ON p.ID_LoaiPhong=lp.ID_LoaiPhong
WHERE kv.Ten LIKE '%$search%' OR kv.MoTa LIKE '%$search%' OR lp.MoTa LIKE '%$search%' OR SucChua LIKE'%$search%' OR Gia LIKE'%$search%' OR ThoiHan LIKE'%$search%' or MoTaNgan LIKE '%$search%' OR MoTaDai LIKE '%$search%' OR WC LIKE '%$search%' OR AnNinh like '%$search%' OR TienNghi like '%$search%' OR GhiChu LIKE '%$search%'
ORDER BY ID_Phong desc";
	$result_all_phong=mysqli_query($conn,$get_all_phong);
}else{
	$get_all_phong="SELECT * FROM phong p JOIN khuvuc kv ON p.ID_KhuVuc=kv.ID_KhuVuc
										  JOIN loaiphong lp ON p.ID_LoaiPhong=lp.ID_LoaiPhong
					ORDER BY ID_Phong desc";
	$result_all_phong=mysqli_query($conn,$get_all_phong);	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Xem phòng | KTX Captain Tris</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
	
	<?php include('../view/header.php') ?>
<style>

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
		<a class="navbar-brand" href="index.php">KTX Captain Tris</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="../index.php">Trang chủ
					</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Xem phòng
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Dịch vụ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../lienhe.php">Liên hệ</a>
					</li>
					<?php
					if($_SESSION['ID_TaiKhoan']){
					?>
						<li class="nav-item">
							<a class="nav-link" href="../taikhoan/dangxuat.php">Đăng xuất</a>
						</li>
						<a href="../trangcanhan/index.php"><button class="btn btn-success" type="submit">TRANG CÁ NHÂN</button></a>
					<?php
					}else{
					?>
						<li class="nav-item">
							<a href="../taikhoan/dangnhap.php"><button class="btn btn-success" type="submit">ĐĂNG NHẬP</button></a>
						</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
		<h2 class="my-4">Tìm kiếm</h2>
			<form class="example" action="" method="get">
			  <input type="text" placeholder="Nhập giá trị.." name="timkiem">
			  <button type="submit"><i class="fa fa-search"></i></button>
			</form>
		  
        <h2 class="my-4">Khu vực</h2>
        <div class="list-group">
		  <?php
			while($row=mysqli_fetch_array($result_all_khuvuc))
			{
		  ?>
          <a href="?kv=<?=$row[0]?>" class="list-group-item"><?=$row[1]?></a>
			<?php } ?>
        </div>
		  
	   <h2 class="my-4">Loại phòng</h2>
        <div class="list-group">
		  <?php
			while($row=mysqli_fetch_array($result_all_loaiphong))
			{
		  ?>
          <a href="?lp=<?=$row[0]?>" class="list-group-item"><?=$row[1]?></a>
			<?php } ?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="row">
		<?php		
		while($row=mysqli_fetch_array($result_all_phong)){
		?>
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="card h-100">
              <a href="chitietphong.php?id=<?=$row[ID_Phong]?>"><img class="card-img-top" src="../image/<?=$row[HinhAnh]?>" alt="" height="350px"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="chitietphong.php?id=<?=$row[ID_Phong]?>">Phòng số <?=$row[ID_Phong]?></a>
                  <?php
                  	include('../model/check_phong.php');
                  ?>				
                </h4>

                <h5><?php $format_money=number_format($row[Gia], 0, ',', '.'); echo $format_money.' VNĐ';  ?></h5>
				<div class="card-text"><?php echo'Khu vực: '.$row[Ten] ?></div>
				<div class="card-text"><?php echo'Loại phòng: '.$row[MoTa] ?></div>
				<div class="card-text"><?php echo'Sức chứa: '.$row[SucChua].' người';?></div> 
				<div class="card-text"><?php echo'Thời hạn: '.$row[ThoiHan].' ngày';?></div>
				<div class="card-text"><?php echo'An ninh: '.$row[AnNinh]?></div>   
                <div class="card-text"><?=$row[MoTaNgan]?></div>
              </div>
              <div class="card-footer">
                <a href="chitietphong.php?id=<?=$row[ID_Phong]?>"><button type="button" class="btn btn-outline-primary" style="width: 100%">Xem phòng</button></a>
              </div>
            </div>
          </div>
		<?php
		}
		?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php include('../view/footer.php') ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
