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
    <link href="../source/css/navbar.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/insertProduct.css" rel="stylesheet" type="text/css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #fff;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;

        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>


</head>

<body>


    <!-- start Navbar Area -->
    <?php require "include/admin_header.php" ?>
    <!-- end Navbar Area -->


    <h1 style="text-align:center;">View Product</h1>


    <div class="insertProduct" style="width:80%;">

        <form action="component/product_view_action.php">
            <?php
            $mysqli = new mysqli('localhost:3306', 'root', '', 'babyvogue') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
            ?>

            <div style="overflow-x:auto; margin-left:-15px; margin-top:5px;">
                <table id="customers">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>U. Order</th>
                            <th>Price</th>
                            <th>description</th>
                            <th>Disc.</th>
                            <th>Image</th>
                            <th>Category</th>

                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        while ($row = $result->fetch_assoc()) : ?>

                            <tr>
                                <td><?php echo $row['productName']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['unitsOnOrder']; ?></td>
                                <td>Rs.<?php echo $row['unitPrice']; ?></td>
                                <td><?php echo $row['description']; ?></td>

                                <td><?php echo $row['discount']; ?>%</td>
                                <td><img src="../source/Images/product_images/<?php echo $row['imageLocation']; ?>" width="50" height="35" /></td>
                                <td><?php echo $row['categoryID']; ?></td>
                                

                                <td>
                                    <a href="product_Edit.php?editid=<?php echo $row['productID']; ?>" name="edit" id="btn" class="btn btn-danger" onclick="return validate();">Edit</a>
                                </td>
                                <td>
                                    <a href="component/product_view_action.php?delete=<?php echo $row['productID']; ?>" name="delete" id="btn" class="btn btn-danger" onclick="return validate();">Delete</a>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </thead>
                </table>
            </div>

        </form>
    </div>




</body>

</html>