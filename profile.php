<?php session_start();
include "con1.php";
include "function.php"; ?>
<!-- ************************************ Start Header Area ***********************************-->
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
                            <li class="nav-item active"><a class="nav-link text-info" href="index.php">Home</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="profile.php?my_orders" class="nav-link">My Orders</a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="profile.php?pending_orders" class="nav-link">Pending Orders</a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="profile.php?edit_account" class="nav-link">Edit Account</a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="profile.php?delete_account" class="nav-link text-danger">Delete Account</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <!-- <li class="nav-item">
                                <a href="cart.php" class="cart"><span
                                        class="ti-bag"></span><sup><b><?php cartitem(); ?></b></sup></a>
                            </li> -->
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
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
    <!--****************************************************** End Header Area********************************************************************************************* -->
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Your Profile</h1>
                    <nav class="d-flex align-items-center">
                        <a href>Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href>Profile</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <h1 class="text-center text-primary mt-4">Welcome To Square Shop</h1>
    <!-- <h2 class="text-center text-danger mt-4">Your Order Details</h2> -->
    <div class="text-center">
        <?php order_details();
        if (isset($_GET["edit_account"])) {
            include "edit_account.php";
        }
        if (isset($_GET["my_orders"])) {
            include "user_orders.php";
        }
        ?>
    </div>
</body>

</html>
<!-- End Banner Area -->
<?php include "Footer.php"; ?>