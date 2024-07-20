<?php
include "con1.php";
if (isset($_GET['edit_account'])) {
    $user_session = $_SESSION['Username'];
    $select_query = "SELECT * FROM `login` WHERE `Username` = '$user_session'";
    $result_query = mysqli_query($con1, $select_query);
    if ($result_query) {
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch["UID"];
        $user_name = $row_fetch["Username"];
        $user_add = $row_fetch["Address"];
        $user_email = $row_fetch["Email"];
    } else {
        echo "Error fetching user data: " . mysqli_error($con1);
    }
}

if (isset($_POST["update"])) {
    $update_id = $user_id;
    $user_name = $_POST["user_name"];
    $user_add = $_POST["user_add"];
    $user_email = $_POST["user_email"];
    
    // Check for duplicates
    $duplicate_query = "SELECT * FROM `login` WHERE (`Username` = '$user_name' OR `Email` = '$user_email') AND `UID` != '$update_id'";
    $duplicate_result = mysqli_query($con1, $duplicate_query);
    
    if (mysqli_num_rows($duplicate_result) > 0) {
        echo "<script>alert('Username or Email has already been taken.');</script>";
    } else {
        // Perform the update if no duplicates are found
        $update_account = "UPDATE `login` SET `Username` = '$user_name', `Address` = '$user_add', `Email` = '$user_email' WHERE `UID` = '$update_id'";
        $result_update = mysqli_query($con1, $update_account);

        if ($result_update) {
            echo "<script>alert('Data Updated Successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        } else {
            echo "<script>alert('Error updating data: " . mysqli_error($con1) . "')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="POST">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_name"
                value="<?php echo htmlspecialchars($user_name); ?>" autocomplete="off">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_add"
                value="<?php echo htmlspecialchars($user_add); ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_email"
                value="<?php echo htmlspecialchars($user_email); ?>" autocomplete="off">
        </div>
        <input type="submit" class="bg-primary py-1 px-4 border-0" name="update" value="Update">
    </form>
</body>

</html>