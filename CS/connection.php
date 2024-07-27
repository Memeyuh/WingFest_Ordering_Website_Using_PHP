<?php

    $conn= new mysqli("localhost","root","","wingfest");
    if ($conn->connect_error){
        die("Connection failed:  ".$conn->connect_error);
    }

?>