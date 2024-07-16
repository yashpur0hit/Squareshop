<?php
include 'con1.php';

if (isset($_POST['submit'], $_POST['Pname'], $_POST['Decp'], $_POST['Price'])) {
    $pname = mysqli_real_escape_string($con1, $_POST['Pname']);
    $decp = mysqli_real_escape_string($con1, $_POST['Decp']);
    $price = mysqli_real_escape_string($con1, $_POST['Price']);

    if (isset($_FILES['Pimg']) && $_FILES['Pimg']['error'] === UPLOAD_ERR_OK) {
        $temp_name = $_FILES['Pimg']['tmp_name'];
        $img_name = basename($_FILES['Pimg']['name']);
        $target_path = "Pimg" . $img_name;

        if (move_uploaded_file($temp_name, $target_path)) {
            $pimg = mysqli_real_escape_string($con1, $target_path);
        } else {
            echo "Error uploading image.";
            exit;
        }
    } else {
        echo "Error: Image upload failed or image not provided.";
        exit;
    }

    $query = "INSERT INTO `product` (`Pname`, `Pimg`, `Decp`, `Price`)
              VALUES ('$pname', '$pimg', '$decp', '$price')";

    if (mysqli_query($con1, $query)) {
        echo "New record created successfully", "<br><br>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con1);
    }

    echo "Name is: $pname<br>";
    echo "Image is: <img src='$pimg' height='100'><br>";
    echo "Description is: $decp<br>";
    echo "Price is: $price<br>";

} else {
    echo "Error: One or more required fields are missing.";
}

$query1 = "SELECT * FROM `product`";
$result1 = $con1->query($query1);

if ($result1->num_rows > 0) {
    echo "<h2>Products List</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Product Name</th><th>Image</th><th>Description</th><th>Price</th></tr>";

    while ($row = $result1->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Pname"] . "</td>";
        echo "<td> <img src='" . $row["Pimg"] . "' height='100'></td>";
        echo "<td>" . $row["Decp"] . "</td>";
        echo "<td>" . $row["Price"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($con1);
?>