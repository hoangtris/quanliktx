<!DOCTYPE html>
<html lang="en">
<head>
    
	<?php include("./view/header.php"); ?>
	
    <title>KTX Captain Tris</title>
</head>
<body>
<?php include('model/database.php'); ?>

<?php
switch($_SESSION['ID_PhanQuyen']) {
    case "4": //user
        require_once('view/nav_user.php');
        break;
	case "3":
	case "2":
	case "1":
        require_once('view/nav_admin.php');
        break;
	default:
		require_once('view/nav_guest.php');
}
?>
	<?php include 'view/thongbao.php'; ?> <!--thông báo-->

	<div id="demo" class="carousel slide" data-ride="carousel">

	  <!-- Chỉ số -->
	  <ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	  </ul>

	  <!-- Slideshow -->
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="image/slide_1.jpg" alt="khu A" width="100%" height="500">
		  <div class="carousel-caption">
			<h3>KHU VỰC A</h3>
			<p>Có sức chứa đến 500 người</p>
		  </div> 
		</div>
		<div class="carousel-item">
		  <img src="image/slide_2.png" alt="Loai 2" width="100%" height="500">
		  <div class="carousel-caption">
			<h3>Loại phòng 2</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		  </div> 
		</div>
		<div class="carousel-item">
		  <img src="image/slide_3.jpg" alt="Loai 1" width="100%" height="500">
		  <div class="carousel-caption">
			<h3>Loại phòng 1</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		  </div> 
		</div>
	  </div>

	  <!-- Nút trái & phải -->
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>
	</div> <!--slidebar-->

	<div class="container"> <!--giới thiệu-->
		<div class="gioithieu">
			<h1>BẠN ĐANG TÌM KIẾM MỘT NƠI LƯU TRÚ?</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec varius enim. Integer felis nunc, placerat a ipsum eget, ullamcorper efficitur ipsum. Nulla leo ex, sodales nec placerat et, malesuada ut erat. Vestibulum non cursus ipsum. Suspendisse sagittis convallis cursus. Etiam odio mauris, accumsan ut lorem ac, fringilla ullamcorper augue. Aliquam erat volutpat. 
				Vestibulum mollis, tellus non elementum consequat, lectus lorem maximus sapien, vitae dapibus orci felis id lorem. Integer vitae nunc eros. Donec vehicula id quam sit amet viverra. Fusce et eros magna. Duis consectetur quis ante sit amet hendrerit. Suspendisse interdum interdum aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut vel vehicula justo.
				Aenean enim tellus, semper id tincidunt id, tempus vel odio.
			</p>

			<hr style="margin-top: 50px;">

			<img src="image/LOGO.png" width="159px" alt="logo" />
			<h1>Bạn đừng lo</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec varius enim. </p>

		</div>	
	</div> <!--end giới thiệu-->

	<div class="gioithieu-nenxam"> <!--giới thiệu 2-->
		<div class="container">
			<center>
				<h1 style="padding:40px 0px 10px 0px; color: #2BBBAD">Tiêu đề giới thiệu trang web thứ 2.</h1>
				<div style="padding-bottom: 50px;">
					Nam nec varius enim. Integer felis nunc, placerat a ipsum eget, ullamcorper efficitur ipsum. Nulla leo ex, sodales nec placerat et, malesuada ut erat. Vestibulum non cursus ipsum. Suspendisse sagittis convallis cursus. Etiam odio mauris, accumsan ut lorem ac, fringilla ullamcorper augue. Aliquam erat volutpat. 
					Vestibulum mollis, tellus non elementum consequat, lectus lorem maximus sapien, vitae dapibus orci felis id lorem. Integer vitae nunc eros. Donec vehicula id quam sit amet viverra. Fusce et eros magna. Duis consectetur quis ante sit amet hendrerit. Suspendisse interdum interdum aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut vel vehicula justo. Nam nec varius enim. Integer felis nunc, placerat a ipsum eget, ullamcorper efficitur ipsum. Nulla leo ex, sodales nec placerat et, malesuada ut erat. Vestibulum non cursus ipsum. Suspendisse sagittis convallis cursus. Etiam odio mauris, accumsan ut lorem ac, fringilla ullamcorper augue. Aliquam erat volutpat. 
					Vestibulum mollis, tellus non elementum consequat, lectus lorem maximus sapien, vitae dapibus orci felis id lorem. Integer vitae nunc eros. Donec vehicula id quam sit amet viverra. Fusce et eros magna. Duis consectetur quis ante sit amet hendrerit. Suspendisse interdum interdum aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut vel vehicula justo.
					Aenean enim tellus, semper id tincidunt id, tempus vel odio.			
				</div>		
			</center>
		</div>
	</div> <!--kết thúc giới thiệu 2-->

	<div class="container pt-0 my-4 z-depth-1"> <!--slogan của KTX-->
	  <section class="p-md-3 mx-md-5">
		<div class="row d-flex justify-content-between align-items-center">
		  <div class="col-md-6 mb-4">
			<h2 class="font-weight-bold mb-3">Slogan nổi bật KTX</h2>
			<p class="text-muted pt-3">
			  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
			  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
			  enim ad minim veniam, quis nostrud exercitation ullamco laboris
			  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
			  in reprehenderit in voluptate velit esse cillum dolore eu fugiat
			  nulla pariatur. Excepteur sint occaecat cupidatat non proident,
			  sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		  </div>
		  <div class="col-md-6 col-lg-4 d-flex justify-content-center mb-md-0 mb-5">
			<img src="image/LOGO.png" width="100%"/> <!--logo (avatar/icon) tính năng-->
		  </div>
		</div>

		<div class="row pt-4">
		  <div class="col-lg-3 col-md-6 mb-1">
			<h4 class="font-weight-bold mb-3">
			  <i class="fa fa-shield indigo-text pr-2"></i> An toàn
			</h4>
			<p class="text-muted mb-lg-0">
			  Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
			</p>
		  </div>
		  <div class="col-lg-3 col-md-6 mb-1">
			<h4 class="font-weight-bold mb-3">
			  <i class="fa fa-users green-text pr-2"></i> Thân thiện
			</h4>
			<p class="text-muted mb-lg-0">
			  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			</p>
		  </div>
		  <div class="col-lg-3 col-md-6 mb-1">
			<h4 class="font-weight-bold mb-3">
			  <i class="fa fa-check-square-o amber-text pr-2"></i> Tiện nghi
			</h4>
			<p class="text-muted mb-md-0">
			  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			</p>
		  </div>
		  <div class="col-lg-3 col-md-6 mb-1">
			<h4 class="font-weight-bold mb-3">
			  <i class="fa fa-money red-text pr-2"></i> Giá rẻ
			</h4>
			<p class="text-muted mb-md-0">
			  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			</p>
		  </div>
		</div>
	  </section><!--end row-->
	</div> <!--end container-->

	<div class="text-center">
		<div class="container">
			<h2>KTX GIÁ RẺ CHO SINH VIÊN</h2>
			<H5 style="font-size: 15px; color: gray"><i>Captain Tris luôn cung cấp một nơi ở thật lý tưởng và phù hợp với túi tiền của các bạn sinh viên. Bên cạnh đó chúng tôi còn cung cấp cho bạn 3 gói chính, giúp bạn tiết kiệm hơn và nhận được nhiều ưu đãi.</i></H5>
			<div class="row pt-4">
				<div class="col-md-4">
					<div class="card mb-4 box-shadow border-secondary">
						<div class="card-header">
							<h4 class="my-0 font-weight-normal">Hợp đồng 3 tháng</h4>
						</div>
						<div class="card-body">
							<!--<h1><b>1.8tr</b><small class="text-muted">/tháng</small></h1>-->
							<ul class="list-unstyled mt-3 mb-4">
								<li>Giảm 5k tiền nước</li>
								<li>Giảm 10k tiền mạng</li>
								<li>Tư vấn hỗ trợ</li>
								<li>Tặng túi Captain Tris</li>
							</ul> <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Đăng kí</button>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card mb-4 box-shadow border-info">
						<div class="card-header border-info">
							<h4 class="my-0 font-weight-normal ">Hợp đồng 6 tháng</h4>
						</div>
						<div class="card-body">
							<!--<h1><b>1tr7</b><small class="text-muted">/tháng</small></h1>-->
							<ul class="list-unstyled mt-3 mb-4">
								<li>Giảm 5k tiền điện</li>
								<li>Giảm 10k tiền mạng</li>
								<li>Tặng 1 tháng giữ xe miễn phí</li>
								<li>Tặng áo Captain Tris</li>
							</ul> <button type="button" class="btn btn-lg btn-block btn-info">Đăng kí</button>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card mb-4 box-shadow border-danger">
						<div class="card-header border-danger">
							<h4 class="my-0 font-weight-normal">Hợp đồng 12 tháng</h4>
						</div>
						<div class="card-body">
							<!--<h1><b>1.6tr</b><small class="text-muted">/tháng</small></h1>-->
							<ul class="list-unstyled mt-3 mb-4">
								<li>Giảm 5% tiền nước</li>
								<li>Giảm 7% tiền điện</li>
								<li>Gói quà tặng</li>
								<li>Bao tất cả chi phí điện, nước, gửi xe....</li>
							</ul> <button type="button" class="btn btn-lg btn-block btn-danger">Đăng kí</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--giá / hợp đồng-->
	
	<div class="container-fluid" style="background:url(image/LOGO.png)"> 
	  <div class="container my-5 py-5 z-depth-1"> 
		<!--Section: Content-->
		<section class="px-md-1 mx-md-1 light-grey-text text-center text-lg-left">
		  <!--Grid row-->
		  <div class="row">
			<!--Grid column-->
			<div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
			  <img src="image/ktx1_1.png" class="img-fluid" alt="mota">
			</div>
			<!--Grid column-->
			<!--Grid column-->
			<div class="col-lg-6 mb-4 mb-lg-0">
			  <h3 class="font-weight-bold">Gọi ngay cho chúng tôi</h3>
			  <p class="font-weight-bold">Bạn sẽ thấy kì diệu</p>
			  <p class="text-black-50">Nếu bạn cảm thấy thích thì hãy đặt ngay một phòng cho riêng mình, nếu bạn vẫn chưa ưng ý thì có thể liên hệ hoặc xem thêm cấc phòng khác.</p>
			  <a class="font-weight-bold" href="#" >Xem phòng<i class="fa fa-angle-right ml-2"></i></a>
			</div>
			<!--Grid column-->
		  </div>
		  <!--Grid row-->
		</section>
		<!--Section: Content-->


	  </div>
	</div> <!--xem phòng-->	
</body>
</html>
	