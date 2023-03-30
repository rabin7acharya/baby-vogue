
<?php

//---------Function to get products------------//

function getPro()
{


    require("connection.php");



    echo "<div class='Pcontainer container'>
    <ul>
";



    $get_products = "select * from product order by 1 DESC LIMIT 0,8";

    $run_products = mysqli_query($conn, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

        $pro_id = $row_products['productID'];

        $pro_title = $row_products['productName'];

        $pro_price = $row_products['unitPrice'];

        $pro_img = $row_products['imageLocation'];

        echo "
    
    <li class='card'>
        
            <a href='productDetail.php?pro_id=$pro_id'>
            
                <img class='image col-12' src='/source/image/product_images/Frame 103.png' style='height: 15rem;'>
            
            </a>
            
            <div class='text'>
            
                <h3>
        
                    <a class='h4 text-decoration-none text-dark' href='productDetail.php?pro_id=$pro_id'>

                        $pro_title

                    </a>
                
                </h3>
                
                <p class='price'>
                
                RS: $pro_price
                
                </p>
                
                <p>
                
                    <a class='btn' href='productDetail.php?pro_id=$pro_id'>

                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
  <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
  <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
</svg>

                    </a>
                
                    <a  class='btn btn-dark' href='productDetail.php?add_cart=$pro_id'>

                         Add to Cart

                    </a>
                
                </p>
            
            </div>
        
        
    
    </li>
    
    ";
    }

    echo " </ul>
    </div>";
}

//---------Function to get categories------------//

function getCat()
{

    require("connection.php");
    $get_category = "select * from category";

    $run_category = mysqli_query($conn, $get_category);



    while ($row_category = mysqli_fetch_array($run_category)) {

        $cat_id = $row_category['categoryID'];

        $cat_title = $row_category['categoryName'];
        echo "
    
    <li>
         <a class='Ctitle' href='products.php?cat=$cat_id'>

            $cat_title

         </a>

    </li>
    
    ";
    }
}

//---------Function to get categories Products------------//


function getpcatpro()
{

    require("connection.php");
    if (isset($_GET['cat'])) {

        $p_cat_id = $_GET['cat'];

        $get_p_cat = "select * from category where categoryID='$p_cat_id'";

        $run_p_cat = mysqli_query($conn, $get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['categoryName'];

        $p_cat_desc = $row_p_cat['discription'];

        $get_products = "select * from product where categoryID='$p_cat_id'";

        $run_products = mysqli_query($conn, $get_products);

        $count = mysqli_num_rows($run_products);

        if ($count == 0) {

            echo "
            
                <div class='box'>
                
                    <h1> No Product Found In This Product Categories </h1>
                
                </div>
            
            ";
        } else {

            echo "
            
            <div class='box' style='padding:20px; margin-left:50px; margin-top:40px; margin-right:20px; border-radius:10px;   box-shadow: 5px 5px 7px #cbcecf, -5px -5px 7px #ffffff;'>
            
                
                    <h1> $p_cat_title </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
            ";
        }

        echo "<div class='Pcontainer'>
        <ul>
    ";

        while ($row_products = mysqli_fetch_array($run_products)) {


            $pro_id = $row_products['productID'];

            $pro_title = $row_products['productName'];

            $pro_price = $row_products['unitPrice'];

            $pro_img = $row_products['imageLocation'];

            echo "
        
        <li>
            
                <a href='productDetail.php?pro_id=$pro_id'>
                
                    <img class='Pimg' src='source/images/product_images/$pro_img' >
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a class='Ptitle' href='productDetail.php?pro_id=$pro_id'>
    
                            $pro_title
    
                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        Rs. $pro_price
                    
                    </p>
                    
                    <p>
                    
                        <a class='buttonD' href='productDetail.php?pro_id=$pro_id'>
    
                            View Details
    
                        </a>
                    
                        <a  class='button' href='productDetail.php?add_cart=$pro_id'>
                             Add to Cart
                        </a>
                    </p>
                </div>
        </li>
        
        ";
        }

        echo " </ul>
    </div>";
    }
}



//---------Function to add Products to cart------------//

function add_cart()
{
    require("connection.php");

    if (isset($_GET['add_cart'])) {
        if (isset($_SESSION['userEmail'])) {
            $userEmail = $_SESSION['userEmail'];
            $p_id = $_GET['add_cart'];

            $product_qty = $_POST['quantity'];

            if ($product_qty == 0) {
                $product_qty = 1;
            }

            $get_price = "select unitPrice from product where productID='$p_id'";

            $p_price = mysqli_query($conn, $get_price);

            $s_price = mysqli_fetch_array($p_price);

            $totalPrice = $product_qty * $s_price[0];

            $check_product = "select * from cart where userEmail='$userEmail' AND productID='$p_id'";

            $run_check = mysqli_query($conn, $check_product);



            if (mysqli_num_rows($run_check) > 0) {

                echo "<script>alert('This product has already added in cart')</script>";
                echo "<script>window.open('productDetail.php?pro_id=$p_id','_self')</script>";
            } else {

                $query = "insert into cart (userEmail,productID,numOfProducts,totalPrice) values ('$userEmail','$p_id','$product_qty','$totalPrice')";

                $run_query = mysqli_query($conn, $query);


                echo "<script>window.open('productDetail.php?pro_id=$p_id','_self')</script>";
            }
        } else {
            echo "<script>alert('You Have to login first')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
    }
}


//---------Function to get Add Customers ------------//


function addCustomer()
{

    require 'connection.php';

    if (isset($_POST["create"])) {
        $fname = $_POST["txtfName"];
        $lname = $_POST["txtlName"];
        $phone = $_POST["txtPhone"];
        $email = $_POST["txtEmail"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $pw = $_POST["txtPassword"];
        $postal = $_POST["txtPostal"];
        $country = $_POST["txtCountry"];
        $pw = $_POST["txtPassword"];


        $sql = "INSERT INTO `customer` (`firstName`, `lastName`, `email`, `address`, `country`, `postalCode`, `phone`, `password`, `city`) VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $address . "', '" . $country . "', '" . $postal . "', '" . $phone . "', '" . $pw . "', '" . $city . "');";

        mysqli_query($conn, $sql);

        header('Location:login.php');
    }
}


//---------Function to get cart items ------------// 

function getItems()
{

    require("connection.php");

    if (isset($_SESSION['userEmail'])) {

        $userEmail = $_SESSION['userEmail'];
        $get_items = "select * from cart where userEmail='$userEmail'";
        $run_items = mysqli_query($conn, $get_items) or die(mysqli_error($conn));


        while ($row_items = mysqli_fetch_array($run_items)) {

            $pro_id = $row_items['productID'];

            $cart_id = $row_items['cartID'];

            $pro_qty = $row_items['numOfProducts'];

            $pro_price = $row_items['totalPrice'];

            $get_pdata = "select productName,imageLocation from product where productID='$pro_id'";

            $run_pdata = mysqli_query($conn, $get_pdata) or die(mysqli_error($conn));

            $row_pdata = mysqli_fetch_assoc($run_pdata);

            $pro_img = $row_pdata['imageLocation'];

            $pro_title = $row_pdata['productName'];


            echo "<div class='itemBlock' style='margin: 0px 0px 10px 0px;'>
                        <div class='table'>
                            <div class='col1'></div>
                            <div class='col1'></div>
                            <div class='col1'></div>
                            <div class='col1'></div>
                            <div class='col1'></div>
                            <div class='row1'>
                                <div class='img'>
                                    <img src='source/images/product_images/$pro_img' width='100%' height='100'>
                                </div>
                                <div class='name'>
                                    <p>$pro_title</p>
                                </div>
                                <div class='qty'>
                                    <p>$pro_qty</p>
                                </div>
                                <div class='price'>
                                    <p>RS:$pro_price</p>
                                </div>
                                <div class='remove'>
                                <a href='component/cart_view_action.php?remove=$cart_id' name='remove' class='btn remove'><span style='font-size: 2em; color: Tomato;'>
                                <i class='fas fa-minus-circle'></i>
                              </span></a>
                                </div>
                            </div>
                        </div>
                        </div>";
        }


        // if (!empty($row_items)) {
        //     echo "<div class='TotalBlock' style='margin: 0px 0px 10px 0px;'>
        //                 <div class='table'>
        //                     <div class='row' >
        //                         <div class='temp'>
        //                             <h3> No items in the Cart <h2>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>";
        // }


        $get_sum = "SELECT SUM(totalPrice)
        FROM cart
        WHERE userEmail='$userEmail'";

        $run_sum = mysqli_query($conn, $get_sum);
        $sum = mysqli_fetch_array($run_sum);

        if ($sum[0] == 0) {
            $sum[0] = 0;
        }

        echo "<div class='TotalBlock' style='margin: 0px 0px 10px 0px;'>
                        <div class='table'>
                            <div class='col'></div>
                            <div class='col'></div>
                            <div class='col'></div>
                            <div class='col'></div>
                            <div class='col'></div>
                            <div class='row' >
                                <div class='temp'>
                                    <p> <p>
                                </div>
                                <div class='temp'>
                                    <p> </p>
                                </div>
                                <div class='total'>
                                    <p><b>Total</b></p>
                                </div>
                                <div class='sum'>
                                    <p>RS:$sum[0]</p>
                                </div>
                                <div class='removeall' >
                                <a href='component/cart_view_action.php?removeall=$userEmail' name='removeall' class='btn removeall' alt='Remove all' title='Remove All'><i style='color:red; font-size: 1.5em;' class='fas fa-trash-alt'></i><br></a>
                                </div>
                            </div>
                        </div>
                    </div>";
    }
}





//---------Function to get profile data and update profile ------------// 


function getProfile()
{

    require("connection.php");

    if (isset($_SESSION['userEmail'])) {

        $userEmail = $_SESSION['userEmail'];
        $get_cid = "select customerID from customer where email='$userEmail'";
        $run_cid = mysqli_query($conn, $get_cid) or die(mysqli_error($conn));
        $row_cid = mysqli_fetch_array($run_cid);

        $get_items = "select * from customer where customerID ='$row_cid[0]'";
        $run_items = mysqli_query($conn, $get_items) or die(mysqli_error($conn));


        $row_items = mysqli_fetch_assoc($run_items);

        $customer_id = $row_items['customerID'];

        $f_name = $row_items['firstName'];

        $l_name = $row_items['lastName'];

        $addr = $row_items['address'];

        $country = $row_items['country'];

        $postal = $row_items['postalCode'];

        $number = $row_items['phone'];

        $city = $row_items['city'];

        $pass = $row_items['password'];

        // $get_pdata = "select productName,imageLocation from product where productID='$pro_id'";

        // $run_pdata = mysqli_query($conn, $get_pdata) or die(mysqli_error($conn));

        // $row_pdata = mysqli_fetch_assoc($run_pdata);

        // $pro_img = $row_pdata['imageLocation'];

        // $pro_title = $row_pdata['productName'];


        echo "
        
        <form id='form1' name='form1' method='post' action='customerProfile.php?edit=$customer_id' onsubmit='return validateUpdate()'>
            <div id='form'>
              <p class='formLable'>First Name</p>
              <input class='inputField' type='text' name='txtfName' id='txtfName' placeholder='$f_name' /><br>
              <p class='formLable'>Last Name</p>
              <input class='inputField' type='text' name='txtlName' id='txtlName' placeholder='$l_name'/><br>
              <p class='formLable'>Phone Number</p>
              <input class='inputField' type='text' name='txtPhone' id='txtPhone' placeholder='$number'/><br>
              <p class='formLable'>Address</p>
              <input class='inputField' type='text' name='txtAddress' id='txtAddress' placeholder='$addr'/><br>
              <p class='formLable'>City</p>
              <input class='inputField' type='text' name='txtCity' id='txtCity' placeholder='$city'/><br>
              <p class='formLable'>Postal Code</p>
              <input class='inputField' type='text' name='txtPostal' id='txtPostal' placeholder='$postal' /><br>
              <p class='formLable'>Country</p>
              <input class='inputField' type='text' name='txtCountry' id='txtCountry' placeholder='$country' /><br>
              <p class='formLable'>Email</p>
              <input class='inputField' type='text' name='txtEmail' id='txtEmail' placeholder='$userEmail'/><br>
              <p class='formLable'>Current Password</p>
              <input class='inputField' type='password' name='txtCPassword' id='txtPassword' /><br>
              <p class='formLable'>New Passsword</p>
              <input class='inputField' type='password' name='txtNPassword' id='txtCPassword' /><br>
        
              <input id='btnSubmit' type='submit' name='update' value='Update' />
        
            </div>
          </form>
          
";
    }




    // <div id='errors'>
    //   <label id='fnameErro'></label>
    //   <label id='lnameErro'></label>
    //   <label id='phoneErro'></label>
    //   <label id='addrErro'></label>
    //   <label id='cityErro'></label>
    //   <label id='countryErro'></label>
    //   <label id='postalErro'></label>
    //   <label id='emailErro'></label>
    //   <label id='CpwdErro'></label>
    //   <label id='NPwdErro'></label>
    // </div>




    // if (!empty($row_items)) {
    //     echo "<div class='TotalBlock' style='margin: 0px 0px 10px 0px;'>
    //                 <div class='table'>
    //                     <div class='row' >
    //                         <div class='temp'>
    //                             <h3> No items in the Cart <h2>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>";
    // }



    if (isset($_POST['update'])) {

        $cid = $_GET['edit'];
        if (!empty($_POST["txtfName"])) {
            $f_name = $_POST["txtfName"];
        }
        if (!empty($_POST["txtlName"])) {
            $l_name = $_POST["txtlName"];
        }

        if (!empty($_POST["txtPhone"])) {
            $number = $_POST["txtPhone"];
        }

        if (!empty($_POST["txtEmail"])) {
            $userEmail = $_POST["txtEmail"];
        }

        if (!empty($_POST["txtAddress"])) {
            $addr = $_POST["txtAddress"];
        }

        if (!empty($_POST["txtCity"])) {
            $city = $_POST["txtCity"];
        }

        if (!empty($_POST["txtPostal"])) {
            $postal = $_POST["txtPostal"];
        }

        if (!empty($_POST["txtCountry"])) {
            $country = $_POST["txtCountry"];
        }

        // if (!empty($_POST["txtCPassword"])) {
        $cpw = $_POST["txtCPassword"];

        if (!empty($_POST["txtNPassword"])) {
            $npw = $_POST["txtNPassword"];
        } else {
            $npw = $cpw;
        }


        // echo "<script src='source/JS/profileUpdate.js'>validateUpdate()</script>";


        if (!($cpw == $pass)) {
            $npw = $cpw;
            echo "<script>alert('Incorrect Password: Enter Correct Password to update')</script>";
        } else {

            $query = mysqli_query($conn, "update customer set firstName='$f_name', lastName='$l_name', email='$userEmail', address='$addr', country='$country', postalCode='$postal', phone='$number', password='$npw', city='$city' where customerID='$cid'");

            if ($query) {
                echo "<script>alert('Profile has been Update sucessfully')</script>";
                echo "<script>window.open('customerProfile.php','_self')</script>";
            } else {
                echo ("Error description: " . mysqli_error($conn));
            }
        }
    }
}




?>