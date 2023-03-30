<?php session_start();
include('connection.php');
?>

<!-- check if there is an admin session -->
<?php
if (!isset($_SESSION['adminsUsername'])) {
    echo "<script>alert('You Have to be an admin and login first')</script>";
    echo "<script>window.open('adminLogin.php','_self')</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link href="../source/css/navbar.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/insertProduct.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- start Navbar Area -->
    <?php require "include/admin_header.php" ?>
    <!-- end Navbar Area -->

    <h1 style="text-align:center;">Edit Category</h1>


    <div class="insertProduct">
        <div class="title">
            <h3>Edit</h3>
        </div>

        <form class="form-horizontal" method="post" action="">

            <!-- fetch category data -->
            <?php
            $aid = $_GET['editid'];
            $ret = mysqli_query($conn, "select * from category where categoryID='$aid'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>


                <div class="form-group">
                    <label>Enter Category</label>
                    <input name="product_cat" type="text" value="<?php echo $row['categoryName']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Enter Description</label>
                    <input name="product_desc" type="text" value="<?php echo $row['discription']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <input name="submit" value="Update Product" type="submit" class="btn btn-dark">
                </div>
        </form>
    </div>
<?php } ?>

</body>

</html>

<!-- 
update category data -->
<?php

if (isset($_POST['submit'])) {

    $eid = $_GET['editid'];
    $product_cat = $_POST['product_cat'];
    $product_desc = $_POST['product_desc'];


    $query = mysqli_query($conn, "update category set categoryName='$product_cat',  discription='$product_desc' where categoryID='$eid'");

    if ($query) {
        echo "<script>alert('Category has been Update sucessfully')</script>";
        echo "<script>window.open('category_View.php','_self')</script>";
    } else {
        $msg = "Something Went Wrong. Please try again.";
    }
}

?>