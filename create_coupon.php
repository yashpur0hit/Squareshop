<?php
include ('con1.php'); // Make sure this path is correct

if (isset($_POST['coupon_code'], $_POST['discount_percentage'], $_POST['expiration_date'])) {
    $coupon_code = $_POST['coupon_code'];
    $discount_percentage = $_POST['discount_percentage'];
    $expiration_date = $_POST['expiration_date'];

    // Validate inputs
    if ($discount_percentage < 0 || $discount_percentage > 100) {
        echo 'Invalid discount percentage.';
        exit;
    }

    // Insert coupon into the database
    $query = "INSERT INTO coupons (code, discount_percentage, expiration_date) VALUES (?, ?, ?)";
    $stmt = $con1->prepare($query);
    $stmt->execute([$coupon_code, $discount_percentage, $expiration_date]);

    echo 'Coupon created successfully.';
}
?>