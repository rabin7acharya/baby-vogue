<head>
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

</head>

<div class="navbar d-flex justify-content-between container">
    <div class="left">
        <!-- <img src="source/images/product_images/BabyVogueLogo.png" alt="logo" id="logo"> -->
        <img src="/source/image/product_images/Baby-product-Package.jpg" alt="logo" id="logo">
        
    </div>
    <div class="middle">
    <a href="index.php" class="btn btn-sm">Home</a>
    <a href="products.php" class="btn btn-sm">Products</a>
    <a href="contactus.php" class="btn btn-sm">Contact Us</a>
    <a href="aboutus.php" class="btn btn-sm">About Us</a>
    </div>
    <div class="right d-flex">
    
        <?php
    include_once 'connection.php';
    if (isset($_SESSION['userEmail'])) {
        $userEmail = $_SESSION['userEmail'];

        $cart_query = "select * from cart where userEmail='$userEmail'";

        $run_cart = mysqli_query($conn, $cart_query);

        $cart_qty = mysqli_num_rows($run_cart);
    } else {
        $cart_qty = 0;
    }
    ?>

        <a href="adminLogin.php" class="btn btn-sm">Admin Log</a>

        <?php
        if (!isset($_SESSION['userEmail'])) {
            echo '<a href="login.php" class="btn btn-sm">Login</a>';
            echo '<a href="signUp.php" class="btn btn-sm">Sign Up</a>';
        } else {
            echo '<a href="logout.php" class="btn btn-sm">Logout</a>';
            echo '<a href="customerprofile.php" class="btn btn-sm">Profile</a>';
        }
        ?>
        <a href="showCart.php" class="btn btn-dark btn-sm">Cart: <?php echo $cart_qty; ?></a>
                    
    </div>
</div>
