<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'munchbagshoppingcart');
if (mysqli_connect_errno()) {
    echo "failed";
} else {
    echo "";
}
if (isset($_POST['update'])) {
    $pid = $_SESSION['id'];
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];

    $select = "select * from register where id='$pid'";
    $sql = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($sql);

    $res = $row['id'];
    if ($res === $pid) {
        $update = "UPDATE register set name='".$name."', uname='$uname',email='$email' where id'".$res."'";
        $sql2 = mysqli_query($conn, $update);

        if ($sql3) {
            header('location:customerpanel.php');
        } else {
            echo "error";
            header('location:updateprofile.php');
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
</head>

<body>

</body>

</html>