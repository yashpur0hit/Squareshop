<style>
    /* Add your CSS for the logout message box here */
    #logout-message {
        display: none;
        /* Hide the message by default */
        background-color: rgb(255, 192, 140);
        /* Light green background */
        color: rgb(0, 0, 0);
        /* Dark green text */
        /* border: 1px solid rgb(0, 0, 0); */
        /* Light green border */
        padding: 10px;
        margin: 20px auto;
        /* Center the message box */
        width: fit-content;
        /* Adjust the width based on content */
        border-radius: 5px;
        /* Rounded corners */
        font-size: 14px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        position: fixed;
        /* Fix the position relative to the viewport */
        top: 60px;
        /* Adjust the top distance from the viewport */
        left: 20%;
        /* Center the box horizontally */
        transform: translateX(-50%);
        /* Adjust horizontal alignment */
        z-index: 1000;
        /* Ensure it is on top of other elements */
    }
</style>


<?php session_start(); ?>
<?php
include "con1.php";
?>

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
                            <li class="nav-item active"><a class="nav-link" href="shop1.php">Shop</a></li>

                            <li class="nav-item submenu dropdown">
                                <a href="blog.php" class="nav-link">Blog</a>
                            </li>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page1</title>
    <!-- Include any CSS or stylesheets here -->
</head>

<body>

    <!-- Include header and any other necessary PHP files -->
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb" id="banner-section">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first" id="main-content">
                    <h1>Product Variety</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="shop1.php">Pick Your Choice</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Budget Range</div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>$</span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>$</span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 6</option>
                        </select>
                    </div>
                </div>
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <?php
                        // Pagination logic
                        $limit = 6; // Number of products per page
                        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number from URL
                        $offset = ($page - 1) * $limit; // Offset for SQL query
                        
                        $query = "SELECT * FROM `product` LIMIT $limit OFFSET $offset";
                        $result = $con1->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-lg-4 col-md-6">';
                                echo '<div class="single-product">';
                                echo '<img class="img-fluid" src="' . $row['Pimg'] . '" alt="' . $row['Pname'] . '">';
                                echo '<div class="product-details">';
                                echo '<h6>' . $row['Pname'] . '</h6>';
                                echo '<h7>' . $row['Decp'] . '</h7>';
                                echo '<div class="price">';
                                echo '<h6>₹' . $row['Price'] . '</h6>';
                                echo '</div>';
                                //********************CART********************
                                echo '<div class="prd-bottom">';
                                echo '<a href="?p=' . $row['PID'] . '" class="social-info">';
                                echo '<span class="ti-bag"></span>';
                                echo '<p class="hover-text">add to bag</p>';
                                echo '</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="col-lg-12">';
                            echo '<p>No products found.</p>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </section>
                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    // Count total number of products
                    $total_query = "SELECT COUNT(*) as total FROM `product`";
                    $total_result = $con1->query($total_query);
                    $total_row = $total_result->fetch_assoc();
                    $total_products = $total_row['total'];

                    // Calculate total pages
                    $total_pages = ceil($total_products / $limit);

                    // Render pagination links
                    if ($total_pages > 1) {
                        if ($page > 1) {
                            echo '<a href="shop1.php?page=' . ($page - 1) . '" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>';
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $page) {
                                echo '<a href="shop1.php?page=' . $i . '" class="active">' . $i . '</a>';
                            } else {
                                echo '<a href="shop1.php?page=' . $i . '">' . $i . '</a>';
                            }
                        }
                        if ($page < $total_pages) {
                            echo '<a href="shop1.php?page=' . ($page + 1) . '" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
                        }
                    }
                    ?>
                </div>
                <!-- End Pagination -->
            </div>
        </div>
    </div>

    <!--====================Cart Function=====================-->
    <?php
    include_once 'con1.php';
    include_once 'function.php';
    function cart()
    {
        global $con1;
        getIPAddress();
        if (isset($_GET['p'])) {

            $get_ip = getIPAddress();
            $get_product_id = $_GET['p'];
            $select_query = "SELECT * FROM `cart` WHERE `Pid`=$get_product_id";
            $result = mysqli_query($con1, $select_query);
            $no_row = mysqli_num_rows($result);

            if ($no_row > 0) {
                echo '<div id="logout-message">Item Exist inside the Cart.</div>';
                // echo "<script>window.open('shop1.php','_self')</script>";
            } else {
                $insert = "INSERT INTO `cart` (Pid, IP) VALUES ('$get_product_id','$get_ip')";
                $result = mysqli_query($con1, $insert);
                echo '<div id="logout-message">Item Added to Cart.</div>';
                // echo "<script>window.open('shop1.php','_self')</script>";
            }
        }
    }
    cart();
    ?>
    <!-- ==================Cart Function Ends=================-->



    <!-- Start related-product Area -->
    <section class="related-product-area section_gap">
        <div class="container">
            <!-- Related products or deals section can be added here -->
        </div>
    </section>
    <!-- End related-product Area -->

    <!-- Include footer -->
    <?php include "Footer.php"; ?>

    <!-- Scroll to main content -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if (!isset($_GET['page'])): ?>
                document.getElementById('main-content').scrollIntoView({ behavior: 'smooth' });
            <?php endif; ?>
        });
    </script>

<script>
        // Check if the logout message is present
        window.onload = function () {
            var logoutMessage = document.getElementById('logout-message');
            if (logoutMessage) {
                // Show the logout message
                logoutMessage.style.display = 'block';
                // Hide the logout message after 2-4 seconds
                setTimeout(function () {
                    logoutMessage.style.display = 'none';
                }, 800); // 1000 milliseconds = 1 seconds
            }
        };
    </script>

</body>

</html>

<?php
// Close the database connection at the end of the file
mysqli_close($con1);
?>