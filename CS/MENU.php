<?php
	include 'connection.php';	
	session_start();

	 $sql = "SELECT * FROM products WHERE Availability='Available'";
	 $all_products = $conn->query($sql);	

	 if(isset($_SESSION['Username'])){
		$user = $_SESSION['Username'];

		$query="Select UID from user where email = '$user'";
		$run = $conn->query($query);

		while($row = mysqli_fetch_assoc($run)){
		$UID = $row['UID'];
		}
	}

?>
<HTML>
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
	.quantity {
		display: inline-block;
		justify-content: justify;
		text-align: center;
	}

	.caption input{
		text-align: center;
		background: none;
		border: none;
		line-height: 12px;
	}

	.product_name{
		margin-top: -15px;
		padding: 0px;
		font-size: 18px;
  		font-weight: 900;
  		color: white;
	}

	.price{
		font-size: 16px;
  		font-weight: 900;
  		color: #ff9e2d;
	}

	.quantity label{
		font-size: 9px;
	}

	.quantity input{
		width: 50%;
		height: 10px;
		font-size: 9px;
	}

	</style>
	<HEAD>
		<!--CSS LINK-->
		<link rel="stylesheet" type="text/css" href="CSS/MENU1.css" />
		<link rel="stylesheet" type="text/css" href="CSS/NAV_AND_FOOTER1.css"/> 

		<title>Menu | Wing Fest Philippines</title>
		<link rel="icon" href="images/LOGO-ICON.png">
		<!-- <TITLE>Wing Fest Philippines </TITLE>
		<!--CSS LINK OF NAV AND FOOTER-->

		<!--FONT LINK-->
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css2?family=Oswald' rel='stylesheet'>

		<!--FOOTER LINK-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

		<!--SCRIPT LINK-->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  		<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
		
		
		<!--NAVBAR LINK-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		
		<?PHP 
			if(isset($_SESSION['Username'])){

				
		?>
		<!--NAVBAR-1 CODE-->
		<div class ="header-1">
			<a href = "index.php" class = "logo"><img src = "images/LOGO1.png"></a>
			<nav class="navbar">
				<ul>
					<li><a href = "INDEX.php">Home</a></li>
					<li><a href = "MENU.php" class = "active">Menu</a></li>
					<li><a href = "HOME.php">Orders</a></li>
					<!-- <li><a href = "checkout.php">Checkout</a></li> -->
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
			</form>	 -->		
			</div>

	<?php 
	}
	?>

	<?PHP 
	if(!isset($_SESSION['Username'])){
	?>
		<!--NAVBAR-1 CODE-->
		<div class ="header-1">
			<a href = "index.php" class = "logo"><img src = "images/LOGO1.png"></a>
			<nav class="navbar">
				<ul>
					<li><a href = "INDEX.php">Home</a></li>
					<li><a href = "MENU.php" class = "active">Menu</a></li>
					<li><a href = "user-login.php">Sign Up</a></li>
					<li><a href = "CONTACT.php">Contact Us</a></li>
					
				</ul>
			</nav>					
			<!-- <form action = "" method="POST">
				<input type = "search" required placeholder = "Search for your Wing Fest favorites" name = "search" class="form-control">
				<label for = "search" class = "fas fa-search"></label>
			</form>	 -->		
		</div>

	<?php
	}
	?>
		
		<!--NAVBAR-2 CODE-->
		<div class="header-2">
			<div id = "menu" class="fas fa-bars" onclick = "navToggle();"></div>		
				<nav class="navbar">
					<ul>
						<!-- <li><a onclick = "navToggle();" href = "#">ALL</a></li>
						<li><a onclick = "navToggle();" href = "#">WINGS</a></li>
						<li><a onclick = "navToggle();" href = "#">PASTA</a></li>
						<li><a onclick = "navToggle();" href = "#">SIDES</a></li>
						<li><a onclick = "navToggle();" href = "#">DRINKS</a></li> -->

						<li><a onclick = "navToggle();" href = "MENU.php">ALL</a></li>
						<?php
							$result = $conn->query("SELECT * FROM categ WHERE status = 'Visible'");

								while ($row = $result->fetch_object()){
									echo"<li><a href = '?action=".$row->name."' name = '".$row->name."
									'>".$row->name."</a></li>";
								}
						?>
					</ul>
				</nav>			
		</div>

		

	</HEAD>
	<!-- BODY -->
	<BODY>
	<?PHP 
		if(isset($_SESSION['Username'])){

		if($_GET){
			$action=$_GET["action"];

		?>
			<div class = "Menu-title" style="margin-bottom: 100px;">
				<h1 style = "text-transform: uppercase;">WING FEST <?php echo $action ?> MENU </h1>
			<div>

		<?php
		}
		else{
			?>
			<div class = "Menu-title">
				<h1>WING FEST MENU </h1>
			<div>

		<?php
		}
		?>
		<main id = "article">
			<div class = "row">
						
			<?php
					//session_start();				
					if($_GET){
						$action=$_GET["action"];
						$filter = $conn->query("SELECT products.Category from products inner join categ on products.Category=categ.name where categ.name='$action';");


						if(mysqli_num_rows($filter) == 0){
							?>
							 <div class = "col-md-4" style="margin: auto; align-self: center;">
                    <div class ="caption">
                      <center>
                                    <img src="../cs/images/noprod.png" width="100%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:30px;color:rgb(49, 49, 49)">Sorry, we don't have any products here yet...</p>
                          </center>
                    </div>
                  </div>
              </div>

						
						
		<?php
						}
						 // $selected = $filter->fetch_assoc()["Category"];
						 // $category = $selected;
						elseif(mysqli_num_rows($filter) > 0){

							$query = "SELECT * FROM products where Category = '$action' and Availability = 'Available';";
							$result = $conn->query($query);

							while($row = mysqli_fetch_assoc($result)){
							
			?>	
							<form method="post" id = "menu-card">
								<div class = "card">
									<div class = "image">
										<input hidden = "true" name = "ID" value ="<?php echo $row['Prod_ID'];?>"></input>
										<img name = "pimage" src="<?php echo "../ADMIN/Images/" . $row['image']; ?>" alt="">
									</div>				

									<div class ="caption">
										<input readonly class = "product_name" name = "pname" value ="<?php echo $row['Product_name'];?>"></input>
										<input readonly class = "price" name = "pprice" value = "<?php echo $row['Price'];?>"></input>
									</div>							

									<div class = "subcaption">
										<p>
											<?php echo $row['Description'];?>
										</p>
										<div class="row">
											<div class = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
												<label for="qty" style="font-size: 13px; color: #ff9e2d;font-weight: bold;">Quantity: </label>
											</div>

											<div class = "col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
												<input min = "1" type="number" name = "qty" class="form-control pqty" value="1" required style = "height: 25px; padding: 1px; margin-left: 12px; margin-top: -1px;">
											</div>
										</div>
										<div class = "buttons">
								           <button type = "submit" name = "submit" class="btn order" onclick="return confirm('Add item to cart?');">Add to Cart</button>
								        </div>
									</div>
								</div>
							</form>
		
						<?php
								}
						}
						else{
							while($row = mysqli_fetch_assoc($all_products)){

						?>
							<form method="post" id = "menu-card">
								<div class = "card">
									<div class = "image">
										<input hidden = "true" name = "ID" value ="<?php echo $row['Prod_ID'];?>"></input>
										<img name = "pimage" src="<?php echo "../ADMIN/Images/" . $row['image']; ?>" alt="">
									</div>				

									<div class ="caption">
										<input readonly class = "product_name" name = "pname" value ="<?php echo $row['Product_name'];?>"></input>
										<input readonly class = "price" name = "pprice" value = "<?php echo $row['Price'];?>"></input>
									</div>							

									<div class = "subcaption">
										<p>
											<?php echo $row['Description'];?>
										</p>
										<div class="row">
											<div class = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
												<label for="qty" style="font-size: 13px; color: #ff9e2d;font-weight: bold;">Quantity: </label>
											</div>

											<div class = "col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
												<input min = "1" type="number" name = "qty" class="form-control pqty" value="1" required style = "height: 25px; padding: 1px; margin-left: 12px; margin-top: -1px;">
											</div>
										</div>
										<div class = "buttons">
								           <button type = "submit" name = "submit" class="btn order" onclick="return confirm('Add item to cart?');">Add to Cart</button>
								        </div>
									</div>
								</div>
							</form>
		
								
						<?php
							}
						}
						?>

			<?php
							
					}
					else{
						while($row = mysqli_fetch_assoc($all_products)){
			?>
						<form method="post" id = "menu-card">
								<div class = "card">
									<div class = "image">
										<input hidden = "true" name = "ID" value ="<?php echo $row['Prod_ID'];?>"></input>
										<img name = "pimage" src="<?php echo "../ADMIN/Images/" . $row['image']; ?>" alt="">
									</div>				

									<div class ="caption">
										<input readonly class = "product_name" name = "pname" value ="<?php echo $row['Product_name'];?>"></input>
										<input readonly class = "price" name = "pprice" value = "<?php echo $row['Price'];?>"></input>
									</div>							

									<div class = "subcaption">
										<p>
											<?php echo $row['Description'];?>
										</p>
										<div class="row">
											<div class = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
												<label for="qty" style="font-size: 13px; color: #ff9e2d;font-weight: bold;">Quantity: </label>
											</div>

											<div class = "col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
												<input min = "1" type="number" name = "qty" class="form-control pqty" value="1" required style = "height: 25px; padding: 1px; margin-left: 12px; margin-top: -1px;">
											</div>
										</div>
										<div class = "buttons">
								           <button type = "submit" name = "submit" class="btn order" onclick="return confirm('Add item to cart?');">Add to Cart</button>

								        </div>
									</div>
								</div>
							</form>
		
			<?php
					}
				}
			}
			?>





		<?PHP 
		if(!isset($_SESSION['Username'])){

		if($_GET){
			$action=$_GET["action"];
		?>
			<div class = "Menu-title">
				<h1 style = "text-transform: uppercase;">WING FEST <?php echo $action ?> MENU </h1>
			<div>

		<?php
		}
		else{
			?>
			<div class = "Menu-title">
				<h1>WING FEST MENU </h1>
			<div>

		<?php
		}
		?>
		<main id = "article">
			<div class = "row">
						
			<?php
					//session_start();				
					if($_GET){
						$action=$_GET["action"];

						$filter = $conn->query("SELECT products.Category from products inner join categ on products.Category=categ.name where categ.name='$action';");


						if(mysqli_num_rows($filter) == 0){
							?>
							 <div class = "col-md-4" style="margin: auto; align-self: center;">
			                    <div class ="caption">
			                      <center>
			                                    <img src="../cs/images/noprod.png" width="100%">
			                                    
			                                    <br>
			                                    <p class="heading-main12" style="margin-left: 45px;font-size:30px;color:rgb(49, 49, 49)">Sorry, we don't have any products here yet...</p>
			                          </center>
			                    </div>
			                  </div>
			              </div>
			<?php					

						}elseif(mysqli_num_rows($filter) > 0){

							$query = "SELECT * FROM products where Category = '$action' and Availability = 'Available';";
							$result = $conn->query($query);

							while($row = mysqli_fetch_assoc($result)){
			?>
							<form method="post" id = "menu-card">
								<div class = "card">
									<div class = "image">
										<input hidden = "true" name = "ID" value ="<?php echo $row['Prod_ID'];?>"></input>
										<img name = "pimage" src="<?php echo "../ADMIN/Images/" . $row['image']; ?>" alt="">
									</div>				

									<div class ="caption">
										<input readonly class = "product_name" name = "pname" value ="<?php echo $row['Product_name'];?>"></input>
										<input readonly class = "price" name = "pprice" value = "<?php echo $row['Price'];?>"></input>
									</div>							

									<div class = "subcaption">
										<p>
											<?php echo $row['Description'];?>
										</p>
										
									</div>
								</div>
							</form>	
						<?php
							}
						}
						else{
							while($row = mysqli_fetch_assoc($all_products)){

						?>
							<form method="post" id = "menu-card">
								<div class = "card">
									<div class = "image">
										<input hidden = "true" name = "ID" value ="<?php echo $row['Prod_ID'];?>"></input>
										<img name = "pimage" src="<?php echo "../ADMIN/Images/" . $row['image']; ?>" alt="">
									</div>				

									<div class ="caption">
										<input readonly class = "product_name" name = "pname" value ="<?php echo $row['Product_name'];?>"></input>
										<input readonly class = "price" name = "pprice" value = "<?php echo $row['Price'];?>"></input>
									</div>							

									<div class = "subcaption">
										<p>
											<?php echo $row['Description'];?>
										</p>
										
									</div>
								</div>
							</form>		
						<?php
							}
						}
						?>

			<?php
							
					}
					else{
						while($row = mysqli_fetch_assoc($all_products)){
			?>
						<form method="post" id = "menu-card">
								<div class = "card">
									<div class = "image">
										<input hidden = "true" name = "ID" value ="<?php echo $row['Prod_ID'];?>"></input>
										<img name = "pimage" src="<?php echo "../ADMIN/Images/" . $row['image']; ?>" alt="">
									</div>				

									<div class ="caption">
										<input readonly class = "product_name" name = "pname" value ="<?php echo $row['Product_name'];?>"></input>
										<input readonly class = "price" name = "pprice" value = "<?php echo $row['Price'];?>"></input>
									</div>							

									<div class = "subcaption">
										<p>
											<?php echo $row['Description'];?>
										</p>
										
									</div>
								</div>
							</form>	
			<?php
					}
				}
			}
			?>
		</div>
		</main>

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
			  
		</script>
	</BODY>	
</HTML>
<?php 

 if(isset($_POST['submit'])){
 		$pid = $_POST['ID'];
	 	$pname = $_POST['pname'];
	 	$pprice = $_POST['pprice'];
	 	$pqty = $_POST['qty'];
	 	$total_prc = $pprice * $pqty;

	 	$query = "SELECT * FROM acart where PID = '$pid' and UID ='$UID'";
	 	$result = mysqli_query($conn, $query);

	 	if(mysqli_num_rows($result)==0){

	 		$insert = "INSERT INTO acart (PID, UID ,Product_name, Price, Quantity, Total) VALUES ('$pid', '$UID','$pname','$pprice','$pqty','$total_prc')";
			$run = mysqli_query($conn, $insert);

			if ($run) {

				$mirror = "INSERT INTO checked (PID, UID ,Product_name, Price, Quantity, Total) VALUES ('$pid', '$UID','$pname','$pprice','$pqty','$total_prc')";
				$reflect = mysqli_query($conn, $mirror);

		        echo '<script>alert("Successfully Added to Cart!");</script>';
		    } else {
		        echo '<script>alert("Failed to Add to Cart!");</script>';
		    }
	 		

	 	}else{

	 		while($row = mysqli_fetch_assoc($result)){

	 		$Oqty = $row["Quantity"];
	 		$Nqty = $pqty + $Oqty;

	 		$Oprc = $row["Price"];
	 		$Nprc = $Oprc * $Nqty;

	 		echo $Nqty, $Nprc;



	 		$update = "UPDATE acart SET Quantity = '$Nqty', Total = '$Nprc' where PID = '$pid' and UID ='$UID'";
			$run = mysqli_query($conn, $update);

			if ($run) {

				$mupdate = "UPDATE checked SET Quantity = '$Nqty', Total = '$Nprc' where PID = '$pid' and UID ='$UID'";
				$mrun = mysqli_query($conn, $mupdate);

		        echo '<script>alert("Successfully Added to Cart!");</script>';
		    } else {
		        echo '<script>alert("Failed to Add to Cart!");</script>';
		    }
	 	}
	 }
	 	







	  

 }

if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		echo '<script>alert("Logout Successfully!"); window.location.href = "Menu.php";</script>';
	}
?>