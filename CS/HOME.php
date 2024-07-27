<?php
session_start();
include 'connection.php';
  
  if(isset($_POST['logout'])){
      session_unset();
      session_destroy();
      echo '<script>alert("Logout Successful!"); window.location.href = "index.php";</script>';
    }

   
   if(isset($_SESSION['Username'])){
    $user = $_SESSION['Username'];

    $query="Select UID from user where email = '$user'";
    $run = $conn->query($query);

    while($row = mysqli_fetch_assoc($run)){
    $UID = $row['UID'];
    } 
  }


?>


<!DOCTYPE html>
<html lang="en">

<style>
  body{
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  
  main{ 
  max-width:  1500px;
  width: 95%;
  margin:  30px auto;
  display: inline-block;
  flex-wrap: wrap;
  padding: 30px;
  justify-content: space-between;
  margin: auto;
}

main .card{
  display: inline-block;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: auto;
  box-shadow: 3px 3px #ff9e2d;

}
  .footer-distributed{
    margin-top: auto;
    margin-bottom: -200px;
  }
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

  <link rel="stylesheet" type="text/css" href="CSS/NAV_AND_FOOTER.css"/>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css2?family=Oswald' rel='stylesheet'>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' /> 
  <title>Orders | Wing Fest Philippines</title>
  <link rel="icon" href="images/LOGO-ICON.png">
  <link rel="stylesheet" type="text/css" href="CSS/ORDERS.css"/> 

  <!--NAVBAR LINK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class ="header-1">
      <a href = "index.php" class = "logo"><img src = "images/LOGO1.png"></a>
      <nav class="navbar">
        <ul>
          <li><a href = "INDEX.php">Home</a></li>
          <li><a href = "MENU.php">Menu</a></li>
          <li><a href = "HOME.php" class = "active">Orders</a></li>
          <!-- <li><a href = "checkout.php">Checkout</a></li> -->
          <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
          </li>
          <li><a href = "Account.php">My Account</a></li>

          <form method = "POST">
      <button value = "logout" class = "logout" name = "logout" type="submit" onclick="return confirm('Are you sure you want to logout?');"> Logout </button> 
      </form>   
          
        </ul>
      </nav>  
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

<br>

<body>
    <div class = "Menu-title" style="margin-bottom: 100px;">
        <h1 style = "text-transform: uppercase;">ORDER HISTORY</h1>
      <div>
    <main>
      <div class = "row">
      <?PHP
        $query = "SELECT * FROM orders where UID = '$UID'";
        $sql = $conn->query($query);

        if(mysqli_num_rows($sql) == 0){
          ?>
            <div class = "col-md-4" style="margin: auto; align-self: center;">
                    <div class ="caption">
                      <center>
                                    <img src="../cs/images/notfound.svg" width="100%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:30px;color:rgb(49, 49, 49)">You haven't place any orders yet!</p>
                          </center>
                    </div>
                  </div>
              </div>

    <?php
        }
        else{

        while($row = mysqli_fetch_assoc($sql)){ 

      ?>
            <div class = "col-md-4">
            <form method="post" id = "menu-card">
                <div class = "card">

                  <div class ="caption">
                    Order ID:
                    <H1 class = "product_name" name = "pname"><?php echo $row['OID']?></H1>
                    <H2 class = "product_name" name = "pname"><b>Tracking ID : </b><?php echo $row['tracking_no']?></H2>
            
                    <H2 class = "product_name" name = "pname"><b>Delivery Address :</b></H2>
                    <H2 class = "product_name" name = "pname"><?php echo $row['address']?></H2>

                    <H2 class = "product_name" name = "pname"><b>MOP : </b><?php echo $row['payment_mode']?></H2>
                

                    Status: 
                    <H3 class = "product_name" name = "pname"><?php echo $row['status']?></H2>
                  </div>
  
                  <div class = "subcaption">
                    <div class = "buttons">
                           <button type = "submit" name = "submit" class="btn order" onclick="return confirm('Add item to cart?');">Add to Cart</button>
                        </div>
                  </div>
                </div>
              </form>
            </div>
              <?PHP
          }
        }
            ?>

          </div>
            </main>



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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

  <?PHP include "footer.php"?>

    <script>
        let menu = document.querySelector('#menu')
        let navbar = document.querySelector('.navbar');
        let header2 = document.querySelector('.header-2');
        
        function navToggle(){
          
          menu.classList.toggle('fa-times');
          navbar.classList.toggle('nav-toggle');
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
