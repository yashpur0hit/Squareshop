<?php
session_start();
include "con1.php";
// Redirect based on session status
if (!isset($_SESSION['Username'])) {
    header("Location: signin.php");
}
?>
<?php include "header.php"; ?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Payment</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="pSayment.php">Payment</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<?php
$user_ip = getIPAddress();
$get_user = "SELECT * FROM `login` WHERE `Uip`='$user_ip'";
$result = mysqli_query($con1, $get_user);
$run = mysqli_fetch_array($result);
$user_id = $run['UID'];
?>
<!--================Payment Area =================-->
<html>

<head>

    <style>
        body {
            background-color: lightslategray;
        }

        img {
            width: 50%;
        }
    </style>
</head>

<body>
    <section>
        <div class="container"><br>
            <h1 class="text-center">Payment Options</h1>
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-md-6">
                    <a href="https://www.npci.org.in" target="_blank"><img src="upi logo.jpg" alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="orders.php?User_ID=<?php echo $user_id; ?>">
                        <h2 class="text-center text-primary"><b>Payment Offline</b></h2>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--================End Payment Area =================-->
    <!-- start footer Area -->
    <footer class="footer-area">
        <div class="container">
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script> All rights reserved | Made with Square <i
                        class="" aria-hidden="true"></i>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>