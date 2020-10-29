<!doctype html>
<html>
<head>
    <title>Đăng nhập</title>
	<?php include("../view/header.php") ?>
    <?php include('./xuly.php'); ?>
</head>
<body>
<?php
if($_SESSION['DangKi']==1){
echo '  <div class="alert alert-success">
        <strong>Thành công!</strong> Đã đăng ký thành công, vui lòng đăng nhập.
        </div>';
}
?>
    <form action="dangnhap.php" method="post" name="formDangNhap">
        <div class="container py-5 my-5 z-depth-1">
            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-md-6">
                        <!-- Default form register -->
                        <form class="text-center" action="#">
                            <p class="h4 mb-4 text-center display-4">ĐĂNG NHẬP</p>
                            
                            <input type="hidden" name="refurl" value="<?php echo ($_SERVER['HTTP_REFERER']); ?>" />

							<input type="email" name="txt_email" class="form-control mb-4" placeholder="E-mail">
								
							<input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau">
							
							<button class="btn btn-info my-4 btn-block" name="btn_DangNhap" type="submit">Đăng nhập</button>
							
							<small id="#" class="form-text text-muted mb-4 text-center">
             				Chưa có tài khoản, <a href="dangki.php">ấn vào đây để đăng kí</a>
           					</small>
                        </form>
                        <!-- Default form register -->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!--Section: Content-->
        </div>
    </form>
</body>

</html>