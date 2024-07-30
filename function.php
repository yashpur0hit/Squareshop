<?php
include "con1.php";

//  IP Address
function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// Displaying Cart Item
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
    $total_price = 0;
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
// User Order Details

function order_details()
{
    global $con1;
    $username = $_SESSION['Username'];
    $get_details = "SELECT * FROM `login` WHERE `Username` = '$username'";
    $result_query = mysqli_query($con1, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['UID'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['my_orders'])) {
                    $get_orders = "SELECT * FROM `orders` WHERE `uid` = $user_id AND `status`='pending'";
                    $result_orders = mysqli_query($con1, $get_orders);
                    $row_count = mysqli_num_rows($result_orders);
                    if ($row_count > 0) {
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have<span class='text-danger'>&nbsp;$row_count&nbsp;</span>pending orders.</h3>
                            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    } else {
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have No Pending orders.</h3>
                        <p class='text-center'><a href='index.php' class='text-dark'>Explore More Products.</a></p>";
                    }
                }
            }

        }
    }

}

// function user_id()
// {
//     if (isset($_SESSION['Username'])) {
//         global $con1;
//         $query = "SELECT `UID` FROM `login`";
//         $result = mysqli_query($con1, $query);
//         $ans = mysqli_num_rows($result);
//         if($ans){}
//         $query2 = "INSERT INTO `cart` WHERE `uid` = $result";
//         $result2 = mysqli_query($con1, $query2);
//         if ($result2){}
//     }
// }
?>