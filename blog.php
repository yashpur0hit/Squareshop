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
                            <li class="nav-item active"><a class="nav-link" href="blog.php">Blog</a></li>

                            <li class="nav-item submenu dropdown">
                                <a class="nav-link"><b>Total Price:&nbsp;₹ <?php total_price(); ?></b></a>
                            </li>
                            <li class="nav-item active"><a class="nav-link text-info" href="profile.php">profile</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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


<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first" id="main-content">
                <h1>Blog Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="blog.php">Blog</a>
                </nav>
            </div>
        </div>
    </div>
</section><br><br>
<!-- End Banner Area -->

<!--================Blog Categorie Area =================-->

<!--================Blog Categorie Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    <article class="row blog_item">
                        <div class="col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">Style,</a>
                                    <a class="active" href="#">Lifestyle,</a><br>
                                    <a class="active" href="#">Inovation,</a>
                                    <a href="#">Fashion</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li><a href="#">Mark wiens<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#">12 Dec, 2018<i class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                    <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="blog_post">
                                <img src="img/blog/main-blog/m-blog-2.jpg" alt="">
                                <div class="blog_details">
                                    <a href="blog.php">
                                        <h2>Were NIKE Run Better </h2>
                                    </a>
                                    <p>Running shoes are not just about style; they're designed to support your feet and
                                        improve your health while running. The cushioning in running shoes absorbs
                                        impact, reducing stress on joints and preventing injuries. Their lightweight
                                        design promotes better agility and endurance, allowing for longer and more
                                        comfortable runs. Additionally, running shoes provide stability, enhancing your
                                        balance and posture, which in turn supports a healthy spine. Investing in
                                        quality running shoes tailored to your gait and foot type can significantly
                                        contribute to your overall fitness and well-being.</p>
                                    <a href="blog.php" class="white_bg_btn">View More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="row blog_item">
                        <div class="col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">Food,</a>
                                    <a class="active" href="#">Technology,</a>
                                    <a href="#">Politics,</a>
                                    <a href="#">Lifestyle</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li><a href="#">Mark wiens<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#">12 Dec, 2018<i class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                    <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="blog_post">
                                <img src="img/blog/main-blog/m-blog-5.jpg" alt="">
                                <div class="blog_details">
                                    <a href="blog.php">
                                        <h2>Telescopes 101</h2>
                                    </a>
                                    <p>MCSE boot camps have its supporters and its detractors. Some people do not
                                        understand why you should have to spend money on boot camp when you can get
                                        the MCSE study materials yourself at a fraction.</p>
                                    <a href="single-blog.html" class="white_bg_btn">View More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <!-- src="img/blog/author.png" -->
                        <img class="author_img rounded-circle" alt="Hii">
                        <h4>Mahesh Bhai</h4>
                        <p>Senior blog writer</p>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                        <p>..............Loading................</p>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post1.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog.php">
                                    <h3>Space The Final Frontier</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post2.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog.php">
                                    <h3>The Amazing Hubble</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post3.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog.php">
                                    <h3>Astronomy Or Astrology</h3>
                                </a>
                                <p>03 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post4.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog.php">
                                    <h3>Asteroids telescope</h3>
                                </a>
                                <p>01 Hours ago</p>
                            </div>
                        </div>
                        <div class="br"></div>
                    </aside>
                </div>
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