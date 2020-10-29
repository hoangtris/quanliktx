<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <div class="sidebar-fixed position-fixed">

    <a>
      <img src="../image/<?php 
					echo $row_select_taikhoan["AnhDaiDien"];
				?>" class="rounded-circle waves-effect my-4" alt="LOGO" style="width: 100%; object-fit: cover; height: 222px; overflow: hidden">
    </a>
      
    <h5 class="list-group-item-action waves-effect text-center text-uppercase mb-4">
    <?php
        echo "ID #".$row_select_taikhoan["ID_TaiKhoan"]."<br>".$row_select_taikhoan["HoTen"];
    ?>
    </h5>  

    <div class="list-group list-group-flush">
      <a href="index.php" class="list-group-item waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo ' active'; } ?>"><i class="fa fa-user mr-3"></i> Dashboard</a>
      
      <a href="" class="list-group-item list-group-item-action waves-effect" data-toggle="collapse" data-target="#demo"><i class="fa fa-home mr-3"></i>Phòng
      </a>
      <div id="demo" class="collapse collapse-inner rounded">
          <a href="thongtinphong.php" class="list-group-item list-group-item-action waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'thongtinphong.php'){echo ' active'; } ?>"><i class="fa fa-info-circle mx-3" aria-hidden="true"></i>Thông tin phòng</a>
          <a href="thongbao.php" class="list-group-item list-group-item-action waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'thongbao.php'){echo ' active'; } ?>"><i class="fa fa-bell-o mx-3" aria-hidden="true"></i>Thông báo</a>
          <a href="hoadon.php" class="list-group-item list-group-item-action waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'hoadon.php'){echo ' active'; } ?>"><i class="fa fa-file-text-o mx-3" aria-hidden="true"></i> Hóa đơn</a>
          <a href="thanhtoan.php" class="list-group-item list-group-item-action waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'thanhtoan.php'){echo ' active'; } ?>"><i class="fa fa-credit-card-alt mx-3" aria-hidden="true"></i>Thanh toán</a>
      </div>

      <a href="danhgia.php" class="list-group-item list-group-item-action waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'danhgia.php'){echo ' active'; } ?>"><i class="fa fa-comments-o mr-3"></i>Đánh giá</a>

      <a href="../taikhoan/dangxuat.php" class="list-group-item list-group-item-action waves-effect"><i class="fa fa-sign-out mr-3"aria-hidden="true"></i>Đăng xuất</a>
    </div>

  </div>
  <!-- Sidebar -->
</header>
<!--Main Navigation-->