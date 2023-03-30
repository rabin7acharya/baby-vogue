<?php session_start();
require("connection.php");
include("functions.php");
?>

<?php

if (isset($_GET['pro_id'])) {

    $product_id = $_GET['pro_id'];

    $get_product = "select * from product where productID='$product_id'";

    $run_product = mysqli_query($conn, $get_product);

    $row_product = mysqli_fetch_array($run_product);

    $pro_title = $row_product['productName'];

    $pro_price = $row_product['unitPrice'];

    $pro_desc = $row_product['description'];

    $pro_img = $row_product['imageLocation'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="../source/css/navbar.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/insertProduct.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/styleProduct.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php require 'header.php' ?>
    <div class="container d-flex align-items-start justify-content-between mt-5">

        <div class="cat_panel">
            <div class="cat_title">
                <h3>
                    Product Categories
                </h3>
            </div>
            <div class="cat_body">
                <ul>
                    <li>
                        <a class='Ctitle' href="products.php"> All Products </a>
    
                    </li>
    
                    <?php getCat(); ?>
                </ul>
            </div>
        </div>
        <div class="product-details p-4" style="border: 1px solid #0002; border-radius: 1rem;">
            <div class="img rounded">
                <img class="col-8" src="../source/Images/product_images/<?php echo $pro_img; ?>">
                <h3 style="padding-bottom: 20px"> <?php echo $pro_title; ?></h3>
                <h3>Product Description</h3>
                <p> <?php echo $pro_desc; ?></p>
            </div>
        </div>

        <div class="details" style="
  display: table-cell;  ">
                <div class="box" style="padding: 50px; text-align: center; 
  border: 1px solid #0002; border-radius: 10px; ">
                    

                    <?php add_cart(); ?>

                    <form method="post" action="productDetail.php?add_cart=<?php echo $product_id; ?>" class="form">
                        <label style="font-size: 18px;">Product Quantity</label><br><br>
                        <input name="quantity" type="text" value="1" style="text-align: center;" required>
                        <p class="price">RS: <?php echo $pro_price; ?></p>
                        <input name="submit" value="Add to Cart" type="submit" class="btn btn-dark">
                    </form>
                </div>
            </div>


    </div>

    

    <?php require 'footer.php' ?>
</body>

</html>