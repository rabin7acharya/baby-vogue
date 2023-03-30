<?php

$mysqli = new mysqli('localhost:3306', 'root', '', 'babyvogue') or die(mysqli_error($mysqli));


//check user clicked delete button

if (isset($_GET['delete'])) {
  $ID = $_GET['delete'];
  $mysqli->query("DELETE FROM category WHERE categoryID=$ID") or die($mysqli->error);

  // $_SESSION['message'] = "Record has been deleted!";
  // $_SESSION['msg_type'] = "danger";

  // echo $_SESSION['message'];

  header("location: ../category_View.php");
  exit();
}
