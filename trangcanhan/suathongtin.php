<?php
include('../model/database.php');
include('../model/sql_query.php');
if ($_SESSION['ID_PhanQuyen']==1 || $_SESSION['ID_PhanQuyen']==2 || $_SESSION['ID_PhanQuyen']==3 ) {
	header('location:../admin');
}elseif ($_SESSION['ID_PhanQuyen']==4) {
	
}else{
	header('location:../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="">
    <title>Trang ca nhan</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <style>
        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }
        
        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // SideNav Button Initialization
            $(".button-collapse").sideNav2();
            // SideNav Scrollbar Initialization
            var sideNavScrollbar = document.querySelector('.custom-scrollbar');
            var ps = new PerfectScrollbar(sideNavScrollbar);
        });
    </script>
</head>

<body class="white">

    <!--Main Navigation-->
    <?php 
        include('view/nav_customer.php');
    ?>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-2">
        <div class="container-fluid ">

            <!-- Heading -->
            <?php
                include('view/heading_customer.php');
            ?>
            <!-- Heading -->

        	<!--Grid row-->
        	<div class="row wow fadeIn">

        		<!--Grid column-->
        		<div class="col-md-12 mb-4">

        			<!--Card-->
        			<div class="card">
        			<!--Card content-->
        				<div class="card-body">
                            <?php
                            $cookieName='capnhatthongtin';
                            if(isset($_COOKIE[$cookieName])){
                                echo '<div class="alert alert-success">';
                                echo '<strong>Thành công!</strong>';
                                echo '</div>';
                                setcookie($cookieName, "", time() - 3600);
                            }
                            ?>
        					<form action="xuly.php" method="post" enctype="multipart/form-data">
                                <h5 style="font-weight: bold; margin-bottom: 15px">
                                    Thông tin cá nhân
                                </h5>
                                <div class="form-row mb-4">
                                    <div class="col"><!-- Mã khu vực -->
                                        <span>Họ tên</span>
                                        <input type="text" id="hoten" name="hoten" class="form-control" value="<?=$row_select_taikhoan['HoTen']?>" >
                                    </div>

                                    <div class="col-2">
                                        <span>Giới tính</span>
                                        <select name="gioitinh" class="form-control">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>                   
                                    </div>

                                    <div class="col">
                                        <span>Ngày sinh</span>
                                        <input type="date" id="txt_ngaysinh" name="ngaysinh" class="form-control" value="<?=$row_select_taikhoan['NgaySinh']?>" >
                                    </div>

                                    <div class="col-2">
                                        <span>Dân tộc</span>
                                        <select class="form-control" id="dantoc" name="dantoc" placeholder="Chọn">
                                            <option value="">Chọn</option>
                                            <option selected="selected" value="Kinh">Kinh</option>
                                            <option value="Thái">Thái</option>
                                            <option value="3">Khơ-me</option>
                                            <option value="4">Mường</option>
                                            <option value="5">Mèo</option>
                                            <option value="6">Nùng</option>
                                            <option value="7">Tày</option>
                                            <option value="8">Hoa</option>
                                            <option value="9">Chăm</option>
                                            <option value="10">Hán</option>
                                            <option value="11">Gia-rai</option>
                                            <option value="12">Ê-đê</option>
                                            <option value="13">Chơ-ro</option>
                                            <option value="14">Thổ</option>
                                            <option value="15">Dao</option>
                                            <option value="16">Hmông</option>
                                            <option value="17">Cơ-ho</option>
                                            <option value="19">Ba-na</option>
                                            <option value="20">Ngái</option>
                                            <option value="21">Xơ-đăng</option>
                                            <option value="22">Sán Chay</option>
                                            <option value="23">Sán Dìu</option>
                                            <option value="24">Hrê</option>
                                            <option value="25">Mnông</option>
                                            <option value="26">Ra-glai</option>
                                            <option value="27">Xtiêng</option>
                                            <option value="28">Bru-Vân Kiều</option>
                                            <option value="29">Giáy</option>
                                            <option value="30">Cơ-tu</option>
                                            <option value="31">Gié-Triêng</option>
                                            <option value="32">Mạ</option>
                                            <option value="33">Khơ-mú</option>
                                            <option value="34">Co</option>
                                            <option value="35">Ta-ôi</option>
                                            <option value="36">Kháng</option>
                                            <option value="37">Xinh-mun</option>
                                            <option value="38">Hà Nhì</option>
                                            <option value="39">Chu-ru</option>
                                            <option value="40">Lào</option>
                                            <option value="41">La Chi</option>
                                            <option value="42">La Ha</option>
                                            <option value="43">Phù Lá</option>
                                            <option value="44">La Hủ</option>
                                            <option value="45">Lự</option>
                                            <option value="46">Lô Lô</option>
                                            <option value="47">Chứt</option>
                                            <option value="48">Mảng</option>
                                            <option value="49">Pà Thẻn</option>
                                            <option value="50">Cơ Lao</option>
                                            <option value="51">Cống</option>
                                            <option value="52">Bố Y</option>
                                            <option value="53">Si La</option>
                                            <option value="54">Pu Péo</option>
                                            <option value="55">Brâu</option>
                                            <option value="56">Ơ Đu</option>
                                            <option value="57">Rơ-măm</option>
                                            <option value="58">Ca dong</option>
                                            <option value="59">Người nước ngoài
                                            </option>
                                            <option value="60">Khác</option>
                                            </select>                  
                                    </div>

                                    <div class="col">
                                        <span>Tôn giáo</span>
                                        <select class="form-control" id="tongiao" name="tongiao" placeholder="Chọn">
                                            <option value="">Chọn</option>
                                            <option value="1">Phật giáo</option>
                                            <option value="2">Thiên chúa</option>
                                            <option value="3">Cao đài</option>
                                            <option value="4">Hoà Hảo</option>
                                            <option value="5">Hồi giáo</option>
                                            <option value="6">Tin lành</option>
                                            <option selected="selected" value="7">Không</option>
                                            <option value="8">Khác</option>
                                            <option value="9">Công giáo</option>
                                        </select>                   
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-3">
                                        <span>Quốc tịch</span>
                                        <select class="form-control" id="quoctich" name="quoctich" placeholder="Chọn">
                                            <option value="">Chọn</option>
                                            <option value="1">Anh Quốc</option>
                                            <option value="2">Bungari</option>
                                            <option value="3">Cộng hoà DC Đức</option>
                                            <option value="4">Cộng hoà LB Đức</option>
                                            <option value="5">Cộng hoà LB Nga</option>
                                            <option value="6">Hunggari</option>
                                            <option value="7">Liên Xô (cũ)</option>
                                            <option value="8">Slovakia</option>
                                            <option value="9">Tiệp Khắc</option>
                                            <option value="10">Trung Quốc</option>
                                            <option value="Việt Nam" selected>Việt Nam</option>
                                            <option value="12">Thái Lan</option>
                                            <option value="13">Thuỵ Sỹ</option>
                                            <option value="14">Cộng hoà Pháp</option>
                                            <option value="15">Ấn Độ</option>
                                            <option value="16">Cộng hoà CHDCND Lào</option>
                                            <option value="17">Australia</option>
                                            <option value="18">Đài Loan</option>
                                            <option value="19">Nhật Bản</option>
                                            <option value="20">AngoLa</option>
                                            <option value="21">Mỹ</option>
                                            <option value="22">Hàn Quốc</option>
                                            <option value="23">Hồng Kông</option>
                                            <option value="24">Hoa Kỳ</option>
                                            <option value="25">Bỉ</option>
                                            <option value="26">Hà Lan</option>
                                            <option value="27">Singapore</option>
                                            <option value="28">Canada</option>
                                            <option value="29">Thụy Điển</option>
                                            <option value="30">BắC Ai Len</option>
                                            <option value="31">Thụy Sỹ</option>
                                            <option value="32">BELARUS</option>
                                            <option value="33">Indonesia</option>
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <span>Số CMND</span>
                                        <input type="text" id="cmnd" name="cmnd" disabled=""class="form-control" value="<?=$row_select_taikhoan['CMND']?>">    
                                    </div>

                                    <div class="col-3">
                                        <span>Ngày cấp</span>
                                        <input type="date" id="ngaycap" name="ngaycap" class="form-control" value="<?=$row_select_taikhoan['NgayCap']?>" >
                                    </div>

                                    <div class="col-3">
                                        <span>Nơi cấp</span>
                                            <select class="form-control" id="noicap" name="noicap" placeholder="Chọn Tỉnh/ Thành phố">
                                                <option value="">Chọn Tỉnh/ Thành phố</option>
                                                <option value="1">Thành phố Hà Nội</option>
                                                <option value="3">Thành phố Hải Phòng</option>
                                                <option value="4">Thành phố Đà Nẵng</option>
                                                <option value="5">Tỉnh Hà Giang</option>
                                                <option value="6">Tỉnh Cao Bằng</option>
                                                <option value="7">Tỉnh Lai Châu</option>
                                                <option value="8">Tỉnh Lào Cai</option>
                                                <option value="9">Tỉnh Tuyên Quang</option>
                                                <option value="10">Tỉnh Lạng Sơn</option>
                                                <option value="11">Tỉnh Bắc Kạn</option>
                                                <option value="12">Tỉnh Thái Nguyên</option>
                                                <option value="14">Tỉnh Sơn La</option>
                                                <option value="15">Tỉnh Phú Thọ</option>
                                                <option value="16">Tỉnh Vĩnh Phúc</option>
                                                <option value="20">Hà Tây</option>
                                                <option value="21">Tỉnh Hải Dương</option>
                                                <option value="23">Tỉnh Hòa Bình</option>
                                                <option value="27">Tỉnh Ninh Bình</option>
                                                <option value="30">Tỉnh Hà Tĩnh</option>
                                                <option value="31">Tỉnh Quảng Bình</option>
                                                <option value="32">Tỉnh Quảng Trị</option>
                                                <option value="38">Tỉnh Gia Lai</option>
                                                <option value="39">Tỉnh Phú Yên</option>
                                                <option value="45">Tỉnh Ninh Thuận</option>
                                                <option value="50">Tỉnh Đồng Tháp</option>
                                                <option value="51">Tỉnh An Giang</option>
                                                <option value="58">Tỉnh Trà Vinh</option>
                                                <option value="61">Tỉnh Cà Mau</option>
                                                <option value="69">Tỉnh Bắc Giang</option>
                                                <option value="77">Tỉnh Bình Dương</option>
                                                <option value="88">Tỉnh Hà Nam</option>
                                                <option value="89">Tỉnh Kon Tum</option>
                                                <option value="96">Tỉnh Đồng Nai</option>
                                                <option value="102">Tỉnh Bắc Ninh</option>
                                                <option value="103">Tỉnh Nam Định</option>
                                                <option value="104">Tỉnh Thừa Thiên Huế</option>
                                                <option value="112">Tỉnh Bình Phước</option>
                                                <option value="114">Tỉnh Quảng Ninh</option>
                                                <option value="115">Tỉnh Lâm Đồng</option>
                                                <option value="116">Tỉnh Long An</option>
                                                <option value="117">Tỉnh Bà Rịa - Vũng Tàu</option>
                                                <option value="119">Tỉnh Nghệ An</option>
                                                <option value="120">Tỉnh Quảng Ngãi</option>
                                                <option value="121">Tỉnh Bình Định</option>
                                                <option value="122">Tỉnh Kiên Giang</option>
                                                <option value="123">Tỉnh Hưng Yên</option>
                                                <option value="124">Tỉnh Quảng Nam</option>
                                                <option value="125">Tỉnh Bình Thuận</option>
                                                <option value="126">Tỉnh Thái Bình</option>
                                                <option value="127">Tỉnh Thanh Hóa</option>
                                                <option value="128">Tỉnh Khánh Hòa</option>
                                                <option value="129">Tỉnh Tây Ninh</option>
                                                <option value="131">Thành phố Cần Thơ</option>
                                                <option value="132">Tỉnh Bến Tre</option>
                                                <option value="133">Tỉnh Bạc Liêu</option>
                                                <option value="134">Tỉnh Yên Bái</option>
                                                <option value="135">Tỉnh Tiền Giang</option>
                                                <option value="137">Tỉnh Vĩnh Long</option>
                                                <option value="138">Tỉnh Đắk Lắk</option>
                                                <option value="139">Tỉnh Sóc Trăng</option>
                                                <option value="140">Thành phố Hồ Chí Minh</option>
                                                <option value="141">Tỉnh Điện Biên</option>
                                                <option value="142">Tỉnh Đắk Nông</option>
                                                <option value="143">Tỉnh Hậu Giang</option>
                                                <option value="144">Hà Nội cũ</option>
                                                <option value="145">Hà Tây cũ</option>
                                                <option value="146">Hải Hưng</option>
                                                <option value="147">Hà Bắc</option>
                                                <option value="148">Sông Bé</option>
                                                <option value="149">Nam Hà</option>
                                                <option value="150">Hồng Kông</option>
                                                <option value="151">Liên bang Nga</option>
                                                <option value="152">Hà Nam Ninh</option>
                                                <option value="153">Thái Lan</option>
                                                <option value="154">Bộ quốc phòng</option>
                                                <option value="155">Malaysia</option>
                                                <option value="156">Tỉnh Hải Hưng</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-row mb-2">
                                    <div class="col-3"></div>
                                    <div class="col">
                                        <small><i>Nếu bạn muốn thay đổi CMND, vui lòng liên hệ quản lý phòng hoặc quản lý tài khoản</i></small>  
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="col-3">
                                        <span>Số điện thoại</span>
                                        <input type="text" id="sdt" name="sdt" class="form-control" value="<?=$row_select_taikhoan['SDT']?>" >
                                    </div>
                                    <div class="col-3">
                                        <span>Email</span>
                                        <input type="email" id="email" name="email" class="form-control" value="<?=$row_select_taikhoan['Email']?>" >
                                    </div>
                                    <div class="col">
                                        <span>Nguyên quán</span>
                                        <input type="text" id="nguyenquan" name="nguyenquan" class="form-control" value="<?=$row_select_taikhoan['NguyenQuan']?>" >
                                    </div>                                    
                                </div>

                                <h5 style="font-weight: bold; margin-bottom: 15px">
                                    Nơi ở
                                </h5>

                                <div class="form-row mb-4">
                                    <div class="col-3">
                                        <span>Tỉnh/Thành phố</span>

                                        <select class="form-control" id="province" name="province" placeholder="Chọn Tỉnh/ Thành phố">
                                            <option value="">Chọn Tỉnh/ Thành phố</option>
                                            <?php
                                            $result = mysqli_query($conn,"select * from tinhthanh order by _ten");
                                            while($row=mysqli_fetch_array($result)){
                                                //print_r($row);
                                                if($row["id"]==$row_select_taikhoan['TinhThanh']){
                                                    echo '<option value='.$row["id"].' selected>';
                                                    echo $row["_ten"];
                                                    echo '</option>';    
                                                }else{
                                                    echo '<option value='.$row["id"].'>';
                                                    echo $row["_ten"];
                                                    echo '</option>'; 
                                                }
                                                
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <span>Quận/Huyện</span>

                                        <select class="form-control" id="district" name="district">
                                            <option value="">Chọn Quan/Huyen</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <span>Phường/Xã</span>

                                        <select class="form-control" id="ward" name="ward">
                                            <option value="">Chọn Phuong/Xa</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <span>Số nhà, đường</span>
                                        <input class="form-control" type="text" name="diachi" value="<?=$row_select_taikhoan['DiaChi']?>" placeholder="Số X, đường Y, khu phố Z">
                                    </div>
                                </div>
                                
                                <div class="form-row mb-4">
                                    <input type="submit" value="Cập nhật thông tin" class="btn btn-success" name="capnhatthongtin">
                                    <input type="submit" value="Xóa tài khoản" class="btn btn-danger" disabled>
                                </div>
                            </form>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
	</main>

<script>
    $(document).ready(function(){
        $('#province').ready(function(){
            var provinceID = $('#province').val();
            $.get('ajax/district.php',{"provinceID":provinceID},function(data){
                $('#district').html(data);
            });
        });

        $('#district').change(function(){
            var districtID = $('#district').val();
            $.get('ajax/ward.php',{"districtID":districtID},function(data){
                $('#ward').html(data);
            });
        });
    });
</script>
    
</body>

</html>