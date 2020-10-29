<?php
if(isset($_SESSION['ID_TaiKhoan'])){
	$ID_TaiKhoan=$_SESSION['ID_TaiKhoan'];
	$select_taikhoan=mysqli_query($conn,"SELECT * FROM taikhoan where ID_TaiKhoan=$ID_TaiKhoan");
	$row_select_taikhoan=mysqli_fetch_array($select_taikhoan);
    
    
    $select_phongdango="SELECT * FROM chitietthuephong WHERE ID_Taikhoan=$ID_TaiKhoan ORDER BY NgayDat desc LIMIT 1"; //chi tiet thue phong
    $result_select_phongdango=mysqli_query($conn,$select_phongdango);
    $row_select_phongdango=mysqli_fetch_array($result_select_phongdango);
    
    if(mysqli_num_rows($result_select_phongdango)==0){
         # kiểm tra xem KH này có đặt phòng trước đây bao giờ chưa chưa
        $row_select_phongdango['ID_Phong'] = 0;
        $row_select_phongdango['NgayDat'] = $row_select_phongdango['NgayVaoO'] = $row_select_phongdango['NgayTra'] = '1212-12-12';
        $row_select_phongdango['GhiChu'] = 'Hình như trước đây bạn chưa bao giờ đặt phòng ở chúng tôi';       
    }else{
        
        if($row_select_phongdango['NgayTraPhongSomHonDuKien']<$row_select_phongdango['NgayTra']){
            # kiểm tra xem, phòng này - hóa đơn - KH này có trả phòng chưa
            /*$row_select_phongdango['ID_Phong'] = 0;
            $row_select_phongdango['NgayDat'] = $row_select_phongdango['NgayVaoO'] = $row_select_phongdango['NgayTra'] = '1999-9-9';*/
            if($row_select_phongdango['TrangThai']==0){
                $row_select_phongdango['GhiChu'] = 'Bạn vừa trả phòng sớm hơn dự kiến, vui lòng chờ xác nhận từ phía QLPHONG';
            }else{
                $row_select_phongdango['ID_Phong'] = 0;
                $row_select_phongdango['NgayDat'] = $row_select_phongdango['NgayVaoO'] = $row_select_phongdango['NgayTra'] = '1999-9-9';
                $row_select_phongdango['GhiChu'] = 'Bạn vừa trả phòng sớm hơn dự kiến, QLPHONG đã xác nhận';
            }
        }elseif($row_select_phongdango['TrangThai']==0){
                #chưa thanh toán thì in ra
                $row_select_phongdango['GhiChu'] = 'Chưa thanh toán nên bạn không thể vào ở! Vui lòng thanh toán cho thu ngân tại quầy hoặc chuyển khoản (vài tuần sau ra mắt nha)';
        }
    }
    
    $ID_Phong = $row_select_phongdango['ID_Phong'];
    
    $selectPhong = mysqli_query($conn,"SELECT * FROM phong p JOIN khuvuc kv ON p.ID_KhuVuc=kv.ID_KhuVuc JOIN loaiphong lp ON p.ID_LoaiPhong=lp.ID_LoaiPhong WHERE p.ID_Phong = $ID_Phong"); //thong tin phong
    
    $rowPhong = mysqli_fetch_array($selectPhong);
    
    $selectDanhGia=mysqli_query($conn,"SELECT * FROM danhgiaphong WHERE ID_TaiKhoan=$ID_TaiKhoan");
    
}else{
	$select_taikhoan=mysqli_query($conn,"SELECT * FROM taikhoan");
}

if($_GET['loaidon']=='donhuyphong'){
    $select_donyeucau="SELECT * FROM chitietthuephong where NgayTraPhongSomHonDuKien<NgayTra";
    //xem ds đơn hủy phòng
    $result_select_donyeucau=mysqli_query($conn,$select_donyeucau);
}elseif($_GET['loaidon']=='dondatphong'){
    $select_donyeucau="SELECT * FROM chitietthuephong where GhiChu like 'Đơn đặt phòng%'";
    //xem ds đơn đặt phòng
    $result_select_donyeucau=mysqli_query($conn,$select_donyeucau);
}elseif($_GET['idCTTP']){
    $idCTTP=$_GET['idCTTP'];
    $select_donyeucau="SELECT * FROM chitietthuephong cttp JOIN taikhoan tk ON cttp.ID_TaiKhoan = tk.ID_TaiKhoan where ID=$idCTTP";
    //xem chi tiết thuê phòng để cật nhật tình trạng
    $query_select_donyeucau=mysqli_query($conn,$select_donyeucau);
    $result=mysqli_fetch_array($query_select_donyeucau);
}
?>