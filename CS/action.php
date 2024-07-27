<?php
	session_start();
	require 'config.php';

	//FETCH UID
	if(isset($_SESSION['Username'])){
		$user = $_SESSION['Username'];

		$query="Select UID from user where email = '$user'";
		$run = $conn->query($query);

		while($row = mysqli_fetch_assoc($run)){
		$UID = $row['UID'];

			// Get no.of items available in the cart table
			if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
			  $stmt = $conn->prepare("SELECT * FROM acart where UID = '$UID'");
			  $stmt->execute();
			  $stmt->store_result();
			  $rows = $stmt->num_rows;

		  	echo $rows;
			}
			// Remove single items from cart
			if (isset($_GET['remove'])) {
			  $id = $_GET['remove'];

			  $stmt = $conn->prepare("DELETE FROM acart WHERE UID ='$UID' and PID = '$id'");
			  $stmt->execute();

			  $_SESSION['showAlert'] = 'block';
			  $_SESSION['message'] = 'Item removed from the cart!';
			  header('location:cart.php');
			}

			// Remove all items at once from cart
			if (isset($_GET['clear'])) {
			  
			  $stmt = $conn->prepare("DELETE FROM acart WHERE UID ='$UID'");
			  $stmt->execute();
			  $_SESSION['showAlert'] = 'block';
			  $_SESSION['message'] = 'All Item removed from the cart!';
			  header('location:cart.php');
			}
		}
	}

	

	// Set total price of the product in the cart table
	// if (isset($_POST['qty'])) {
	//   $qty = $_POST['qty'];
	//   $pid = $_POST['pid'];
	//   $pprice = $_POST['pprice'];

	//   $tprice = $qty * $pprice;

	//   $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	//   $stmt->bind_param('isi',$qty,$tprice,$pid);
	//   $stmt->execute();
	// }

	// Checkout and save customer info in the orders table
	// if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	//   $name = $_POST['name'];
	//   $email = $_POST['email'];
	//   $phone = $_POST['phone'];
	//   $products = $_POST['products'];
	//   $grand_total = $_POST['grand_total'];
	//   $address = $_POST['address'];
	//   $pmode = $_POST['pmode'];

	//   $data = '';

	//   $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
	//   $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
	//   $stmt->execute();
	//   $stmt2 = $conn->prepare('DELETE FROM cart');
	//   $stmt2->execute();
	//   $data .= '<div class="text-center">
	// 							<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
	// 							<h2 class="text-success">Your Order Placed Successfully!</h2>
	// 							<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
	// 							<h4>Your Name : ' . $name . '</h4>
	// 							<h4>Your E-mail : ' . $email . '</h4>
	// 							<h4>Your Phone : ' . $phone . '</h4>
	// 							<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
	// 							<h4>Payment Mode : ' . $pmode . '</h4>
	// 					  </div>';
	//   echo $data;
	// }
?>