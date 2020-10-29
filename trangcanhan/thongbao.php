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
    <title>Dashboard</title>

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
        					
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
	</main>
</body>

</html>