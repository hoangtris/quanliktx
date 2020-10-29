<?php
include('./quanly_truycap.php');
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
</head>

<body class="white">

    <!--Main Navigation-->
    <?php 
        include('view/nav_admin.php');
    ?>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5">
        <div class="container-fluid ">

            <!-- Heading -->
            <?php
                include('view/heading_admin.php');
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
					Đang xây dựng
				</div>
			</div>
		</div>
	</div>
	</main>
</body>

</html>