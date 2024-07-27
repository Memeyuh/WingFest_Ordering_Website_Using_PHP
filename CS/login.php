<HTML>
	<HEAD>
		<TITLE>Wing Fest Philippines </TITLE>
		<!--CSS LINK-->
		<link rel="stylesheet" type="text/css" href="CSS/HOME1.css" />
		<!--FONT LINK-->
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css2?family=Oswald' rel='stylesheet'>

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
		
		<link rel="stylesheet" href="modal.css">
		<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">    
		<link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		
		<!--NAVBAR-1 CODE-->
		<div class ="header-1">
			<a href = "index.php" class = "logo"><img src = "images/LOGO1.png"></a>
			<nav class="navbar">
				<ul>
					<li><a onclick = "navToggle();" href = "INDEX.php" class = "active">Home</a></li>
					<li><a onclick = "navToggle();" href = "MENU.php">Menu</a></li>
					<li><a onclick = "navToggle();" href = "ORDERS.php">Orders</a></li>
					<li><a onclick = "navToggle();" href = "CONTACT.php">Contact Us</a></li>
					<li><a a href = "Modal-Login.php#modal" type="button" class="button-login" data-toggle="modal" data-target="#staticBackdrop">Login</a></li>
				</ul>
			</nav>					
		</div>
		
		<!--NAVBAR-2 CODE-->
		<div class="header-2">
			<div id = "menu" class="fas fa-bars" onclick = "navToggle();"></div>		
				<nav class="navbar">
					<ul>
						<li><a onclick = "navToggle();" href = "#">Deliver to: (Select Address)</a></li>
					</ul>
				</nav>			
			</div>
				
	</HEAD>
	
	<BODY>
		<?php include "Modal-Login.php"?>
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
							<a href = "MENU.php">
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
									<a href = "MENU.php">
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
	</BODY>

	<style>

	.modal{
		margin-top: 200px;
	}

	.modal-body input{
		text-transform: none;
	}
	.close span{
		color: black;

	}
	</style>
	

	
</HTML>

