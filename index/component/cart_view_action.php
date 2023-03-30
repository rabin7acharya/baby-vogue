<?php

$mysqli = new mysqli('localhost:3306', 'root', '', 'babyvogue') or die(mysqli_error($mysqli));

//check user clicked remove button

if (isset($_GET['remove'])) {
    $ID = $_GET['remove'];
    $mysqli->query("DELETE FROM cart WHERE cartID=$ID") or die($mysqli->error);

    // $_SESSION['message'] = "Record has been deleted!";
    // $_SESSION['msg_type'] = "danger";

    header("location: ../showCart.php");
}

//check user clicked remove all button

if (isset($_GET['removeall'])) {
    $UID = $_GET['removeall'];
    $mysqli->query("DELETE FROM cart WHERE userEmail='$UID'") or die($mysqli->error);

    // $_SESSION['message'] = "Record has been deleted!";
    // $_SESSION['msg_type'] = "danger";

    header("location: ../showCart.php");
}

?>