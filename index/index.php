<?php session_start();
include("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shan Baby Products</title>
  <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
  <link href="../source/css/styleProduct.css?version=51" rel="stylesheet" type="text/css" />
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

  <link href="../source/css/imgSlider.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php require 'header.php' ?>

  <div style="
  margin: 50px 0px 50px 0px;
  text-align: center;
  padding-top: 10px;
  padding-bottom: 60px;
  font-size: 40px;
  color: #05b698;
  height: 70px;
  background-color: #ffffff;
  border-top-color: #05b698;
  border-bottom-color: #05b698;">
    <p>Our Latest Products</p>
  </div>
  <?php getPro(); ?>
  <?php require 'footer.php' ?>
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
</body>

</html>