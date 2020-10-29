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
    <title>Thông tin phòng</title>

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
                                    $cookieName='traphong';
                                    if(isset($_COOKIE[$cookieName])){
                                        echo '<div class="alert alert-success">';
                                        echo '<strong>Bạn vừa trả phòng sớm hơn dự kiến! Vui lòng chờ QLPHONG xác nhận</strong>';
                                        echo '</div>';
                                        //setcookie($cookieName, "", time() - 3600);
                                    }
                                ?>
        					<div class="row">
                                <div class="col-6">
                                    <p>Mã phòng: <strong><?= $row_select_phongdango['ID_Phong'] ?></p></strong>
                                    <p>Ngày thuê: <strong><?php echo date_format(date_create($row_select_phongdango['NgayDat']),'d-m-Y'); ?></p></strong>
                                    <p>Ngày vào ở: <strong><?php echo date_format(date_create($row_select_phongdango['NgayVaoO']),'d-m-Y'); ?></p></strong>
                                    <p>Ngày trả: <strong><?php echo date_format(date_create($row_select_phongdango['NgayTra']),'d-m-Y'); ?></p></strong>
                                    <p>Ghi chú: <br><strong><?= $row_select_phongdango['GhiChu'] ?></p></strong>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#myModal" 
                                            <?php
                                            if($row_select_phongdango['ID_Phong']==0||strstr($row_select_phongdango['GhiChu'],'Đơn hủy phòng')==false){
                                                echo ' disabled';
                                            }
                                            ?> >Trả phòng</button>
                                </div>  

                                <div class="col-6">
                                    <p class="ml-xl-0 ml-4">
                                    Sức chứa: <strong><?=$rowPhong[SucChua]?> người</strong></p>
                                    <p class="ml-xl-0 ml-4">
                                    Khu vực: <strong><?=$rowPhong[Ten]?></strong></p>
                                    <p class="ml-xl-0 ml-4">
                                    Loại phòng: <strong><?=$rowPhong[MoTa]?></strong></p>
                                    <p class="ml-xl-0 ml-4">
                                    Số lượng nhà vệ sinh: <strong><?=$rowPhong[WC]?></strong></p>
                                    <p class="ml-xl-0 ml-4">
                                    An ninh: <strong><?=$rowPhong[AnNinh]?></strong></p>
                                    <p class="ml-xl-0 ml-4">
                                    Tiện nghi: <strong><?=$rowPhong[TienNghi]?></strong></p>
                                </div>
                            </div>  
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
	</main>
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Trả phòng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="xuly.php" method="post">  
            <div class="modal-body">
                <label>Lí do trả phòng</label>
                <textarea class="form-control" rows="5" name="lidotraphong"></textarea>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger" value="Tôi đồng ý trả phòng"  onClick="myFunction()" name="xacnhantraphong">
                <input type="hidden" value="<?= $row_select_phongdango['ID'] ?>" name="idCTTP">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<script>
function myFunction() {
  confirm("Bạn chắc chắn chưa?");
}
</script>
</body>

</html>