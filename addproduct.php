<?php
session_start();
$conn=mysqli_connect("localhost","root","","munchbagshoppingcart");
if(mysqli_connect_errno()){
    echo "failed".mysqli_connect_error();
}
else{
    echo "";
}
if(isset($_POST["submit"])){

    $name=$_POST['pname'];
    $dis=$_POST['dis'];
    $filename=$_FILES['img']['name'];
    $tmpfile=$_FILES['img']['tmp_name'];
    $folder="addproductimg/".$filename;
    $price=$_POST['price'];
    $category=$_POST['cid'];


    if($filename==""){
        echo "file is not uploaded";
    }
    // else
    // {
    //     $insrt="INSERT into product (pname,dis,img,price,cid) values ('$name','$dis','$filename','$price','$category')";
    //     move_uploaded_file($tmpfile,$folder);
    //     $result=mysqli_query($conn,$insrt);
    //     echo "added successfully";
    // }
    else {
        $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png");

        if (in_array($file_extension, $allowed_extensions)) {
            $insrt = "INSERT into product (pname,dis,img,price,cid) values ('$name','$dis','$filename','$price','$category')";
            move_uploaded_file($tmpfile, $folder);
            $result = mysqli_query($conn, $insrt);
            echo "added successfully";
        } else {
            echo "Only JPG, JPEG, and PNG files are allowed.";
        }
    }
}
    


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/png" href="logo.jpg" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="product.css" rel="stylesheet">
    <style>
       
        label{
            color: #fe5d37;
        }
        button{
            background-color: #fe5d37;
            color: white;
            border: #fe5d37;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
        <a href="" class="navbar-brand">
            <h1 class="m-0 text-primary"><img src="Munchbag logo.jpg" width="100px">Munchbags.in</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto">
                <a href="index.html" class="nav-item nav-link active">Home</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Product</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                        <a href="addproduct.php" class="dropdown-item">Add Product</a>
                        <a href="view.php" class="dropdown-item">View Product</a>
                      

                    </div>
                </div>
                
                <a href="customerdetails.php" class="nav-item nav-link">View customer</a>
            </div>
            <a href="munchbag-in.html" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">log out</a>

          
        </div>
    </nav>
    <center>
    <form enctype="multipart/form-data" method="post">
        <label for="name">NAME:</label>
        <input type="text" placeholder="enter product name" name="pname" REQUIRED><br><br>


        <label for="discription">DISCRIPTION:</label>
        <input type="text" placeholder="enter product discription" name="dis" required><br><br>


        <label for="image">IMAGE:</label>
        <input type="file" name="img" required><br><br>

        <label for="price">PRICE:</label>
        <input type="text" name="price" placeholder="enter price" required><br><br>

        

        <div>
            <label for="cat">CATEGORY</label>
            <select id="cid" name="cid"><br>
                <?php
                $sql = "select * from tblcategory";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["cid"] . '">' . $row["cname"] . '</option>';
                    }
                }
                ?>
            </select><br>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">submit</button><br>
    </form>
    </center>
   

</html>