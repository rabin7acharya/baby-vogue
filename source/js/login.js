function validateLogin() {
  document.getElementById("vPassword").innerHTML = "";
  document.getElementById("vEmail").innerText = "";

  var l_mail = document.getElementById("txtEmail");
  var l_pwd = document.getElementById("txtPassword");
  var email = document.getElementById("vEmail");
  var pass = document.getElementById("vPassword");
  var emailValid = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

  if (l_mail.value.length == 0) {
    document.getElementById("vEmail").innerHTML =
      "*Please enter your Email address hear*";
    l_mail.focus();
    return false;
  }

  if (l_mail.value.length != 0 && !l_mail.value.match(emailValid)) {
    document.getElementById("vEmail").innerText =
      "*Please enter a valid email address*";
    l_mail.focus();
    return false;
  }

  if (l_pwd.value.length == 0) {
    document.getElementById("vPassword").innerHTML =
      "*Please enter your Password hear*";
    l_pwd.focus();
    return false;
  }
  if (l_pwd.value.length != 0 && l_pwd.value.length < 8) {
    document.getElementById("vPassword").innerHTML =
      "*Please enter more than 8 digit*";
    l_pwd.focus();
    return false;
  }

  function emailVeryfy() {
    if (l_mail.value != "") {
      email.innerHTML = "";
      return true;
    }
  }

  function pwdVeryfy() {
    if (l_pwd.value != "") {
      pass.innerHTML = "";
      return true;
    }
  }
}
