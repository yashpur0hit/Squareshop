<?php
include "con1.php";

//IP Address
function getIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//Displaying Cart Item
function cartitem()
{
    global $con1;
    if (isset($_GET['p'])) {
        $get_ip = getIPAddress();
        $select_query = "SELECT * FROM `cart` WHERE `IP`='$get_ip'";
        $result = mysqli_query($con1, $select_query);
        $no_cart = mysqli_num_rows($result);
    } else {
        $get_ip = getIPAddress();
        $select_query = "SELECT * FROM `cart` WHERE `IP`='$get_ip'";
        $result = mysqli_query($con1, $select_query);
        $no_cart = mysqli_num_rows($result);
    }
    echo $no_cart;
}

// Total Price 

function total_price()
{
    global $con1;
    $get_ip = getIPAddress();
    $total_price= 0;
    $cart_query = "SELECT * FROM `cart` WHERE `IP`='$get_ip'";
    $result = mysqli_query($con1, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['Pid'];
        $select_product = "SELECT * FROM `product` WHERE `PID`='$product_id'";
        $result_product = mysqli_query($con1, $select_product);
        while ($row_p = mysqli_fetch_array($result_product)) {
            $product_price = array($row_p['Price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}
?>