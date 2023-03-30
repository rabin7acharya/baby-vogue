<?php session_start();
require("connection.php");
?>

<!-- //check if there is an admin session -->
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

    <style>
        div .box {
            width: 300px;
            border: 1px solid #0002;
            border-radius: 1rem;
            padding: 10px;
            margin: 10px;
            float: left;
        }
    </style>


</head>

<body>


    <!-- start Navbar Area -->
    <?php require "include/admin_header.php" ?>
    <!-- end Navbar Area -->


    <h1 style="text-align:center;">Dashboard</h1>


    <div class="insertProduct" style="width:56%; padding-bottom:30%;">

        <div class="box">
            <?php

            $query = "SELECT productID FROM product ORDER BY productID";
            $query_run = mysqli_query($conn, $query);
            $row = mysqli_num_rows($query_run);


            echo '<h1>' . $row . '</h1>'
            ?>

            <hr>
            <h2>Total Product</h2>
        </div>

        <div class="box">
            <?php

            $query = "SELECT cartID FROM cart ORDER BY cartID";
            $query_run = mysqli_query($conn, $query);
            $row = mysqli_num_rows($query_run);


            echo '<h1>' . $row . '</h1>'
            ?>
            <hr>
            <h2>Total Order</h2>
        </div>

        <div class="box">
            <?php
            $query = "SELECT SUM(totalPrice) as count FROM cart";
            $duration = $conn->query($query);
            while ($record = $duration->fetch_array()) {
                $total = $record['count'];
            }

            echo '<h1>', 'Rs.' . $total . '</h1>'
            ?>
            <hr>
            <h2>Total Income</h2>
        </div>

    </div>




</body>

</html>