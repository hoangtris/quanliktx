<?php
include('../model/database.php');

if(isset($_POST['btn_guidangkiphong'])){
	/*   lấy giá trị chèn vào bảng HOADON    */
	$ngayvaoo=$_POST['ngayvaoo'];
	$idphong=$_POST['id_phong_thanhtoan'];
	$id_taikhoan=$_SESSION['ID_TaiKhoan'];
	$ghichu='Đơn đặt phòng, chưa thanh toán';
	$tenhoadon="Hóa Đơn Đặt Phòng Số $idphong của KH #$id_taikhoan";
	
    # insert hóa đơn với trạng thái chưa thanh toán -> 0
	$insert_hoadon="INSERT INTO hoadon(TenHoaDon,TrangThai) VALUES ('$tenhoadon',0)";
	
	mysqli_query($conn,$insert_hoadon);
	
	/*   tính thời gian hết hạn họp đồng    */
	$thoihan = (int) $_POST['sl_thoihan']; //ép kiểu số cho sl_thoihan
    //echo var_dump($thoihan).'<br>'; // kiểm tra kiểu dữ liệu của thời hạn

	switch($thoihan){
		case 1:
			$date=date_create("$ngayvaoo");
			date_modify($date, "+1 month");
			$ngaytra=date_format($date, "Y-m-d");
			break;
		case 3:
			$date=date_create("$ngayvaoo");
			date_modify($date, "+3 months");
			$ngaytra=date_format($date, "Y-m-d");
			break;
		case 6:
			$date=date_create("$ngayvaoo");
			date_modify($date, "+6 months");
			$ngaytra=date_format($date, "Y-m-d");
			break;
		case 12:
			$date=date_create("$ngayvaoo");
			date_modify($date, "+1 year");
			$ngaytra=date_format($date, "Y-m-d");
			break;
	}
	
	/*   lấy hóa đơn vừa mới insert vào để chèn vào CHITIETTHUEPHONG    */
	$select_new_hoadon="SELECT * FROM hoadon ORDER BY ID_HoaDon desc LIMIT 1";
	$result_select_new_hoadon=mysqli_query($conn,$select_new_hoadon);
	$row=mysqli_fetch_array($result_select_new_hoadon);
	$idhoadon=$row[0];
	/*   lấy hóa đơn vừa mới insert vào để chèn vào CHITIETTHUEPHONG    */
	
	/*   chèn CTTP mới sau khi khách nhấn đặt phòng    
         khi vừa đặt phòng bằng hình thức đóng tiền tại thu ngân thì trạng thái sẽ là 0 (chưa thanh toán)
         khi vừa đặt phòng bằng hình thức ONLINE thì trạng thái sẽ là 1 (đã thanh toán)
    */
	$insert_cttp="INSERT INTO chitietthuephong(ID_TaiKhoan,ID_Phong,ID_HoaDon,NgayVaoO,NgayTra,NgayTraPhongSomHonDuKien,GhiChu,TrangThai) VALUES ($id_taikhoan,$idphong,$idhoadon,'$ngayvaoo','$ngaytra','$ngaytra','$ghichu',0)";
	# ID tự động tăng
    # NgayDat = current_timestamp()
    # NgayTraPhongSomHonDuKien = NgayTra (Nếu NgayTraPhongSomHonDuKien < NgayTra => KH hủy phòng)
	if(mysqli_query($conn,$insert_cttp)){
		$_SESSION['dk_phong']=1;     
        #trả thông báo đăng kí thành công với session
	}else{
        echo 'Thất bại';
	}
}
?>