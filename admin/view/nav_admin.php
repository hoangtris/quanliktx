  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo waves-effect my-4">
        <img src="../image/31lHuWahkBL.jpg" class="img-fluid" alt="LOGO" width="500px">
      </a>

      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo ' active'; } ?>">
          <i class="fa fa-pie-chart mr-3"></i>Dashboard
        </a>
        <a href="quanly_taikhoan.php" class="list-group-item list-group-item-action waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'quanly_taikhoan.php'){echo ' active'; } ?>">
          <i class="fa fa-user mr-3"></i> Quản lí tài khoản</a>


        <a href="quanly_phong.php" class="list-group-item list-group-item-action waves-effect 
        <?php
        if(basename($_SERVER['SCRIPT_NAME']) == 'quanly_phong.php' || basename($_SERVER['SCRIPT_NAME']) == 'quanly_loaiphong.php' || basename($_SERVER['SCRIPT_NAME']) == 'quanly_khuvuc.php'){
          echo ' active';
        }
        ?>">
          <i class="fa fa-home mr-3"></i>Quản lí phòng</a>


        <a href="quanly_donyeucau.php" class="list-group-item list-group-item-action waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'quanly_donyeucau.php'){echo ' active'; } ?>">
          <i class="fa fa-comments-o mr-3"></i>Quản lí đơn yêu cầu</a>
		    <a href="quanly_phanhoi.php" class="list-group-item list-group-item-action waves-effect <?php if(basename($_SERVER['SCRIPT_NAME']) == 'quanly_phanhoi.php'){echo ' active'; } ?>">
          <i class="fa fa-paper-plane mr-3"></i>Góp ý - Phản hồi</a>
        <a href="../taikhoan/dangxuat.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fa fa-sign-out mr-3"></i>Đăng xuất</a>
      </div>

    </div>
    <!-- Sidebar -->
  </header>
  <!--Main Navigation-->