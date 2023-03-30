<div class="container d-flex justify-content-center">
                  
    <?php
    if (isset($_SESSION['adminsUsername'])) {
        echo '<a href="logout.php" class="btn btn-small">Logout</a>';
        echo '<a href="product_dashboard.php" class="btn btn-small">Dashboard</a>';
        echo '<a href="product_View.php" class="btn btn-small">View Product</a>';
        echo '<a href="order_View.php" class="btn btn-small">View Order</a>';
        echo '<a href="category_View.php" class="btn btn-small">View Category</a>';
        echo '<a href="customer_View.php" class="btn btn-small">View Customer</a>';
        echo '<a href="product_Insert.php" class="btn btn-small">Add Product</a>';
        echo '<a href="category_Insert.php" class="btn btn-small">Add Category</a>';
    }
    ?>
</div>