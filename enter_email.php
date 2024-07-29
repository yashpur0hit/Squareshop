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
    <a href="index.php" class="top-left-button">Back To Home</a>
    <a href="signin.php" class="top-left-button">Back To Login Page</a>

    <form action="" method="POST" autocomplete="off">
        <h1 id="litheader">Enter Your Email</h1>
        <div class="inset">
            <p>
                <input type="email" placeholder="Enter your email" name="otp_email" id="otp_email" required>
            </p>
        </div>
        <div>
            <input type="submit" name="request_otp" value="Request OTP">
        </div>
        <?php
        include "con1.php";
        require 'vendor/autoload.php'; // Load Composer dependencies
        
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['request_otp'])) {
                $email = mysqli_real_escape_string($con1, $_POST['otp_email']);

                // Validate if email exists in the database
                $result = mysqli_query($con1, "SELECT `UID`, `Username` FROM `login` WHERE `Email` = '$email'");
                if (mysqli_num_rows($result) > 0) {
                    $otp = rand(100000, 999999); // Generate a 6-digit OTP
                    $_SESSION['otp'] = $otp;
                    $_SESSION['OTP_EMAIL'] = $email;

                    // Store OTP in the database
                    $otp_expiry = date('Y-m-d H:i:s', strtotime('+1 minute')); // OTP expires in 1 minute
                    $update_query = "UPDATE `login` SET `otp` = '$otp', `otp_expiry` = '$otp_expiry' WHERE `Email` = '$email'";
                    mysqli_query($con1, $update_query);

                    // Send OTP via email
                    $mail = new PHPMailer(true);
                    try {
                        // Server settings
                        $mail->isSMTP();
                        $mail->Host = 'smtp.mailtrap.io'; // Mailtrap SMTP server
                        $mail->SMTPAuth = true;
                        $mail->Username = 'c0dd23461fabeb'; // Your Mailtrap username
                        $mail->Password = '4e60c381c7b892'; // Your Mailtrap password
                        $mail->SMTPSecure = 'tls'; // TLS encryption
                        $mail->Port = 587; // Port for TLS
        
                        // Recipients
                        $mail->setFrom('no-reply@squareshop.com', 'Square Shop');
                        $mail->addAddress($email);

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = 'Your OTP Code';
                        $mail->Body = "Your OTP code is: <b>$otp</b>";

                        $mail->send();
                        echo "<script>alert('OTP has been sent to your email.');</script>";
                        header("Location: verify_otp.php"); // Redirect to OTP verification page
                        exit;
                    } catch (Exception $e) {
                        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
                    }
                } else {
                    echo "<script>alert('Email not found.');</script>";
                }
            }
        }
        ?>
    </form>
</body>

</html>