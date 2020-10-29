<?php include('./quanly_truycap.php'); ?>
<?php include('../model/database.php');
$select_user="SELECT * FROM taikhoan tk JOIN phanquyen pq ON tk.ID_PhanQuyen=pq.ID_PhanQuyen";
$result_select_user=mysqli_query($conn,$select_user);


if($_GET['xoa_id_taikhoan'])
{
	$id=$_GET['xoa_id_taikhoan'];
	mysqli_query($conn,"DELETE FROM taikhoan where ID_TaiKhoan='$id'");
	header('location:quanly_taikhoan.php');
}

if($_GET['khoiphucmatkhau_id_taikhoan'])
{
	$id=$_GET['khoiphucmatkhau_id_taikhoan'];
	$pass=md5('a@123');
	//echo $pass;
	mysqli_query($conn,"UPDATE taikhoan SET MatKhau='$pass' WHERE ID_TaiKhoan='$id'");
	header('location:quanly_taikhoan.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="">
	<title>Quản lí tài khoản</title>
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
            <span>Quản lí tài khoản</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
		<div class="container">
		<?php
		while($row=mysqli_fetch_array($result_select_user))
		{
			$idtaikhoan=$row[ID_TaiKhoan];
			$select_phongdango="SELECT * FROM chitietthuephong WHERE ID_Taikhoan=$idtaikhoan ORDER BY NgayDat desc LIMIT 1";
			$result_select_phongdango=mysqli_query($conn,$select_phongdango);
			$row_select_phongdango=mysqli_fetch_array($result_select_phongdango);
		?>
		<div class="card" style="width:200px; height: auto; float: left; margin-right: 20px; margin-bottom: 10px">
			<img class="card-img-top" src="../image/LOGO.png" alt="Card image" style="width:100%">
			<div class="card-body">
				<h5 class="card-title" style="height: 50px;"><?=$row[HoTen]?></h5>
				<i class="card-text"><?=$row[Ten]?></i>
				<p class="card-text">Phòng đang ở: <?=$row_select_phongdango[ID_Phong]?></p>
			</div>
			<div class="card-footer">
				<a href="javascript:alert('Đang xây dựng');" class="btn btn-outline-primary">Xem hồ sơ</a>
				<?php
				if($idtaikhoan!=1){
				?>
					<a onclick="return ResetPassConfirm()"  href="?khoiphucmatkhau_id_taikhoan=<?=$idtaikhoan?>" class="btn btn-outline-success" style="font-size: 12px; width: 140px">Khôi phục mật khẩu</a>
					<a onclick="return DelConfirm()" href="?xoa_id_taikhoan=<?=$idtaikhoan?>" class="btn btn-outline-danger">Xóa hồ sơ</a>
				<?php
				}
				?>
				
			</div>
		</div>
		<?php
		}
		?>
		</div>
    </div>
  </main>
  <!--Main layout-->
<!--JS xác nhận xóa--> 
<script>            
function DelConfirm()
{
	return confirm("Bạn có chắc muốn xóa tài khoản này ?");
}
	
function ResetPassConfirm()
{
	return confirm("Bạn có chắc muốn khôi phục mật khẩu của tài khoản này? Pass:a@123");
}
</script> 
</body>