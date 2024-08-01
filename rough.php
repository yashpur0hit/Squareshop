<?php
include ('con1.php'); // Make sure this path is correct

// Define the query to fetch coupon data
$query = "SELECT code, discount_percentage, expiration_date FROM coupons";
$result = $con1->query($query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $con1->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupons List</title>
    <style>
        .coupon-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Space between coupon entries */
            padding: 20px;
        }

        .coupon {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <h1>Coupons List</h1>
    <div class="coupon-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($coupon = $result->fetch_assoc()): ?>
                <div class="coupon">
                    <span><strong>Code:</strong> <?php echo htmlspecialchars($coupon['code']); ?></span><br>
                    <span><strong>Discount:</strong> <?php echo htmlspecialchars($coupon['discount_percentage']); ?>%</span><br>
                    <span><strong>Expires:</strong> <?php echo htmlspecialchars($coupon['expiration_date']); ?></span>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="coupon">
                No coupons available
            </div>
        <?php endif; ?>
    </div>
</body>

</html>