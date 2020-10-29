<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thanh toán</title>
<?php include('../view/header.php') ?>
<?php include('./xulythanhtoan.php'); ?>
</head>

<body>
	<?php
	$idphong=$_POST['id_phong'];
	if($_SESSION['dk_phong']==1){
		echo '<div class="alert alert-success">
				<strong>Đặt phòng thành công!</strong> Vui lòng đến phòng quản lí để xác nhận và thanh toán tiền phòng, bạn đang ở trạng thái <i>Chờ thanh toán</i></h3></div>';
		unset($_SESSION['dk_phong']);
		echo '<meta http-equiv="Refresh" content="2;url=../phong" >';
	}
	
	$id_taikhoan=$_SESSION['ID_TaiKhoan'];
	$select_taikhoan_theoid="SELECT * FROM taikhoan WHERE ID_TaiKhoan=$id_taikhoan";
	$result_select_taikhoan_theoid=mysqli_query($conn,$select_taikhoan_theoid);
	$row=mysqli_fetch_array($result_select_taikhoan_theoid);
	?>
	<div class="container mt-5">
		<form action="#" method="post">
			<p class="h4 mb-4 text-center display-4">ĐƠN ĐĂNG KÍ PHÒNG</p>
			<div class="row">

				<div class="col-8">
					<div class="form-row mb-4">
						<div class="col">
							<span>Họ tên</span>
							<input type="text" class="form-control" name="hoten" value="<?=$row[HoTen]?>">						
						</div>
						
						<div class="col">
							<span>Giới Tính</span>
							<select name="sl_gioitinh" class="form-control">
								<option value="0">Nam</option>
								<option value="1">Nữ</option>
							</select>					
						</div>
					</div>
					
					<div class="form-row mb-4">
						<div class="col">
							<span>Số điện thoại</span>
							<input type="tel" class="form-control" name="sdt" value="<?=$row[SDT]?>">						
						</div>
						
						<div class="col">
							<span>CMND</span>
							<input type="text" class="form-control" name="cmnd" value="<?=$row[CMND]?>">						
						</div>
					</div> 
					
					<div class="form-row mb-4">
						<div class="col">
							<span>Email</span>
							<input type="email" class="form-control" name="email" value="<?=$row[Email]?>">						
						</div>
					</div>
					
					<div class="form-row mb-4">
						<div class="col">
							<span>Địa chỉ</span>
							<input type="text" class="form-control" name="diachi" value="<?=$row[DiaChi]?>" required>						
						</div>
					</div>
					
					<div class="form-row mb-4">
						<div class="col">
							<span>Thời hạn</span>
							<select class="form-control" name="sl_thoihan">	
								<option value=1>1 tháng</option>
								<option value=3>3 tháng</option>
								<option value=6>6 tháng</option>
								<option value=12>12 tháng</option>
							</select>				
						</div>
						
						<div class="col">
							<span>Ngày vào ở</span>
							<input type="date" class="form-control" name="ngayvaoo" required>						
						</div>
						
						<div class="col">
							<span>Mã giảm giá</span>
							<input type="text" class="form-control" disabled value="Đang xây dựng">						
						</div>
					</div> 
					
					<div class="form-row mb-4">
						<div class="col">
							<input type="hidden" class="form-control btn-primary" name="id_phong_thanhtoan" value="<?=$idphong?>">	
							<input type="submit" class="form-control btn-primary" name="btn_guidangkiphong" value="Gửi">	
						</div>
						
						<div class="col">
							<a href="../phong/chitietphong.php?id=<?=$idphong?>">
								<input type="button" class="form-control btn-outline-primary" value="Quay lại & Hủy đơn">
							</a>				
						</div>
					</div>
					
				</div>

				<div class="col-4">
					<?php
					include('../model/database.php');
					if($id=$_POST['id_phong']){
						$get_all_phong="SELECT * FROM phong p JOIN khuvuc kv ON p.ID_KhuVuc=kv.ID_KhuVuc
																  JOIN loaiphong lp ON p.ID_LoaiPhong=lp.ID_LoaiPhong
										WHERE ID_Phong=$id
										ORDER BY ID_Phong desc";
						$result_all_phong=mysqli_query($conn,$get_all_phong);
						$row=mysqli_fetch_array($result_all_phong);
					?>
						<div class="col-lg-12 col-md-12 mb-4">
							<div class="card h-100">
								<a href="#"><img class="card-img-top" src="../image/<?=$row[HinhAnh]?>" alt="" height="200px"></a>
							<div class="card-body">
								<h4 class="card-title">
								<a href="../phong/chitietphong.php?id=<?=$row[ID_Phong]?>">Phòng số <?=$row[ID_Phong]?></a>
								</h4>
								<h5><?php $format_money=number_format($row[Gia], 0, ',', '.'); echo $format_money.' VNĐ';  ?></h5>
								<div class="card-text"><?php echo'Khu vực: '.$row[Ten] ?></div>
								<div class="card-text"><?php echo'Loại phòng: '.$row[MoTa] ?></div>
								<div class="card-text"><?php echo'Sức chứa: '.$row[SucChua].' người';?></div> 
								<div class="card-text"><?php echo'Thời hạn: '.$row[ThoiHan].' ngày';?></div>
								<div class="card-text"><?php echo'An ninh: '.$row[AnNinh]?></div>   
								<div class="card-text"><?=$row[MoTaNgan]?></div>
								</div>
							</div>
						</div>
					<?php
					}else
						echo '<h3>Chưa chọn phòng</h3><br><a href="../phong/index.php">Click vào đây để chọn phòng</a>';
					?>
				</div>
			</div>

		</form>	
		
	</div>

</body>
</html>