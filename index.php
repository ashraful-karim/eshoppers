<?php
ob_start();
session_start();
require 'classes/application.php';

$obj_app = new Application();



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="assets/font_end_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font_end_assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/font_end_assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/font_end_assets/css/price-range.css" rel="stylesheet">
    <link href="assets/font_end_assets/css/animate.css" rel="stylesheet">
	<link href="assets/font_end_assets/css/main.css" rel="stylesheet">
	<link href="assets/font_end_assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/font_end_assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/font_end_assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/font_end_assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/font_end_assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/font_end_assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->

		<!--header_top start-->
		<?php include('includes/header_top.php');?>
		<!--/header_top end-->

		<!--header_middle start-->
		<?php include('includes/header_middle.php');?>
		<!--/header-middle end-->


		<?php include('includes/header_bottom.php');?>
		<!--/header-bottom-->


	</header><!--/header-->
	
	<!-- Content -->

			<?php 

			if(isset($pages)){

			if($pages == 'shop'){

				include('pages/shop-content.php');

			}elseif($pages =='product_details'){

				include('pages/product_content.php');
			}

			elseif($pages =='cart'){

				include('pages/cart_content.php');
			}

			elseif($pages =='category'){

				include('pages/category_content.php');
			}
			elseif($pages =='checkout'){

				include('pages/checkout_content.php');
			}

			elseif($pages =='shipping'){

				include('pages/shipping_content.php');
			}

			elseif($pages =='payment'){

				include('pages/payment_content.php');
			}

			elseif($pages =='customer_home'){

				include('pages/customer_home_content.php');
			}

			elseif($pages =='manu_content'){

				include('pages/manufacturer_content.php');
			}


			}else{

				include('pages/home_content.php');
			}




			?>
	<!-- content end -->
	
	<footer id="footer"><!--Footer-->
		<!-- Footer top -->
		<?php include('includes/footer_top.php');?>
		<!-- Footer top end-->
		
		<!-- Footer widget -->
		<?php include('includes/footer_widget.php');?>
		<!-- Footer widget end-->

		<!-- Footer bottom -->
		<?php include('includes/footer_bottom.php');?>
		<!-- Footer bottom end-->



	</footer><!--/Footer-->
	

  
    <script src="assets/font_end_assets/js/jquery.js"></script>
	<script src="assets/font_end_assets/js/bootstrap.min.js"></script>
	<script src="assets/font_end_assets/js/jquery.scrollUp.min.js"></script>
	<script src="assets/font_end_assets/js/price-range.js"></script>
    <script src="assets/font_end_assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/font_end_assets/js/main.js"></script>
</body>
</html>