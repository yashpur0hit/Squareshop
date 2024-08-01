<?php
session_start();
include "con1.php";

if (isset($_POST['cod'])) {
    $code = mysqli_real_escape_string($con1, $_POST['code']);
    $query = "SELECT * FROM `coupons` WHERE `code` = '$code'";
    $result = mysqli_query($con1, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $discount_percentage = $row['discount_percentage'];

        // Set discount in session
        $_SESSION['discount_percentage'] = $discount_percentage;
        echo "<script>alert('Coupon applied successfully!'); window.location.href='cart.php';</script>";
    } else {
        echo "<script>alert('Invalid coupon code!'); window.location.href='cart.php';</script>";
    }
} else {
    echo "<script>window.location.href='cart.php';</script>";
}
?>