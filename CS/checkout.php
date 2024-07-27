<?php
	require 'config.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM acart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['Price'];
	  $items[] = $row['Quantity'];
	}
	$allItems = implode(', ', $items);
?>

<?php

    // SMTP
    $message_sent = false;
    if(isset($_POST['email']) && $_POST['email'] != ''){
        //SUBMIT FORM
        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];

            $to = "WingFest.PH@gmail.com";
            $body = "";

            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Message: ".$message. "\r\n";

            mail($to,$messageSubject,$body);

            $message_sent = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<style>
    .logout{
      background: white;
      border: none;
      width: 70px;
      position: relative;
      color: #000;
      text-decoration: none;
      font-size: 15px;
      letter-spacing: 0.5px;
    }

  .logout:hover{
    color: #ff9e2d;
    text-decoration: none;
    font-weight: bold;
      font-size: 18px;
  }
  .logout:after{
  content: "";
    position: absolute;
    background-color: #ff932d;
    height: 3px;
    width: 0;
    left: 0;
    bottom: -3px;
    transition: 0.3s;
  }
  .logout:hover:after{
    color: #ff9e2d;
    text-decoration: none;
    font-weight: bold;
    font-size: 18px;
    width: 100%;
  }
  .header-1 .navbar{
    position: absolute;
    right: 90px;
    margin-top: 2px;
    margin: -10px;
  }

  </style>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link rel="icon" href="images/LOGO-ICON.png">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

  <link rel="stylesheet" type="text/css" href="CSS/NAV_AND_FOOTER.css"/> 

  <!--NAVBAR LINK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--NAVBAR-1 CODE-->
    <div class ="header-1">
      <a href = "index.php" class = "logo"><img src = "images/LOGO1.png"></a>
      <nav class="navbar">
        <ul>
          <li><a href = "INDEX.php">Home</a></li>
          <li><a href = "MENU.php" >Menu</a></li>
          <li><a href = "HOME.php">Orders</a></li>
          <li><a href = "checkout.php" class = "active">Checkout</a></li>
                <li class="nav-item">
                  <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
          <li><a href = "Account.php">My Account</a></li>
          
          
        </ul>
      </nav>  

      <form class = "feelingbtn" method = "POST" style ="
      background: white;
      border: none;
      height: 30px;
      max-width: 50px;
      width: 50px;
      position: relative;
      left: -2px;
      top: 0px;
        flex: 1 1 210px;
        ">
      <button value = "logout" class = "logout" name = "logout" type="submit" onclick="return confirm('Are you sure you want to logout?');"> Logout </button> 
      </form>     
      <!-- <form action = "" method="POST">
        <input type = "search" required placeholder = "Search for your Wing Fest favorites" name = "search" class="form-control">
        <label for = "search" class = "fas fa-search"></label>
      </form>  -->    
      </div>
      <!--NAVBAR-2 CODE-->
    <div class="header-2">
      <div id = "menu" class="fas fa-bars" onclick = "navToggle();"></div>    
        <nav class="navbar">
          <ul>
            <li style="color:white"> <a onclick = "navToggle();" href = "checkout.php"></a></li>
          </ul>
        </nav>      
      </div>

</head>

<body>


<?php
//Data Validation
if (isset($_POST['submit'])) {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $contactno = $_POST['contactno'];

  $length = strlen($contactno);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

  if (!ctype_alpha($fname) || !ctype_alpha($lname)) {
    echo "Invalid Input. Name should contain letters only.";
  }
  if ($length < 11 || $length > 11) {
    echo "Contact Number must have 11 Digits.";
  }
}
?>
  <br>
  <br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order details before placing your order...</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free Delivery </h6>
          <h5><b>Total Amount : </b>₱ <?= number_format($grand_total,2) ?></h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?php echo $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <h6 class="text-center lead">Select Mode of Payment</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Mode of Payment-</option>
              <option value="cod">Cash On Delivery (COD)</option>
              <option value="netbanking">GCASH</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>

  <?php include 'footer.php'?>
    <script>
        let menu = document.querySelector('#menu')
        let navbar = document.querySelector('.navbar');
        let header2 = document.querySelector('.header-2');
        
        function navToggle(){
          
          menu.classList.toggle('fa-times');
          navbar.classList.toggle('nav-toggle');
        }

        function confirmAction() {
            let confirmAction = confirm("Are you sure to Logout?");
            if (confirmAction) {
              alert("Click, logout again to confirm.");
            } else {

            }
          }
        
        window.addEventListener('scroll', function(){
        menu.classList.remove('fa-times');
        navbar.classList.remove('nav-toggle');
        
          if(window.scrollY > 60){
            header2.classList.add('sticky');
          }
          else{
            header2.classList.remove('sticky');
          }
        });
    </script>
</body>

</html>

<?php 
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    echo '<script>alert("Logout Successfully!"); window.location.href = "Menu.php";</script>';
  }
?>