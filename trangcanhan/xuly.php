<?php
include '../model/database.php';
include '../model/sql_query.php';
if(isset($_POST['capnhatthongtin'])){
    # cập nhật thông tin KH
    $arrRequest = array_values($_REQUEST); //chuyen key thanh so 
    
    for($i=0; $i<=count($arrRequest); $i++){
        $value[$i] = $arrRequest[$i];
    }
    
    $ID_TaiKhoan = $_SESSION['ID_TaiKhoan'];
    
    $sql = "
    UPDATE taikhoan 
    SET HoTen='$value[0]',GioiTinh='$value[1]',NgaySinh='$value[2]',Email='$value[9]',SDT='$value[8]',NgayCap='$value[6]',NoiCap='$value[7]',TinhThanh='$value[11]',QuanHuyen='$value[12]',PhuongXa='$value[13]',DiaChi='$value[14]',DanToc='$value[3]',TonGiao='$value[4]',QuocTich='$value[5]',NguyenQuan='$value[10]'
    WHERE ID_TaiKhoan = $ID_TaiKhoan
    ";
    echo '<pre>';
    print_r($arrRequest);
    print_r($_REQUEST);
    
    echo $sql;
    
    
    
    if(mysqli_query($conn,$sql)){
        $cookieName='capnhatthongtin';
        setcookie($cookieName,'1',time()+1,"/");
        header('Location:suathongtin.php');
    }else{
        echo 'That bai';
    } 
}elseif($_POST['xacnhantraphong']){
    # xác nhận trả phòng với trạng thái 0 (chưa được QLPHONG xác nhận)
    # QLPHONG nhận thì chuyển trạng thái sang 1 và KH hủy phòng thành công
    $lido = $_POST['lidotraphong'];
    $idCTTP=$_POST['idCTTP'];
    
    $ngayhuyphong=date('Y-m-d H:i:s');
    $sql = "UPDATE chitietthuephong
            SET NgayTraPhongSomHonDuKien='$ngayhuyphong', GhiChu='Đơn hủy phòng, chờ QLPHONG xác nhận', TrangThai=0
            WHERE ID=$idCTTP";
    
    if(mysqli_query($conn,$sql)){
        $cookieName='traphong';
        setcookie($cookieName, '1', time()+10);
        
        $refurl=$_SERVER['HTTP_REFERER'];
        header("location:$refurl");
    }else{
        echo $sql;
    }
}

?>