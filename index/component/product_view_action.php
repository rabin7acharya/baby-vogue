<?php

$mysqli = new mysqli('localhost:3306', 'root', '', 'babyvogue') or die(mysqli_error($mysqli));



//check user clicked delete button

if (isset($_GET['delete'])) {
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM product WHERE productID=$ID") or die($mysqli->error);

  // $_SESSION['message'] = "Record has been deleted!";
  // $_SESSION['msg_type'] = "danger";

  header("location: ../product_View.php");
}
