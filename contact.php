<?php session_start(); ?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Square Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
	<style>
		body {
			background-color: rgb(215, 221, 255);
		}
	</style>
</head>

<body>
	<?php include "con1.php"; ?>
	<?php include_once "function.php"; ?>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/fav.png"
							alt="">&nbsp;&nbsp;&nbsp;<b>SQUARE</b></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item submenu dropdown">
								<a href="index.php" class="nav-link">Home</a>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="shop1.php" class="nav-link">Shop</a>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="blog.php" class="nav-link">Blog</a>
							</li>
							<li class="nav-item submenu dropdown">
								<a class="nav-link"><b>Total Price:&nbsp;₹ <?php total_price(); ?></b></a>
							</li>
							<li class="nav-item active"><a class="nav-link text-info" href="profile.php">profile</a>
							</li>
							<li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item">
								<a href="cart.php" class="cart"><span
										class="ti-bag"></span><sup><b><?php cartitem(); ?></b></sup></a>
							</li>
							<!-- <li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li> -->
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">

							<?php
							if (!isset($_SESSION['Username'])) {
								echo "<li class='nav-item submenu dropdown'>
								<a class='nav-link'>Welcome</a>
							</li>";
							} else {
								echo "<li class='nav-item submenu dropdown'>
								<a class='nav-link'>Welcome: " . $_SESSION['Username'] . "</a>
							</li>";
							}

							if (!isset($_SESSION['Username'])) {
								echo "<li class='nav-item submenu dropdown'>
								<a href='signin.php' class='nav-link'>Login</a>
							</li>";
							} else {
								echo "<li class='nav-item submenu dropdown'>
								<a href='logout.php' class='nav-link'>LogOut</a>
							</li>";
							}
							?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
</body>
<!--****************************************************** End Header Area********************************************************************************************* -->



<?php include "con1.php"; ?>
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first" id="main-content">
				<h1>Contact Us</h1>
				<nav class="d-flex align-items-center">
					<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="contact.php">Contact</a>
				</nav>
			</div>
		</div>
	</div>
</section>


<section class="contact_area section_gap_bottom">
	<div class="container">
		<div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13"
			data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083"
			data-mlon="-74.1522848">
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="contact_info">
					<div class="info_item">
						<i class="lnr lnr-home"></i>
						<h6>California, United States</h6>
						<p>Santa monica bullevard</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-phone-handset"></i>
						<h6><a href="#">00 (440) 9865 562</a></h6>
						<p>Mon to Fri 9am to 6 pm</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-envelope"></i>
						<h6><a href="#">support@colorlib.com</a></h6>
						<p>Send us your query anytime!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<form class="row contact_form" action="contact.php" method="post" id="contactForm"
					novalidate="novalidate">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email"
								placeholder="Enter email address" onfocus="this.placeholder = ''"
								onblur="this.placeholder = 'Enter email address'">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="subject" name="subject"
								placeholder="Enter Subject" onfocus="this.placeholder = ''"
								onblur="this.placeholder = 'Enter Subject'">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea class="form-control" name="message" id="message" rows="1"
								placeholder="Enter Message" onfocus="this.placeholder = ''"
								onblur="this.placeholder = 'Enter Message'"></textarea>
						</div>
					</div>
					<div class="col-md-12 text-right">
						<button type="submit" class="primary-btn" href="contact.php">Send Message</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php include ("Footer.php"); ?>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		<?php if (!isset($_GET['page'])): ?>
			document.getElementById('main-content').scrollIntoView({ behavior: 'smooth' });
		<?php endif; ?>
	});
</script>