<?php
include 'con1.php'; // Ensure this file contains correct database connection settings
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signin'])) {
        // Registration logic
        if (isset($_POST['Username'], $_POST['Email'], $_POST['Password'], $_POST['cPassword'])) {
            $un = mysqli_real_escape_string($con1, $_POST['Username']);
            $uem = mysqli_real_escape_string($con1, $_POST['Email']);
            $up = mysqli_real_escape_string($con1, $_POST['Password']);
            $cp = mysqli_real_escape_string($con1, $_POST['cPassword']);

            $duplicate = mysqli_query($con1, "SELECT * FROM `login` WHERE `Username` = '$un' OR Email = '$uem'");
            if (mysqli_num_rows($duplicate) > 0) {
                echo "<script>alert('Username or Email has already been taken.');</script>";
            } else {
                if ($up === $cp) {
                    // Get user IP address
                    $user_ip = $_SERVER['REMOTE_ADDR'];
                    // Prepare and execute the insert query
                    $que = "INSERT INTO `login` (`Username`, `Email`, `Password`, `cPassword`, `Uip`) VALUES (?, ?, ?, ?, ?)";
                    if ($stmt = mysqli_prepare($con1, $que)) {
                        mysqli_stmt_bind_param($stmt, "sssss", $un, $uem, $up, $cp, $user_ip);
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

            $ans = mysqli_query($con1, "SELECT `UID`, `Username`, `Password` FROM `login` WHERE Email = '$useremail' OR Username = '$useremail'");
            
            if (mysqli_num_rows($ans) > 0) {
                $raw = mysqli_fetch_assoc($ans);
                if ($password == $raw["Password"]) {
                    $_SESSION["signin"] = true;
                    $_SESSION["ID"] = $raw["UID"]; // Fixed column name from 'ID' to 'UID'
                    $_SESSION["Username"] = $raw["Username"];

                    // Check cart items
                    include "function.php";
                    $user_ip = getIPAddress();
                    $select_cart_items = "SELECT * FROM `cart` WHERE `IP`='$user_ip'";
                    $result_cart = mysqli_query($con1, $select_cart_items);
                    $rows_count = mysqli_num_rows($result_cart);

                    if ($rows_count > 0) {
                        echo "<script>alert('You have items in the cart.');</script>";
                        if ($rows_count == 1) {
                            echo "<script>window.open('profile.php','_self')</script>";
                        } else {
                            echo "<script>window.open('profile.php','_self')</script>";
                        }
                    } else {
                        echo "<script>window.open('index.php','_self')</script>";
                    }

                } else {
                    echo "<script>alert('Wrong password.');</script>";
                }
            } else {
                echo "<script>alert('User not registered.');</script>";
            }
        }
    }
}
?>



<?php
// include 'con1.php'; // Ensure this file contains correct database connection settings
// session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['signin'])) {
//         // Registration logic
//         if (isset($_POST['Username'], $_POST['Email'], $_POST['Password'], $_POST['cPassword'])) {
//             $un = mysqli_real_escape_string($con1, $_POST['Username']);
//             $uem = mysqli_real_escape_string($con1, $_POST['Email']);
//             $up = mysqli_real_escape_string($con1, $_POST['Password']);
//             $cp = mysqli_real_escape_string($con1, $_POST['cPassword']);

//             $duplicate = mysqli_query($con1, "SELECT * FROM `login` WHERE `Username` = '$un' OR Email = '$uem'");
//             if (mysqli_num_rows($duplicate) > 0) {
//                 echo "<script>alert('Username or Email has already been taken.');</script>";
//             } else {
//                 if ($up === $cp) {
//                     // Get user IP address
//                     $user_ip = $_SERVER['REMOTE_ADDR'];
//                     // Prepare and execute the insert query
//                     $que = "INSERT INTO `login` (`Username`, `Email`, `Password`, `cPassword`, `Uip`) VALUES (?, ?, ?, ?, ?)";
//                     if ($stmt = mysqli_prepare($con1, $que)) {
//                         mysqli_stmt_bind_param($stmt, "sssss", $un, $uem, $up, $cp, $user_ip);
//                         if (mysqli_stmt_execute($stmt)) {
//                             echo "<script>alert('Registration successful');</script>";
//                         } else {
//                             echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "');</script>";
//                         }
//                         mysqli_stmt_close($stmt);
//                     } else {
//                         echo "<script>alert('Error preparing statement: " . mysqli_error($con1) . "');</script>";
//                     }
//                 } else {
//                     echo "<script>alert('Passwords do not match.');</script>";
//                 }
//             }
//             ////////////// cart iteam checking /////////////////
//         }
//         // Login logic
//     } elseif (isset($_POST['login'])) {
//         if (isset($_POST['useremail'], $_POST['password'])) {
//             $useremail = mysqli_real_escape_string($con1, $_POST['useremail']);
//             $password = mysqli_real_escape_string($con1, $_POST['password']);

//             $ans = mysqli_query($con1, "SELECT `UID`, `Username`, `Password` FROM `login` WHERE Email = '$useremail' OR Username = '$useremail'");
//             ///////////////////////
//             // if (mysqli_num_rows($ans) > 0) {
//             //     $raw = mysqli_fetch_assoc($ans);
//             //     if ($password == $raw["Password"]) {
//             //         $_SESSION["signin"] = true;
//             //         $_SESSION["ID"] = $raw["UID"]; // Fixed column name from 'ID' to 'UID'
//             //         $_SESSION["Username"] = $raw["Username"];
//             //     } else {
//             //         echo "<script>alert('Wrong password.');</script>";
//             //     }
//             // } else {
//             //     echo "<script>alert('User not registered.');</script>";
//             // }
//             //  cart item checking
//             include "function.php";
//             $user_ip = getIPAddress();
//             $select_cart_iteam = "SELECT * FROM `cart` WHERE `IP`='$user_ip'";
//             $result_cart = mysqli_query($con1, $select_cart_iteam);
//             $rows_count = mysqli_fetch_assoc($result_cart);
//             if ($rows_count > 0) {
//                 $_SESSION['Username'] = $un;
//                 if (mysqli_num_rows($ans) > 0) {
//                     $raw = mysqli_fetch_assoc($ans);
//                     if ($password == $raw["Password"]) {
//                         $_SESSION["signin"] = true;
//                         $_SESSION["ID"] = $raw["UID"]; // Fixed column name from 'ID' to 'UID'
//                         $_SESSION["Username"] = $raw["Username"];

//                         if ($rows_count == 1 and $rows_count == 0) {
//                             $_SESSION['Username'] = $un;
//                             echo "<script>alert('You have item inside the cart')</script>";
//                             echo "<script>window.open('profile.php','_self')</script>";
//                         } else {
//                             $_SESSION["Username"] = $un;
//                             echo "<script>alert('You have item inside the cart')</script>";
//                             echo "<script>window.open('profile.php','_self')</script>";
//                         }
//                     } else {
//                         echo "<script>alert('Wrong password.');</script>";
//                     }
//                 } else {
//                     echo "<script>alert('User not registered.');</script>";
//                 }
//             } else {
//                 echo "<script>window.open('index.php','_self')</script>";
//             }

//         }
//     }
// }
?>

<html>

<head>
    <style>
        body {
            text-align: center;
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <br><br><br><br><br><br><br>
    <a href="signin.php">
        <h1>To The Registeration Page</h1>
    </a>
</body>

</html>