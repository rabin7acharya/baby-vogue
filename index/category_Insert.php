<?php session_start();
require("connection.php");
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
    <title>Insert Category</title>
    <link href="source/css/navbar.css" rel="stylesheet" type="text/css" />
    <link href="source/css/style.css" rel="stylesheet" type="text/css" />
    <link href="source/css/insertProduct.css" rel="stylesheet" type="text/css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

</head>

<body>
    <!-- start Navbar Area -->
    <?php require "include/admin_header.php" ?>
    <!-- end Navbar Area -->
    <h1 style="text-align:center;">Add New Category</h1>

    <!-- category insert form -->
    <div class="insertProduct">
        <div class="title">
            <h3>Insert Category</h3>
        </div>
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label>Enter Category</label>
                <input name="product_cat" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Enter Description</label>
                <input name="product_desc" type="text" class="form-control" required>
            </div>


            <div class="form-group">
                <input name="submit" value="Insert Category" type="submit" class="btn btn-dark">
            </div>
        </form>
    </div>


</body>

</html>

<!-- 
insert category data to database -->
<?php

if (isset($_POST['submit'])) {


    $product_cat = $_POST['product_cat'];
    $product_desc = $_POST['product_desc'];

    $insert_product = "insert into category (categoryName,discription) values ('$product_cat','$product_desc')";

    $run_product = mysqli_query($conn, $insert_product);

    if ($run_product) {

        echo "<script>alert('Category has been inserted sucessfully')</script>";
        echo "<script>window.open('category_View.php','_self')</script>";
    }
}

?>