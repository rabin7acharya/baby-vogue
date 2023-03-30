<?php session_start();
include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shan Baby Products</title>
  <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
  <script src="../source/JS/signup.js"></script>
</head>

<?php require 'header.php' ?>
<br>
<br><br>


<div id="signupContainer">
  <div id="title">
    <h2>Sign Up</h2>
    <p>If you already have an account <a href="login.php">Login</a></p>
  </div>
  <?php addCustomer() ?>
  <form id="form1" name="form1" method="post" action="signUp.php" onsubmit="return validateSignUp()">
    <div id="form">
      <p class="formLable">First Name</p>
      <input class="inputField" type="text" name="txtfName" id="txtfName" /><br>
      <p class="formLable">Last Name</p>
      <input class="inputField" type="text" name="txtlName" id="txtlName" /><br>
      <p class="formLable">Phone Number</p>
      <input class="inputField" type="text" name="txtPhone" id="txtPhone" /><br>
      <p class="formLable">Address</p>
      <input class="inputField" type="text" name="txtAddress" id="txtAddress" /><br>
      <p class="formLable">City</p>
      <input class="inputField" type="text" name="txtCity" id="txtCity" /><br>
      <p class="formLable">Postal Code</p>
      <input class="inputField" type="text" name="txtPostal" id="txtPostal" /><br>
      <p class="formLable">Country</p>
      <input class="inputField" type="text" name="txtCountry" id="txtCountry" /><br>
      <p class="formLable">Email</p>
      <input class="inputField" type="text" name="txtEmail" id="txtEmail" /><br>
      <p class="formLable">Password</p>
      <input class="inputField" type="password" name="txtPassword" id="txtPassword" /><br>
      <p class="formLable">Confirm Passsword</p>
      <input class="inputField" type="password" name="txtCPassword" id="txtCPassword" /><br>

      <input id="btnSubmit" type="submit" name="create" value="Sign Up" />
      <input type="reset" name="btnReset" id="btnReset" value="Reset" />

    </div>
  </form>
</div>
<iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
<div id="errors">
  <label id="fnameErro"></label>
  <label id="lnameErro"></label>
  <label id="phoneErro"></label>
  <label id="addrErro"></label>
  <label id="cityErro"></label>
  <label id="countryErro"></label>
  <label id="postalErro"></label>
  <label id="emailErro"></label>
  <label id="pwdErro"></label>
  <label id="rePwdErro"></label>
</div>
</body>

</html>