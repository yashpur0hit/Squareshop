<?php
include "con1.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['verify_otp'])) {
        $entered_otp = mysqli_real_escape_string($con1, $_POST['otp_code']);
        $email = $_SESSION['OTP_EMAIL'];

        // Fetch OTP and expiry from the database
        $result = mysqli_query($con1, "SELECT `UID`, `Username`, `OTP`, `OTP_Expiry` FROM `login` WHERE `Email` = '$email'");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stored_otp = $row['OTP'];
            $otp_expiry = $row['OTP_Expiry'];

            // Check if OTP matches and is not expired
            if ($entered_otp == $stored_otp && strtotime($otp_expiry) > time()) {
                // OTP is valid, set session and redirect
                $_SESSION["signin"] = true;
                $_SESSION["ID"] = $row["UID"];
                $_SESSION["Username"] = $row["Username"];

                // Redirect based on the cart items
                include "function.php";
                $user_ip = getIPAddress();
                $select_cart_items = "SELECT * FROM `cart` WHERE `IP`='$user_ip'";
                $result_cart = mysqli_query($con1, $select_cart_items);
                $rows_count = mysqli_num_rows($result_cart);

                if ($rows_count > 0) {
                    echo "<script>alert('You have items in the cart.');</script>";
                    echo "<script>";
                    if ($rows_count >= 1) {
                        echo "window.location.href = 'payment.php';";
                    } else {
                        echo "window.location.href = 'profile.php';";
                    }
                    echo "</script>";
                } else {
                    echo "<script>window.location.href = 'index.php';</script>";
                }

            } else {
                echo "<script>alert('Invalid or expired OTP.');</script>";
            }
        } else {
            echo "<script>alert('Invalid request.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="cs1.css" rel="stylesheet">
    <style>
        .top-left-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .top-left-button:hover {
            background-color: #ff3a12;
        }
    </style>
</head>

<body>
    <a href="signin.php" class="top-left-button">Back To Login Page</a>

    <div class="background-wrap">
        <div class="background"></div>
    </div>

    <form action="verify_otp.php" method="post">
        <h1>VERIFY OTP</h1>
        <div class="inset">
            <p>
                <input type="text" name="otp_code" id="otp_code" placeholder="Enter OTP" autocomplete="off" required>
            </p>
        </div>
        <div>
            <input type="submit" name="verify_otp" value="Verify OTP">
        </div>
    </form>
</body>

</html>