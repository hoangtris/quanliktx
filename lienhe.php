<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/main.css" rel="stylesheet" type="text/css" />
    <title>Liên hệ</title>
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
	
	<div class="container-fluid p-4">
		<h1 class="text-black p-4 mb-4 text-center">Liên hệ</h1>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h3>Bản đồ trụ sở chính</h3>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8754.56486912465!2d106.68247415210037!3d10.828686347278618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1593444051491!5m2!1svi!2s" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="col-6">
					<h3>Thông tin liên hệ</h3>
					<div class="row m-3">
						<div class="col-2" style="text-align: center">
							<i class="fa fa-phone" style="font-size:32px;" aria-hidden="true"></i>
						</div>
						<div>
							<a href="tel:0868509849"><h4>0868-509-xxx</h4></a>
						</div>
					</div>
					<div class="row m-3">
						<div class="col-2" style="text-align: center">
							<i class="fa fa-comments-o" style="font-size:32px;" aria-hidden="true"></i>
						</div>
						<div>
							<a href="http://zalo.me/0868509849"><h4>Chat qua Zalo</h4></a>
						</div>
					</div>
					<div class="row m-3">
						<div class="col-2" style="text-align: center">
							<i class="fa fa-envelope" style="font-size:32px;" aria-hidden="true"></i>
						</div>
						<div>
							<a href="mailto:hoangtri.ngo.117@gmail.com"><h4>hoangtri.ngo.117@gmail.com</h4></a>
						</div>
					</div>
					<div class="row m-3">
						<div class="col-2" style="text-align: center">
							<i class="fa fa-map-marker" style="font-size:32px;" aria-hidden="true"></i>
						</div>
						<div>
							<a href="javascript:alert('Map kế bên kìa! Xem đi');"><h4>Trường ĐH Công Nghiệp TP.HCM</h4></a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="110223287416081">
      </div>
	
	</div>
	
	<?php include('view/footer.php'); ?>
</body>