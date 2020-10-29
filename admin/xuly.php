<?php 
include('../model/database.php'); 

if(isset($_POST['btn_themkhuvuc'])){
	$idkhuvuc=$_POST['txt_IDKhuVuc'];
	$tenkhuvuc=$_POST['txt_TenKhuVuc'];
	$mota=$_POST['txt_MoTa'];
	
	$query="INSERT INTO khuvuc values ('$idkhuvuc','$tenkhuvuc','$mota')";
	mysqli_query($conn,$query);
	header('location:./quanly_phong.php');
}elseif(isset($_POST['btn_suakhuvuc'])){
	$idkhuvuc=$_POST['txt_IDKhuVuc'];
	$tenkhuvuc=$_POST['txt_TenKhuVuc'];
	$mota=$_POST['txt_MoTa'];
	
	$query_update="UPDATE khuvuc SET ID_KhuVuc='$idkhuvuc',Ten='$tenkhuvuc',MoTa='$mota' WHERE ID_KhuVuc='$idkhuvuc'";
	mysqli_query($conn,$query_update);
	header('location:./quanly_phong.php');
}elseif(isset($_POST['btn_themloaiphong'])){
	$idloaiphong=$_POST['txt_IDLoaiPhong'];
	$mota=$_POST['txt_MoTa'];
	
	//echo $idkhuvuc, $tenkhuvuc, $mota;
	
	$query="INSERT INTO loaiphong values ('$idloaiphong','$mota')";
	mysqli_query($conn,$query);
	header('location:./quanly_phong.php');
}elseif(isset($_POST['btn_sualoaiphong'])){
	$idloaiphong=$_POST['txt_IDLoaiPhong'];
	$mota=$_POST['txt_MoTa'];
	
	$query_update="UPDATE loaiphong SET MoTa='$mota' WHERE ID_LoaiPhong='$idloaiphong'";
	//echo "UPDATE loaiphong SET MoTa='$mota' WHERE ID_LoaiPhong='$idloaiphong'";
	mysqli_query($conn,$query_update);
	header('location:./quanly_phong.php');
}elseif(isset($_POST['btn_themphong'])){
	$idphong=$_POST['txt_IDPhong'];
	$idloaiphong=$_POST['sl_loaiphong'];
	$idkhuvuc=$_POST['sl_khuvuc'];
	$soluong=$_POST['txt_SoLuong'];
	$gia=$_POST['txt_Gia'];
	$soluongwc=$_POST['txt_SoLuongWC'];
	$thoihan=$_POST['txt_ThoiHan'];
	$anninh=$_POST['txt_AnNinh'];
	$tiennghi=$_POST['txt_TienNghi'];
	$motangan=$_POST['txt_MoTaNgan'];
	$motadai=$_POST['txt_MoTaDai'];
	$ghichu=$_POST['txt_GhiChu'];
	$hinhanh=$_FILES['txt_HinhAnh'][name];
	$hinhanh=convert_name($hinhanh); //định dạng lại tên
	$newname_hinhanh=date('dmY').'_'.$hinhanh; //định dạng lại tên lần 2	
	
	$query="INSERT INTO phong values ('$idphong','$idloaiphong','$idkhuvuc','$soluong','','$gia','$thoihan','$motangan','$motadai','$newname_hinhanh','$soluongwc','$anninh','$tiennghi','$ghichu')";
	//echo $query;
	
	mysqli_query($conn,$query);	
	
	move_uploaded_file($_FILES['txt_HinhAnh'][tmp_name],"../image/".$newname_hinhanh); //upload hình ảnh
	
	header('location:./quanly_phong.php');
}elseif(isset($_POST['btn_suaphong'])){
	$idphong=$_POST['txt_IDPhong'];
	$idloaiphong=$_POST['sl_loaiphong'];
	$idkhuvuc=$_POST['sl_khuvuc'];
	$soluong=$_POST['txt_SoLuong'];
	$gia=$_POST['txt_Gia'];
	$soluongwc=$_POST['txt_SoLuongWC'];
	$thoihan=$_POST['txt_ThoiHan'];
	$anninh=$_POST['txt_AnNinh'];
	$tiennghi=$_POST['txt_TienNghi'];
	$motangan=$_POST['txt_MoTaNgan'];
	$motadai=$_POST['txt_MoTaDai'];
	$ghichu=$_POST['txt_GhiChu'];
	$hinhanh=$_FILES['txt_HinhAnh'][name];
	$hinhanh=convert_name($hinhanh); //định dạng lại tên
	$newname_hinhanh=date('dmY').'_'.$hinhanh; //định dạng lại tên lần 2
	
	$query_update="UPDATE phong SET ID_LoaiPhong='$idloaiphong',ID_KhuVuc='$idkhuvuc',SucChua='$soluong',Gia='$gia',ThoiHan='$thoihan',MoTaNgan='$motangan',MoTaDai='$motadai',HinhAnh='$newname_hinhanh',WC='$soluongwc',AnNinh='$anninh',TienNghi='$tiennghi',GhiChu='$ghichu'
	WHERE ID_Phong='$idphong'";
	
	move_uploaded_file($_FILES['txt_HinhAnh'][tmp_name],"../image/".$newname_hinhanh); //upload hình ảnh
	
	mysqli_query($conn,$query_update);
	
	foreach($_FILES['txt_NhieuHinhAnh']['name'] as $key=>$val){ 
		// File upload path
		$tenfile=$_FILES['txt_NhieuHinhAnh']['name'][$key];
		$tenfile_moi=date('dmY_his').'_'.$tenfile;
		move_uploaded_file($_FILES["txt_NhieuHinhAnh"]["tmp_name"][$key], "../image/".$tenfile_moi);
		$query_insert_nhieu_anh="INSERT INTO hinhanh values('','$idphong','$tenfile_moi');";
		
		//echo $query_insert_nhieu_anh;
		mysqli_query($conn,$query_insert_nhieu_anh);
	}
	
	header('location:./quanly_phong.php');
}elseif(isset($_POST['btnTrangThai'])){
    $valueTrangThai = $_POST['trangthai'];
    $idCTTP = $_POST['idCTTP'];
    $idHD = $_POST['idHD'];
    $ghichu = $_POST['ghichu'];
    
    if(strstr($ghichu,'Đơn hủy phòng')==false){
        $sql=" UPDATE chitietthuephong
           SET TrangThai=1, GhiChu='Đơn đặt phòng, đã thanh toán - QLPHONG xác nhận'
           WHERE ID = $idCTTP ";
    }else{
        $sql=" UPDATE chitietthuephong
           SET TrangThai=1, GhiChu='Đơn hủy phòng, QLPHONG đã xác nhận'
           WHERE ID = $idCTTP ";
    }
    
    # chuyển trạng thái sang 1 -> trạng thái của HĐ = 1
    if(mysqli_query($conn,$sql)){
        $sql="  UPDATE hoadon
                SET TrangThai=1
                WHERE ID_HoaDon = $idHD  ";
        if(mysqli_query($conn,$sql)){
            # thành công thì in ra thông báo
            $cookieName='capnhattrangthai';
            setcookie($cookieName,'1',time()+1,"/");
            $refurl=$_SERVER['HTTP_REFERER'];
            header("location:$refurl");
        }else{
            echo $sql;
        }
    }else{
        echo $sql;
    }
}


//Chuyển tiếng Việt có dấu sang không dấu
function convert_name($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
?>
