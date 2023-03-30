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
    <title>Order Products</title>
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
            background-color: #f2f2f2;
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


    <h1 style="text-align:center;">View Category</h1>


    <div class="insertProduct" style="width:80%;">

        <form action="component/category_view_action.php">
            <?php
            $mysqli = new mysqli('localhost:3306', 'root', '', 'babyvogue') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM category") or die($mysqli->error);
            ?>

            <div style="overflow-x:auto; margin-left:-15px; margin-top:5px;">
                <table id="customers">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Description</th>

                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <!-- start loop -->

                        <?php
                        while ($row = $result->fetch_assoc()) : ?>

                            <tr>
                                <td><?php echo $row['categoryName']; ?></td>
                                <td><?php echo $row['discription']; ?></td>

                                <td>
                                    <a href="category_Edit.php?editid=<?php echo $row['categoryID']; ?>" name="edit" id="btn" class="btn btn-danger" onclick="return validate();">Edit</a>
                                </td>
                                <td>
                                    <a href="component/category_view_action.php?delete=<?php echo $row['categoryID']; ?>" name="delete" id="btn" class="btn btn-danger" onclick="return validate();">Delete</a>
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