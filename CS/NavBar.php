		<!-- <TITLE>Wing Fest Philippines </TITLE>
		<!--CSS LINK OF NAV AND FOOTER-->

		<!--FONT LINK-->
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css2?family=Oswald' rel='stylesheet'>

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
					<li><a href = "MENU.php">Menu</a></li>
					<li><a href = "#">Orders</a></li>
					<li><a href = "#">Login</a></li>
					<li><a href = "#">Cart</a></li>
				</ul>
			</nav>					
			<form action = "">
				<input type = "search" placeholder = "Search for your Wing Fest favorites" id = "search">
				<label for = "search" class = "fas fa-search"></label>
			</form>			
		</div>

		
		<!--NAVBAR-2 CODE-->
		<div class="header-2">
			<div id = "menu" class="fas fa-bars" onclick = "navToggle();"></div>		
				<nav class="navbar">
					<ul>
						<li><a onclick = "navToggle();" href = "#">ALL</a></li>
						<li><a onclick = "navToggle();" href = "#">WINGS</a></li>
						<li><a onclick = "navToggle();" href = "#">PASTA</a></li>
						<li><a onclick = "navToggle();" href = "#">SIDES</a></li>
						<li><a onclick = "navToggle();" href = "#">DRINKS</a></li>
					</ul>
				</nav>			
		</div>