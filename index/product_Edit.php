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

    <h1 style="text-align:center;">Edit Product</h1>


    <div class="insertProduct">
        <div class="title">
            <h3>Edit</h3>
        </div>

        <form class="form-horizontal" method="post" action="product_Edit.php">

            <?php
            if (isset($_GET['editid'])) {
                $aid = $_GET['editid'];
                $_SESSION['eid'] = $aid;
                $ret = mysqli_query($conn, "select * from product where productID='$aid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
            ?>


                    <div class="form-group">
                        <label>Product Title</label>
                        <input name="product_title" type="text" value="<?php echo $row['productName']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Category</label>
                        <select name="product_cat" class="form-control" style="width:53%">

                            <option> Select a Category Product </option>

                            <?php
                            $get_p_cats = "select * from category";
                            $run_p_cats = mysqli_query($conn, $get_p_cats);
                            $current_catID = $row['categoryID'];
                            $get_current_catT = "select categoryName from category where categoryID='$current_catID'";
                            $current_catT = mysqli_query($conn, $get_current_catT);

                            while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                $p_cat_id = $row_p_cats['categoryID'];
                                $p_cat_title = $row_p_cats['categoryName'];

                                if ($p_cat_id == $current_catID) {
                                    echo "
                                  
                                  <option value='$p_cat_id' selected> $p_cat_title </option>
                                  
                                  ";
                                } else {
                                    echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                }
                            }


                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input name="product_qty" type="text" value="<?php echo $row['quantity']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input name="product_price" type="text" value="<?php echo $row['unitPrice']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Discount (%)</label>
                        <input name="product_discount" type="text" value="<?php echo $row['discount']; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Product Description</label>
                        <input name="product_desc" type="text" value="<?php echo $row['description']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="submit" value="Update Product" type="submit" class="btn btn-dark">
                    </div>
                    
        </form>
    </div>
<?php }
            } ?>

</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $eid = $_SESSION['eid'];
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_qty = $_POST['product_qty'];
    $product_discount = $_POST['product_discount'];
    $product_desc = $_POST['product_desc'];

    // $insert_product = "insert into product (productName,quantity,unitPrice,description,discount,imageLocation,categoryID) values ('$product_title','$product_qty','$product_price','$product_desc','$product_discount','$product_cat')";

    // $run_product = mysqli_query($conn, $insert_product);

    $update_product = "update product set productName='$product_title',  quantity='$product_qty', unitPrice='$product_price', description='$product_desc', discount='$product_discount', categoryID='$product_cat' where productID='$eid'";

    $query = mysqli_query($conn, $update_product);

    if ($query) {
        echo "<script>alert('Product has been Update sucessfully')</script>";
        echo "<script>window.open('product_View.php','_self')</script>";
    } else {
        $msg = "Something Went Wrong. Please try again.";
    }
}


?>