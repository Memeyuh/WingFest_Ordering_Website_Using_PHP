<?php
	$conn = new mysqli("localhost","root","","wingfest");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>