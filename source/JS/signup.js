function validateSignUp() {
  document.getElementById("fnameErro").innerHTML = "";
  document.getElementById("lnameErro").innerText = "";
  document.getElementById("phoneErro").innerHTML = "";
  document.getElementById("addrErro").innerHTML = "";
  document.getElementById("cityErro").innerHTML = "";
  document.getElementById("countryErro").innerHTML = "";
  document.getElementById("postalErro").innerHTML = "";
  document.getElementById("emailErro").innerHTML = "";
  document.getElementById("pwdErro").innerHTML = "";
  document.getElementById("rePwdErro").innerHTML = "";

  var F_name = document.getElementById("txtfName");
  var L_name = document.getElementById("txtlName");
  var P_no = document.getElementById("txtPhone");
  var Email = document.getElementById("txtEmail");
  var Addr = document.getElementById("txtAddress");
  var City = document.getElementById("txtCity");
  var Postal = document.getElementById("txtPostal");
  var Country = document.getElementById("txtCountry");
  var PWD = document.getElementById("txtPassword");
  var R_PWD = document.getElementById("txtCPassword");

  var emailValidate = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
  var numerValidate = /^[0-9]+$/;
  var alphaValidate = /^[a-zA-Z]+$/;

  //  first name  part

  if (F_name.value.length == 0) {
    document.getElementById("fnameErro").innerHTML =
      "*Please Enter your first name*";
    F_name.focus();
    return false;
  }

  if (F_name.value.length != 0 && !F_name.value.match(alphaValidate)) {
    document.getElementById("fnameErro").innerText =
      "*first name should have letters*";
    F_name.focus();
    return false;
  }

  //  last name  part

  if (L_name.value.length == 0) {
    document.getElementById("lnameErro").innerHTML =
      "*Please enter your last name*";
    L_name.focus();
    return false;
  }
  if (L_name.value.length != 0 && !L_name.value.match(alphaValidate)) {
    document.getElementById("lnameErro").innerHTML =
      "*last name should have letters*";
    L_name.focus();
    return false;
  }

  //  phone number  part

  if (P_no.value.length == 0) {
    document.getElementById("phoneErro").innerHTML =
      "*Please enter your Phone number*";
    P_no.focus();
    return false;
  }
  if (P_no.value.length != 10) {
    document.getElementById("phoneErro").innerHTML =
      "*Enter valid phone number*";
    P_no.focus();
    return false;
  }

  //  address   part

  if (Addr.value.length == 0) {
    document.getElementById("addrErro").innerHTML = "*You must enter Address*";
    Addr.focus();
    return false;
  }

  //  city   part

  if (City.value.length == 0) {
    document.getElementById("cityErro").innerHTML = "*You must enter City*";
    City.focus();
    return false;
  }

  //  Postal   part

  if (Postal.value.length == 0) {
    document.getElementById("postalErro").innerHTML =
      "*You must enter Postal Code*";
    Postal.focus();
    return false;
  }

  //  country   part

  if (Country.value.length == 0) {
    document.getElementById("countryErro").innerHTML =
      "*You must enter Country*";
    Country.focus();
    return false;
  }

  //  email  part

  if (Email.value.length == 0) {
    document.getElementById("emailErro").innerHTML =
      "*Please enter your email address*";
    Email.focus();
    return false;
  }
  if (Email.value.length != 0 && !Email.value.match(emailValidate)) {
    document.getElementById("emailErro").innerHTML =
      "*Enter valid email address*";
    Email.focus();
    return false;
  }

  //  password  part

  if (PWD.value.length == 0) {
    document.getElementById("pwdErro").innerHTML = "*Please enter password*";
    PWD.focus();
    return false;
  }
  if (PWD.value.length != 0 && PWD.value.length < 8) {
    document.getElementById("pwdErro").innerHTML =
      "*password should have more than 8 digit*";
    PWD.focus();
    return false;
  }

  //  re enter password  part

  if (R_PWD.value.length == 0) {
    document.getElementById("rePwdErro").innerHTML =
      "*re enter your password hear*";
    R_PWD.focus();
    return false;
  }
  if (PWD.value !== R_PWD.value) {
    document.getElementById("rePwdErro").innerHTML = "*password not match*";
    R_PWD.focus();
    return false;
  }
  if (true) {
    alert("You have scuessfully signed up. Login to continue!");
  }
}

