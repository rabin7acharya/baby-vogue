<?php session_start();
if (!isset($_SESSION["adminLoginerror"])) {
    $_SESSION["adminLoginerror"] = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LogIn</title>
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <script src="../source/JS/login.js"></script>
</head>

<body>

    <!-- show page header -->

    <?php require 'header.php' ?>

    <!-- admin login -->
    <div>
        <?php
        require 'connection.php';
        if (isset($_POST["adminLogin"])) {
            $username = $_POST["txtEmail"];
            $password = $_POST["txtPassword"];

            $sql = "SELECT * FROM `admin` WHERE `adminUsername`='" . $username . "' and `adminPassword`='" . $password . "'";

            $_SESSION["adminLoginerror"] = "";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION["adminsUsername"] = $username;
                header('Location:product_dashboard.php');
                mysqli_close($conn);
            } else {
                $_SESSION["adminLoginerror"] = "Username or Password Does not match";
            }
        } ?>
    </div>


    <br>
    <br><br>

    <div id="signupContainer">
        <div id="title">
            <h2>Admin Login</h2>
        </div>

        <form id="form2" name="form2" method="post" action="adminLogin.php">
            <div id="form">
                <p class="formLable">Email</p>
                <input class="inputField" type="text" name="txtEmail" id="txtEmail" /><br>
                <p class="formLable">Password</p>
                <input class="inputField" type="password" name="txtPassword" id="txtPassword" /><br>
                <input id="btnSubmit" type="submit" name="adminLogin" value="Login" />

            </div>
        </form>
    </div>
    <div style="text-align: center; font-size: 12px; margin-top: -20px;">
        <label id="vEmail"></label>
        <label id="vPassword"></label>
    </div>
    <span id="validatuser"><?php echo "<p style='color:red; text-align:center;'>" . $_SESSION["adminLoginerror"] . "</p>";  ?></span>
    <iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
</body>

</html>