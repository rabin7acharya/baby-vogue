<?php session_start();
if (!isset($_SESSION["loginerror"])) {
    $_SESSION["loginerror"] = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <script src="../source/JS/login.js"></script>
</head>

<body>

    <div>
        <?php
        require 'connection.php';
        if (isset($_POST["login"])) {
            $email = $_POST["txtEmail"];
            $password = $_POST["txtPassword"];

            $sql = "SELECT * FROM `customer` WHERE `email`='" . $email . "' and `password`='" . $password . "'";

            $_SESSION["loginerror"] = "";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION["userEmail"] = $email;
                header('Location:index.php');
                mysqli_close($conn);
            } else {
                $_SESSION["loginerror"] = "Username or Password Does not match";
            }
        } ?>
    </div>


    <?php require 'header.php' ?>
    <br>
    <br><br>

    <div id="signupContainer">
        <div id="title">
            <h2 style="color: red;;">Login</h2>
            <p>If you don't have an account <a href="signUp.php">Sign Up</a></p>
        </div>

        <form id="form2" name="form2" method="post" action="login.php" onsubmit="return validateLogin()">
            <div id="form">
                <p class="formLable">Email</p>
                <input class="inputField" type="text" name="txtEmail" id="txtEmail" /><br>
                <p class="formLable">Password</p>
                <input class="inputField" type="password" name="txtPassword" id="txtPassword" /><br>
                <input id="btnSubmit" class="btn btn-dark" type="submit" name="login" value="Login" onclick="validateLogin()" />

            </div>
        </form>
    </div>
    <div style="text-align: center; font-size: 12px; margin-top: -20px;">
        <label id="vEmail"></label>
        <label id="vPassword"></label>
    </div>
    <span id="validatuser"><?php echo "<p style='color:red; text-align:center;'>" . $_SESSION["loginerror"] . "</p>";  ?></span>
    <iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
</body>

</html>