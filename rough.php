<?php
include('con1.php'); // Ensure this path is correct

header('Content-Type: application/json');

// Fetch coupon details from the database
$stmt = $con1->query("SELECT code, discount_percentage, expiration_date FROM coupons WHERE expiration_date > NOW()");
$coupons = mysqli_fetch_assoc($stmt);

echo json_encode($coupons);
?>
