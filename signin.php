<?php
include 'con1.php'; // Ensure this file contains correct database connection settings
session_start();

if (isset($_SESSION['UID'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signin'])) {
        // Registration logic
        if (isset($_POST['Username'], $_POST['Email'], $_POST['Password'], $_POST['cPassword'])) {
            $un = mysqli_real_escape_string($con1, $_POST['Username']);
            $uad = mysqli_real_escape_string($con1, $_POST['add']);
            $uem = mysqli_real_escape_string($con1, $_POST['Email']);
            $up = mysqli_real_escape_string($con1, $_POST['Password']);
            $cp = mysqli_real_escape_string($con1, $_POST['cPassword']);

            $duplicate = mysqli_query($con1, "SELECT * FROM `login` WHERE `Username` = '$un' OR `Email` = '$uem'");
            if (mysqli_num_rows($duplicate) > 0) {
                echo "<script>alert('Username or Email has already been taken.');</script>";
            } else {
                if ($up === $cp) {
                    // Get user IP address
                    $user_ip = $_SERVER['REMOTE_ADDR'];
                    // Prepare and execute the insert query
                    $que = "INSERT INTO `login` (`Username`, `Address`, `Email`, `Password`, `cPassword`, `Uip`) VALUES (?, ?, ?, ?, ?, ?)";
                    if ($stmt = mysqli_prepare($con1, $que)) {
                        mysqli_stmt_bind_param($stmt, "ssssss", $un, $uad, $uem, $up, $cp, $user_ip);
                        if (mysqli_stmt_execute($stmt)) {
                            echo "<script>alert('Registration successful');</script>";
                        } else {
                            echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "');</script>";
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "<script>alert('Error preparing statement: " . mysqli_error($con1) . "');</script>";
                    }
                } else {
                    echo "<script>alert('Passwords do not match.');</script>";
                }
            }
        }
    } elseif (isset($_POST['login'])) {
        // Login logic
        if (isset($_POST['useremail'], $_POST['password'])) {
            $useremail = mysqli_real_escape_string($con1, $_POST['useremail']);
            $password = mysqli_real_escape_string($con1, $_POST['password']);

            $sql = "SELECT `UID`, `Username`, `Password` FROM `login` WHERE `Email` = ? OR `Username` = ?";
            if ($stmt = mysqli_prepare($con1, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $useremail, $useremail);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) > 0) {
                        mysqli_stmt_bind_result($stmt, $UID, $Username, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            if ($password === $hashed_password) {
                                $_SESSION["signin"] = true;
                                $_SESSION["ID"] = $UID;
                                $_SESSION["Username"] = $Username;

                                // Check cart items
                                include "function.php";
                                $user_ip = getIPAddress();
                                $select_cart_items = "SELECT * FROM `cart` WHERE `IP` = ?";
                                if ($stmt_cart = mysqli_prepare($con1, $select_cart_items)) {
                                    mysqli_stmt_bind_param($stmt_cart, "s", $user_ip);
                                    if (mysqli_stmt_execute($stmt_cart)) {
                                        mysqli_stmt_store_result($stmt_cart);
                                        $rows_count = mysqli_stmt_num_rows($stmt_cart);

                                        if ($rows_count > 0) {
                                            echo "<script>alert('You have items in the cart.');</script>";
                                            echo "<script>window.location.href = 'payment.php';</script>";
                                        } else {
                                            echo "<script>window.location.href = 'index.php';</script>";
                                        }
                                    } else {
                                        echo "<script>alert('Error checking cart items.');</script>";
                                    }
                                    mysqli_stmt_close($stmt_cart);
                                }
                            } else {
                                echo "<script>alert('Wrong password.');</script>";
                            }
                        }
                    } else {
                        echo "<script>alert('User not registered.');</script>";
                    }
                } else {
                    echo "<script>alert('Error executing query: " . mysqli_stmt_error($stmt) . "');</script>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing statement: " . mysqli_error($con1) . "');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Account.</title>
    <link href="cs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #415168;
        }

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

    <!--SIGNIN-->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST" autocomplete="off">
                <h1>Create Account</h1><br>
                <input type="text" placeholder="Username" name="Username" id="Username" required>
                <input type="text" placeholder="Address" name="add" id="add" required>
                <input type="email" placeholder="Email" name="Email" id="Email" required>
                <input type="password" placeholder="Password" name="Password" id="Password" maxlength="8" required>
                <input type="password" placeholder="Confirm Password" name="cPassword" id="cPassword" maxlength="8"
                    required><br>
                <button type="submit" name="signin">Sign In</button>
            </form>
        </div>
        <!-- login -->
        <div class="form-container sign-in-container">
            <form action="" method="POST" autocomplete="off">
                <h1>Log In</h1>
                <input type="email" placeholder="Email Here" name="useremail" id="useremail" required>
                <input type="password" placeholder="Password" name="password" id="password" maxlength="8" required>
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">LOGIN</button>
                <a href="enter_email.php">OR Login using OTP</a>
            </form>
        </div>
        <?php
        if (isset($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Your Account!</h1>
                    <p>LogIn here to Access your account</p>
                    <button class="ghost" id="signIn">LogIn</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Create Account!</h1>
                    <p>If you do not have one</p>
                    <button class="ghost" id="signUp">Sign In</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>Created by @ Square Shop</p>
    </footer>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>