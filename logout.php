<!-- <html>

<head>
    <style>
        body {
            text-align: center;
            background-color: lightsteelblue;
        }
    </style>

</head>

<body> -->
<?php
// include "con1.php";
// // include "db.php";
// session_start();
// session_unset();
// session_destroy();
// echo "<h1>Logged out successfully.<br><br></h1";
// echo "<div>";
// echo "<a href= 'signin.php'>For Login click here.</a><br><br>";
// echo "<a href= 'index.php'>To the Home Page.</a>";
// echo "</div>";
?>
<!-- </body>

</html> -->

<?php
session_start();
session_unset();
session_destroy();
// echo "<script>window.open('index.php','_self')</script>";
header("Location: index.php?logout=success");
exit();
?>










