<?php
include('../model/database.php');
if($id=$_GET['id']){
	$select_phong="SELECT * FROM phong p JOIN khuvuc kv ON p.ID_KhuVuc=kv.ID_KhuVuc JOIN loaiphong lp ON p.ID_LoaiPhong=lp.ID_LoaiPhong WHERE p.ID_Phong=$id";
	$result_select_phong=mysqli_query($conn,$select_phong);
	$row=mysqli_fetch_array($result_select_phong);	
}else{
	header('location:index.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chi tiết phòng | KTX Captain Tris</title>
	<?php include('../view/header.php') ?>
</head>

<body>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">KTX Captain Tris</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Trang chủ
              
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Xem phòng
			  <span class="sr-only">(current)</span>
			</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Dịch vụ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../lienhe.php">Liên hệ</a>
          </li>
		  <?php
            if($_SESSION['ID_TaiKhoan']){
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="../taikhoan/dangxuat.php">Đăng xuất</a>
                </li>
                <a href="../trangcanhan/index.php"><button class="btn btn-success" type="submit">TRANG CÁ NHÂN</button></a>
            <?php
            }else{
            ?>
                <li class="nav-item">
                    <a href="../taikhoan/dangnhap.php"><button class="btn btn-success" type="submit">ĐĂNG NHẬP</button></a>
                </li>
            <?php
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
	
	<!--Nội dung-->
    <div class="container my-5 py-5 z-depth-1">
      <!--Section: Content-->
      <section class="text-center">
        <!-- Section heading -->
        <h3 class="font-weight-bold mb-5">Chi tiết phòng</h3>
        <div class="row">
          <div class="col-lg-6 mr-3">
            <!--Carousel Wrapper-->
            <div id="carousel-thumb1" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">
                
              <!--Slides-->
              <div class="carousel-inner text-center text-md-left" role="listbox">
                <div class="carousel-item active">
                  <img src="../image/<?= $row[HinhAnh] ?>" alt="" height="550px">
                </div>
              </div>
              <!--/.Slides-->

              <!--Thumbnails-->
              <a class="carousel-control-prev" href="#carousel-thumb1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-thumb1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              <!--/.Thumbnails-->

            </div>
            <!--/.Carousel Wrapper-->
          </div>

          <div class="col-lg-5 text-center text-md-left">

            <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4"><?php echo 'Phòng số '.$row[0]; ?>
            <?php
                include('../model/check_phong.php'); #kiểm tra xem phòng còn chỗ không
            ?>	        
            </h2>

            <h4 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
              <span class="red-text font-weight-bold">
                <strong><?php $format_money=number_format($row[Gia]); echo $format_money.' VNĐ';  ?></strong>
              </span>
            </h4>

            <div class="font-weight-normal">
            <p><?=$row[MoTaNgan] ?></p>
            <p><strong>Sức chứa: </strong><?=$row[SucChua]?> người</p>
            <p><strong>Khu vực: </strong><?=$row[Ten]?></p>
            <p><strong>Loại phòng: </strong><?=$row[MoTa]?></p>
            <p><strong>Số lượng nhà vệ sinh: </strong><?=$row[WC]?></p>
            <p><strong>An ninh: </strong><?=$row[AnNinh]?></p>
            <p><strong>Tiện nghi: </strong><?=$row[TienNghi]?></p>

              <div class="mt-5">
                <p class="grey-text"><strong>Thời hạn muốn thuê theo hợp đồng</strong></p>
                <form action="../thanhtoan/index.php" method="post" class="ml-3">  
                    <div class="row text-center text-md-left">
                      <div class="col-md-4 ">
                        <div class="form-group">
                          <input class="form-check-input" name="radio_thoihan" type="radio" checked="checked" value="1">
                          <label for="radio100" class="form-check-label dark-grey-text">1 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4 ">
                        <div class="form-group">
                          <input class="form-check-input" name="radio_thoihan" type="radio" value="3">
                          <label for="radio100" class="form-check-label dark-grey-text">3 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="form-check-input" name="radio_thoihan" type="radio" value="6">
                          <label for="radio101" class="form-check-label dark-grey-text">6 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="form-check-input" name="radio_thoihan" type="radio" value="12">
                          <label for="radio102" class="form-check-label dark-grey-text">1 năm</label>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3 mb-4">
                      <div class="col-md-12 text-center text-md-left text-md-right">
                        <?php
                        if($_SESSION['ID_PhanQuyen']==4){
                            #TH là khách hàng đã đăng nhập
                            
                            /*---------Kiểm tra tài khoản đã đăng kí phòng hay chưa---------*/
                            $idtaikhoan=$_SESSION['ID_TaiKhoan'];
                            //echo $idtaikhoan;
                            $select_phongdango="SELECT * FROM chitietthuephong WHERE ID_Taikhoan=$idtaikhoan ORDER BY NgayDat desc LIMIT 1";
                            $result_select_phongdango=mysqli_query($conn,$select_phongdango);
                            $row_select_phongdango=mysqli_fetch_array($result_select_phongdango);

                            #TH phòng đầy
                            if($row_select_soluongnguoio[1]>=$row[SucChua]){
                            ?>
                                <input type="button" class="btn btn-danger btn-rounded" value=" Phòng đã đầy. Vui lòng chọn phòng khác">
                            <?php
                            }elseif($row_select_phongdango['ID_Phong']!=0 ){ #trường hợp đã đặt phòng
                            ?>
                                <input type="button" class="btn btn-warning btn-rounded" value=" Bạn đã có phòng, không thể đặt">
                            <?php
                            }else{ #ko trường hợp =))))
                            ?>
                                <input type="hidden" name="id_phong" value="<?=$row[0]?>">
                                <input type="submit" class="btn btn-primary btn-rounded" value=" Đặt phòng">
                            <?php
                            }
                            ?>

                        <?php
                        }elseif($_SESSION['ID_PhanQuyen']==1 ||$_SESSION['ID_PhanQuyen']==2||$_SESSION['ID_PhanQuyen']==3){
                            #TH là ADMIN | QLPHONG | THUNGAN thì không được đặt phòng
                            echo '<h5>Chỉ có khách hàng mới được phép đặt phòng</h5>';
                        }else
                            #TH chưa đăng nhập
                            echo '<h5>Vui lòng <a href="../taikhoan/dangnhap.php">đăng nhập</a> để đặt phòng</h5>';
                        ?>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->

        <div id="accordion">
            <div class="card">
              <a class="card-link" data-toggle="collapse" href="#collapseOne">
                  <div class="card-header">
                    Mô tả
                  </div>
              </a>
              <div id="collapseOne" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <?=$row[MoTaDai]?>
                </div>
              </div>
            </div>
            
            <div class="card">
              <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
              <div class="card-header">
                Ghi chú
              </div>  
              </a>

              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <?=$row[GhiChu]?>
                </div>
              </div>
            </div>
            
            <div class="card">
              <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                  Đánh giá
                </a>
              </div>
              <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <?php
                    if($_SESSION['ID_PhanQuyen']==4){
                    ?>
                    <form action="xuly_danhgiaphong.php" method="post" class="col-12 mb-4">
                        <h3>Đánh giá phòng</h3>
                        <input type="hidden" name="id_phong" value="<?=$row[0]?>">
                        <textarea name="txt_BinhLuan" style="width: 100%;" rows="5"></textarea>
                        <br>
                        <input type="submit" class="btn btn-outline-primary" name="btn_danhgiaphong" value="Đăng bình luận">
                    </form>					
                    <?php
                    }else echo '<h3>Vui lòng đăng nhập để đánh giá phòng</h3><br>';
                    ?>
                    
                    <?php
                    $select_binhluan="SELECT * FROM danhgiaphong dgp JOIN taikhoan tk ON dgp.ID_TaiKhoan=tk.ID_TaiKhoan WHERE ID_Phong=$id ORDER BY ThoiGian desc";
                    //echo $select_binhluan;
                    $result_select_binhluan=mysqli_query($conn,$select_binhluan);
                    while($row=mysqli_fetch_array($result_select_binhluan))
                    {
                    ?>
                        <div class="media border p-3">
                          <img src="../image/<?=$row['AnhDaiDien']?>" alt="avatar" class="mr-3 mt-3 rounded-circle" width="70px" height="70px">
                          <div class="media-body">
                            <h5><?=$row[HoTen]?> <small><i>Đánh giá vào <?=$row[ThoiGian]?></i></small></h5>
                            <p><?=$row[NoiDung]?></p>
                          </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>
        </div>
    </div>


</body>
</html>