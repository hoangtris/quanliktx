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

        $('.grid').masonry({
              itemSelector: '.grid-item',
              columnWidth: '.grid-sizer',
              percentPosition: true
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
        	<div class="row wow fadeIn" style="height: auto">

        		<!--Grid column-->
        		<div class="col-md-6 mb-4">
        			<!--Card-->
        			<div class="card" style="height: auto">
        			<!--Card content-->
        				<div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p>Mã KH: <b><?=$row_select_taikhoan["ID_TaiKhoan"]?></b></p>
                                    <p>Họ tên: <b><?=$row_select_taikhoan["HoTen"]?></b></p>
                                    <p>Giới tính: <b><?=$row_select_taikhoan["GioiTinh"]?></b></p>
                                    <p>Số điện thoại: <b><?=$row_select_taikhoan["SDT"]?></b></p>
                                    <p>CMND: <b><?=$row_select_taikhoan["CMND"]?></b></p>
                                </div>  

                                <div class="col-6">
                                    <p>Mã phòng: <strong><?= $row_select_phongdango['ID_Phong'] ?></p></strong>
                                    <p>Ngày thuê: <strong><?php echo date_format(date_create($row_select_phongdango['NgayDat']),'d-m-Y'); ?></p></strong>
                                    <p>Ngày trả: <strong><?php echo date_format(date_create($row_select_phongdango['NgayTra']),'d-m-Y'); ?></p></strong>
                                    <p>Ghi chú: <strong><?= $row_select_phongdango['GhiChu'] ?></p></strong>
                                </div>
                            </div>  

                            <div class="row">
                                <div class="col-12">
                                    <p>Địa chỉ: <b><?=$row_select_taikhoan["DiaChi"]?></b></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <a style="font-size: 16px; padding: 10px" href="suathongtin.php" class="badge badge-success" role="button">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Sửa thông tin</a>

                                    <!-- <a style="font-size: 16px; padding: 10px" href="#" class="badge badge-danger" role="button">
                                        <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                    Xóa tài khoản</a> -->

                                </div>
                            </div>                          
        				</div>
        			</div>
        		</div>

                <div class="col-md-6 mb-4" style="height: auto">
                    <div class="row" style="height: 50%">
                        <div class="col-3 mb-4">
                            <!--Card-->
                            <div class="card border border-info">
                            <!--Card content-->
                                <div class="card-body" style="background-color: rgba(91, 192, 222, 0.2);">
                                    <div class="col-md-12 text-info text-center">
                                        <h2><i class="fa fa-bell-o fa-4" aria-hidden="true"></i></h2>
                                        <h6>Thông báo</h6>
                                    </div>                            
                                </div>
                            </div>
                        </div>

                        <div class="col-9 mb-4">
                            <!--Card-->
                            <div class="card text-white bg-danger mb-3" style="height: 100%">
                              <div class="card-header">Cảnh báo</div>
                              <div class="card-body">
                                <p class="card-text text-white">Đóng tiền phòng tháng 08/2020</p>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="height: 50%">
                        <div class="col-md-7">
                            <!--Card-->
                            <div class="card border border-warning" style="height: 100%">
                            <!--Card content-->
                                <div class="card-body" style="background-color: rgba(255, 187, 51, 0.1);">
                                    <div class="col-md-12 text-warning text-center p-3">
                                        <h2><i class="fa fa-newspaper-o" aria-hidden="true"></i></h2>
                                        <h6>Tin tức - Sự kiện</h6>
                                    </div>                            
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <!--Card-->
                            <div class="card text-white bg-success mb-3" style="height: 100%">
                              <div class="card-header">Chức năng 3</div>
                              <div class="card-body">
                                <p class="card-text text-white">Chức năng số 3</p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
	</main>

</body>
</html>