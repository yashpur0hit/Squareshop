<?php include "con1.php";
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
            background-color: gainsboro;
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
    <?php
    if (isset($_SESSION['ID'])) {
        header("Location: index.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $useremail = $_POST['useremail'];
        $password = $_POST['password'];


        $sql = "SELECT `ID`, `Username` FROM `login` WHERE `Email` = ? AND `Password` = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ss", $useremail, $password);

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($ID, $Username);

                    if ($stmt->fetch()) {
                        $_SESSION["ID"] = $ID;
                        $_SESSION["Username"] = $Username;
                        // header("Location: checkout.php");
                        // exit;
                    }
                } else {
                    $error_message = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }

        $mysqli->close();
    }
    ?>
    <!--SIGNIN-->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="db.php" method="POST" autocomplete="off">
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
            <form action="db.php" method="POST" autocomplete="off">
                <h1>Log In</h1>
                <input type="email" placeholder="Email Here" name="useremail" id="useremail" required>
                <input type="password" placeholder="Password" name="password" id="password" maxlength="8" required>
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">LOGIN</button>
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
                    <p>If you not have one</p>
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