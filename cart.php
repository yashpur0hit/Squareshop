<?php session_start(); ?>
<?php include "header.php"; ?>
<section class="banner-area organic-breadcrumb">
    <!-- ... -->
</section>
<html>

<head>
    <style>
        .input-field-container {
            display: flex;
            align-items: center;
            margin-left: 10px;
            /* Space between payment button and input field */
        }

        .additional-info-input {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
            /* Space between input and submit button */
        }

        .submit-info-button {
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .submit-info-button:hover {
            background-color: #0056b3;
        }
    </style>


    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .button-container {
            text-align: right;
        }

        .button-container button {
            margin-left: 10px;
        }

        .table-container {
            width: 100%;
            /* Adjust the container width as needed */
            margin: 10px auto;
            /* Center the container */
            padding: 10px;
            border-radius: 8px;
            /* Rounded corners for the table container */
            box-shadow: 4px 4px 8px;
            /* Subtle shadow for better visibility */
        }

        .table {
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
            /* Full width within the container */
            border-collapse: separate;
            border-spacing: 3px 3px;
        }

        .table th {
            padding: 8px;
            text-align: center;
            border: 3px solid;
            border-color: black;
        }

        .table td {
            padding: 5px;
            text-align: center;
            border: 3px solid;
            border-color: black;
        }

        .table td {
            vertical-align: middle;
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
                <!-- Cart Table -->
                <table class="table table-bordered text-center">
                    <tbody>
                        <?php
                        $total = 0;
                        $discount_amount = 0;
                        $discounted_total = 0;
                        $discount_percentage = isset($_SESSION['discount_percentage']) ? $_SESSION['discount_percentage'] : 0;

                        $get_ip = getIPAddress();
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
                                        <th>For Delete</th>
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
                                    $cart_quantity = $cart_quantity_row['Quan'];
                                    $total_price = $product_price * $cart_quantity;
                                    $total += $total_price;
                                    ?>
                                    <tr>
                                        <td><?php echo $title; ?></td>
                                        <td><img src="<?php echo $image; ?>" alt="" class="cart_img"></td>
                                        <td>
                                            <input type="number" name="quan[<?php echo $product_id; ?>]"
                                                value="<?php echo $cart_quantity; ?>" class="form-input w-50" min="1">
                                        </td>
                                        <td><?php echo $total_price; ?></td>
                                        <td><input type="checkbox" name="remove[<?php echo $product_id; ?>]"> Select</td>
                                    </tr>
                                    <?php
                                }
                            }
                            $discount_amount = $total * ($discount_percentage / 100);
                            $discounted_total = $total - $discount_amount;
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart Is Empty</h2>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- ... -->
                <?php if ($result_count > 0): ?>
                    <div class="button-container">
                        <a href='shop1.php' class="text-success" style="text-decoration: underline;">Continue Shopping</a>
                        <button type="submit" name="update_all" class="bg-primary px-4 py-2 border-0 text-light">Update
                            Order</button>
                        <button type="submit" name="delete_all"
                            class="bg-danger px-4 py-2 border-0 text-light">Delete</button>
                    </div>
                <?php endif; ?>
            </form>
            <div>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'invalid_coupon') {
                        echo "<p class='text-danger'>Invalid Coupon Code!</p>";
                    } elseif ($_GET['error'] == 'coupon_used') {
                        echo "<p class='text-danger'>Coupon Code Already Used!</p>";
                    }
                }
                ?>
                <div>
                    <?php
                    if ($result_count > 0) {
                        echo "<h4 class='px-4'>Subtotal:&nbsp;<strong class='text-info'>₹ " . number_format($total, 2) . "</strong></h4>
                        <h4 class='px-4'>Discount ({$discount_percentage}%):&nbsp;<strong class='text-danger'>₹ -" . number_format($discount_amount, 2) . "</strong></h4>
                        <h4 class='px-4'>Total after Discount:&nbsp;<strong class='text-success'>₹ " . number_format($discounted_total, 2) . "</strong></h4><br>
                        <div class='checkout_btn_inner d-flex align-items-center'>
                            <a class='primary-btn' href='payment.php'>Proceed for Payment</a>
                            <div class='input-field-container'>
                                <form action='coupon.php' method='POST'>
                                    <input type='text' name='code' placeholder='Enter Coupon code' class='additional-info-input' maxlength=6>
                                    <button type='submit' name='cod' class='submit-info-button'>Submit</button>
                                </form>
                            </div>
                        </div><br>";
                    } else {
                        echo "<a href='shop1.php'><button class='bg-info px-3 py-2 border-0 mb-2'>Continue Shopping</button></a>";
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

    // Handle Delete All Selected
    if (isset($_POST['delete_all'])) {
        foreach ($_POST['remove'] as $product_id => $value) {
            if ($value) {
                $delete_query = "DELETE FROM `cart` WHERE `Pid` = '$product_id' AND `IP`='$get_ip'";
                mysqli_query($con1, $delete_query);
            }
        }
    }

    // Discard changes: Reset quantity to 1
    if (isset($_POST['discard_all'])) {
        foreach ($_POST['remove'] as $product_id => $value) {
            if ($value) {
                $update_cart = "UPDATE `cart` SET `Quan` = '1' WHERE `Pid` = '$product_id' AND `IP`='$get_ip'";
                mysqli_query($con1, $update_cart);
            }
        }
    }

    echo "<script>window.open('cart.php','_self')</script>";
}
?>