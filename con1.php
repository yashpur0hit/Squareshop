<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "ecom";
$con1 = mysqli_connect($server, $user, $pass, $db);

//connection
if ($con1) {
  echo "", "<br>";
} else {
  echo "Didn't Connect", "<br>";
}
// session_start();
?>


<!--//////// Validation ////////-->
