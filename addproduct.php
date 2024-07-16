<!DOCTYPE html>
<html>

<head>
    <title>Product Management</title>
</head>

<body>
    <?php include "con1.php"; ?>

    <h2><u>Add New Product</u></h2><b>
    <form action="pdb.php" method="POST" enctype="multipart/form-data">

        <label for="Pname">Name:</label>
        <input type="text" id="Pname" name="Pname"><br><br>

        <label for="Pimg">Image:</label>
        <input type="file" id="Pimg" name="Pimg" accept="image/*"><br><br>

        <label for="Decp">Description:</label>
        <textarea  id="Decp" name="Decp">
        </textarea><br><br>

        <label for="Price">Price:</label>
        <input type="text" id="Price" name="Price"><br><br>

        <input type="submit" name="submit" value="Submit"><br><br>
    </form></b>
</body>
</html>