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
    <title>Profile</title>
    <link href="../source/css/cart.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/b7ad2a2652.js" crossorigin="anonymous"></script>
    <script src="../source/JS/profileUpdate.js"></script>
</head>

<body>

    <!-- Show header and nav bar -->
    <?php require 'header.php' ?>
    <?php require 'navbar.php' ?>
    <!-- End header and nav bar -->

    <h1 style="text-align:center;">My Accoount</h1>

    <div id="cart" style="width: 50%;">

        <?php getProfile() ?>

    </div>


    <?php require 'footer.php' ?>
</body>

</html>