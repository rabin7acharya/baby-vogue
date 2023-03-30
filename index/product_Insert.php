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
    <title>Insert Products</title>
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
    <h1 style="text-align:center;">Add New Product</h1>


    <div class="insertProduct">
        <div class="title">
            <h3>Insert Products</h3>
        </div>
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Title</label>
                <input name="product_title" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Product Category</label>
                <select name="product_cat" class="form-control" style="width:53%">

                    <option> Select a Category Product </option>

                    <?php

                    $get_p_cats = "select * from category";
                    $run_p_cats = mysqli_query($conn, $get_p_cats);

                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                        $p_cat_id = $row_p_cats['categoryID'];
                        $p_cat_title = $row_p_cats['categoryName'];

                        echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                    }

                    ?>

                </select>
            </div>
            <div class="form-group">
                <label>Product Quantity</label>
                <input name="product_qty" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input name="product_price" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Product Discount (%)</label>
                <input name="product_discount" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Product image</label>
                <input name="product_img1" style="width:50%" type="file" style="margin-left: -110px" required>
                <p align='right' style="padding-right:60px; font-size:15px;">image size should be 1280x720</p>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea name="product_desc" cols="19" rows="6" class="form-control" style="height: 150px"></textarea>
            </div>
            <div class="form-group">
                <input name="submit" value="Insert Product" type="submit" class="btn btn-dark">
            </div>
        </form>
    </div>


</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_qty = $_POST['product_qty'];
    $product_discount = $_POST['product_discount'];
    $product_desc = $_POST['product_desc'];

    $product_img1 = $_FILES['product_img1']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];

    move_uploaded_file($temp_name1, "source/images/product_images/$product_img1");

    $insert_product = "insert into product (productName,quantity,unitPrice,description,discount,imageLocation,categoryID,adminID) values ('$product_title','$product_qty','$product_price','$product_desc','$product_discount','$product_img1','$product_cat','1')";

    $run_product = mysqli_query($conn, $insert_product);

    if ($run_product) {

        echo "<script>alert('Product has been inserted sucessfully')</script>";
        echo "<script>window.open('product_insert.php','_self')</script>";
    }
}

?>