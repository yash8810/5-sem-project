<?php

session_start();

$conn=mysqli_connect('localhost','root','','munchbagshoppingcart');
if(mysqli_connect_errno())
{
    echo "fail";
}
else
{
    echo "";
}



// Retrieve category name from the form

if(isset($_POST['submit']))
{
$categoryName = $_POST['cname'];

// SQL query to insert the new category
$sql = "INSERT INTO tblcategory (cname) VALUES ('$categoryName')";

if ($conn->query($sql) === TRUE) {
    echo "New category added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
</head>
<body>
    <h2>Add New Category</h2>
    <form action="#" method="post">
        <label for="categoryName">Category Name:</label>
        <input type="text" id="cname" name="cname" required>
        <button type="submit" name="submit">Add Category</button>
    </form>
</body>
</html>
