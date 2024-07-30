<?php
session_start();
include "function.php";

if (isset($_POST['confirm_payment'])) {
    if (isset($_POST['orders']) && !empty($_POST['orders'])) {
        $order_ids = $_POST['orders'];
        $invoice_nos = [];
        $amounts = [];
        foreach ($order_ids as $order_id) {
            $select_query = "SELECT * FROM `orders` WHERE `order_id` = '$order_id'";
            $result_query = mysqli_query($con1, $select_query);
            $row_fetch = mysqli_fetch_assoc($result_query);
            $invoice_nos[] = $row_fetch['invoice_number'];
            $amounts[] = $row_fetch['amount_due'];

            // Update order status to complete
            $update_order = "UPDATE `orders` SET `status` = 'Complete' WHERE `order_id` = $order_id";
            mysqli_query($con1, $update_order);
        }
        $total_amount = array_sum($amounts);
        $invoices = implode(',', $invoice_nos);
    } else {
        echo "<h3 class='text-center text-dark'>No orders selected</h3>";
        exit;
    }
}

if (isset($_POST['process_payment'])) {
    $mode = $_POST['mode'];
    $total_amount = $_POST['total_amount'];
    $invoice_nos = $_POST['invoices'];
    $order_ids = $_POST['order_ids'];

    foreach (explode(',', $order_ids) as $order_id) {
        $confirm_payment = "INSERT INTO `confirm_payment` (`order_id`, `invoice_number`, `amount`, `payment_mode`) VALUES ('$order_id', '$invoice_nos', '$total_amount', '$mode')";
        mysqli_query($con1, $confirm_payment);
    }

    echo "<h3 class='text-center text-dark'>Payment Completed Successfully</h3>";
    echo "<script>window.open('profile.php', '_self');</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm_Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: rgb(13, 34, 68);
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
                <input type="hidden" name="invoices" value="<?php echo $invoice_nos; ?>">
                <input type="hidden" name="order_ids" value="<?php echo implode(',', $order_ids); ?>">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount"
                    value="₹&nbsp;<?php echo $total_amount; ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="mode" class="form-select w-50 m-auto ">
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>PayPal</option>
                    <option>COD (Cash On Delivery)</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-success py-2 px-4 border-0" value="Confirm Payment"
                    name="process_payment">
            </div>
        </form>
    </div>
</body>

</html>