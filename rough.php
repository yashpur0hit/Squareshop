<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-14">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" method="POST" novalidate="novalidate">
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                                required>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" name="first" placeholder="First Name"
                                required>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="last" name="last" placeholder="Last name"
                                required>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number" placeholder="Phone number"
                                required maxlength="10">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address"
                                required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add" name="add" placeholder="Address" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="pin" name="pin" placeholder="PINCODE" required
                                maxlength="6" settype="INTEGER">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                                <input type="checkbox" id="f-option3" name="selector">
                                <label for="f-option3">Ship to a different address?</label>
                            </div>
                            <textarea class="form-control" name="message" id="message" rows="1"
                                placeholder="Order Notes"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a class="primary-btn" href="payment.php" type="submit" text-center>Proceed to Payment</a>
    </div>
</section>

<?php
// if (isset($_POST['payment'])) {

//     $uname = $_POST['username'];
//     $fname = $_POST['first'];
//     $lname = $_POST['last'];
//     $phno = $_POST['number'];
//     $email = $_POST['email'];
//     $add = $_POST['add'];
//     $pin = $_POST['pin'];
//     $abc = "INSERT INTO `checkout` (`username`, `fname`, `lname`, `pno`, `email`, `address`, `pin`)
//         VALUES ('$uname', '$fname', '$lname', '$phno','$email', '$add', '$pin')";
//         $xyz = mysqli_query($con1, $abc);
// }
?>

<?php
session_start();
include "con1.php";
// Redirect based on session status
if (!isset($_SESSION['Username'])) {
    header("Location: signin.php");
}
?>