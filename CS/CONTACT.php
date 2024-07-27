<?php

    // SMTP
    $message_sent = false;
    if(isset($_POST['email']) && $_POST['email'] != ''){
        //SUBMIT FORM
        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];

            $to = "WingFest.PH@gmail.com";
            $body = "";

            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Message: ".$message. "\r\n";

            mail($to,$messageSubject,$body);

            $message_sent = true;
        }
    }
?>

<html lang="en">

<style type="text/css">
    :root{
        --font-color:#555;
        --font-hover-color:black;
    }
    body{
        
        justify-content:center;
        align-items:center;
        height:100vh;
        font-family:"Raleway", sans-serif;
        background-color:#161717;
    }

    .container{
        /*max-width:50px;*/
        box-shadow: 0 15px 35px rgba(50,50,93,.1),0 5px 15px rgba(0,0,0,.07);
        padding:2em;
        background-color:#fff;
        border-radius: 10px;
        margin-top: -70px;
    }
    .container h2{
        font-size: 40px;
        color: #ff9e2d;
        font-weight: bolder;
        justify-content: center;
        text-align: center;
    }

    .container h4{
        font-size: 18px;
        color: #000;
        justify-content: center;
        text-align: center;
        margin-top: -5px;
    }
    .form-group{
        margin-bottom:1.5em;
        transition:all .3s;
    }
    .form-control{
        box-shadow:none;
        border-radius:0;
        border-color:#ccc;
        border-style:none none solid none;
        width:100%;
        font-size:1.25em;
        transition:all .6s;
    }
    .form-control::placeholder{
        color: #3c3939;
    }
    .form-control:focus{
        box-shadow:none;
        border-color:var(--font-hover-color);
        outline:none;
    }
    .form-group:focus-within{
        transform:scale(1.1,1.1);
    }

    .form-control:invalid:focus{
        border-color:red;
    }
    .form-control:valid:focus{
        border-color:green;
    }

    #half{
        margin-right: 230px;
        margin-left: 10px;
        margin-top: 20px;
    }

    #name, #email{
        width: 48.5%;
        margin-left: 1px;
        margin-right: 1px;
        margin-top: -100px;
        display: inline-block;
    }

    .btn{
        height: 50px;
        background: #ff9e2d;
        border:1px solid #aaa;
        color: white;
        font-size:25px;
        padding:10 20px;
        text-transform:uppercase;
        position: relative;
        margin-left: 240px;
        margin-top: 10px;
    }
    .btn:hover{
        color:white;
        background-color: black;
    }
    textarea{
        resize:none;
    }

    .focused > .form-label{
        opacity:1;
        transform:translateX(0px);
    }

    .container1{
        text-shadow: 3px 3px 3px rgba(0, 0, 0, 1);
        text-align: justify;
        justify-content: center;
        margin-left: 80px;
        margin-top: 140px;
    }
    .container1 h1{
        color: white;
        font-size: 70px;
        margin-bottom: 40px;
    }
    .container1 h3{
        font-size: 30px;
        color: white;
    }


</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Wing Fest Philippines</title>
    <link rel="stylesheet" href="" media="all">
    <link rel="icon" href="images/LOGO-ICON.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script type="text/javascript" src="CONTACT.js"></script>
    <!--CSS LINK-->
        <!-- <link rel="stylesheet" type="text/css" href="CSS/CONTACT.css" /> -->
        <link rel="stylesheet" type="text/css" href="CSS/NAV_AND_FOOTER.css"/>
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
                    <li><a onclick = "navToggle();" href = "INDEX.php">Home</a></li>
                    <li><a onclick = "navToggle();" href = "MENU.php">Menu</a></li>                 
                    <li><a a href = "INDEX.php" type="button" class="button-login" data-toggle="modal" data-target="#staticBackdrop">Login</a></li>
                    <li><a onclick = "navToggle();" href = "user-login.php">Sign Up</a></li>
                    <li><a href = "CONTACT.php" class = "active">Contact Us</a></li>
                </ul>
            </nav>                  
        </div>              
            <!-- <form action = "" method="POST">
                <input type = "search" required placeholder = "Search for your Wing Fest favorites" name = "search" class="form-control">
                <label for = "search" class = "fas fa-search"></label>
            </form>  -->        
        </div>

        <!--NAVBAR-2 CODE-->
        <div class="header-2" style = "height: 8%; background: #191717;">
            <div id = "menu" class="fas fa-bars" onclick = "navToggle();"></div>        
                <nav class="navbar">
                    <ul>
                        <h2 style="color: white; font-family: 'oswald'; font-weight: bolder; letter-spacing: 3.5px;">CONTACT US</h2>
                    </ul>
                </nav>          
        </div>
        
       

</head>


<body style="background: url('https://as2.ftcdn.net/v2/jpg/03/93/44/87/1000_F_393448729_4gqqpTsBvE0LrnAauMFbQTdGLsDqZz2U.jpg'); background-size: cover; backdrop-filter: blur(5px);">

    <?php
    if($message_sent):

        echo '<script>alert("Email sent successfully!");window.location.href = "CONTACT.php";</script>';
    ?>


    <?php
    else:
    ?>
<br>

<div class = "content1">
                <table width="100%" height = "100%" style="table-layout: fixed;">
                      <tr>
                            <td colspan="3">
                                <div class="container1" style="width: 600px; height:600px;">
                                    <h1>Get in touch with us at Wing Fest!</h1>
                                    <h3>Hello, Dear Customer! We are located in Milestone Village, Karuhatan, Valenzuela City. Feel free to use
                                    the contact form on the right to reach us out, or write to us the old fashion way.</h3>
                                </div>
                            </td>
                            <td colspan="4">
                                <div class="container" style="width: 600px; height:600px;">
                                    <h2 class= "title" style="text-align: center;">How can we help you?</h2>
                                    <h4>Got a question, comment or suggestion?<br> We'd love to hear from you.</h4>
                                    <form action="CONTACT.php" method="POST" class="form">
                                        <div class="form-group">
                                            <label for="name" class="form-label" id = "half">Name</label>
                                            <label for="email" class="form-label" id = "half">Email</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" tabindex="1" required>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" tabindex="2" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" tabindex="3" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Type your message here" tabindex="4" required></textarea>
                                        </div>
                                        <div>
                                            <button style ="border-radius: 10px; font-weight: bolder;" type="submit" class="btn">SEND MESSAGE</button>
                                        </div>
                                    </form>
                                </div>

                            </td>
                      </tr>
                </table>
            </div>

    
    <br>
    <?php
    endif;
    ?>
    <?php include 'footer.php'?>
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
</body>

</html>