<?php session_start(); ?>
<?php include "header.php"; ?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first" id="main-content">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="cart.php">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->


<!--=====================Cart Area =======================-->
<html>

<head>
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .button-container {
            text-align: right;
            /* Aligns the buttons to the right */
        }

        .button-container button {
            margin-left: 10px;
            /* Adds space between buttons */
        }
    </style>
</head>

<body>
    <div class="bg-lightgray">
        <br>
        <h3 class="text-center text-primary">BUY Best Products From SQUARE SHOP</h3>
    </div><br>
    <div class="container">
        <div class="row">
            <form action="" method="POST" class="w-100">
                <table class="table table-bordered text-center">
                    <tbody>
                        <?php
                        $get_ip = getIPAddress();
                        $total = 0;
                        $cart_query = "SELECT * FROM `cart` WHERE `IP`='$get_ip'";
                        $result = mysqli_query($con1, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Delete / Discard</th>
                                       
                                    </tr>
                                </thead>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row["Pid"];
                                $select_products = "SELECT * FROM `product` WHERE `PID`='$product_id'";
                                $result_product = mysqli_query($con1, $select_products);
                                while ($row_P = mysqli_fetch_array($result_product)) {
                                    $product_price = $row_P['Price'];
                                    $title = $row_P['Pname'];
                                    $image = $row_P['Pimg'];
                                    // Fetch current quantity in cart
                                    $cart_quantity_query = "SELECT `Quan` FROM `cart` WHERE `Pid`='$product_id' AND `IP`='$get_ip'";
                                    $cart_quantity_result = mysqli_query($con1, $cart_quantity_query);
                                    $cart_quantity_row = mysqli_fetch_assoc($cart_quantity_result);
                                    $cart_quantity = $cart_quantity_row['Quan']; // Default to 1 if not set
                        
                                    $total_price = $product_price * $cart_quantity;
                                    $total += $total_price;
                                    ?>
                                    <tr>
                                        <td><?php echo $title ?></td>
                                        <td><img src="<?php echo $image ?>" alt="" class="cart_img"></td>
                                        <td>
                                            <input type="number" name="quan[<?php echo $product_id; ?>]"
                                                value="<?php echo $cart_quantity; ?>" class="form-input w-50" min="1">
                                        </td>
                                        <td><?php echo $product_price ?></td>
                                        <td><input type="checkbox" name="remove[<?php echo $product_id; ?>]"> Select</td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart Is Empty</h2>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Keep the existing buttons for each row -->
                <div class="button-container">
                    <button type="submit" name="update_all" class="bg-primary px-4 py-2 border-0 text-light">Update
                        Quantities</button>
                    <button type="submit" name="discard_all" class="bg-primary px-4 py-2 border-0 text-light">Discard
                        Changes</button>
                    <button type="submit" name="delete_all"
                        class="bg-danger px-4 py-2 border-0 text-light">Delete</button>
                </div>
            </form>
            <div>
                <?php
                $get_ip = getIPAddress();
                $cart_query = "SELECT * FROM `cart` WHERE `IP`='$get_ip'";
                $result = mysqli_query($con1, $cart_query);
                $result_count = mysqli_num_rows($result);
                if ($result_count > 0) {
                    echo "<h4 class='px-4'>Subtotal:&nbsp;<strong class='text-info'>₹ $total</strong></h4><br>
                <div class='checkout_btn_inner d-flex align-items-center'>
                    <a href='shop1.php'><button class='bg-info border-0 px-3 py-2 mb-2 text-light'>Continue Shopping</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class='primary-btn' href='payment.php'>Proceed for Payment</a>
                </div><br>";
                } else {
                    echo "<a href='shop1.php'><button class='bg-info px-3 py-2 boder-0 mb-2'>Continue Shopping</button></a>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if (!isset($_GET['page'])): ?>
            document.getElementById('main-content').scrollIntoView({ behavior: 'smooth' });
        <?php endif; ?>
    });
</script>
<!--====================Cart Area End=====================-->
<?php include ("Footer.php"); ?>

<!-- Process form submissions -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $get_ip = getIPAddress();

    // Handle Update All Quantities
    if (isset($_POST['update_all'])) {
        foreach ($_POST['quan'] as $product_id => $quantity) {
            $quantity = intval($quantity);
            if ($quantity > 0) {
                $update_cart = "UPDATE `cart` SET `Quan` = '$quantity' WHERE `Pid` = '$product_id' AND `IP`='$get_ip'";
                mysqli_query($con1, $update_cart);
            }
        }
    }

    // Handle Discard All Selected
    if (isset($_POST['delete_all'])) {
        foreach ($_POST['remove'] as $product_id => $value) {
            if ($value) {
                $discard_query = "DELETE FROM `cart` WHERE `Pid` = '$product_id' AND `IP`='$get_ip'";
                mysqli_query($con1, $discard_query);
            }
        }
    }

    //Discard changes
    if (isset($_POST['discard_all'])) {
        foreach ($_POST['remove'] as $product_id => $quantity) {
            // Reset quantity to 1
            $update_cart = "UPDATE `cart` SET `Quan` = '1' WHERE `Pid` = '$product_id' AND `IP`='$get_ip'";
            mysqli_query($con1, $update_cart);
        }
    }


    // // Handle Individual Item Updates
    // foreach ($_POST['update_cart'] as $product_id => $value) {
    //     if (isset($_POST['quan'][$product_id])) {
    //         $quantity = intval($_POST['quan'][$product_id]);
    //         $update_cart = "UPDATE `cart` SET `Quan` = '$quantity' WHERE `Pid` = '$product_id' AND `IP`='$get_ip'";
    //         mysqli_query($con1, $update_cart);
    //     }
    // }

    // // Handle Individual Item Discards
    // foreach ($_POST['discard_cart'] as $product_id => $value) {
    //     if ($value) {
    //         $discard_query = "DELETE FROM `cart` WHERE `Pid` = '$product_id' AND `IP`='$get_ip'";
    //         mysqli_query($con1, $discard_query);
    //     }
    // }

    echo "<script>window.open('cart.php','_self')</script>";
}
?>