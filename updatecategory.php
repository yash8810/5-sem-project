<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'munchbagshoppingcart');
if (mysqli_connect_errno()) {
    echo "fail";
} else {
    echo "";
}

if (isset($_GET['id'])) {
    $cid = $_GET['id'];
    $select = mysqli_query($conn, "SELECT * FROM tblcategory WHERE cid='$cid'");
    $select_category = mysqli_fetch_assoc($select);
}

// Retrieve category name from the form
if (isset($_POST['update_category'])) {
    $cid = $_POST['cid'];
    $categoryName = $_POST['cname'];

    // SQL query to update the category
    $sql = "UPDATE tblcategory SET cname='$categoryName' WHERE cid='$cid'";

    if ($conn->query($sql) === TRUE) {
        echo "Category updated successfully";
        header("Location: category_fetch.php?cid=$cid");
        exit();
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
    <title>Update Category</title>
</head>
<body>
    <h2>Update Category</h2>
    <form action="#" method="post">
        <input type="hidden" name="cid" value="<?php echo $select_category['cid']; ?>">
        <label for="categoryName">Category Name:</label>
        <input type="text" id="cname" name="cname" value="<?php echo $select_category['cname']; ?>" required>
        <button type="submit" name="update_category">Update Category</button>
    </form>
</body>
</html>
