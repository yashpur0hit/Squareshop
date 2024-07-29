<?php
include "con1.php";
require 'vendor/autoload.php'; // Load Composer dependencies

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['request_otp'])) {
        $email = mysqli_real_escape_string($con1, $_POST['otp_email']);

        // Validate email exists in the database
        $result = mysqli_query($con1, "SELECT `UID`, `Username` FROM `login` WHERE `Email` = '$email'");
        if (mysqli_num_rows($result) > 0) {
            $otp = rand(100000, 999999); // Generate a 6-digit OTP
            $_SESSION['OTP'] = $otp;
            $_SESSION['OTP_EMAIL'] = $email;

            // Store OTP in the database
            $otp_expiry = date('Y-m-d H:i:s', strtotime('+10 minutes')); // OTP expires in 10 minutes
            $update_query = "UPDATE `login` SET `OTP` = '$otp', `OTP_Expiry` = '$otp_expiry' WHERE `Email` = '$email'";
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
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

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