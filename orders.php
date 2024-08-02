<?php
session_start();
include "con1.php";
include "function.php";

if (isset($_GET['User_ID'])) {
    $user_id = $_GET['User_ID'];
}
$order_ip = getIPAddress();
$total_price = 0;
$discount_percentage = isset($_SESSION['discount_percentage']) ? $_SESSION['discount_percentage'] : 0;

// Query to get cart items for the specific IP
$cart_query_price = "SELECT * FROM `cart` WHERE `IP` = '$order_ip'";
$result_cart_price = mysqli_query($con1, $cart_query_price);
$no_product = mysqli_num_rows($result_cart_price);

// Generate invoice number and set status
$invoice = mt_rand();
$status = 'pending';

while ($row = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row["Pid"];
    $quantity = $row["Quan"];
    // If quantity is zero or not set, set it to 1
    if ($quantity == 0) {
        $quantity = 1;
    }

    // Query to get the product details
    $total_products = "SELECT * FROM `product` WHERE `PID` = $product_id";
    $products = mysqli_query($con1, $total_products);

    while ($row_product = mysqli_fetch_array($products)) {
        $price = $row_product['Price'];
        $product_price = $price * $quantity;
        $total_price += $product_price;
    }

    // Insert into pending orders for each product
    $pending_orders = "INSERT INTO `pending_order` (`uid`, `invoice_number`, `pid`, `quantity`, `status`) VALUES ('$user_id', '$invoice', '$product_id', '$quantity', '$status')";
    $result_pending_order = mysqli_query($con1, $pending_orders);
}

// Calculate subtotal and discounted total
$subtotal = $total_price;
$discount_amount = $subtotal * ($discount_percentage / 100);
$discounted_total = $subtotal - $discount_amount;

// Insert the order with the discounted total
$insert_order = "INSERT INTO `orders` (`uid`, `amount_due`, `invoice_number`, `total_products`, `date`, `status`) VALUES ('$user_id', '$discounted_total', '$invoice', '$no_product', NOW(), '$status')";
$result_query = mysqli_query($con1, $insert_order);

// Delete items from cart after placing the order
$empty_cart = "DELETE FROM `cart` WHERE `IP` ='$order_ip'";
mysqli_query($con1, $empty_cart);

if ($result_query) {
    echo "<script>alert('Orders Placed Successfully.')</script>";
    echo "<script>window.location.href = 'profile.php';</script>";
}
?>