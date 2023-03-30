<?php
session_start();
if (session_destroy()) // Destroying All Sessions
{
    if (!isset($_SESSION["adminsUsername"])) {
        header("Location: index.php"); // Redirecting To Home Page
    } else {

        header("Location: adminLogin.php"); // Redirecting To Admin Login
    }
}
