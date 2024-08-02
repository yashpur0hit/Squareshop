<?php
session_start();
include "con1.php";

if (isset($_POST['cod'])) {
    $code = mysqli_real_escape_string($con1, $_POST['code']);
    $user_id = $_SESSION['user_id']; // Ensure the user is logged in and the ID is stored in session

    // Check if the coupon has already been used by the user
    $check_usage = "SELECT * FROM coupon_usage WHERE user_id = '$user_id' AND coupon_code = '$code'";
    $usage_result = mysqli_query($con1, $check_usage);

    if (mysqli_num_rows($usage_result) > 0) {
        echo "<script>alert('You have already used this coupon.'); window.location.href='cart.php';</script>";
        exit();
    }

    // Validate the coupon code
    $query = "SELECT * FROM `coupons` WHERE `code` = '$code'";
    $result = mysqli_query($con1, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $discount_percentage = $row['discount_percentage'];

        // Store discount in session
        $_SESSION['discount_percentage'] = $discount_percentage;

        // Update cart with discounted prices
        $cart_query = "SELECT * FROM `cart` WHERE `IP`='$get_ip'";
        $cart_result = mysqli_query($con1, $cart_query);

        while ($cart_row = mysqli_fetch_array($cart_result)) {
            $product_id = $cart_row["Pid"];
            $quantity = $cart_row["Quan"];

            $product_query = "SELECT `Price` FROM `product` WHERE `PID`='$product_id'";
            $product_result = mysqli_query($con1, $product_query);
            $product_row = mysqli_fetch_assoc($product_result);
            $price = $product_row['Price'];

            // Calculate the discounted price
            $discounted_price = $price - ($price * ($discount_percentage / 100));
            $total_price = $discounted_price * $quantity;

            // Update cart with the discounted price
            $update_cart = "UPDATE `cart` SET `Total_Price` = '$total_price' WHERE `Pid` = '$product_id' AND `IP`='$get_ip'";
            mysqli_query($con1, $update_cart);
        }

        // Record the coupon usage
        $order_id = ''; // Get the current order ID if available
        $insert_usage = "INSERT INTO coupon_usage (user_id, coupon_code, order_id) VALUES ('$user_id', '$code', '$order_id')";
        mysqli_query($con1, $insert_usage);

        echo "<script>alert('Coupon applied successfully!'); window.location.href='cart.php';</script>";
    } else {
        echo "<script>alert('Invalid coupon code!'); window.location.href='cart.php';</script>";
    }
} else {
    echo "<script>window.location.href='cart.php';</script>";
}
?>