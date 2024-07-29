<?php include "con1.php"; ?>


<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Account.</title>
    <link href="cs1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            /* background-color: gainsboro; */
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
        <div class="background-wrap">
<div class="background"></div>
</div>

<form id="accesspanel" action="login" method="post">
<h1 id="litheader">AECEND</h1>
<div class="inset">
  <p>
    <input type="text" name="username" id="email" placeholder="Email address">
  </p>
  <p>
    <input type="password" name="password" id="password" placeholder="Access code">
  </p>
  <div style="text-align: center;">
    <div class="checkboxouter">
      <input type="checkbox" name="rememberme" id="remember" value="Remember">
      <label class="checkbox"></label>
    </div>
    <label for="remember">Remember me for 14 days</label>
  </div>
  <input class="loginLoginValue" type="hidden" name="service" value="login" />
</div>
<p class="p-container">
  <input type="submit" name="Login" id="go" value="Authorize">
</p>
</form>

    </body>
</html>


<!-- Java Script -->
 <script>
$(document).ready(function() {

var state = false;

//$("input:text:visible:first").focus();

$('#accesspanel').on('submit', function(e) {

    e.preventDefault();

    state = !state;

    if (state) {
        document.getElementById("litheader").className = "poweron";
        document.getElementById("go").className = "";
        document.getElementById("go").value = "Initializing...";
    }else{
        document.getElementById("litheader").className = "";
        document.getElementById("go").className = "denied";
        document.getElementById("go").value = "Access Denied";
    }

});

});
</script>