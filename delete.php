<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>

<body>
<h2 class="text-center">----------------------------------------------------------------------------</h2>

    <h3 class="text-danger text-center mb-4">Delete Account</h3>
    <form action="" method="POST" class="mt-5">
        <div class="form-outline w-50 m-auto">
            <input type="submit" class="form-control bg-secondary text-light mb-4" name="delete" value="Delete Account">
        </div>
        <div class="form-outline w-50 m-auto">
            <input type="submit" class="form-control bg-secondary text-light mb-4" name="no_delete"
                value="Don't Delete">
        </div>
    </form>
    <?php
    $username = $_SESSION['Username'];
    if (isset($_POST['delete'])) {
        $delete = "DELETE FROM `login` WHERE `Username` = '$username'";
        $delete_result = mysqli_query($con1, $delete);
        if ($delete_result) {
            session_destroy();
            echo "<script>alert('Account Deleted Successfully')</script>";
            echo "<script>window.open('index.php''_self')</script>";
        }
    }
    if (isset($_POST['no_delete'])) {
        echo "<script>window.open('profile.php','_self')</script>";

    }

    ?>
</body>

</html>