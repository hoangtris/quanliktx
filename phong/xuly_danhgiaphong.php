<?php
include('../model/database.php');
if(isset($_POST['btn_danhgiaphong'])){
	$noidung=$_POST['txt_BinhLuan'];
	//echo $_SESSION['ID_TaiKhoan'];
	$idphong=$_POST['id_phong'];
	
	$idtaikhoan=$_SESSION['ID_TaiKhoan'];
	//echo $idphong;
	
	$insert_danhgiaphong="INSERT INTO danhgiaphong(ID_TaiKhoan,ID_Phong,NoiDung) VALUES ($idtaikhoan,$idphong,'$noidung')";
	//echo $insert_danhgiaphong;
	mysqli_query($conn,$insert_danhgiaphong);
	header("location:chitietphong.php?id=$idphong");
}else{
	header("location:index.php");
}
?>