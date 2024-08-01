<?php include "con1.php"; ?>
<!-- admin_coupon_management.php -->
<form action="create_coupon.php" method="POST">
    <label for="coupon_code">Coupon Code:</label>
    <input type="text" id="coupon_code" name="coupon_code" required><br>

    <label for="discount_percentage">Discount Percentage:</label>
    <input type="number" id="discount_percentage" name="discount_percentage" required min="0" max="100"><br>

    <label for="expiration_date">Expiration Date:</label>
    <input type="date" id="expiration_date" name="expiration_date" required><br>

    <button type="submit">Create Coupon</button>
</form>
