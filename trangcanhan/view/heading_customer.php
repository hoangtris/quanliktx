<!-- Heading -->
<div class="card mb-3 wow fadeIn">

<!--Card content-->
<div class="card-body d-sm-flex justify-content-between">

<h4 class="mb-2 mb-sm-0 pt-1">
  <?php
  $file_name=basename($_SERVER['SCRIPT_NAME']);
  switch ($file_name) {
    case 'index.php':
      echo '<span>Dashboard</span>';
      break;
    case 'thongtinphong.php':
      echo '<span>Thông tin phòng</span>';
      break;
    case 'thanhtoan.php':
      echo '<span>Thanh toán hóa đơn</span>';
      break;
    case 'danhgia.php':
      echo '<span>Những đánh giá phòng của bạn</span>';
      break;
    case 'thongbao.php':
      echo '<span>Thông báo</span>';
      break;
    case 'hoadon.php':
      echo '<span>Danh sách hóa đơn</span>';
      break;
    case 'suathongtin.php':
      echo '<span>Sửa thông tin tài khoản</span>';
      break;
    default:
      echo '<span>Lỗi 404</span>';
      break;
  }
  ?>
</h4>
</div>

</div>
<!-- Heading -->