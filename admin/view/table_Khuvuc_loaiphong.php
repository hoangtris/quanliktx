<?php
if($_GET['delete_id_khuvuc'])
{
	$id=$_GET['delete_id_khuvuc'];
	mysqli_query($conn,"DELETE FROM khuvuc where ID_KhuVuc='$id'");
	header('location:quanly_phong.php');
}

if($_GET['delete_id_loaiphong'])
{
	$id=$_GET['delete_id_loaiphong'];
	mysqli_query($conn,"DELETE FROM loaiphong where ID_LoaiPhong='$id'");
	header('location:quanly_phong.php');
}
?>
<!--Grid column-->
<div class="col-md-3 mb-4">

<!--Card-->
<div class="card mb-4">
<!-- Card header -->
	<div class="card-header text-center">
		Loại phòng <a href="./quanly_loaiphong.php"><span class="badge badge-success">Thêm</span></a>
	</div>		  

	<!--Card content-->
	<!-- List group links -->
	<?php
	$get_all_loaiphong="SELECT * FROM loaiphong";
	$result=mysqli_query($conn,$get_all_loaiphong);			  
	?>
	<div class="list-group list-group-flush">
		<?php 
		while($row=mysqli_fetch_array($result))
		{ ?>
		<div class="list-group-item list-group-item-action waves-effect"><?=$row['MoTa']?>
			<a onclick="return DelConfirm()" href="?delete_id_loaiphong=<?=$row[0]?>">
				<span class="badge badge-danger pull-right ml-1">Xóa</span>
			</a>
			<a href="./quanly_loaiphong.php?edit_id=<?=$row[0]?>">
				<span class="badge badge-primary pull-right">Sửa</span>
			</a>
		</div>
		<?php
		}
		?>
	</div>
	<!-- List group links -->

</div>
<!--/.Card-->

<!--Card-->
<div class="card mb-4">

	<!-- Card header -->
	<div class="card-header text-center">
		Khu vực <a href="./quanly_khuvuc.php"><span class="badge badge-success">Thêm</span></a>
	</div>
	

	<!--Card content-->
	<!-- List group links -->
	<?php
	$get_all_khuvuc="SELECT * FROM khuvuc ORDER BY Ten";
	$result=mysqli_query($conn,$get_all_khuvuc);			  
	?>
	<div class="list-group list-group-flush">
		<?php 
		while($row=mysqli_fetch_array($result))
		{
		?>
		<div class="list-group-item list-group-item-action waves-effect"><?=$row['Ten']?>
			<a onclick="return DelConfirm()" href="?delete_id_khuvuc=<?=$row[0]?>">
				<span class="badge badge-danger pull-right ml-1">Xóa</span>
			</a>
			<a href="./quanly_khuvuc.php?edit_id=<?=$row[0]?>">
				<span class="badge badge-primary pull-right">Sửa</span>
			</a>
		</div>
		<?php
		}
		?>
	</div>
	<!-- List group links -->

</div>
<!--/.Card-->

<!--JS xác nhận xóa--> 
<script>            
function DelConfirm()
{
	return confirm("Bạn có chắc muốn xóa dòng này ?");
}
</script> 