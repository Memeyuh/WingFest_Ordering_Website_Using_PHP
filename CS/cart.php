<?php
  session_start();
  include 'connection.php';

  if(isset($_SESSION['Username'])){

  $user = $_SESSION['Username'];

    $fetch = "SELECT UID, address from user where email = '$user'";
    $run = $conn->query($fetch);
  
    while($row = mysqli_fetch_assoc($run)){
    $myid = $row["UID"];
    $myadd = $row["address"];
    }
  }

  

  $grand_total = 0;
  $allItems = '';
  $items = [];

  $sql = "SELECT CONCAT(Product_name, '(',Quantity,')') AS Quantity, Price FROM acart";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $grand_total += $row['Price'];
    $items[] = $row['Quantity'];
  }
  $allItems = implode(', ', $items);
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
  body{
    min-height: 120vh;
    display: flex;
    flex-direction: column;
  }
  .footer-distributed{
    margin-top: auto;
    margin-bottom: -30px;
  }
 /* .modal-dialog{
    height: 10%;
    width: 1000px;
  }*/

  </style>
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>My Cart | Wing Fest Philippines</title>
  <link rel="icon" href="images/LOGO-ICON.png">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="../ADMIN/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/MODAL.css">
  <link rel="stylesheet" type="text/css" href="CSS/NAV_AND_FOOTER.css"/> 

  <!--NAVBAR LINK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--NAVBAR-1 CODE-->
    <div class ="header-1">
      <a href = "index.php" class = "logo"><img src = "images/LOGO1.png"></a>
      <nav class="navbar">
        <ul>
          <li><a href = "INDEX.php">Home</a></li>
          <li><a href = "MENU.php">Menu</a></li>
          <li><a href = "HOME.php">Orders</a></li>
          <!-- <li><a href = "checkout.php">Checkout</a> -->
         
          </li>
                <li class="nav-item">
                  <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
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

<br>
<body>
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center" id = "cart-load">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th colspan="2">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'config.php';
                $stmt = $conn->prepare("SELECT * FROM acart where UID = '$myid'");
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['PID'] ?></td>
                <input type="hidden" name = "PID" class="pid" value="<?= $row['PID'] ?>">
                <!-- <td><img src="<?= $row['product_image'] ?>" width="50"></td> -->
                <td colspan="2"><?= $row['Product_name'] ?></td>
                <td>
                  <?php
					$peso_sign = "&#x20B1;";
					echo $peso_sign;
					?></i>&nbsp;&nbsp;<?= number_format($row['Price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['Price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['Quantity'] ?>" style="width:75px;">
                </td>
                <td><?php
					$peso_sign = "&#x20B1;";
					echo $peso_sign;
					?></i>&nbsp;&nbsp;<?= number_format($row['Total'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['PID'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['Total']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="MENU.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Menu</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><?php
						$peso_sign = "&#x20B1;";
						echo $peso_sign;
						?></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a onclick="return confirm('Checkout all items in cart?');" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>" href="#CheckoutModal" class="deleteBtn" style="color: white; background: #0d98ba" data-toggle="modal" role="dialog"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

                      <!----- VIEW MODAL ----->
                    <div class="modal fade" tabindex="-1" id="CheckoutModal" role="dialog">
                        <div class="modal-dialog" role="document"
                            style="min-width: 900px; max-height: 480px; display: grid; grid-template-columns: 1fr 1fr; column-gap: 4px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delivery Details</h5>
                                </div>
                                              <form action="cart.php" method="POST">
                  <div class="modal-body" style="display: flex; flex-direction: row; margin: 20px 0 0 0;">
                      <input type="hidden" name="edit_id" id="edit_id">
                          <table class="table-bordered table-hover" style="width: calc(100% / 1 - 0px);">
                              <thead style="font-size: 15px; text-align: center;">
                                  <tr>
                                      <th scope="col" colspan="4" style="font-weight: bolder">Product</th>
                                      <th scope="col" colspan="3" style="font-weight: bolder">Price</th>
                                      <th scope="col" colspan="3" style="font-weight: bolder">Quantity</th>
                                      <th scope="col" colspan="3" style="font-weight: bolder">Total Amount</th>
                                  </tr>
                              </thead>
                              
                              <tbody style="font-size: 15px; text-align: center;">
                                  <?php
                                    require 'config.php';
                                    $stmt = $conn->prepare("SELECT * FROM acart where UID = '$myid'");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $grand_total = 0;
                                    while ($row = $result->fetch_assoc()):
                                  ?>
                                      <tr>
                                          <td colspan="4">
                                            <?= $row['Product_name'] ?>
                                          </td>

                                          <td colspan="3">
                                            <?php $peso_sign = "&#x20B1;";echo $peso_sign;?>
                                            </i>&nbsp;&nbsp;<?= number_format($row['Price'],2); ?>
                                          </td>

                                          <input type="hidden" class="pprice" value="<?= $row['Price'] ?>">
                                        
                                          <td colspan="3">
                                            <?= $row['Quantity'] ?>
                                          </td>

                                          <td colspan="3">
                                            <?php $peso_sign = "&#x20B1;";echo $peso_sign;?></i>&nbsp;&nbsp;<?= number_format($row['Total'],2); ?>
                                          </td>
                                      </tr>

                                      <?php $grand_total += $row['Total']; ?>
                                      <?php endwhile; ?>
              
                                      
                              </tbody>
                          </table>
                  </div>
              </form>
                            </div>

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Order Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="cart.php" method="POST">
                                    <div class="modal-body"
                                        style="display: flex; flex-direction: row; margin: 20px 0 0 0;">
                                        <input type="hidden" name="edit_id" id="edit_id">
                                        <table class="table-bordered table-hover" style="width: calc(100% / 1 - 0px);">
                                            <thead style="font-size: 15px; text-align: center;">
                                                <h5 style="font-size: 1.3rem; padding: 30px 0px 30px 0px; font-weight: 400; width: 100%; margin-top: -30px;border-bottom: 1px solid #CCC">
                              <b>Total Price:</b>&nbsp;&nbsp;<?= number_format($grand_total,2); ?>
                          </h5>
                                            </thead>
                                        </table>
                                        <div class="form-group" style="width: calc(100% / 1 - 0px)">
                                            <label>Delivery Address</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                 required value ="<?php echo $myadd;?>" >
                                        </div>
                                        <div class="form-group" style="width: calc(100% / 1 - 0px)">
                                            <label>Payment Mode:</label>
                                            <input type="hidden" name="tracking_no" value="<?= $row['tracking_no'] ?>">
                                            <select name="pmode" id="status" class="form-select" required>
                                                <option value="COD" <?= ['status'] == 'COD' ? "selected" : "" ?>>
                                                    COD
                                                </option>
                                                <option value="GCASH" <?= ['status'] == 'GCASH' ? "selected" : "" ?>>
                                                    GCASH</option>
                                                <option value="DEBIT/CREDIT" <?= ['status'] == 'DEBIT/CREDIT' ? "selected" : "" ?>>
                                                    DEBIT/CREDIT</option>
                                            </select>
                                        </div>
                                        <div class="form-group"
                                            style="width: calc(100% / 1 - 0px); display: flex; flex-direction: row-reverse;">
                                            <button type="submit" name="checkout"
                                                class="btn btn-warning text-light">Checkout</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  

<!--   <div class="modal fade" tabindex="-1" id="CheckoutModal" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document" style="height: 600px; width: 700px" >
          <div class="modal-content" stlye="padding: 0; margin: 0;">
              <div class=" modal-header">
                 <h5 class="modal-title">Complete your order details to proceed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
              </div>
              <div class="jumbotron p-3 mb-2 text-center">
                <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
                <h5><b>Total Amount : </b>₱ <?= number_format($grand_total,2) ?></h5>
            </div>

              <form action="cart.php" method="POST">
                  <div class="modal-body" style="margin-top: 0; margin-bottom: 2.5rem;">
                      <div class="form-group">
                        <textarea name="address" required class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..." minlength="30"></textarea>
                      </div>
                      <h6 class="text-center lead">Select Mode of Payment</h6>
                      <div class="form-group">
                        <select name="pmode" class="form-control" required>
                          <option value="" selected disabled>-Select Mode of Payment-</option>
                          <option value="cod">Cash On Delivery (COD)</option>
                          <option value="netbanking">GCASH</option>
                          <option value="cards">Debit/Credit Card</option>
                        </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                      <button type="submit" name="checkout" class="btn btn-success">Checkout</button>
                  </div>
              </form>
          </div>
      </div>
  </div> -->

                     


  <?php include 'footer.php'?>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

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


   
    // $(document).ready(function(){              
    //         // Select all the rows in the table
    //         // and get the count of the selected elements
    //         var rowCount = $("#cart-load tr").length;
    //         // alert(rowCount-3);
    //         document.getElementById('cart-item').innerHTML = rowCount-3;
    //     });
  });
  </script>
  <br>

  
    <script>
        let menu = document.querySelector('#menu');
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
if(isset($_POST['checkout'])){
  //echo '<script>alert("Order request successfully sent!"); window.location.href = "HOME.php";</script>';

       $owner = "SELECT UID, contact, uname from user where email = '$user'";
       $run = $conn->query($owner);
      
        while($row = mysqli_fetch_assoc($run)){
        $uid = $row["UID"];
        $contact = $row["contact"];
        $uname = $row["uname"];

        $tprice = $grand_total;
        $track = uniqid();

        $address = $_POST['address'];
        $status = "Pending";
        $MOP = $_POST['pmode'];

        $sdupli = $conn->query("SELECT * FROM orders where status = 'Pending' and UID = '$uid';");

        if(mysqli_num_rows($sdupli) == 0){

        $ordets = "INSERT INTO orders (tracking_no, UID, uname, contact, address, total_price, payment_mode, status) values ('$track','$uid','$uname',
        '$contact', '$address', '$tprice', '$MOP', '$status')";
        $send = $conn->query($ordets);

        // $ntime = "UPDATE checked set created_at = now() where ";
        // $change = $conn->query($ntime);
        
          if($send){
                  $remove = "DELETE  from acart where UID = '$uid'";
                  $run_rev = $conn->query($remove);
                  echo '<script>alert("Checkout Successfully!"); window.location.href = "cart.php";</script>';
              }  
        }else{
          echo '<script>alert("Cannot checkout! You still have a pending order"); window.location.href = "cart.php";</script>';
        }
 
  }
  



}
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    echo '<script>alert("Logout Successfully!"); window.location.href = "Menu.php";</script>';
  }
?>