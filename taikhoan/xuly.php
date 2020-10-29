
<?php
include('../model/database.php');

if(isset($_POST['btn_DangKi']))
{
	$hoten=$_POST['txt_ten'];
	$gioitinh=$_POST['sl_gioitinh'];
	
	$matkhau=$_POST['matkhau'];
	$xacnhanmatkhau=$_POST['xacnhanmatkhau'];
	
	$sdt=$_POST['sdt'];
	$cmnd=$_POST['cmnd'];
    
	$txt_email=$_POST['txt_email'];
	$txt_diachi=$_POST['txt_diachi'];
    
    $hinhanh=$_FILES['txt_HinhAnh'][name]; //định dạng lại tên lần 2	
    
    if($hinhanh==null){ //kiem tra co up avatar len khong?
        $hinhanh="avatar_default";
    }else{
        $hinhanh=date("dmY").'_'.$hinhanh;
    }
    	
	
    
	$select_cmnd=mysqli_query($conn,"SELECT * FROM taikhoan WHERE CMND='$cmnd'");
	
	$select_email=mysqli_query($conn,"SELECT * FROM taikhoan WHERE Email='$txt_email'"); 
	
	//echo $hoten,$gioitinh,$matkhau,$sdt,$cmnd,$txt_email,$txt_diachi;
	if($hoten ==''){
		echo '<div class="alert alert-danger">Vui lòng nhập tên</div>';
		//echo '<script language="javascript"> alert("Vui lòng nhập tên !"); window.location="dangki.php";</script>';
	}elseif($gioitinh=='null'){
		//echo '<script language="javascript"> alert("Vui lòng chọn giới tính !"); window.location="dangki.php";</script>';
		echo '<div class="alert alert-danger">Vui lòng chọn giới tính</div>';
	}elseif(empty($matkhau)){
		echo '<div class="alert alert-danger">Vui lòng nhập mật khẩu</div>';	
	}elseif(empty($xacnhanmatkhau)){
		echo '<div class="alert alert-danger">Vui lòng nhập Xác nhận mật khẩu</div>';
	}elseif($matkhau != $xacnhanmatkhau){
		echo '<div class="alert alert-danger">Mật khẩu phải khớp với nhau</div>';
	}elseif($sdt==''||strlen($sdt) < 9 || strlen($sdt) > 15){
		echo '<div class="alert alert-danger">Vui lòng nhập chính xác số điện thoại</div>';
	}elseif($cmnd==''|| strlen($cmnd) < 9 || strlen($cmnd) > 12){
		echo 'Vui lòng nhập chính xác CMND';
	}elseif(mysqli_num_rows($select_cmnd) > 0){
		echo 'Số CMND đã được sử dụng';
	}elseif($txt_email==''){
		echo 'Vui lòng nhập email';
	}elseif(mysqli_num_rows($select_email)>0){
		echo 'Email này đã được sử dụng, vui lòng nhập email khác';
	}elseif($txt_diachi==''){
		echo 'Vui lòng nhập địa chỉ';
	}else{
		$matkhau=md5($matkhau);
		$query="INSERT INTO
					taikhoan(HoTen,GioiTinh,Email,SDT,CMND,DiaChi,MatKhau,AnhDaiDien)
				VALUES
					('$hoten','$gioitinh','$txt_email','$sdt','$cmnd','$txt_diachi','$matkhau','$hinhanh')";
		mysqli_query($conn,$query);
        
        move_uploaded_file($_FILES['txt_HinhAnh'][tmp_name],"../image/".$newname_hinhanh);
        
		$_SESSION['DangKi']=1;
		header('location:./dangnhap.php');
	}
    

}elseif(isset($_POST['btn_DangNhap'])){
	$txt_email=$_POST['txt_email'];
	$matkhau=$_POST['matkhau'];
	
	if($txt_email==''||$matkhau==''){
		echo '<div class="alert alert-warning">Vui lòng nhập Email & Mật Khẩu</div>';
	}else{
		$matkhau=md5($matkhau);
		
		$select_email=mysqli_query($conn,"SELECT * FROM taikhoan WHERE Email='$txt_email'");
		$row=mysqli_fetch_array($select_email);
		if($row['Email']!=$txt_email || $row['MatKhau']!=$matkhau){
            echo '
            <div class="alert alert-danger">
            <strong>Lỗi!</strong> Sai email hoặc mật khẩu, vui lòng kiểm tra lại.
            </div>';
		}else{
			$_SESSION['ID_PhanQuyen']=$row['ID_PhanQuyen'];
			$_SESSION['ID_TaiKhoan']=$row['ID_TaiKhoan'];
			//echo $_SESSION['IDPhanQuyen'];
			if($_SESSION['ID_PhanQuyen'] == 1 || $_SESSION['ID_PhanQuyen'] == 2 || $_SESSION['ID_PhanQuyen'] ==3)
				header('location:../admin/index.php');
			else{
				$_SESSION['ID_PhanQuyen']==4;
                $refurl=$_POST["refurl"];
				header("Location: $refurl");
			}
		}
	}
}else{
	//header('location:./dangki.php');
}
?>