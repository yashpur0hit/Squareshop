<?php
include ('con1.php'); // Ensure this path is correct

header('Content-Type: application/json');

if (isset($_POST['coupon_code'])) {
    $coupon_code = $_POST['coupon_code'];

    // Fetch coupon details from the database
    $stmt = $pdo->prepare("SELECT discount_percentage FROM coupons WHERE code = ? AND expiration_date > NOW()");
    $stmt->execute([$coupon_code]);
    $coupon = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($coupon) {
        $discount_percentage = $coupon['discount_percentage'];
        $original_price = 15000; // This should be fetched dynamically from the database if applicable
        $discounted_price = $original_price * (1 - $discount_percentage / 100);

        echo json_encode([
            'success' => true,
            'discounted_price' => $discounted_price
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid or expired coupon code.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Coupon code not provided.'
    ]);
}
?>