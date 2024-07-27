<?php
	include 'connection.php';	

?>
<HTML>
	<style>

	.modal{
		margin-top: 200px;
		border-radius: 10px;
		box-shadow: 0 15px 35px rgba(50,50,93,.1),0 5px 15px rgba(0,0,0,.07);
	}

	.modal-body input{
		text-transform: none;
	}
	.close span{
		color: black;
		font-size: 25px;

	}
	</style>
	<HEAD>
		<TITLE>Wing Fest Philippines </TITLE>
		<!--CSS LINK-->
		<link rel="stylesheet" type="text/css" href="CSS/HOME.css" />
		<!--FONT LINK-->
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css2?family=Oswald' rel='stylesheet'>
		<link rel="icon" href="images/LOGO-ICON.png">

		<!--CAROUSEL LINK-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<!--FOOTER LINK-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		
		<!--NAVBAR LINK-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		
		<!--NAVBAR-1 CODE-->
		<div class ="header-1">
			<a href = "index.php" class = "logo"><img src = "images/LOGO1.png"></a>
			<nav class="navbar">
				<ul>
					<li><a onclick = "navToggle();" href = "INDEX.php" class = "active">Home</a></li>
					<li><a onclick = "navToggle();" href = "MENU.php">Menu</a></li>					
					<li><a a href = "Modal-Login.php#modal" type="button" class="button-login" data-toggle="modal" data-target="#staticBackdrop">Login</a></li>
					<li><a onclick = "navToggle();" href = "user-login.php">Sign Up</a></li>
					<li><a href = "CONTACT.php">Contact Us</a></li>
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
				
	</HEAD>
	
	<BODY>
		<?php include 'Modal-Login.php'?>
		<!--PARALLAX CODE -->
		<div class = "wrapper">				
			<header class = "wrap-header">
				<img src = "https://t3.ftcdn.net/jpg/02/89/65/68/360_F_289656851_XqQ4mL52h8fQAN2nOe7c26rDVDe8uOyH.jpg" class="background">
				<img src = "images/home-2.png" class="foreground1">
				<img src = "images/home1.png" class="foreground2">
				
					<h2 class= "title">Satisfy your cravings for wings</h2>
					<h1 class = "main-title">WELCOME TO <br> WING FEST!</h1>
					<div class = "home-btn">
						<button class = "btn btn1">
							<a href = "Modal-Login.php#modal" type="button" class="button-login" data-toggle="modal" data-target="#staticBackdrop">
								ORDER NOW
							</a>
						</button>
						<button class = "btn btn2">
							<a href = "MENU.php">
								BROWSE MENU
							</a>
						</button>
					</div>				
			</header>

			<div class = "content">
				<section class = "highlight">
					<div class = "featured-text">
							<h2 style = "font-size: 50px;color: white; justify-content: center;text-align: center; margin-top: 20px" >
									WINGSCLUSIVE AT WING FEST
							</h2>
							<h4 style = "font-size: 20px;color: white; justify-content: center;text-align: center; margin-bottom: -50px;">Discover your new favorites here!</h4>
				</div>
				<div class="container">
					  <div class="carousel">
						    <div class="carousel__face" style = "background-image: url('images/F1.png');"><span></span></div>
						    <div class="carousel__face" style = "background-image: url('images/F2.png');"><span></span></div>
						    <div class="carousel__face" style = "background-image: url('images/F3.png');"><span></span></div>
						    <div class="carousel__face" style = "background-image: url('images/F4.png');"><span></span></div>
						    <div class="carousel__face" style = "background-image: url('images/F5.png');"><span></span></div>
						    <div class="carousel__face" style = "background-image: url('images/F6.png');"><span></span></div>
						    <div class="carousel__face" style = "background-image: url('images/F7.png');"><span></span></div>
						    <div class="carousel__face" style = "background-image: url('images/F8.png');"><span></span></div>
						    <div class="carousel__face" style = "background-image: url('images/F9.png');"><span></span></div>
					  </div>
				</div>	
				</section>
			</div>

			<div class = "content1">
				<table width="100%" height = "100%" style="table-layout: fixed;">
					  <tr>
						    <td colspan="3">
						    	<img src = "images/rider.png" style="display: block;margin-left: auto; margin-right: auto;">
						    </td>
						    <td colspan="4">
						    	<h1 class = "title1">ORDER ON THE GO</h1>
						    	<h3 class = "title2">WE KNOW YOU'RE BUSY, THAT'S WHY WE'VE MADE IT EASY TO ORDER YOUR FAVORITE CHICKEN WINGS ON THE GO. JUST PLACE YOUR ORDER ANYTIME, ANYWHERE.</h3>
						    	<h4 class = "title3">Enjoy our delicious chicken wings from the comfort of your own home. We offer doorstep delivery so you can have your favorite meal delivered right to your doorstep. Don't want to leave your car? No problem, we offer curbside pickup for your convenience. Just place the order and we'll surely bring your food to you.</h4>
						    	<button class = "btn btn3">
									<a href = "Modal-Login.php#modal" type="button" class="button-login" data-toggle="modal" data-target="#staticBackdrop">
										ORDER NOW
									</a>
								</button>

						    </td>
					  </tr>
				</table>
			</div>
			<?php include 'footer.php'?>
		</div>



		
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

		<!-- Displaying Products Start -->
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include 'config.php';
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
              <h5 class="card-text text-center text-danger"><?php
				$peso_sign = "&#x20B1;";
				echo $peso_sign;
				?>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?></h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                  cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- Displaying Products End -->

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
	</BODY>

	

	
</HTML>