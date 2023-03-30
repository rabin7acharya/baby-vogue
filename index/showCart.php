<?php session_start();
require("connection.php");
include("functions.php");
?>

<!-- check if there is an user session -->
<?php
if (!isset($_SESSION['userEmail'])) {
    echo "<script>alert('You Have to login first')</script>";
    echo "<script>window.open('login.php','_self')</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="../source/css/cart.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/b7ad2a2652.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php require 'header.php' ?>

    <h1 style="text-align:center;">Cart</h1>

    <div id="cart">

        <?php getItems() ?>
        <a class="button btn btn-dark" href="" style="text-decoration: none;">Proceed to Checkout</a>
    </div>



    <?php require 'footer.php' ?>
</body>

</html>