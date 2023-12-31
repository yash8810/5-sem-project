<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "munchbagshoppingcart");

if (mysqli_connect_errno()) {
    echo "Failed" . mysqli_connect_error();
} else {
    echo "";
}

// Fetch product details for the dropdown
$sql = "SELECT pid, pname FROM product";
$result = $conn->query($sql);

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product details based on the ID
    $checkProduct = mysqli_query($conn, "SELECT * FROM product WHERE pid = '$productId'");
    $product = mysqli_fetch_assoc($checkProduct);

    if (!$product) {
        echo "Product not found";
        exit;
    }
}

// Update product
if (isset($_POST["submit"])) {
    $productId = $_POST['pid'];
    $name = $_POST['pname'];
    $dis = $_POST['dis'];
    $price = $_POST['price'];
    $category = $_POST['cid'];

    $updateQuery = "UPDATE product SET pname = '$name', dis = '$dis', price = '$price', cid = '$category' WHERE pid = '$productId'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "Product updated successfully";
        header("Location:view.php");
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Add your stylesheets and scripts here -->
</head>

<body>
    <center>
        <!-- Update Product Form -->
        <form enctype="multipart/form-data" method="post">
            <label for="product_id">Select Product:</label>
            <select id="product_id" name="pid" required>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row["pid"] == $product['pid']) ? "selected" : "";
                        echo '<option value="' . $row["pid"] . '" ' . $selected . '>' . $row["pname"] . '</option>';
                    }
                }
                ?>
            </select><br><br>

            <label for="name">New Name:</label>
            <input type="text" placeholder="Enter new product name" name="pname" value="<?php echo $product['pname']; ?>" required><br><br>

            <label for="discription">New Description:</label>
            <input type="text" placeholder="Enter new product description" name="dis" value="<?php echo $product['dis']; ?>" required><br><br>

            <label for="price">New Price:</label>
            <input type="number" name="price" placeholder="Enter new price" value="<?php echo $product['price']; ?>" required><br><br>

            <label for="cat">New Category:</label>
            <select id="cid" name="cid" required>
                <?php
                $sql = "SELECT * FROM tblcategory";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row["cid"] == $product['cid']) ? "selected" : "";
                        echo '<option value="' . $row["cid"] . '" ' . $selected . '>' . $row["cname"] . '</option>';
                    }
                }
                ?>
            </select><br><br>

            <button type="submit" name="submit">Update Product</button><br>
        </form>
    </center>

</body>

</html>
