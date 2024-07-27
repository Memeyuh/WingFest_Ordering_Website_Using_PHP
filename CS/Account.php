<?php
	include 'connection.php';
	session_start();

	$user = $_SESSION['Username'];

   	$query = "SELECT * FROM user where email = '$user';";
    $query_run = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {

    $fname = $row['fname'];
    $lname = $row['lname'];
    $address = $row['address'];
    $birthdate =$row['birthdate'];
    $age = $row['age'];
    $gender = $row['gender'];
    $contact = $row['contact'];
    $email = $row['email'];
    $uname = $row['uname'];
    $pwd = $row['pwd'];
    $id = $row['UID']; 


    if(isset($_POST['logout'])){
    	session_unset();
    	session_destroy();
    	echo '<script>alert("Logout Successful!"); window.location.href = "index.php";</script>';
    }
    if(isset($_POST['submit'])){
    	$nemail = $_POST['email'];
    	$nuser = $_POST['username'];
    	$npass = $_POST['password'];
    	$ncpass = $_POST['cpassword'];

    	$nfirst = $_POST['fname'];
    	$nlast = $_POST['lname'];
    	$naddress = $_POST['address'];
    	$nbirthdate = $_POST['birthdate'];
    	$npronouns = $gender;
    	$nage = $_POST['age'];
    	$ncontact = $_POST['contactno'];

      if ($npass === $ncpass) {

    	$query = "UPDATE user SET fname='$nfirst',lname='$nlast',address='$naddress',birthdate='$nbirthdate',age='$nage',
        contact='$ncontact',email = '$nemail', gender ='$gender' ,uname='$nuser',pwd='$npass' WHERE UID='$id'";
   		
   		$query_run = mysqli_query($conn, $query);

    	if ($query_run) {
            echo '<script>alert("Update Successful!"); window.location.href = "account.php";</script>';
        } else {
            echo '<script>alert("Failed to Update Account Details!"); window.location.href = "account.php";</script>';
        }

     } else {
            echo '<script>alert("Password does not match");</script>';
        }

    }  
            
                          
                                       
?>
<!DOCTYPE html>
<html>
<head>

	<style>
	@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Oswald', sans-serif;
  }
	.logout{
      background: white;
      border: none;
      width: 70px;
      position: relative;
      bottom: 20px;
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
    bottom: -5px;
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
    margin-bottom: 30px;
  }
	.header-1 img{
		margin-top: -43px;
	}

  body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}

section{
	height: 700px;
	width: 100%;
	background: #ff9e2d;
	justify-content: center;
	align-self: center;
	text-align: center;
	margin-top: -20px;
	padding-bottom: 50px;
}

section h6{
	color: black;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}
.container{
	margin-top: 20px;
}

.card {
	margin-top: 60px;
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
.header-1{
	height: 60px;
}
.header-2 nav{
	height: 40px;
}
.Ctitle h6{
	color: black;
	font-size: 25px;
}
.text-right button{
	background-color: #e80028;
	color: white;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-top: -290px;
	margin-right: 240px;
}
.text-right button:hover{
	background-color: #ff9e2d;
}
.gender-details span {
    font-family: 'Poppins';
  }

  .form-group{
  	justify-content: left;
  	text-align: left;
  }

  .category {
    display: flex;
    width: 80%;
    margin: 14px 0;
    justify-content: space-between;
  }

  .category label {
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  .category label .dot {
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
  }

  #dot-1:checked~.category label .one,
  #dot-2:checked~.category label .two,
  #dot-3:checked~.category label .three {
    background: #ff9e2d;
    border-color: #d9d9d9;
  }
  .gender-details input[type="radio"] {
    display: none;
  }
  @media(max-width: 584px) {
    .container {
      max-width: 100%;
    }

    form .user-details .input-box {
      margin-bottom: 15px;
      width: 100%;
    }

    form .category {
      width: 100%;
    }

    .content form .user-details {
      max-height: 300px;
      overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
      width: 5px;
    }

    @media(max-width: 459px) {
      .container .content .category {
        flex-direction: column;
      }
    }
  }

	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Account | Wing Fest Philippines</title>
	<link rel="icon" href="images/LOGO-ICON.png">

	<!--CSS LINK-->
		<link rel="stylesheet" type="text/css" href="CSS/NAV_AND_FOOTER.css"/> 

		<!--FONT LINK-->
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css2?family=Oswald' rel='stylesheet'>

		<!--FOOTER LINK-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


	    <!-- SCRIPTS -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
	    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	    <script src="js/jquery-3.3.1.slim.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
			
		
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
		                  <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
		                </li>
		          <li><a class = "active" href = "Account.php">My Account</a></li>
		          
		          
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
        <!-- <div class="header-2" style = "height: 8%; background: #191717;">
            <div id = "menu" class="fas fa-bars" onclick = "navToggle();"></div>        
                <nav class="navbar">
                    <ul>
                        <h2 style="color: white; font-family: 'oswald'; font-weight: bolder; letter-spacing: 3.5px; margin-top: -20px;">MY ACCOUNT</h2>
                    </ul>
                </nav>          
        </div> -->
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
	<section class = "user-sec">
   <form method="post" action="account.php">
	<div class="container">
		<div class="row gutters">
		<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class = "Ctitle" style="color:black;">
						<h6 id = "CTitle" class="mb-2">Account Details</h6>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" minlength="20"
                maxlength="100" class="form-control" name="email" id="email" required placeholder="email@yahoo.com" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" value="<?php echo $email; ?>">
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="uname" maxlength="12" minlength="6"
                placeholder="Enter your username" required value="<?php echo $uname; ?>">
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" id="pwd" maxlength="16" minlength="8"
                placeholder="Enter your password" required value="<?php echo $pwd; ?>">
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group">
							<label for="cpassword">Confirm Password</label>
							<input type="password" class="form-control" name="cpassword" id="cpassword" maxlength="16" minlength="8"
                placeholder="Confirm your password" required>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class = "Ctitle">
						<h6 id = "CTitle" class="mb-2">Personal Details</h6>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="fname">First Name</label>
							<input type="text" class = "form-control" name="fname" id="fname" placeholder="Enter your first name" required value="<?php echo $fname; ?>" onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="lname">Last Name</label>
							<input type="text" class = "form-control" name="lname" id="lname" placeholder="Enter your last name" required value="<?php echo $lname; ?>" onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)">
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" placeholder="Enter your address" required value="<?php echo $address; ?>" onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33) || (event.charCode > 43 && event.charCode < 47)">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="dob">Date of Birth</label>
							<input type="date" readonly ="TRUE" class = "form-control"name="birthdate" id="dob3" onmousemove="getAge()" required value="<?php echo $birthdate; ?>"  min = "1933-01-01" max="2005-06-30" >
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="website">Age</label>
							<input type="number" class="form-control" name="age" readonly="true" id="age3" value="<?php echo $age; ?>">
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="dob">Contact No</label>
							<input style="margin-left: -10px;" type="text" class="form-control"name="contactno" id="contact" placeholder="####-###-####" required value="<?php echo $contact; ?>" minlength="11"  maxlength="11" onkeypress="return (event.charCode > 47 && event.charCode < 58)">
						</div>
					</div>
					
				</div>
				
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<button type="submit" value = "submit" id="submit" name="submit" class="btn Update">Update</button>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>
	</form>
</section>
  <?php include "footer.php"?>
  <script src="js/user-login.js"></script>
  <script>
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
 
</body>
</html>
<?php 
}
?>
