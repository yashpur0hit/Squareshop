<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <style>
        body {
            background-color: rgb(215, 221, 255);
        }

        .table {
            width: 75%;
            margin: auto;
            border: 3px solid #000;
        }

        .table thead {
            border-bottom: 3px solid #000;
        }

        .pay-all-btn {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    // session_start(); // Ensure session is started
    // include 'function.php'; // Ensure your connection file is included
    
    $username = $_SESSION['Username'];
    $get_user = "SELECT * FROM `login` WHERE `Username` = '$username'";
    $result = mysqli_query($con1, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['UID'];
    ?>
    <h3 class="text-success mt-4">Your All Purchases</h3>
    <form action="confirm.php" method="POST">
        <table class="table table-bordered mt-4 mb-4 text-center">
            <thead class="bg-info text-dark">
                <tr>
                    <th>Select</th>
                    <th>SR.NO.</th>
                    <th>Total Product</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Amount Due</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody class="bg-light text-dark">
                <?php
                $empty_orders = "SELECT * FROM `orders` WHERE `order_id`";
                $result_empty = mysqli_query($con1, $empty_orders);
                $abc = mysqli_num_rows($result_empty);
                if ($abc < 0) {
                    echo "<h3>No Orders in Your Account.</h3>";
                } else {
                    $orders_detail = "SELECT * FROM `orders` WHERE `uid` = '$user_id'";
                    $result_orders = mysqli_query($con1, $orders_detail);
                    $srno = 1;
                    while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                        $oid = $row_orders['order_id'];
                        $amount = $row_orders['amount_due'];
                        $total_products = $row_orders['total_products'];
                        $invoice_no = $row_orders['invoice_number'];
                        $date = $row_orders['date'];
                        $status = $row_orders['status'];
                        if ($status == 'pending') {
                            $status = 'Incomplete';
                            echo "<tr>
                                    <td><input type='checkbox' name='orders[]' value='$oid'></td>
                                    <td>$srno</td>
                                    <td>$total_products</td>
                                    <td>$invoice_no</td>
                                    <td>$date</td>
                                    <td>₹&nbsp;$amount/-</td>
                                    <td>$status</td>
                                  </tr>";
                        } else {
                            echo "<tr>
                                    <td></td>
                                    <td>$srno</td>
                                    <td>$total_products</td>
                                    <td>$invoice_no</td>
                                    <td>$date</td>
                                    <td>₹&nbsp;$amount/-</td>
                                    <td>Complete</td>
                                  </tr>";
                        }
                        $srno++;
                    }
                }

                ?>
            </tbody>
        </table>
        <div class="pay-all-btn">
            <input type="submit" class="btn btn-success" value="Pay for Selected Orders" name="confirm_payment">
        </div>
    </form>
</body>

</html>