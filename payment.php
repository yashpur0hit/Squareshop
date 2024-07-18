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
<html></html>
<section>
    <div>
        <a class="primary-btn" href="payment.php?UID=<?php echo $user_id ?>">Bill Payment </a>
    </div>
</section>
<!--================End Payment Area =================-->
<?php include "Footer.php"; ?>