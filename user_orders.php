<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            /* Bottom border for the table header */
        }
    </style>

</head>

<body>
    <?php

    $username = $_SESSION['Username'];
    $get_user = "SELECT * FROM `login` WHERE `Username` = '$username'";
    $result = mysqli_query($con1, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['UID'];
    // echo $user_id;
    ?>
    <h3 class="text-success mt-4">Your All Purchases.</h3>
    <table class="table table-bodered mt-4 mb-4 text-center">
        <thead class="bg-info text-dark">
            <tr>
                <th>SR.NO.</th>
                <th>Total Product</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Amount Due</th>
                <th>Completed/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-light text-dark">
            <?php
            $orders_detail = "SELECT * FROM `orders` WHERE `uid` = '$user_id'";
            $result_orders = mysqli_query($con1, $orders_detail);
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $oid = $row_orders['order_id'];
                $amount = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_no = $row_orders['invoice_number'];
                $date = $row_orders['date'];
                $status = $row_orders['status'];
                if ($status == 'pending') {
                    $status = 'Incomplete';
                } else {
                    $status = 'Complete';
                }
                $srno = 1;
                echo "<tr>
                            <td>$srno</td>
                            <td>$total_products</td>
                            <td>$invoice_no</td>
                            <td>$date</td>
                            <td>₹&nbsp;$amount/-</td>
                            <td>$status</td>";
                ?>
                <?php
                if ($status == "Complete") {
                    echo "<td>Paid</td>";
                } else {
                    echo "<td><a href='confirm.php?order_id=$oid' class='text-dark'>Confirm</a></td>
                                </tr>";
                }
                $srno++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>