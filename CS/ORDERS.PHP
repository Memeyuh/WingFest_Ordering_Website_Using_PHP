<?php
  session_start();
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
	<HEAD>
		<TITLE>Wing Fest Philippines </TITLE>
		<!--CSS LINK-->
		<link rel="stylesheet" type="text/css" href="CSS/HOME.css" />
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
		
		<!--NAVBAR-1 CODE-->
		<div class ="header-1">
			<a href = "index.php" class = "logo"><img src = "images/LOGO1.png"></a>
			<nav class="navbar">
				<ul>
					<li><a href = "INDEX.php">Home</a></li>
					<li><a href = "MENU.php" >Menu</a></li>
					<li><a href = "HOME.php" class = "active">Orders</a></li>
					<li><a href = "Account.php">My Account</a></li>
				</ul>
			</nav>
			<form method = "POST">
			<button value = "Logout" class = "logout" name = "Logout" type="submit"> Logout </button>	
			</form>						

		</div>
		
		<!--NAVBAR-2 CODE-->
		<div class="header-2">
			<div id = "menu" class="fas fa-bars" onclick = "navToggle();"></div>		
				<nav class="navbar">
					<ul>
						<li style="color:white"> <a onclick = "navToggle();" href = "#"></a></li>
					</ul>
				</nav>			
			</div>
				
	</HEAD>
	
	<br>

	<BODY>

		

		
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
	</BODY>	
</HTML>
<!-- -->

