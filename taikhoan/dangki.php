<!doctype html>
<html>

<head>
    <title>Đăng kí tài khoản</title>
	<?php include("../view/header.php") ?>
</head>
<body>
        <div class="container py-5 my-5 z-depth-1">
            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-md-6">
                        <!-- Default form register -->
                        <form action="xuly.php" method="post" enctype="multipart/form-data">
                            <p class="h4 mb-4 text-center display-4">ĐĂNG KÍ</p>
                            <div class="form-row mb-4">
                                <div class="col">
                                    <!-- First name -->
                                    <input type="text" id="txt_ten" name="txt_ten" class="form-control" placeholder="Họ Tên">
                                </div>
                                <div class="col">
                                    <!-- Last name -->
                                    <select class="form-control" name="sl_gioitinh" id="sl_gioitinh">
										<option value="null">Giới tính</option>
										<option value="Nam">Nam</option>
										<option value="Nữ">Nữ</option>
									</select>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-row mb-4">
                                <div class="col-6">
                                    <input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau">
                                </div>

                                <div class="col-6">
                                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="xacnhanmatkhau">
                                </div>
                            </div>

                            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
           					</small>

                            <!-- so dt & CMND -->
                            <div class="form-row">
                                <div class="col-6">
                                    <input type="tel" class="form-control mb-4" placeholder="Số điện thoại" name="sdt">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control mb-4" placeholder="CMND" name="cmnd">
                                </div>
                            </div>

                            <!-- E-mail -->
                            <input type="email" name="txt_email" class="form-control mb-4" placeholder="E-mail">

                            <!-- Địa chỉ -->
                            <input type="text" name="txt_diachi" class="form-control mb-4" placeholder="Địa chỉ">
							
							<!-- Ảnh đại diện -->
                            <input type="file" name="txt_HinhAnh" class="form-control-file">

                            <!-- Sign up button -->
                            <button class="btn btn-info my-4 btn-block" name="btn_DangKi" type="submit">Đăng kí</button>
							
							<small id="#" class="form-text text-muted mb-4 text-center">
             				Đã có tài khoản, <a href="dangnhap.php">ấn vào đây để đăng nhập</a>
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
</body>

</html>