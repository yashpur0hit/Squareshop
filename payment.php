<?php session_start(); ?>
<?php include "con1.php"; ?>

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
            background-color: whitesmoke;
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
                        <?php
							if (!isset($_SESSION['Username'])) {
								echo "<li class='nav-item submenu dropdown'>
								<a class='nav-link'>Welcome: User</a>
							</li>";
							} else {
								echo "<li class='nav-item submenu dropdown'>
								<a href='#' class='nav-link'>Welcome ". $_SESSION['Username']."</a>
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
<!--****************************************************** End Header Area ***************************************************** -->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="order_box">
                    <h2>Your Order</h2>
                    <ul class="list">
                        <li><a href="#">Product <span>Total</span></a></li>
                        <li><a href="#">Fresh Blackberry <span class="middle">x 02</span> <span
                                    class="last">$720.00</span></a></li>
                        <li><a href="#">Fresh Tomatoes <span class="middle">x 02</span> <span
                                    class="last">$720.00</span></a></li>
                        <li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span
                                    class="last">$720.00</span></a></li>
                    </ul>
                    <ul class="list list_2">
                        <li><a href="#">Subtotal <span><?php ?></span></a></li>
                        <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
                        <li><a href="#">Total <span>$2210.00</span></a></li>
                    </ul>
                    <div class="payment_item">
                        <div class="radion_btn">
                            <input type="radio" id="f-option5" name="selector">
                            <label for="f-option5">Check payments</label>
                            <div class="check"></div>
                        </div>
                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                            Store Postcode.</p>
                    </div>
                    <div class="payment_item active">
                        <div class="radion_btn">
                            <input type="radio" id="f-option6" name="selector">
                            <label for="f-option6">Paypal </label>
                            <img src="img/product/card.jpg" alt="">
                            <div class="check"></div>
                        </div>
                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                            account.</p>
                    </div>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option4" name="selector">
                        <label for="f-option4">I’ve read and accept the </label>
                        <a href="#">terms & conditions*</a>
                    </div>
                    <a class="primary-btn" href="payment.php">Proceed to Paypal</a>
                </div>
            </div>
        </div>
    </div>
    <div class="center-container">
        <br><br><a class="primary-btn" href="cart.php" text-center>Continue Shopping/ Edit Cart</a>
    </div>
</section>
<?php include "Footer.php"; ?>