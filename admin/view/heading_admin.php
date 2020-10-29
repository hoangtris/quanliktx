<!-- Heading -->
<div class="card mb-3 wow fadeIn">

<!--Card content-->
<div class="card-body d-sm-flex justify-content-between">

<h4 class="mb-2 mb-sm-0 pt-1">
  <a href="#" target="_blank">Trang chủ</a>
  <span>/</span>
  

  <?php switch (basename($_SERVER['SCRIPT_NAME'])) {
    case 'index.php':
      echo '<span>Dashboard</span>';
      break;
    case 'variable':
      # code...
      break;
    default:
      # code...
      break;
  }
  ?>

</h4>

</div>

</div>
<!-- Heading -->