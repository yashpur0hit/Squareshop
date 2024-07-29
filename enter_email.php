<?php include "con1.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Account</title>
    <link href="cs1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .top-left-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #ff5d34;
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
    <a href="index.php" class="top-left-button">Back To Home</a>
    <a href="signin.php" class="top-left-button">Back To Login Page</a>

    <form action="request_otp.php" method="POST" autocomplete="off">
        <h1 id="litheader">Enter Your Email</h1>
        <div class="inset">
            <p>
                <input type="email" placeholder="Enter your email" name="otp_email" id="otp_email" required>
            </p>
        </div>
        <div>
            <input type="submit" name="request_otp" value="Request OTP">
        </div>
    </form>
</body>

</html>