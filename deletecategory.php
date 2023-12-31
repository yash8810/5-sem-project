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


if(isset($_POST['delete']))
{
    $cid=$_POST['cid'];

    $delete="DELETE FROM tblcategory WHERE cid='$cid'";
    if(mysqli_query($conn,$delete))
    {
        echo "Product deleted successfully";
        header("Location:category_fetch.php");
    }
    else{
        echo "error deleting property";
    }
}

?>